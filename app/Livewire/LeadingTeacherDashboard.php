<?php

namespace App\Livewire;

use App\LeadingTeacherAction;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LeadingTeacherDashboard extends LivewireDatatable
{
    public $model = LeadingTeacherAction::class;

    public function builder()
    {
        return LeadingTeacherAction::where('user_id', auth()->user()->id);
    }

    public function columns()
    {
        return [

            Column::name('title')
                ->label('Title')

                ->filterable(),

            Column::name('type')
                ->label('Type'),

            Column::name('comment')
                ->label('Comments'),

            DateColumn::name('completion_date')
                ->label('Date'),

            Column::name('status'),

        ];
    }
}
