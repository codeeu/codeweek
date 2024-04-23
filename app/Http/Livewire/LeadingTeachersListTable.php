<?php

namespace App\Http\Livewire;

use App\LeadingTeacherExpertise;
use App\ResourceLevel;
use App\ResourceSubject;
use App\User;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class LeadingTeachersListTable extends LivewireDatatable
{
    public function builder()
    {
        return User::role('leading teacher');
    }

    public function columns()
    {
        return [

            Column::callback(['id', 'approved'], function ($id, $approved) {
                return view('livewire.leading-teachers-list-table-actions', ['id' => $id, 'approved' => $approved]);
            })->excludeFromExport(),

            Column::name('firstname')
                ->label('firstname')
                ->filterable(),

            Column::name('lastname')
                ->label('lastname')
                ->filterable(),

            Column::name('tag')
                ->label('tag')
                ->filterable(),

            Column::name('country_iso')
                ->label('Country Name')
                ->filterable(),

            //            Column::name('city.city')
            //                ->label('City')
            //                ->hide(),

            Column::name('email')
                ->label('email')
                ->filterable(),

            BooleanColumn::name('approved')
                ->label('Approved ?')
                ->filterable()
                ->defaultSort('asc'),

            DateColumn::name('updated_at')
                ->label('updated at'),

            Column::name('levels.name')
                ->filterable($this->levels->pluck('name'))
                ->label('Levels')
                ->hide(),

            Column::name('expertises.name')
                ->filterable($this->levels->pluck('name'))
                ->label('expertises')
                ->hide(),

            Column::name('subjects.name')
                ->filterable($this->subjects->pluck('name'))
                ->label('subjects')
                ->hide(),

            //Hidden Fields
            Column::name('twitter')
                ->label('twitter')
                ->hide(),

        ];
    }

    public function delete($id)
    {
        User::where('id', '=', $id)->first()->removeRole('leading teacher');
    }

    public function approve($id)
    {
        User::where('id', '=', $id)->update(['approved' => true]);
    }

    public function getLevelsProperty()
    {
        return ResourceLevel::all();
    }

    public function getExpertisesProperty()
    {
        return LeadingTeacherExpertise::all();
    }

    public function getSubjectsProperty()
    {
        return ResourceSubject::all();
    }
}
