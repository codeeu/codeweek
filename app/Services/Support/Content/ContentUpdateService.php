<?php

namespace App\Services\Support\Content;

use App\Services\Support\SupportJson;
use Illuminate\Database\Eloquent\Model;

/**
 * Plans and applies AI content edits to allowlisted Nova-managed records.
 *
 * Text fields only (ContentFieldResolver). Every value is guarded against URLs,
 * HTML/scripts, and over-length, and translation-key fields are protected. The
 * plan computes an exact before/after diff that the approval email shows; the
 * same validation runs again at execution time.
 */
class ContentUpdateService
{
    public function __construct(
        private readonly ContentActionRegistry $registry,
        private readonly ContentFieldResolver $resolver,
    ) {
    }

    public function enabled(): bool
    {
        return (bool) config('support_ai.enabled') && (bool) config('support_ai.content.enabled');
    }

    /**
     * Build a plan straight from a triage payload's content_* fields.
     *
     * @param  array<string, mixed>  $triage
     * @return array<string, mixed> SupportJson envelope.
     */
    public function planFromTriage(array $triage): array
    {
        $model = is_string($triage['content_model'] ?? null) ? trim($triage['content_model']) : '';
        $identifier = is_string($triage['content_identifier'] ?? null) ? trim($triage['content_identifier']) : null;
        $changes = (array) ($triage['content_changes'] ?? []);

        return $this->plan($model, $identifier !== '' ? $identifier : null, $changes);
    }

    /**
     * Build a validated before/after plan (this is also the dry run — nothing saved).
     *
     * @param  array<string, mixed>  $changes
     * @return array<string, mixed> SupportJson envelope.
     */
    public function plan(string $modelKey, ?string $identifier, array $changes): array
    {
        $input = ['model' => $modelKey, 'identifier' => $identifier];

        if (!$this->enabled()) {
            return SupportJson::fail('content_update', $input, 'content_edits_disabled');
        }

        $spec = $this->registry->get($modelKey);
        if ($spec === null) {
            return SupportJson::fail('content_update', $input, 'model_not_in_allowlist');
        }

        if ($changes === []) {
            return SupportJson::fail('content_update', $input, 'no_changes_proposed');
        }

        $record = $this->resolveRecord($spec, $identifier);
        if ($record === null) {
            return SupportJson::fail('content_update', $input, 'record_not_found');
        }

        $editable = $this->resolver->editableFields($record);
        $before = [];
        $after = [];
        $errors = [];

        foreach ($changes as $field => $value) {
            $field = (string) $field;

            if (!in_array($field, $editable, true)) {
                $errors[] = 'field_not_editable:'.$field;
                continue;
            }

            $current = $record->getAttribute($field);
            if ($this->looksLikeTranslationKey((string) ($current ?? ''))) {
                $errors[] = 'field_is_translation_key:'.$field;
                continue;
            }

            $valueError = $this->validateValue($value);
            if ($valueError !== null) {
                $errors[] = $valueError.':'.$field;
                continue;
            }

            $newValue = (string) $value;
            if ((string) ($current ?? '') === $newValue) {
                continue; // no-op
            }

            $before[$field] = $current;
            $after[$field] = $newValue;
        }

        if ($errors !== []) {
            return SupportJson::fail('content_update', $input, $errors);
        }

        if ($after === []) {
            return SupportJson::fail('content_update', $input, 'no_effective_change');
        }

        return SupportJson::ok('content_update', $input, [
            'model_key' => $modelKey,
            'label' => $spec['label'],
            'record_id' => $record->getKey(),
            'identifier' => $identifier,
            'before' => $before,
            'after' => $after,
            'fields' => array_keys($after),
        ]);
    }

    /**
     * Apply the change (post-APPROVE). Re-validates by re-planning first.
     *
     * @param  array<string, mixed>  $changes
     * @return array<string, mixed> SupportJson envelope.
     */
    public function execute(string $modelKey, ?string $identifier, array $changes): array
    {
        $plan = $this->plan($modelKey, $identifier, $changes);
        if (!($plan['ok'] ?? false)) {
            return $plan;
        }

        $spec = $this->registry->get($modelKey);
        $record = $this->resolveRecord((array) $spec, $identifier);
        if ($record === null) {
            return SupportJson::fail('content_update', ['model' => $modelKey], 'record_not_found');
        }

        $after = (array) $plan['result']['after'];
        foreach ($after as $field => $value) {
            $record->setAttribute((string) $field, (string) $value);
        }
        $record->save();

        return SupportJson::ok('content_update', ['model' => $modelKey, 'identifier' => $identifier], [
            'model_key' => $modelKey,
            'label' => $plan['result']['label'],
            'record_id' => $record->getKey(),
            'before' => $plan['result']['before'],
            'after' => $after,
            'fields' => array_keys($after),
        ]);
    }

    /**
     * Reject URLs, HTML/scripts, non-strings, and over-length values.
     */
    public function validateValue(mixed $value): ?string
    {
        if (!is_string($value)) {
            return 'value_not_text';
        }

        $max = (int) config('support_ai.content.max_field_length', 5000);
        if (mb_strlen($value) > $max) {
            return 'value_too_long';
        }

        if (preg_match('#https?://#i', $value) || preg_match('#\bwww\.[a-z0-9-]+\.#i', $value)) {
            return 'value_contains_url';
        }

        // Plain text only — reject HTML/script-like markup.
        if (preg_match('#<\s*[a-z!/]#i', $value)) {
            return 'value_contains_markup';
        }

        return null;
    }

    /**
     * Heuristic: dotted token with no spaces (e.g. "hackathons.hero.title") is a
     * Laravel translation key, not literal copy — do not overwrite it.
     */
    private function looksLikeTranslationKey(string $value): bool
    {
        $value = trim($value);
        if ($value === '' || str_contains($value, ' ')) {
            return false;
        }

        return str_contains($value, '.') && (bool) preg_match('/^[a-z0-9_.-]+$/i', $value);
    }

    /**
     * @param  array{model: class-string, singleton: bool, lookup_fields: list<string>}  $spec
     */
    private function resolveRecord(array $spec, ?string $identifier): ?Model
    {
        /** @var class-string<Model> $class */
        $class = $spec['model'];
        /** @var Model $model */
        $model = new $class();

        if (($spec['singleton'] ?? false) && ($identifier === null || $identifier === '')) {
            return $model->newQuery()->orderBy($model->getKeyName())->first();
        }

        if ($identifier === null || $identifier === '') {
            return null;
        }

        if (ctype_digit($identifier)) {
            $byId = $model->newQuery()->find((int) $identifier);
            if ($byId !== null) {
                return $byId;
            }
        }

        foreach ((array) ($spec['lookup_fields'] ?? []) as $lookupField) {
            $found = $model->newQuery()->where($lookupField, $identifier)->first();
            if ($found !== null) {
                return $found;
            }
        }

        return null;
    }
}
