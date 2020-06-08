@extends('layout.base')

@section('content')

    <section id="codeweek-about-page" class="codeweek-page">

        <section class="codeweek-banner about">
            <div class="text">
                <h2>#CodeWeek</h2>
                <h1>@lang('menu.values')</h1>
            </div>
            <div class="image">
                <img src="/images/banner_about.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <h1>@lang('values.title')</h1>

            <p>
                @lang('values.description.1.1') <a
                        href="{{route('ambassadors')}}">@lang('values.description.1.2')</a>@lang('values.description.1.3')
                <a href="https://ec.europa.eu/digital-single-market/en/eu-code-week">@lang('values.description.1.4')</a> @lang('values.description.1.5')
                <br/><br/>
                @lang('values.description.2')
                <br/><br/>
                @lang('values.description.3')
                <br/><br/>
                @lang('values.description.4')
            </p>


            <div class="codeweek-about-blue-box" style="line-height: 22px;">

                <h2>1. @lang('values.1.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">
                    @lang('values.1.content')
                </div>

                <h2>2. @lang('values.2.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">
                    @lang('values.2.content')
                </div>

                <h2>3. @lang('values.3.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">
                    @lang('values.3.content.1') <a
                            href="{{route('resources_teach')}}">@lang('values.3.content.2')</a> @lang('values.3.content.3')
                    <a href="{{route('events_map')}}">@lang('values.3.content.4')</a> @lang('values.3.content.5')
                </div>

                <h2>4. @lang('values.4.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">
                    @lang('values.4.content.1')<br/><br/>
                    <a href="{{route('codeweek4all')}}">@lang('values.4.content.2')</a> @lang('values.4.content.3')
                </div>

                <h2>5. @lang('values.5.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">
                    @lang('values.5.content.1') <a
                            href="{{route('resources_learn')}}">@lang('values.5.content.2')</a> @lang('values.5.content.3')
                </div>

                <h2>6. @lang('values.6.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">
                    @lang('values.6.content')
                </div>

                <h2>7. @lang('values.7.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">
                    @lang('values.7.content')
                </div>

            </div>


        </section>


    </section>

@endsection
