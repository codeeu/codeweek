<?php

namespace App;

use App\Filters\ResourceFilters;
use Exception;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\String_;

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
