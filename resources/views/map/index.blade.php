@extends('layout.tall')


@include('components.tailwind')
@include('components.livewire')

@include('components.alpine')

@section('content')

    <livewire:map-wire></livewire:map-wire>

    {{--    <div class="w-full" id="" style="height: 600px;"></div>--}}

@endsection