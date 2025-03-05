@extends('layout.base')

@section('title', 'Catch the Robot – A Coding at Home Game')
@section('description', 'Test your coding skills by programming a robot-catching game with logical commands.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>10. @lang('coding-at-home.catch-the-robot.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.catch-the-robot.text')<br/><br/>

                    @lang('coding-at-home.material.required'):
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">@lang('coding-at-home.material2.chequered-with-labels')</a>; @lang('coding-at-home.material2.cards'); @lang('coding-at-home.material2.larger-cards'). @lang('coding-at-home.material2.video')

                </div>


            </section>

            @include('static.youtube', ['video_id' => 'vntLdzqw9QQ'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.catch-the-robot.questions.content.1')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection