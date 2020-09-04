@extends('layout.base')


@include('components.tailwind')
@include('components.livewire')

@section('content')

    @livewire('online-calendar')

@endsection


