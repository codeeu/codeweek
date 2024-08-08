<?php

namespace App\Http\Transformers;

abstract class Transformer
{
    public function transformCollection($items)
    {
        return $items->map([$this, 'transform']);
    }

    abstract public function transform($item);
}
