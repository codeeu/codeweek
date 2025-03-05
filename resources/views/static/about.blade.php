@extends('layout.base')

@section('title', 'About EU Code Week – Empowering Digital Skills for All')
@section('description', 'Learn about EU Code Week’s mission to promote coding and digital literacy across Europe. Get involved and start coding today!')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-about-page" class="codeweek-page">

        <section class="codeweek-banner about">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('menu.about')</h1>
            </div>
            <div class="image">
                <img src="/images/banner_about.svg" class="static-image">

            </div>

        </section>


        <section class="codeweek-content-wrapper">

            <h1>@lang('about.when-title')</h1>

            @lang('about.when-text')

            <div class="codeweek-about-blue-box">

                <h1>@lang('about.codeweek_in_numbers-title')</h1>

                @lang('about.codeweek_in_numbers-text')

                <img src="{{asset('img/participation-2021.gif')}}">

            </div>

            <div class="about-two-column">

                <div class="first-column">

                    <h1>@lang('about.run_by_volunteers-title')</h1>

                    @lang('about.run_by_volunteers-text')

                    <div class="codeweek-about-blue-box">

                        <h1>@lang('about.supported_by_commission-title')</h1>

                        @lang('about.supported_by_commission-text')
                        <p>
                            @lang('snippets.about.goal')
                        </p>

                    </div>

                    <h1>@lang('about.schools-title')</h1>

                    @lang('about.schools-text')

                </div>
                <div class="second-column">

                    <h1>@lang('about.why_coding-title')</h1>

                    @lang('about.why_coding-text')

                    @lang('about.why_coding-quote')

                </div>


            </div>

            <div class="codeweek-about-blue-box">

                <h1>@lang('about.join_codeweek-title')</h1>

                @lang('about.join_codeweek-text')

            </div>

            <div class="partners">
                <a href="/partners">
                    <h1>@lang('about.partners_and_sponsors')</h1>
                    <img src="/images/external-link.svg" width="16" class="static-image">
                </a>
            </div>

        </section>

    </section>

@endsection

{{--@push('scripts')--}}
{{--    <script src="https://t003c459d.emailsys2a.net/form/26/4245/574a0c9b7e/popup.js" async></script>--}}
{{--@endpush--}}