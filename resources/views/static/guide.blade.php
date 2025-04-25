@extends('layout.base')

@section('title', 'EU Code Week Guide – How to Get Started')
@section('description', 'New to EU Code Week? Check out our step-by-step guide on how to organize events, access resources, and engage with the coding community.')

@section('content')

    <section id="codeweek-toolkits-page" class="codeweek-page">

        <section class="codeweek-banner learn-teach">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('guide.title')</h1>
            </div>
            <div class="image">
                <img src="/images/banner_learn_teach.svg" class="static-image">
            </div>
        </section>

        <div class="codeweek-content-wrapper">

            <div class="container clearfix">

                <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                    <h1>@lang('guide.organise_activity')</h1>
                    <span></span>

                    <div class="button">
                        <a href="/add" class="codeweek-button">
                            <input type="submit" value="@lang('guide.register_activity')"></a></div>
                </div>

            </div>

            <h2>@lang('guide.what.title')</h2>
            @lang('guide.what.content')

            <h2>@lang('guide.what_you_need_organise.title')</h2>
            <ul>
                <li>@lang('guide.what_you_need_organise.items.1')</li>
                <li>@lang('guide.what_you_need_organise.items.2')</li>
                <li>@lang('guide.what_you_need_organise.items.3')</li>
                <li>@lang('guide.what_you_need_organise.items.4')</li>
                <li>@lang('guide.what_you_need_organise.items.5')</li>
                <li>@lang('guide.what_you_need_organise.items.6')</li>
                <li>@lang('guide.what_you_need_organise.items.7')</li>
                <li>@lang('guide.what_you_need_organise.items.8')</li>
            </ul>


            <h2>@lang('guide.how_to.title')</h2>
            <ul>
                <li>@lang('guide.how_to.items.1')</li>
                <li>@lang('guide.how_to.items.2')</li>
                <li>@lang('guide.how_to.items.3')</li>
                <li>@lang('guide.how_to.items.4')</li>
                <li>@lang('guide.how_to.items.5')</li>
            </ul>

            <h2>@lang('guide.material.title')</h2>
            @lang('guide.material.text')
            <p>@lang('snippets.guide.tutorials.1') <a href="{{route('training.index')}}">@lang('snippets.guide.tutorials.2')</a> @lang('snippets.guide.tutorials.3')</p>

            <h2>@lang('guide.toolkits.title')</h2>



                <ul>
                    <li>

                    @include('_tookits')

                </ul>




            <h2>@lang('guide.questions.title')</h2>
            @lang('guide.questions.content')

        </div>

    </section>

@endsection
