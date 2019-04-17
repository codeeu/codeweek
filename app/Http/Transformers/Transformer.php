<?php

namespace App\Http\Transformers;


use Illuminate\Support\Facades\Log;

abstract class Transformer
{

    public function transformCollection($items)
    {
        return $items->map([$this, 'transform']);
    }

    public abstract function transform($item);

}