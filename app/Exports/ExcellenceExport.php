<?php

namespace App\Exports;

use App\Helpers\ExcellenceWinnersHelper;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ExcellenceExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function collection()
    {
        $results = ExcellenceWinnersHelper::query(Carbon::now()->year);
        return $results;
    }

    public function headings(): array
    {
        return [
            'Participants Count',
            'Teachers Count',
            'Countries Count',
            'Activities Count',
            'Codeweek4All Code'
        ];
    }
}
