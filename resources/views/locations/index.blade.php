@extends('layout.base')

@include('components.tailwind')
@include('components.livewire')

@section('content')
    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header">
            <h1>Your addresses</h1>
        </section>

        <section class="codeweek-content-wrapper" style="margin-top:0px;">

{{--            <div>--}}
{{--                <button></button>--}}
{{--                <a class="width-100 bg-gray-900 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 focus:ring-offset-gray-50 text-white font-semibold h-12 px-6 rounded-lg w-full flex items-center justify-center sm:w-auto dark:bg-sky-500 dark:highlight-white/20 dark:hover:bg-sky-400" href="{{route('location.add')}}">Add Location</a>--}}
{{--            </div>--}}
<ul>
    <li>
    @foreach($locations as $location)
        {{$location->name}}<br/>
    @endforeach
    </li>
</ul>


            <div class="flex">
                <a rel="noreferer noopener"
                   href="{{route('location.add')}}"
                   class="codeweek-action-link-button">Add new Address</a>
            </div>




        </section>

    </section>
@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '✓ ';
            color: #ee6a2c;
            font-weight: bold;
        }
    </style>
@endsection
