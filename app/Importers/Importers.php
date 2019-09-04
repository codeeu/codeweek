<?php

namespace App\Importers;

interface Importers
{
    public function parse();

    public function update();
}