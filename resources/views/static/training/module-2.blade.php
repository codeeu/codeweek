@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.2.title')</h1>
                <span>@lang('training.lessons.2.author')</span>

                @lang('training.lessons.2.text')

            </section>

            @include('static.youtube', ['video_id' => 'Nc-V948dXWI'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    @if(App::getLocale() == 'en' || App::getLocale() == 'al' ||
                        App::getLocale() == 'ba' || App::getLocale() == 'it' ||
                        App::getLocale() == 'mt' || App::getLocale() == 'pl')
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_+Learning+Bit+2_Computational_Thinking+_Video+script.docx">@lang('training.download_video_script')</a>
                    @else
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CNECT-2018-00222-00-16-{{strtoupper(App::getLocale())}}-TRA-00.DOCX">
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
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+1_Primary.docx">@lang('training.lessons.2.activities.1')</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+2_Secondary.docx">@lang('training.lessons.2.activities.2')</a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_+Learning+Bit+2_Computational_Thinking_+Lesson+plan+3_Upper+Secondary.docx">@lang('training.lessons.2.activities.3')</a>
                        </li>
                    @else
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CNECT-2018-00222-00-04-{{strtoupper(App::getLocale())}}-TRA-00.DOCX">
                                @lang('training.lessons.2.activities.1')
                            </a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CNECT-2018-00222-00-05-{{strtoupper(App::getLocale())}}-TRA-00.DOCX">
                                @lang('training.lessons.2.activities.2')
                            </a>
                        </li>
                        <li>
                            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CNECT-2018-00222-00-06-{{strtoupper(App::getLocale())}}-TRA-00.DOCX">
                                @lang('training.lessons.2.activities.3')
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