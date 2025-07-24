@extends('layout.base')

@include('components.tailwind')

@include('components.livewire')
@include('components.alpine3')

@section('content')
    <div>
        <section class="codeweek-content-header">

            <div class="header">
                <div>
                    <h1>Pending Activities to review</h1>
                </div>
            </div>
        </section>


        <div class="overflow-hidden bg-gray-50 rounded-lg">
            @role('super admin')
            <div class="mx-20 my-4">
            <country-select :target="'{{$target}}'" :code="'{{$country_iso}}'"
                            :countries="{{$countries}}"></country-select>
            </div>
            @endrole

            <div class="px-4 py-5 sm:p-6">
                <livewire:events-table :country="strtoupper($country_iso)"/>
            </div>
        </div>





        <span>
@endsection


