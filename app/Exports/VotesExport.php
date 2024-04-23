<?php

namespace App\Exports;

use App\Vote;
use Maatwebsite\Excel\Concerns\FromCollection;

class VotesExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Vote::all();
    }
}
