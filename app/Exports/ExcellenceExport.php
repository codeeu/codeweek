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
        $results = ExcellenceWinnersHelper::query(Carbon::now()->year(2021), true);

        return $results;
    }

    public function headings(): array
    {
        return [
            'Codeweek4All Code',
            'Participants Count',
            'Teachers Count',
            'Countries Count',
            'Activities Count',
            'Reporting Percentage',
            'Super Winner',
            'Initiator Email',
            'Countries detail',

        ];
    }
}
