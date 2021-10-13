@extends('layout.base')

<x-tailwind></x-tailwind>

@section('hackathons.header')
@include('hackathons.after.header', ["enabled_language" => "it"])
@endsection

@section('content')

<section id="codeweek-hackathons-before-page" class="codeweek-page italy">


    <section class="codeweek-banner hackathon h-auto">
        <div class="image">
            <div class="text">
                <div class="text-inside">
                    <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                    <h2>@lang('hackathon-italy.subtitle')</h2>
                </div>
            </div>
            <div class="paragraph">
                <p>@lang('hackathon-italy.sections.1.content.0')<br/>
            </div>
            <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
        </div>
    </section>

    <section class="codeweek-content-wrapper">

        <div>
            @lang('hackathon-italy.sections.1.content.1')
            @lang('hackathon-italy.sections.1.content.2')<br/><br/>
            @lang('hackathon-italy.sections.1.content.3')
        </div>

    </section>







    <section id="programme" style="line-height: 1.7em;" class="mt-10">


        <h1>@lang('hackathon-italy.sections.9.title')</h1>

        @lang('hackathon-italy.sections.9.content.0')<br/>
        @lang('hackathon-italy.sections.9.content.1')


        <br/><br/>
        <h1>@lang('hackathon-italy.sections.8.title')</h1>
        @lang('hackathon-italy.sections.8.content.0.0')
        <strong>@lang('hackathon-italy.sections.8.content.0.1')</strong>
        <ol style="list-style-type: decimal;margin-left:40px; margin-bottom:10px">
            <li>@lang('hackathon-italy.sections.8.content.1')</li>
            <li>@lang('hackathon-italy.sections.8.content.2')</li>
            <li>@lang('hackathon-italy.sections.8.content.3')</li>
        </ol>
        <div>
            @lang('hackathon-italy.sections.8.content.4')<br/><br/>

            @lang('hackathon-italy.sections.8.content.5')<br/><br/>
            @lang('hackathon-italy.sections.8.content.6')<br/><br/>
            @lang('hackathon-italy.sections.8.content.7')<br/><br/>

        </div>

        <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25 mt-6">

            @lang('hackathon-italy.sections.winners.0')<br/><br/>
            @lang('hackathon-italy.sections.winners.1')

            <ul style="list-style-type: circle;margin-left:40px; margin-bottom:10px; font-weight: bolder;">
                <li>2asaVallone</li>
                <li>Blastar</li>
                <li>CreativeMinds</li>
                <li>Einaudi's Cool restaurant</li>
                <li> TecFanti
                <li>GSV</li>
                <li>ativiI Cre
                <li> LauranaLiceo
                <li>Multiskills</li>
                <li>Phreeko</li>
                <li>Poggers</li>
                <li>Tehcs</li>
            </ul>

            @lang('hackathon-italy.sections.winners.2')<br/><br/>
            @lang('hackathon-italy.sections.winners.3')<br/><br/>


        </div>
        <div class="mt-6">
            <h1>Focus</h1>
            <div>@lang('hackathon-italy.sections.focus.0')</div>

            <ul style="list-style-type: square; margin-left:40px; margin-bottom:10px">

                <li>
                    <a href="https://www.youtube.com/watch?v=t3N5qeldzN4&t=15s&ab_channel=EuropeCodeWeek">@lang('hackathon-italy.sections.focus.1')</a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=qnqOFuIyqsI&ab_channel=EuropeCodeWeek">@lang('hackathon-italy.sections.focus.2')</a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=HDQO7hb2LcM&t=2s&ab_channel=EuropeCodeWeek">@lang('hackathon-italy.sections.focus.3')</a>
                </li>
                <li>
                    <a href="https://www.youtube.com/watch?v=SnliDfeiO-Y&t=8s&ab_channel=EuropeCodeWeek">@lang('hackathon-italy.sections.focus.4')</a>
                </li>
            </ul>
        </div>

    </section>




    <section id="jury-mentors">

        <h1>@lang('hackathon-italy.sections.10.title')</h1>
        <p>
            @lang('hackathon-italy.sections.10.content.0')
        </p>
        <div class="jury-grid">
            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/italy/piersoft.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-italy.sections.mentors.1.0')</h2>
                <div class="text-sm">@lang('hackathon-italy.sections.mentors.1.1')<br/>
                    @lang('hackathon-italy.sections.mentors.1.2')<br/>
                    @lang('hackathon-italy.sections.mentors.1.3')<br/>
                    @lang('hackathon-italy.sections.mentors.1.4')
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/italy/gianluca-orpello.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-italy.sections.mentors.2.0')</h2>
                <div class="text-sm">@lang('hackathon-italy.sections.mentors.2.1')<br/>
                    @lang('hackathon-italy.sections.mentors.2.2')
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/italy/luca-versari.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-italy.sections.mentors.3.0')</h2>
                <div class="text-sm">@lang('hackathon-italy.sections.mentors.3.1')<br/>
                    @lang('hackathon-italy.sections.mentors.3.2')
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/italy/alessandra-valenti.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-italy.sections.mentors.4.0')</h2>
                <div class="text-sm">@lang('hackathon-italy.sections.mentors.4.1')<br/>
                    @lang('hackathon-italy.sections.mentors.4.2')
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/italy/maura_sandri.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-italy.sections.mentors.5.0')</h2>
                <div class="text-sm">@lang('hackathon-italy.sections.mentors.5.1')<br/>
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/italy/paolo-ganci.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-italy.sections.mentors.6.0')</h2>
                <div class="text-sm">@lang('hackathon-italy.sections.mentors.6.1')<br/>
                </div>
            </div>

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/profiles/italy/christel-sirocchi.png')}}">
                </div>
                <h2 class="text-center">@lang('hackathon-italy.sections.mentors.7.0')</h2>
                <div class="text-sm">@lang('hackathon-italy.sections.mentors.7.1')<br/>
                </div>
            </div>


        </div>
    </section>

    <section id="side-events">
        <h1>@lang('hackathon-italy.sections.11.title')</h1>
        <p>@lang('hackathon-italy.sections.11.content.0')</p>

        <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25">
            <h2>@lang('hackathon-italy.sections.11.events.minecraft.title')</h2>

            <div class="mb-4">@lang('hackathon-italy.sections.11.events.minecraft.abstract')</div>
            <div class="mb-4 font-bold">@lang('hackathon-italy.sections.11.events.minecraft.content.0')</div>
            <ul style="list-style-type: circle;margin-left:40px; margin-top:0px;">
                <li>@lang('hackathon-italy.sections.11.events.minecraft.content.1')</li>
                <li>@lang('hackathon-italy.sections.11.events.minecraft.content.2')</li>
                <li>@lang('hackathon-italy.sections.11.events.minecraft.content.3')</li>
                <li>@lang('hackathon-italy.sections.11.events.minecraft.content.4')</li>
                <li>@lang('hackathon-italy.sections.11.events.minecraft.content.5')</li>
                <li>@lang('hackathon-italy.sections.11.events.minecraft.content.6')</li>
                <li>@lang('hackathon-italy.sections.11.events.minecraft.content.7')</li>
                <li>@lang('hackathon-italy.sections.11.events.minecraft.content.8')</li>
                <li>@lang('hackathon-italy.sections.11.events.minecraft.content.9')</li>
            </ul>

            <div class="text-lg text-orange-300">Date: @lang('hackathon-italy.sections.11.events.minecraft.date')</div>


            <div class="mt-6">
                @lang('hackathon-italy.sections.11.events.minecraft.participate') <a href="https://bit.ly/PartecipaOraMEE">https://bit.ly/PartecipaOraMEE</a>
            </div>



        </div>

