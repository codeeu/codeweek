@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        <section class="codeweek-banner learn-teach">
            <div class="text">
                <h2>#CodeWeek</h2>
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
                    <h2>EU Code Week 2023</h2>
                @include('_tookits')

                <li><br/>
                    <a href="{{route("guide")}}">@lang('resources.how_to_organise_an_activity')</a>
                </li>

            </ul>
        </div>









@endsection
