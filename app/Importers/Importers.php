<?php

namespace App\Importers;

use App\Event;

interface Importers
{
    public function parse();

    public function update(Event $event);
}
