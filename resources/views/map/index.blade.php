@extends('layout.base')


@include('components.tailwind')
@include('components.livewire')

@include('components.alpine')

@section('content')

    <livewire:map-wire></livewire:map-wire>

    {{--    <div class="w-full" id="mapid" style="height: 600px;"></div>--}}

@endsection