@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.8.title')</h1>
                <span>@lang('training.lessons.8.author')</span>

                @lang('training.lessons.8.text')

            </section>

            @include('static.youtube', ['video_id' => 'juc9fhtlAGU'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/02_EUCodeWeek_Learning+Bit+8_+Coding+for+all+subjects-video+script.docx">@lang('training.download_video_script')</a>
                </p>

                <h2>@lang('training.ready_to_share')</h2>

                <p>
                    @lang('training.choose_lessons')
                </p>

                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/08_EUCodeWeek_Learning+Bit+8_+Coding+for+STEM_Lesson+plan+1_Tinkering+and+coding+with+Makey+Makey+2_Isa.docx">@lang('training.lessons.8.activities.1')</a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/08_EUCodeWeek_Learning+Bit+8_+Coding+for+Music_Lesson+plan_Music+is+coding+for+lower+secondary.docx">@lang('training.lessons.8.activities.2')</a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/08_EUCodeWeek_Learning+Bit+8_+Coding+for+Inclusion_Lesson+plan+1_Robotics+and+inclusion+for+primary+in+STEM.docx">@lang('training.lessons.8.activities.3')</a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/08_EUCodeWeek_Learning+Bit+8_+Coding+for+Foreign+Languages_A+daily+life+algorithm+in+a+CLIL+lesson_Lesson+plan+1_Primary.doc">@lang('training.lessons.8.activities.4')</a>
                    </li>

                </ul>

                <h2>@lang('training.footer.title')</h2>
                @lang('training.footer.text')

            </section>

        </section>

    </section>

@endsection