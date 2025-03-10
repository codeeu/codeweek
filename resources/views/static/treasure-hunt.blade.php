@extends('layout.base')

@section('title', 'EU Code Week Treasure Hunt – Fun & Interactive Coding Game')
@section('description', 'Take part in the EU Code Week Treasure Hunt, a digital adventure designed to teach coding in an exciting and interactive way.')

@section('content')

    <section id="codeweek-about-page" class="codeweek-page">

        <section class="codeweek-banner scoreboard">
            <div class="text">
                <h2>@lang('cw2020.title.0')</h2>
                <h1>@lang('cw2020.treasure-hunt.title')</h1>
            </div>
            <div class="image">
                <img src="images/banner_scoreboard.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <div class="codeweek-about-blue-box" style="line-height: 22px;">
                <a name="treasure-hunt"></a>
                <h2>@lang('cw2020.treasure-hunt.title')</h2>
                <p>
                    @lang('cw2020.treasure-hunt.subtitle.0').
                    <br/>
                    <br/>
                    <a href="{{route('code-hunting-game')}}">@lang('cw2020.treasure-hunt.subtitle.1')</a> @lang('cw2020.treasure-hunt.subtitle.2').
                </p>

                <h4>@lang('cw2020.treasure-hunt.section.title')</h4>
                <ol style="margin-left:10px; margin-top:0px;">
                    <li>@lang('cw2020.treasure-hunt.section.content.0') <a href="https://desktop.telegram.org/">@lang('cw2020.treasure-hunt.section.content.1')</a> (Windows, macOS @lang('cw2020.kick-off.content.6') Linux), <a href="https://apps.apple.com/app/telegram-messenger/id686449807">iOS</a> @lang('cw2020.kick-off.content.6') <a href="https://play.google.com/store/apps/details?id=org.telegram.messenger">Android</a>
                    </li>
                    <li>@lang('cw2020.treasure-hunt.section.content.2').
                    </li>
                    <li>@lang('cw2020.treasure-hunt.section.content.3'), <a
                                href="{{route('code-hunting-game')}}">@lang('cw2020.treasure-hunt.section.content.4')</a> @lang('cw2020.treasure-hunt.section.content.5').
                    </li>
                    <li>@lang('cw2020.treasure-hunt.section.content.6').
                    </li>
                    <li>@lang('cw2020.treasure-hunt.section.content.7')!
                    </li>
                </ol>

                <div>
                    @lang('cw2020.treasure-hunt.section.content.8') <a
                            href="https://blog.codeweek.eu">@lang('cw2020.treasure-hunt.section.content.9')</a>.
                </div>

            </div>

{{--            <div class="codeweek-about-white-box" style="line-height: 22px;">--}}

{{--                <h2>@lang('cw2020.kick-off.title')</h2>--}}
{{--                <div style="margin-top:10px">--}}
{{--                    @lang('cw2020.kick-off.content.0').<br/><br/>--}}

{{--                    @lang('cw2020.kick-off.content.1') <a href="https://ec.europa.eu/commission/commissioners/2019-2024/breton_en">Thierry--}}
{{--                        Breton</a>, @lang('cw2020.kick-off.content.2'); <a--}}
{{--                            href="https://ec.europa.eu/commission/commissioners/2019-2024/gabriel_en">Mariya Gabriеl</a>,--}}
{{--                    @lang('cw2020.kick-off.content.3'); <a--}}
{{--                            href="https://www.media.mit.edu/people/mres/overview/">Mitch Resnick</a>, @lang('cw2020.kick-off.content.4'); <a href="http://lindaliukas.com/">Linda--}}
{{--                        Liukas</a>, @lang('cw2020.kick-off.content.5'); @lang('cw2020.kick-off.content.6') <a href="https://www.wef.org.in/dipty-chander/">Dipty Chander</a>,--}}
{{--                    @lang('cw2020.kick-off.content.7').<br/><br/>--}}

{{--                    @lang('cw2020.kick-off.content.8'). <a--}}
{{--                            href="https://www.linkedin.com/in/alessandro-bogliolo-a8395b29">Alessandro Bogliolo</a>,--}}
{{--                    @lang('cw2020.kick-off.content.9')--}}
{{--                    <a href="{{route("ambassadors")}}">@lang('cw2020.kick-off.content.10')</a> @lang('cw2020.kick-off.content.11').--}}
{{--                    @lang('cw2020.kick-off.content.12').--}}
{{--                    <br/><br/>--}}


{{--                    @lang('cw2020.kick-off.content.13').<br/><br/>--}}

{{--                    @lang('cw2020.kick-off.content.14') <a href="https://www.facebook.com/codeEU/">Facebook</a> @lang('cw2020.kick-off.content.15') <a--}}
{{--                            href="https://www.youtube.com/channel/UCw30ZaWtCvGb4yudW6tCXAA">YouTube</a> @lang('cw2020.kick-off.content.16').--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="codeweek-about-white-box" style="line-height: 22px;">
                <h2>@lang('cw2020.get-involved.title')</h2>
                <div>
                    @lang('cw2020.get-involved.subtitle').
                </div>

                <ul style="list-style-type: circle;margin-left:40px; margin-top:20px;">
                    <li><a href="https://blog.codeweek.eu/getting-started-with-eu-code-week/">@lang('cw2020.get-involved.content.0')</a></li>
                    <li><a href="{{route("guide")}}">@lang('cw2020.get-involved.content.1')</a></li>
                    <li><a href="{{route("training.index")}}">@lang('cw2020.get-involved.content.2')</a></li>
                    <li><a href="https://bit.ly/DEEPDIVE2020">@lang('cw2020.get-involved.content.3')</a></li>
                    <li><a href="{{route("coding@home")}}">@lang('cw2020.get-involved.content.4')</a></li>
                </ul>
            </div>
        </section>


    </section>

@endsection
