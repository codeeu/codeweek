<?php

namespace App\Exports;

use App\Vote;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class VotesExport implements FromCollection
{
    public function collection(): Collection
    {
        return Vote::all();
    }
}
