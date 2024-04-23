<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use App\Vote;
use Maatwebsite\Excel\Concerns\FromCollection;

class VotesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(): Collection
    {
        return Vote::all();
    }
}
