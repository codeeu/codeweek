<?php

namespace App;

use App\Filters\ResourceFilters;
use Exception;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\String_;

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
 * @mixin \Eloquent
 */
class ResourceItem extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'active' => true,
        'learn' => true,
        'teach' => false,
    ];

    public function scopeFilter($query, ResourceFilters $filters)
    {
        return $filters->apply($query);
    }

    public function getThumbnailAttribute($value)
    {


        if (!strncmp($value, "http", 4) === 0) {
            return env('RESOURCES_URL') + $value;
        }

        return $value;

    }


    public function levels()
    {
        return $this->belongsToMany('App\ResourceLevel');
    }

    public function types()
    {
        return $this->belongsToMany('App\ResourceType')->select(array('id', 'name', 'position'));
    }

    public function subjects()
    {
        return $this->belongsToMany('App\ResourceSubject');
    }

    public function categories()
    {
        return $this->belongsToMany('App\ResourceCategory');
    }

    public function programmingLanguages()
    {
        return $this->belongsToMany('App\ResourceProgrammingLanguage', 'res_pl_pivot');
    }

    public function languages()
    {
        return $this->belongsToMany('App\ResourceLanguage');
    }

    public function attachTypes(String $typeNames)
    {

        $typesIds = $this->getIdsFromNames($typeNames, '\App\ResourceType');

        $this->types()->attach($typesIds);
    }

    public function attachCategories(String $categoryNames)
    {

        $categoriesIds = $this->getIdsFromNames($categoryNames, '\App\ResourceCategory');

        $this->categories()->attach($categoriesIds);
    }

    public function attachProgrammingLanguages(String $programmingLanguages)
    {


        if ($programmingLanguages === "All targeted programming languagues;") {
            return $this->programmingLanguages()->attach(ResourceProgrammingLanguage::all()->pluck('id')->toArray());
        } else {
            $this->programmingLanguages()->attach($this->getIdsFromNames($programmingLanguages, '\App\ResourceProgrammingLanguage'));
        }

    }

    public function attachLevels(String $levels)
    {

        $this->levels()->attach($this->getIdsFromNames($levels, '\App\ResourceLevel'));
    }

    public function attachSubjects(String $subjects)
    {

        $this->subjects()->attach($this->getIdsFromNames($subjects, '\App\ResourceSubject'));
    }

    public function attachLanguages(String $languages)
    {


        if ($languages === "All targeted languages;" || $languages === "All targeted languages") {
            return $this->languages()->attach(ResourceLanguage::all()->pluck('id')->toArray());
        }

        return $this->languages()->attach($this->getIdsFromNames($languages, '\App\ResourceLanguage'));


    }

    /**
     * @param $typesArr
     * @return array
     */
    protected function getIdsFromNames($types, $resourceObject): array
    {


        $typesArr = array_unique(array_map('trim', explode(";", $types)));

        $typesIds = [];

        foreach ($typesArr as $item) {
            if (strlen(ltrim($item)) > 0) {

                $resourceType = $resourceObject::where("name", "like", ltrim($item));
                if (is_null($resourceType->first())) {
                    throw new Exception("Unknown Resource Type: " . ltrim($item));
                };
                array_push($typesIds, $resourceType->first()->id);


                //dump($type->first()->id);

            }

        }


        return $typesIds;
    }
}
