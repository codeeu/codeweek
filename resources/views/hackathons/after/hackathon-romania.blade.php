@extends('layout.base')

<x-tailwind></x-tailwind>

@section('hackathons.header')
@include('hackathons.after.header', ["enabled_language" => "ro","registration_link"=>"https://ec.europa.eu/eusurvey/runner/EUCWHackathonRomania"])
@endsection

@section('content')

<section id="codeweek-hackathons-before-page" class="codeweek-page romania">


    <section class="codeweek-banner hackathon h-auto">
        <div class="image">
            <div class="text">
                <div class="text-inside">
                    <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                    <h2>@lang('hackathon-romania.subtitle')</h2>
                </div>
            </div>
            <div class="paragraph">
                <p>@lang('hackathon-romania.sections.1.content.0')<br/>
            </div>
            <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
        </div>
    </section>

    <section class="codeweek-content-wrapper">

        <div>
            @lang('hackathon-romania.sections.1.content.1')
            @lang('hackathon-romania.sections.1.content.2')<br/><br/>
            @lang('hackathon-romania.sections.1.content.3')
        </div>

    </section>







    <section id="programme" style="line-height: 1.7em;" class="mt-10">


        <h1>@lang('hackathon-romania.sections.9.title')</h1>

        @lang('hackathon-romania.sections.9.content.0')<br/>
        @lang('hackathon-romania.sections.9.content.1')


        <br/><br/>
        <h1>@lang('hackathon-romania.sections.8.title')</h1>
        @lang('hackathon-romania.sections.8.content.0.0')
        <strong>@lang('hackathon-romania.sections.8.content.0.1')</strong>
        <ol style="list-style-type: decimal;margin-left:40px; margin-bottom:10px">
            <li>@lang('hackathon-romania.sections.8.content.1')</li>
            <li>@lang('hackathon-romania.sections.8.content.2')</li>
            <li>@lang('hackathon-romania.sections.8.content.3')</li>
        </ol>
        <div>
            @lang('hackathon-romania.sections.8.content.4')<br/><br/>

            @lang('hackathon-romania.sections.8.content.5')<br/><br/>
            @lang('hackathon-romania.sections.8.content.6')<br/><br/>
            @lang('hackathon-romania.sections.8.content.7')<br/><br/>
        </div>

        <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25 mt-6">

            @lang('hackathon-romania.sections.winners.0')<br/><br/>
            @lang('hackathon-romania.sections.winners.1')

            <ul style="list-style-type: circle;margin-left:40px; margin-bottom:10px; font-weight: bolder;">
                <li>Alpha-Canis-Majoris</li>
                <li>Big Brain</li>
                <li>Cybermoon</li>
                <li>KillingStalking</li>
                <li>Purple Brains</li>
            </ul>

            @lang('hackathon-romania.sections.winners.2')<br/><br/>
            @lang('hackathon-romania.sections.winners.3')<br/><br/>


        </div>
        <div class="mt-6">
            <h1>Focus</h1>
            <div>@lang('hackathon-romania.sections.focus.0')</div>

            <ul style="list-style-type: square; margin-left:40px; margin-bottom:10px">

                <li>
                    <a href="https://www.youtube.com/watch?v=Pdtk4LloA08&t=242s">@lang('hackathon-romania.sections.focus.1')</a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=AOnkIYGenE8">@lang('hackathon-romania.sections.focus.2')</a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=7oEbRYgRBn8&t=2267s">@lang('hackathon-romania.sections.focus.3')</a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=hjeKs1SKze8&t=91s">@lang('hackathon-romania.sections.focus.4')</a>
                </li>
            </ul>
        </div>

    </section>




    <section id="jury-mentors">

        <h1>@lang('hackathon-romania.sections.10.title')</h1>
        <p>
            @lang('hackathon-romania.sections.10.content.0')
        </p>
        <div class="jury-grid">
            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/romania/diana_ghitun.png')}}">
                </div>
                <h2 class="text-center">Diana Ghitun</h2>
                <div class="text-sm">@lang('hackathon-romania.sections.mentors.1.0')
                    <br/><br/>@lang("hackathon-romania.sections.mentors.1.1")
                </div>

            </div>
            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/romania/elena_simion.png')}}">
                </div>
                <h2 class="text-center">Elena Simion</h2>
                <div class="text-sm">@lang('hackathon-romania.sections.mentors.2.0')
                    <br/><br/>@lang("hackathon-romania.sections.mentors.2.1")
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/romania/george_dita.png')}}">
                </div>
                <h2 class="text-center">George Dita</h2>
                <div class="text-sm">@lang('hackathon-romania.sections.mentors.3.0')
                    <br/><br/>@lang("hackathon-romania.sections.mentors.3.1")
                </div>
            </div>


            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/romania/ioana_alexandru.png')}}">
                </div>
                <h2 class="text-center">Ioana Alexandru</h2>
                <div class="text-sm">@lang('hackathon-romania.sections.mentors.4.0')
                    <br/><br/>@lang("hackathon-romania.sections.mentors.4.1")
                </div>
            </div>


            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/romania/ioana_blaga.png')}}">
                </div>
                <h2 class="text-center">Ioana Blaga</h2>
                <div class="text-sm">@lang('hackathon-romania.sections.mentors.5.0')
                    <br/><br/>@lang("hackathon-romania.sections.mentors.5.1")
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/romania/irina_bejan.png')}}">
                </div>
                <h2 class="text-center">Irina Bejan</h2>
                <div class="text-sm">@lang('hackathon-romania.sections.mentors.6.0')
                    <br/><br/>@lang("hackathon-romania.sections.mentors.6.1")
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/romania/cristina_andreescu.png')}}">
                </div>
                <h2 class="text-center">Cristina Adreescu</h2>
                <div class="text-sm">@lang('hackathon-romania.sections.mentors.7.0')
                    <br/><br/>@lang("hackathon-romania.sections.mentors.7.1")
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/romania/laurentiu_gabriel_ghergu.png')}}">
                </div>
                <h2 class="text-center">Laurentiu Gabriel Ghergu</h2>
                <div class="text-sm">@lang('hackathon-romania.sections.mentors.8.0')
                    <br/><br/>@lang("hackathon-romania.sections.mentors.8.1")
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/romania/mihaela_roxana_ghidersa.png')}}">
                </div>
                <h2 class="text-center">Mihaela-Roxana Ghidersa</h2>
                <div class="text-sm">@lang('hackathon-romania.sections.mentors.9.0')
                    <br/><br/>@lang("hackathon-romania.sections.mentors.9.1")
                </div>
            </div>


        </div>
    </section>

    {{--                <section id="side-events">--}}
        {{--                    <div class="left">--}}
            {{--                        <h1>@lang('hackathon-romania.sections.11.title')</h1>--}}
            {{--                        <p>@lang('hackathon-romania.sections.11.content.0')</p>--}}
            {{--                        <a href="" class="codeweek-action-link-button">@lang('login.register')</a>--}}
            {{--                    </div>--}}
        {{--                    <img src="/images/hackathons/side_events.png">--}}
        {{--                </section>--}}




    <section id="partners">
        <div>
            <h1>@lang('hackathon-romania.misc.2')</h1>
        </div>

        <div class="partners-grid">
            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/apdetic.png')}}">
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/imagilabs.png')}}">
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/google.png')}}">
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
                    <img src="{{asset('/images/hackathons/partners/redhat.png')}}">
                </div>
            </div>


        </div>
    </section>

    <section id="about-codeweek">
        <div class="text">
            <h1>@lang('hackathon-romania.sections.12.title')</h1>
            <p>@lang('hackathon-romania.sections.12.content.0') @lang('hackathon-romania.sections.12.content.1') @lang('hackathon-romania.sections.12.content.2')</p>
            <br/><br/>
            <p>@lang('hackathon-romania.sections.12.content.3')
                <b>@lang('hackathon-romania.sections.12.content.4')</b> @lang('hackathon-romania.sections.12.content.5')
                <b>@lang('hackathon-romania.sections.12.content.6')</b>
                @lang('hackathon-romania.sections.12.content.7')
                <b>@lang('hackathon-romania.sections.12.content.8')</b>
            </p><br/><br/>
        </div>
        <img src="/images/hackathons/about_codeweek.svg" class="static-image">
        <a target="_blank" href="https://codeweek.eu/about"
           class="codeweek-action-link-button">@lang('hackathon-romania.sections.12.content.9')</a>
    </section>

</section>

@endsection

