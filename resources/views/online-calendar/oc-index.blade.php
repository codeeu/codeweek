@extends('layout.base')

@section('title', 'Featured Coding Activities – Join Exciting Code Week Events')
@section('description', 'Discover and participate in featured coding activities from EU Code Week. Find engaging projects and workshops near you!')



@include('components.tailwind')
@include('components.livewire')

{{--@push('scripts')--}}
{{--    <script>--}}
{{--        function card() {--}}
{{--            return {--}}
{{--                selectedActivityType: 'open-in-person',--}}
{{--                isOnlineActivitySelected() {--}}
{{--                    return this.selectedActivityType === 'open-online'--}}
{{--                },--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}
{{--@endpush--}}

@include('components.alpine')

@section('content')


<x-intro-banner>@lang('snippets.featured-activities')</x-intro-banner>




    @livewire('online-calendar')

@endsection


