@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Resources', 'href' => '/resources'],
      (object) ['label' => 'Role models', 'href' => '/matchmaking-tool'],
      (object) ['label' => 'Sara Dawson', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('non-vue-content')
  <style>
    .leaflet-top.leaflet-left {
        display: none;
    }

    .leaflet-tile {
        visibility: inherit;
    }
  </style>
@endsection

@section('content')
    <tool-detail-card
      id="{{ $tool }}"
      map-tile-url="https://api.mapbox.com/styles/v1/mapbox/streets-v11/tiles/{z}/{x}/{y}?access_token={{ config('codeweek.MAPS_MAPBOX_ACCESS_TOKEN') }}"
    />
@endsection

@push('extra-css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
@endpush
@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush

@push('scripts')
    <script>
      document.dispatchEvent(new CustomEvent('leaflet-ready'));
    </script>
@endpush