{{--        <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25">--}}
{{--            <h2>@lang('hackathon-italy.sections.11.events.makex.title.0')</h2>--}}

{{--            <div class="mb-4">@lang('hackathon-italy.sections.11.events.makex.content.0')</div>--}}
{{--            <div class="mb-4">@lang('hackathon-italy.sections.11.events.makex.content.1')</div>--}}

{{--            <div class="text-lg text-orange-300">@lang('hackathon-italy.sections.11.events.makex.title.1')</div>--}}
{{--            @lang('hackathon-italy.sections.11.events.makex.dates.0') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-italy.sections.11.events.makex.content.2')</a> @lang('hackathon-italy.sections.11.events.makex.content.3')<br/>--}}

{{--            <div class="text-lg text-orange-300 mt-6">@lang('hackathon-italy.sections.11.events.makex.title.2')</div>--}}
{{--            @lang('hackathon-italy.sections.11.events.makex.dates.1') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-italy.sections.11.events.makex.content.2')</a> @lang('hackathon-italy.sections.11.events.makex.content.3')<br/>--}}

{{--            <div class="text-lg text-orange-300 mt-6">@lang('hackathon-italy.sections.11.events.makex.title.3')</div>--}}
{{--            @lang('hackathon-italy.sections.11.events.makex.dates.2') <a href="https://forms.gle/h4VRLUc9uSpLYCVHA">@lang('hackathon-italy.sections.11.events.makex.content.2')</a> @lang('hackathon-italy.sections.11.events.makex.content.3')<br/>--}}

{{--            <div class="mt-6">--}}
{{--                @lang('hackathon-italy.sections.11.events.makex.content.4') <a href="@lang('hackathon-italy.sections.11.events.makex.content.5')">@lang('hackathon-italy.sections.11.events.makex.content.5')</a>--}}
{{--            </div>--}}



{{--        </div>--}}




    </section>



    <section id="partners">
        <div>
            <h1>@lang('hackathon-italy.misc.2')</h1>
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
                    <img src="{{asset('/images/hackathons/partners/makeblock-makex.png')}}">
                </div>
            </div>

            {{--                <div class="item">--}}
            {{--                    <div class="flex justify-center">--}}
            {{--                        <img src="{{asset('/images/hackathons/partners/redhat.png')}}">--}}
            {{--                    </div>--}}
            {{--                </div>--}}


        </div>

        <div class="partners-grid">

            <div class="item">
                <div class="flex justify-center">
                    <img src="{{asset('/images/hackathons/partners/microsoft.png')}}">
                </div>
            </div>

        </div>
    </section>

    <section id="about-codeweek">
        <div class="text">
            <h1>@lang('hackathon-italy.sections.12.title')</h1>
            <p>@lang('hackathon-italy.sections.12.content.0') @lang('hackathon-italy.sections.12.content.1') @lang('hackathon-italy.sections.12.content.2')</p>
            <br/><br/>
            <p>@lang('hackathon-italy.sections.12.content.3')
                <b>@lang('hackathon-italy.sections.12.content.4')</b> @lang('hackathon-italy.sections.12.content.5')
                <b>@lang('hackathon-italy.sections.12.content.6')</b>
                @lang('hackathon-italy.sections.12.content.7')
                <b>@lang('hackathon-italy.sections.12.content.8')</b>
            </p><br/><br/>
        </div>
        <img src="/images/hackathons/about_codeweek.svg" class="static-image">
        <a target="_blank" href="https://codeweek.eu/about"
           class="codeweek-action-link-button">@lang('hackathon-italy.sections.12.content.9')</a>
    </section>

</section>

@endsection

