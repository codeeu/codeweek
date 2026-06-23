<?php

namespace App\Services\Support\Content;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

/**
 * Resolves which columns of a content model are safe for the AI to edit:
 * string/text columns only, minus a structural deny-list (URLs, slugs, flags,
 * relations, identifiers) and minus any non-string cast (boolean/array/date/int).
 *
 * This keeps "edit any text field" honest without hand-maintaining a column
 * list per model.
 */
class ContentFieldResolver
{
    /**
     * @return list<string>
     */
    public function editableFields(Model $model): array
    {
        $table = $model->getTable();
        $casts = $model->getCasts();
        $denylist = array_map('strtolower', (array) config('support_ai.content.field_denylist', []));
        $primaryKey = $model->getKeyName();

        $fields = [];
        foreach ($this->stringColumns($table) as $column) {
            if ($column === $primaryKey) {
                continue;
            }
            if ($this->isDenied($column, $denylist)) {
                continue;
            }
            // Drop anything with an explicit non-string cast (array/json/bool/date/int).
            if (isset($casts[$column]) && strtolower((string) $casts[$column]) !== 'string') {
                continue;
            }
            $fields[] = $column;
        }

        return array_values(array_unique($fields));
    }

    public function isEditable(Model $model, string $field): bool
    {
        return in_array($field, $this->editableFields($model), true);
    }

    /**
     * String/text columns of a table (DB-portable across MySQL + SQLite).
     *
     * @return list<string>
     */
    private function stringColumns(string $table): array
    {
        $columns = [];

        if (method_exists(Schema::class, 'getColumns')) {
            foreach (Schema::getColumns($table) as $column) {
                $typeName = strtolower((string) ($column['type_name'] ?? $column['type'] ?? ''));
                if ($this->isTextType($typeName)) {
                    $columns[] = (string) $column['name'];
                }
            }

            return $columns;
        }

        foreach (Schema::getColumnListing($table) as $name) {
            $type = strtolower((string) Schema::getColumnType($table, $name));
            if ($this->isTextType($type)) {
                $columns[] = $name;
            }
        }

        return $columns;
    }

    private function isTextType(string $type): bool
    {
        if ($type === 'string') {
            return true;
        }

        return str_contains($type, 'char') || str_contains($type, 'text');
    }

    /**
     * @param  list<string>  $denylist
     */
    private function isDenied(string $column, array $denylist): bool
    {
        $parts = preg_split('/[_\s]+/', strtolower($column)) ?: [];

        foreach ($parts as $part) {
            if (in_array($part, $denylist, true)) {
                return true;
            }
        }

        return false;
    }
}
