<?php

namespace App;

use App\Filters\ResourceFilters;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\ResourceItem
 *
 * @property int $id
 * @property string $name
 * @property string $source
 * @property string $description
 * @property string|null $thumbnail
 * @property string|null $facebook
 * @property string|null $twitter
 * @property int $active
 * @property int $teach
 * @property int $learn
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ResourceCategory[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ResourceLanguage[] $languages
 * @property-read int|null $languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ResourceLevel[] $levels
 * @property-read int|null $levels_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ResourceProgrammingLanguage[] $programmingLanguages
 * @property-read int|null $programming_languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ResourceSubject[] $subjects
 * @property-read int|null $subjects_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ResourceType[] $types
 * @property-read int|null $types_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem filter(\App\Filters\ResourceFilters $filters)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereLearn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereTeach($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ResourceItem whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class ResourceItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $attributes = [
        'active' => true,
        'learn' => true,
        'teach' => false,
    ];

    protected $appends = ['thumbnail'];

    public function scopeFilter($query, ResourceFilters $filters)
    {
        return $filters->apply($query);
    }

    public function getThumbnailAttribute($value)
    {
        if (empty($value)) {
            $value = $this->attributes['thumbnail'] ?? null;
        }
        
        if (stripos($value, 'http://') === 0 || stripos($value, 'https://') === 0) {
            return $value;
        }

        return config('codeweek.resources_url') . ltrim($value, '/');
    }

    public function levels(): BelongsToMany
    {
        return $this->belongsToMany(\App\ResourceLevel::class);
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(\App\ResourceType::class)->select(['id', 'name', 'position']);
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(\App\ResourceSubject::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(\App\ResourceCategory::class);
    }

    public function programmingLanguages(): BelongsToMany
    {
        return $this->belongsToMany(\App\ResourceProgrammingLanguage::class, 'res_pl_pivot');
    }

    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(\App\ResourceLanguage::class);
    }

    public function attachTypes(string $typeNames)
    {

        $typesIds = $this->getIdsFromNames($typeNames, \App\ResourceType::class);

        $this->types()->attach($typesIds);
    }

    public function attachCategories(string $categoryNames)
    {

        $categoriesIds = $this->getIdsFromNames($categoryNames, \App\ResourceCategory::class);

        $this->categories()->attach($categoriesIds);
    }

    public function attachProgrammingLanguages(string $programmingLanguages)
    {

        if ($programmingLanguages === 'All targeted programming languagues;') {
            return $this->programmingLanguages()->attach(ResourceProgrammingLanguage::all()->pluck('id')->toArray());
        } else {
            $this->programmingLanguages()->attach($this->getIdsFromNames($programmingLanguages, \App\ResourceProgrammingLanguage::class));
        }

    }

    public function attachLevels(string $levels)
    {

        $this->levels()->attach($this->getIdsFromNames($levels, \App\ResourceLevel::class));
    }

    public function attachSubjects(string $subjects)
    {

        $this->subjects()->attach($this->getIdsFromNames($subjects, \App\ResourceSubject::class));
    }

    public function attachLanguages(string $languages)
    {

        if ($languages === 'All targeted languages;' || $languages === 'All targeted languages') {
            return $this->languages()->attach(ResourceLanguage::all()->pluck('id')->toArray());
        }

        return $this->languages()->attach($this->getIdsFromNames($languages, \App\ResourceLanguage::class));

    }

    /**
     * @param  $typesArr
     */
    protected function getIdsFromNames($types, $resourceObject): array
    {

        $typesArr = array_unique(array_map('trim', explode(';', $types)));

        $typesIds = [];

        foreach ($typesArr as $item) {
            if (strlen(ltrim($item)) > 0) {

                $resourceType = $resourceObject::where('name', 'like', ltrim($item));
                if (is_null($resourceType->first())) {
                    throw new Exception('Unknown Resource Type: '.ltrim($item));
                }
                array_push($typesIds, $resourceType->first()->id);

                //dump($type->first()->id);

            }

        }

        return $typesIds;
    }
}
