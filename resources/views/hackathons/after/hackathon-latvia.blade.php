@extends('layout.base')

<x-tailwind></x-tailwind>

@section('hackathons.header')
@include('hackathons.after.header', ["enabled_language" => "lv"])
@endsection

@section('content')

<section id="codeweek-hackathons-before-page" class="codeweek-page latvia">


    <section class="codeweek-banner hackathon h-auto">
        <div class="image">
            <div class="text">
                <div class="text-inside">
                    <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                    <h2>@lang('hackathon-latvia.subtitle')</h2>
                </div>
            </div>
            <div class="paragraph">
                <p>@lang('hackathon-latvia.sections.1.content.0')<br/>
            </div>
            <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
        </div>
    </section>

    <section class="codeweek-content-wrapper">

        <div>
            @lang('hackathon-latvia.sections.1.content.1')
            @lang('hackathon-latvia.sections.1.content.2')<br/><br/>
            @lang('hackathon-latvia.sections.1.content.3')
        </div>

    </section>







    <section id="programme" style="line-height: 1.7em;" class="mt-10">


        <h1>@lang('hackathon-latvia.sections.9.title')</h1>

        @lang('hackathon-latvia.sections.9.content.0')<br/>
        @lang('hackathon-latvia.sections.9.content.1')


        <br/><br/>
        <h1>@lang('hackathon-latvia.sections.8.title')</h1>
        @lang('hackathon-latvia.sections.8.content.0.0')
        <strong>@lang('hackathon-latvia.sections.8.content.0.1')</strong>
        <ol style="list-style-type: decimal;margin-left:40px; margin-bottom:10px">
            <li>@lang('hackathon-latvia.sections.8.content.1')</li>
            <li>@lang('hackathon-latvia.sections.8.content.2')</li>
            <li>@lang('hackathon-latvia.sections.8.content.3')</li>
        </ol>
        <div>
            @lang('hackathon-latvia.sections.8.content.4')<br/><br/>

            @lang('hackathon-latvia.sections.8.content.5')<br/><br/>
            @lang('hackathon-latvia.sections.8.content.6')<br/><br/>
            @lang('hackathon-latvia.sections.8.content.7')<br/><br/>
            @lang('hackathon-latvia.sections.8.content.8')<br/><br/>
        </div>

        <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25 mt-6">

            @lang('hackathon-latvia.sections.winners.0')<br/><br/>
            @lang('hackathon-latvia.sections.winners.1')

            <ul style="list-style-type: circle;margin-left:40px; margin-bottom:10px; font-weight: bolder;">
                <li>AgSpoon</li>
                <li>BruhTeam</li>
                <li>Chronos</li>
                <li>CodeBreakers</li>
                <li>Iesācēji</li>
                <li>It's not a bug it's a feature</li>
                <li>Komjaunatne</li>
                <li>Puchkornishko</li>
                <li>Spiedpogplakandēlis</li>
                <li>Yeno</li>
            </ul>

            @lang('hackathon-latvia.sections.winners.2')<br/><br/>
            @lang('hackathon-latvia.sections.winners.3')<br/><br/>


        </div>
        <div class="mt-6">
            <h1>Focus</h1>
            <div>@lang('hackathon-latvia.sections.focus.0')</div>

            <ul style="list-style-type: square; margin-left:40px; margin-bottom:10px">

                <li>
                    <a href="https://www.youtube.com/watch?v=JNBtAs_zlWc&t=27s&ab_channel=EuropeCodeWeek">@lang('hackathon-latvia.sections.focus.1')</a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=hWAIwc-dUhQ&ab_channel=EuropeCodeWeek">@lang('hackathon-latvia.sections.focus.2')</a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=N5pjsSPh1vI&ab_channel=EuropeCodeWeek">@lang('hackathon-latvia.sections.focus.3')</a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=HF61GbcqbqA&ab_channel=EuropeCodeWeek">@lang('hackathon-latvia.sections.focus.4')</a>
                </li>
            </ul>
        </div>

    </section>




    <section id="jury-mentors">

        <h1>@lang('hackathon-latvia.sections.10.title')</h1>
        <p>
            @lang('hackathon-latvia.sections.10.content.0')
        </p>
        <div class="jury-grid">
            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/lina-sarma.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.1.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.1.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/janis-mozgis.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.2.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.2.1')
                    <a href="http://inzpire.me/">Inzpire.me</a>, @lang('hackathon-latvia.sections.mentors.2.2')
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/janis-cimbulis.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.3.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.3.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/angela.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.4.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.4.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/elchin.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.5.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.5.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/2/janis-knets.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.6.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.6.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/2/ance_kancere.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.7.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.7.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/2/kaspars-eglitis.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.8.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.8.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/2/paula-elksne.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.9.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.9.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/2/linda-sinka.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.10.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.10.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/3/Gundega_Dekena.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.11.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.11.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/3/Emīls_Sjundjukovs.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.12.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.12.1')</div>
            </div>


            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/3/Pavils_Jurjans.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.13.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.13.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/3/kris.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.mentors.14.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.mentors.14.1')</div>
            </div>



        </div>

        <h1 class="mt-12">@lang('hackathon-latvia.sections.leaders.title')</h1>
        <div class="jury-grid">

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/2/viesturs_sosars.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.leaders.1.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.leaders.1.1')</div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/latvia/2/karlis-jonass.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-latvia.sections.leaders.2.0')</h2>
                <div class="text-sm">@lang('hackathon-latvia.sections.leaders.2.1')</div>
            </div>


        </div>
    </section>




    <section id="partners">
        <div>
            <h1>@lang('hackathon-latvia.misc.2')</h1>
        </div>

        <div class="partners-grid">

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/latvia/start-it.png')}}">
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/latvia/cognizant.png')}}">
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/latvia/datorium_logo_black.png')}}">
                </div>
            </div>


        </div>

        <div class="partners-grid">

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/google.png')}}">
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/imagilabs.png')}}">
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/learn-it.png')}}">
                </div>
            </div>


        </div>

        <div class="partners-grid">
            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/makeblock-makex.png')}}">
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/microsoft.png')}}">
                </div>
            </div>
            @if (app()->getLocale() == "lv")
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/latvia/rbs_lv.png')}}">
                    </div>
                </div>
            @else
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/latvia/rbs_en.png')}}">
                    </div>
                </div>
            @endif

        </div>
    </section>

    <section id="about-codeweek">
        <div class="text">
            <h1>@lang('hackathon-latvia.sections.12.title')</h1>
            <p>@lang('hackathon-latvia.sections.12.content.0') @lang('hackathon-latvia.sections.12.content.1') @lang('hackathon-latvia.sections.12.content.2')</p>
            <br/><br/>
            <p>@lang('hackathon-latvia.sections.12.content.3')
                <b>@lang('hackathon-latvia.sections.12.content.4')</b> @lang('hackathon-latvia.sections.12.content.5')
                <b>@lang('hackathon-latvia.sections.12.content.6')</b>
                @lang('hackathon-latvia.sections.12.content.7')
                <b>@lang('hackathon-latvia.sections.12.content.8')</b>
            </p><br/><br/>
        </div>
        <img src="/images/hackathons/about_codeweek.svg" class="static-image">
        <a target="_blank" href="https://codeweek.eu/about"
           class="codeweek-action-link-button">@lang('hackathon-latvia.sections.12.content.9')</a>
    </section>

</section>

@endsection

