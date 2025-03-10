@extends('layout.base')

@section('title', 'EU Code Week: Code Your Own Dance Moves')
@section('description', 'Learn coding through music and movement! Join the EU Code Week Dance Challenge and code your own dance.')

@section('content')

    <section id="codeweek-about-page" class="codeweek-page">

        <section class="codeweek-banner scoreboard">
            <div class="text">
                <h2>@lang('cw2020.title.0')</h2>
                <h1>@lang('cw2020.dance.title')</h1>
            </div>
            <div class="image">
                <img src="images/banner_scoreboard.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">



            <a name="dance-challenge"></a>
            <div class="codeweek-about-blue-box" style="line-height: 22px;">

                <h2> @lang('cw2020.dance.title')</h2>
                <div>
                    @lang('snippets.dance.subtitle').
                </div>

                <h3>
                    @lang('cw2020.dance.section1.title')
                </h3>
                <div>
                    @lang('snippets.dance.content').<br/>
                </div>

                <h3>
                    @lang('cw2020.dance.section2.title')
                </h3>
                <div>
                    @lang('cw2020.dance.section2.content').
                </div>

                <h4>1. @lang('cw2020.dance.activity1.title')</h4>

                <div>
                    @lang('cw2020.dance.activity1.subtitle').
                    <br/>

                    <h4> @lang('cw2020.common.resources'):</h4>
                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                        @include("static._cw2020-common")
                        <li>
                            <a href="https://curriculum.code.org/hoc/unplugged/4/#dance-party-unplugged4">@lang('cw2020.dance.activity1.resources.0')</a>
                        </li>
                        <li><a href="{{route("training.module-1")}}">@lang('cw2020.dance.activity1.resources.1')</a>
                        </li>

                    </ul>

                    <h4>2. @lang('cw2020.dance.activity2.title') </h4>

                    <div>
                        @lang('cw2020.dance.activity2.subtitle') <a href="https://scratch.mit.edu/studios/27581197/">@lang('cw2020.dance.activity2.resources.4')</a>
                    </div>
                    <h4> @lang('cw2020.common.resources'):</h4>
                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                        @include("static._cw2020-common")
                        <li><a href="https://scratch.mit.edu/projects/428131435">@lang('cw2020.dance.activity2.resources.0')</a></li>
                        <li><a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/cw2020/finaldancecharacters.rar">@lang('cw2020.dance.activity2.resources.1')</a></li>
                        <li><a href="https://sip.scratch.mit.edu/guides/animation/">@lang('cw2020.dance.activity2.resources.2')</a></li>
                        <li>
                            <a href="https://curriculum.code.org/hoc/plugged/8/">@lang('cw2020.dance.activity2.resources.3')</a>
                        </li>
                    </ul>

                    <h4>3. @lang('cw2020.dance.activity3.title') </h4>

                    <div>
                        @lang('cw2020.dance.activity3.subtitle').
                    </div>
                    <h4> @lang('cw2020.common.resources'):</h4>
                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                        @include("static._cw2020-common")
                        <li><a href="https://www.youtube.com/watch?v=5ThWr3stq9M&feature=youtu.be">@lang('cw2020.dance.activity3.resources.0')</a></li>
                        <li><a href="https://sonic-pi.net/tutorial.html">@lang('cw2020.dance.activity3.resources.1')</a></li>
                    </ul>



                    <h4>4. @lang('cw2020.dance.activity4.title') </h4>

                    <div>
                        @lang('cw2020.dance.activity4.subtitle').
                    </div>
                    <h4> @lang('cw2020.common.resources'):</h4>
                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">
                        @include("static._cw2020-common")
{{--                        <li>@lang('cw2020.dance.activity4.resources.0')</li>--}}
                    </ul>

{{--                    <h4>5. @lang('cw2020.dance.activity5.title') </h4>--}}

{{--                    <div>--}}
{{--                        @lang('cw2020.dance.activity5.subtitle')--}}
{{--                    </div>--}}

{{--                    <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">--}}
{{--                        <li>@lang('cw2020.dance.activity5.resources.0')</li>--}}
{{--                        <li>@lang('cw2020.dance.activity5.resources.1') <a--}}
{{--                                    href="https://www.instagram.com/codeweekeu/">@lang('cw2020.dance.activity5.resources.2')</a>--}}
{{--                        </li>--}}
{{--                        <li>@lang('cw2020.dance.activity5.resources.3')--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                    <div>
{{--                        @lang('cw2020.dance.outro.0').--}}
{{--                        <h4> @lang('cw2020.common.resources'):</h4>--}}
{{--                        <ul style="list-style-type: circle;margin-left:40px; margin-top:-4px;">--}}
{{--                            @include("static._cw2020-common")--}}
{{--                        </ul>--}}
                        <div style="margin-top: 30px">

                        @lang('cw2020.dance.outro.1') <a
                                href="https://digit.srl/ode-to-code/">@lang('cw2020.dance.outro.2')</a>,
                        @lang('cw2020.dance.outro.3').</div>
                    </div>



                </div>

            </div>


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
