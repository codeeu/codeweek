@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.6.title')</h1>
                <span>@lang('training.lessons.6.author')</span>

                @lang('training.lessons.6.text')

            </section>

            @include('static.youtube', ['video_id' => 'L9xJMhKAJok'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/04_EUCodeWeek_Learning+Bit+6_Developing+creative+thinking+through+mobile+app+development_videoscript.docx">@lang('training.download_video_script')</a>
                </p>

                <h2>@lang('training.ready_to_share')</h2>

                <p>
                    @lang('training.choose_lessons')
                </p>

                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/01_EUCodeWeek_Learning+Bit+6_+Developing+creative+thinking+through+mobile+app+development_+Lesson+plan1_primary.docx">@lang('training.lessons.6.activities.1')</a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+6_+Developing+creative+thinking+through+mobile+app+development_+Lesson+plan2_Lower+secondary.docx">@lang('training.lessons.6.activities.2')</a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/03_EUCodeWeek_Learning+Bit+6_+Developing+creative+thinking+through+mobile+app+developmentr_+Lesson+plan3_Upper+secondary.docx">@lang('training.lessons.6.activities.3')</a>
                    </li>
                </ul>

                <h2>@lang('training.footer.title')</h2>
                @lang('training.footer.text')

            </section>

        </section>

    </section>

@endsection