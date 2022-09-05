@extends('layout.base')

@include('components.tailwind')

@include('components.livewire')
@include('components.alpine3')

@section('content')
    <div>
        <section class="codeweek-content-header">

            <div class="header">
                <div>
                    <h1>Review Page</h1>
                </div>
            </div>


        </section>

        <div class="bg-gray-50 overflow-hidden rounded-lg">
            <country-select :target="'{{$target}}'" :code="'{{$country_iso}}'"
                            :countries="{{$countries}}"></country-select>

            <div class="px-4 py-5 sm:p-6">
                <livewire:events-table :country="strtoupper($country_iso)"/>
            </div>
        </div>





        <span>
@endsection


