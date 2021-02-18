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

            Column::name('country.name')
                ->label('Country')
                ->filterable(),

            BooleanColumn::name('approved')
                ->label('Approved ?')
                ->filterable()
                ->defaultSort('asc')
            ,


            DateColumn::name('updated_at')
                ->label('updated at'),


            Column::callback(['id','approved'], function ($id, $approved) {
                return view('livewire.leading-teachers-list-table-actions', ['id' => $id, 'approved' => $approved]);
            })

        ];
    }

    public function delete($id){
        User::where('id','=',$id)->first()->removeRole('leading teacher');
    }

    public function approve($id){
        User::where('id','=',$id)->update(['approved'=>true]);
    }

    //Exception thrown by livewire datatable when inside the 'content' section
//    public function getCountriesProperty()
//    {
//        $isos =  User::role('leading teacher')->pluck('country_iso');
//        $countries = Country::whereIn('iso',$isos)->pluck('name')->toArray();
//        return $isos;
//    }

}
