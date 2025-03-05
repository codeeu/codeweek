@extends('layout.base')

@section('title', 'EU Code Week Toolkits – Organize & Promote Your Coding Event')
@section('description', 'Discover practical toolkits to help you organize, promote, and run engaging coding events during EU Code Week. Get started today!')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        <section class="codeweek-banner learn-teach">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('menu.toolkits')</h1>
            </div>
            <div class="image">
                <img src="/images/banner_learn_teach.svg" class="static-image">
            </div>
        </section>


        <div class="codeweek-content-wrapper">
            <h3>@lang('snippets.toolkits.0')</h3>
            <ul>
                <li>
                    <h2>EU Code Week 2025</h2>
                @include('_tookits')

                <li><br/>
                    <a href="{{route("guide")}}">@lang('resources.how_to_organise_an_activity')</a>
                </li>

            </ul>
        </div>









@endsection
