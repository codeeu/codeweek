<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_searchable',
        'category',
        'link_type',
        'description',
        'language',
        'unique_identifier',
        'path',
        'keywords',
        'thumbnail',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    /**
     * Accessor for keywords as an array.
     */
    public function getKeywordsAttribute($value)
    {
        return json_decode($value, true);
    }

    /**
     * Mutator for keywords as a JSON string.
     */
    public function setKeywordsAttribute($value)
    {
        $this->attributes['keywords'] = json_encode($value);
    }
}
