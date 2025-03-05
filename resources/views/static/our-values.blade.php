@extends('layout.base')

@section('title', 'EU Code Week Values – Empowering Digital Skills for All')
@section('description', 'Discover the core values of EU Code Week: inclusion, innovation, collaboration, and digital empowerment for everyone.')

@section('content')

    <section id="codeweek-about-page" class="codeweek-page">

        <section class="codeweek-banner about">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('menu.values')</h1>
            </div>
            <div class="image">
                <img src="/images/banner_about.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <h1>@lang('values.title')</h1>

            <p style="margin-top:-30px;">
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

            <p style="margin-bottom: 20px;">
                <a href="https://www.youtube.com/watch?v=ENHjEgcrSZI&list=PLnqp3yQre_1hexUEMtOdNI9J5TtAVMGaq" target="_blank" rel="noreferer noopener" class="codeweek-action-link-button">@lang('snippets.videos.1')</a>

            </p>


            <div class="codeweek-about-blue-box" style="line-height: 22px;">

                <h2>1. @lang('values.1.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">

                    <div style="display: flex;flex-wrap: wrap;width: 100%;">

                        <div style="margin-top: 5px; margin-bottom: 20px; flex: 1; position: relative">
                            @lang('values.1.content')
                        </div>

                        <div style="position: relative; margin-right: 10px;" class="relative_box">
                            <a href="https://www.youtube.com/watch?v=ENHjEgcrSZI" class="youtube_link" target="_blank" rel="noreferer noopener">
                                <img src="{{asset('img/values/value-1.png')}}" class="static-image" width="160vh">
                                <h3><span>@lang('snippets.videos.2')</span></h3></a>
                        </div>


                    </div>


                </div>

                <h2>2. @lang('values.2.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">

                    <div style="display: flex;flex-wrap: wrap;width: 100%;">

                        <div style="position: relative; margin-right: 10px;" class="relative_box">
                            <a href="https://www.youtube.com/watch?v=cbg7LgbzlD8" class="youtube_link" target="_blank" rel="noreferer noopener">
                                <img src="{{asset('img/values/value-2.png')}}" class="static-image" width="160vh">
                                <h3><span>@lang('snippets.videos.3')</span></h3>
                            </a>

                        </div>

                        <div style="margin-top: 5px; margin-bottom: 20px; flex: 1; position: relative">
                            @lang('values.2.content')
                        </div>


                    </div>


                </div>

                <h2>3. @lang('values.3.title')</h2>

                <div style="display: flex;flex-wrap: wrap;width: 100%; margin-bottom:20px">

                    <div style="margin-top: 5px; margin-bottom: 20px; flex: 1; position: relative">
                        @lang('values.3.content.1') <a
                                href="{{route('resources_teach')}}">@lang('values.3.content.2')</a> @lang('values.3.content.3')
                        <a href="{{route('events_map')}}">@lang('values.3.content.4')</a> @lang('values.3.content.5')
                    </div>

                    <div style="position: relative; margin-left: 10px;">
                        <div style="position: relative; margin-right: 10px;" class="relative_box">
                            <a href="https://www.youtube.com/watch?v=LGLmjrx22ZE" class="youtube_link" target="_blank" rel="noreferer noopener">
                                <img src="{{asset('img/values/value-3.png')}}" class="static-image" width="160vh">
                                <h3><span>@lang('snippets.videos.4')</span></h3></a>
                        </div>
                    </div>

                </div>


                <h2>4. @lang('values.4.title')</h2>

                <div style="display: flex;flex-wrap: wrap;width: 100%; margin-bottom: 20px">

                    <div style="position: relative; margin-left: 10px;">
                        <div style="position: relative; margin-right: 10px;" class="relative_box">
                            <a href="https://www.youtube.com/watch?v=oU2kG_Z_EvI" class="youtube_link" target="_blank">
                                <img src="{{asset('img/values/value-4.png')}}" class="static-image" width="160vh">
                                <h3><span>@lang('snippets.videos.5')</span></h3></a>
                        </div>
                    </div>

                    <div style="margin-top: 5px; margin-bottom: 20px; flex: 1; position: relative">
                        @lang('values.4.content.1')<br/><br/>
                        <a href="{{route('codeweek4all')}}">@lang('values.4.content.2')</a> @lang('values.4.content.3')
                    </div>



                </div>

                <h2>5. @lang('values.5.title')</h2>


                <div style="display: flex;flex-wrap: wrap;width: 100%; margin-bottom: 10px;">

                    <div style="margin-top: 5px; margin-bottom: 20px; flex: 1; position: relative">
                        @lang('values.5.content.1') <a
                                href="{{route('resources_learn')}}">@lang('values.5.content.2')</a> @lang('values.5.content.3')
                    </div>

                    <div style="position: relative; margin-left: 10px;">
                        <div style="position: relative; margin-right: 10px;" class="relative_box">
                            <a href="https://www.youtube.com/watch?v=4QeLQWUtttc" class="youtube_link" target="_blank">
                                <img src="{{asset('img/values/value-5.png')}}" class="static-image" width="160vh">
                                <h3><span>@lang('snippets.videos.6')</span></h3></a>
                        </div>
                    </div>

                </div>



                <h2>6. @lang('values.6.title')</h2>

                <div style="margin-top: 5px; margin-bottom: 20px">

                    <div style="display: flex;flex-wrap: wrap;width: 100%;">

                        <div style="position: relative; margin-left: 10px;">
                            <div style="position: relative; margin-right: 10px;" class="relative_box">
                                <a href="https://www.youtube.com/watch?v=iq-rnRcb0Mg" class="youtube_link" target="_blank">
                                    <img src="{{asset('img/values/value-6.png')}}" class="static-image" width="160vh">
                                    <h3><span>@lang('snippets.videos.7')</span></h3></a>
                            </div>
                        </div>

                        <div style="margin-top: 5px; margin-bottom: 20px; flex: 1; position: relative">
                            @lang('values.6.content')
                        </div>


                    </div>


                </div>

                <h2>7. @lang('values.7.title')</h2>

                <div style="display: flex;flex-wrap: wrap;width: 100%;">

                    <div style="margin-top: 5px; margin-bottom: 20px; flex: 1; position: relative">
                        @lang('values.7.content')
                    </div>

                    <div style="position: relative; margin-left: 10px;">
                        <div style="position: relative; margin-right: 10px;" class="relative_box">
                            <a href="https://www.youtube.com/watch?v=6jTgOeKuY_o" class="youtube_link" target="_blank">
                                <img src="{{asset('img/values/value-7.png')}}" class="static-image" width="160vh">
                                <h3><span>@lang('snippets.videos.8')</span></h3></a>
                        </div>
                    </div>

                </div>



            </div>


        </section>


    </section>

@endsection

@section("extra-css")
    <style>

        .relative_box {
            position: relative;
            width: 200px;
            float: left;
        }

        .relative_box .static-image {
            width: 100%;
        }

        .relative_box h3 {
            position: absolute;
            bottom: 0;
            left: 0;
            background: rgba(204, 204, 204, 0.8);
            color: #000;
            opacity: 100%;
            /*width:100%;*/
            margin: 0;
            font-family: "PT Sans, Roboto", sans-serif;
            font-weight: lighter;
            font-size: 12px;
            text-align: center;
        }

        .youtube_link {
            color: inherit;
        }



    </style>
@endsection
