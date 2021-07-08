@extends('layout.base')




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


