@extends('layout.base')

@section('title', 'Creative Coding with Python – Learn Programming Creatively')
@section('description', 'Explore Python’s potential for creative projects, from digital art to interactive applications.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('static.training.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('training.lessons.10.title')</h1>
                <span>@lang('training.lessons.10.author')</span>

                @lang('training.lessons.10.text')

            </section>

            @include('static.youtube', ['video_id' => 'nr6GpD6EbVo'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-010-VIDEO-SCRIPT-{{strtoupper(App::getLocale())}}.DOCX">
                        @lang('training.download_video_script')
                    </a>
                </p>

                <h2>@lang('training.ready_to_share')</h2>

                <p>
                    @lang('training.choose_lessons')
                </p>

                <ul>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-010-ACTIVITY-01-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.10.activities.1')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-010-ACTIVITY-02-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.10.activities.2')
                        </a>
                    </li>
                    <li>
                        <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/training/{{strtoupper(App::getLocale())}}/CODEWEEK-TRAINING-010-ACTIVITY-03-{{strtoupper(App::getLocale())}}.DOCX">
                            @lang('training.lessons.10.activities.3')
                        </a>
                    </li>
                </ul>

                <h2>
                    @lang('training.lessons.10.links.title')
                </h2>
                <ul>
                    @for ($i = 1; $i <= 6; $i++)
                    <li>
                        <a target="_blank" href='@lang("training.lessons.10.links.{$i}.url")'>@lang("training.lessons.10.links.{$i}.title")</a><br/>
                        @lang("training.lessons.10.links.{$i}.description").
                    </li>
                    @endfor


                </ul>

                <h2>@lang('training.footer.title')</h2>
                @lang('training.footer.text')

            </section>
            @include('include.licence')
        </section>

    </section>

@endsection