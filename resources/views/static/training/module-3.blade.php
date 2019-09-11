@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.3.title')</h1>
                <span>@lang('training.lessons.3.author')</span>

                @lang('training.lessons.3.text')

            </section>

            @include('static.youtube', ['video_id' => 'pmfCwauN1c0'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    @if(App::getLocale() == 'en' || App::getLocale() == 'al' ||
                        App::getLocale() == 'ba' || App::getLocale() == 'it' ||
                        App::getLocale() == 'mt' || App::getLocale() == 'pl')
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Video+script.docx">@lang('training.download_video_script')</a>
                    @else
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CNECT-2018-00222-00-18-{{strtoupper(App::getLocale())}}-TRA-00.DOCX">
                            @lang('training.download_video_script')
                        </a>
                    @endif
                </p>

                <h2>@lang('training.ready_to_share')</h2>

                <p>
                    @lang('training.choose_lessons')
                </p>

                <ul>
                    @if(App::getLocale() == 'en' || App::getLocale() == 'al' || App::getLocale() == 'ba')
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+1_Primary.docx">@lang('training.lessons.3.activities.1')</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+2_Secondary.docx">@lang('training.lessons.3.activities.2')</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+3_Intro+Scratch_Lesson+plan+3_Upper+Secondary.docx">@lang('training.lessons.3.activities.3')</a>
                        </li>
                    @else
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CNECT-2018-00222-00-07-{{strtoupper(App::getLocale())}}-TRA-00.DOCX">
                                @lang('training.lessons.3.activities.1')
                            </a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CNECT-2018-00222-00-08-{{strtoupper(App::getLocale())}}-TRA-00.DOCX">
                                @lang('training.lessons.3.activities.2')
                            </a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CNECT-2018-00222-00-09-{{strtoupper(App::getLocale())}}-TRA-00.DOCX">
                                @lang('training.lessons.3.activities.3')
                            </a>
                        </li>
                    @endif
                </ul>

                <h2>@lang('training.footer.title')</h2>
                @lang('training.footer.text')

            </section>

        </section>

    </section>

@endsection