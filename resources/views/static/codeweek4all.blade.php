@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        <section class="codeweek-banner training">
            <div class="text">
                <h1>@lang('codeweek4all.title')</h1>
            </div>
            <div class="image">
                <img src="/images/banner_training.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <p>
                    @lang('codeweek4all.text')
                </p>

                <h2>@lang('codeweek4all.what.title')</h2>

                @lang('codeweek4all.what.content')
                <ul>
                    <li><strong>@lang('codeweek4all.what.criteria1')</strong></li>@lang('codeweek4all.what.andor')
                    <li><strong>@lang('codeweek4all.what.criteria2')</strong></li>@lang('codeweek4all.what.andor')
                    <li><strong>@lang('codeweek4all.what.criteria3')</strong></li>
                </ul>

                <h2>@lang('codeweek4all.howto.title')</h2>

                <ol>
                    <li>@lang('codeweek4all.howto.content')</li>
                </ol>

                <i>@lang('codeweek4all.howto.first_alliance.title')</i>
                <ol start="2">
                    <li>@lang('codeweek4all.howto.first_alliance.1')</li>
                    <li>@lang('codeweek4all.howto.first_alliance.2')</li>
                    <li>@lang('codeweek4all.howto.first_alliance.3')</li>
                    <li>@lang('codeweek4all.howto.first_alliance.4')</li>
                </ol>

                <i>@lang('codeweek4all.howto.existing_alliance.title')</i>
                <ol start="2">
                    <li>@lang('codeweek4all.howto.existing_alliance.1')</li>
                    <li>@lang('codeweek4all.howto.existing_alliance.2')</li>
                    <li>@lang('codeweek4all.howto.existing_alliance.3')</li>
                    <li>@lang('codeweek4all.howto.existing_alliance.4')</li>
                </ol>

                <h2>@lang('codeweek4all.why.title')</h2>

                <ul>
                    <li>@lang('codeweek4all.why.1')</li>
                    <li>@lang('codeweek4all.why.2')</li>
                    <li>@lang('codeweek4all.why.3')</li>
                    <li>@lang('codeweek4all.why.4')</li>
                    <li>@lang('codeweek4all.why.5')</li>
                </ul>


            </section>

        </section>

    </section>

@endsection
