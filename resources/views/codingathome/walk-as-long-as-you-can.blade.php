@extends('layout.base')

@section('title', 'Walk as Long as You Can – A Fun Coding at Home Challenge')
@section('description', 'Develop problem-solving skills with this engaging coding activity that encourages strategic movement and logical thinking.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>6. @lang('coding-at-home.walk-as-long-as-you-can.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.walk-as-long-as-you-can.text')<br/><br/>

                    @lang('coding-at-home.material.required'): <a
                            href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">@lang('coding-at-home.material.chequered')</a>,
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/coding@home/CodyColor-sheet.pdf">@lang('coding-at-home.walk-as-long-as-you-can.coloured-cards')</a>


                </div>


            </section>

            @include('static.youtube', ['video_id' => 'sH0sY7PlKfU'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.walk-as-long-as-you-can.questions.content.1')<br/><br/>
                    @lang('coding-at-home.walk-as-long-as-you-can.questions.content.2')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection