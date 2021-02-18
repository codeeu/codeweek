<?php

namespace App\Http\Livewire;

use App\Country;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\TimeColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
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

            Column::name('firstname')
                ->label('firstname')
                ->filterable(),

            Column::name('lastname')
                ->label('lastname')
                ->filterable(),

            Column::name('country_iso')
                ->label('Country')
                ->filterable()

        ];
    }

    //Exception thrown by livewire datatable when inside the 'content' section
//    public function getCountriesProperty()
//    {
//        $isos =  User::role('leading teacher')->pluck('country_iso');
//        $countries = Country::whereIn('iso',$isos)->pluck('name')->toArray();
//        return $isos;
//    }

}
