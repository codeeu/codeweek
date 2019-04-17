<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

abstract class Filters
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * The Eloquent builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Create a new EventFilters instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->request = $request;

    }


    public static function getEloquentSqlWithBindings($query)
    {
        return vsprintf(str_replace('?', '%s', $query->toSql()), collect($query->getBindings())->map(function ($binding) {
            return is_numeric($binding) ? $binding : "'{$binding}'";
        })->toArray());
    }

    /**
     * Apply the filters.
     *
     * @param  Builder $builder
     * @return Builder
     */
    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value) {
            if (method_exists($this, $filter)) {
                //Log::info($filter);
                session([$filter => $value]);
                $this->$filter($value);
            }
        }

        Log::info($this->builder->toSql());
        //Log::info(self::getEloquentSqlWithBindings($this->builder));
        return $this->builder;
    }

    /**
     * Fetch all relevant filters from the request.
     *
     * @return array
     */
    public function getFilters()
    {

        return $this->request->only($this->filters);
    }
}