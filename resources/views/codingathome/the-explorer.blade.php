@extends('layout.base')

@section('title', 'The Explorer – Coding at Home Adventure')
@section('description', 'The explorer is the first Coding@Home activity. Move the explorer around the board to reach the target after visiting as many squares as possible.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>1. @lang('coding-at-home.explorer.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.explorer.text')<br/><br/>


                    @lang('coding-at-home.material.required'): <a
                            href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">@lang('coding-at-home.material.chequered')</a>,
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/CodyFeet-sheet.pdf">@lang('coding-at-home.material.footprint')</a>
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/coding%40home/explorer-materials.zip"><img
                                src="/img/download.png" width="20px" style="margin-left:8px;position:absolute"></a>

                </div>


            </section>

            @include('static.youtube', ['video_id' => 'AJFjKHmhYkk'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.explorer.questions.content.1')<br/><br/>
                    @lang('coding-at-home.explorer.questions.content.2')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>
            @include("include.licence")
        </section>

    </section>

@endsection