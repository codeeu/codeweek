@extends('layout.base')

@section('content')

    @include('include.map')

    Your coordinates: {{$geoip->lat}} - {{$geoip->lon}}


@endsection