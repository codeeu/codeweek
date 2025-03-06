@extends('layout.base')

@section('title', 'The Snake – A Coding at Home Activity')
@section('description', 'Develop computational thinking by coding a snake that moves through a digital space. The snake is a type of solitaire played with CodyRoby cards. ')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>11. @lang('coding-at-home.the-snake.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.the-snake.text')<br/><br/>

                    @lang('coding-at-home.material.required'):
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">@lang('coding-at-home.material2.chequered-with-labels')</a>; @lang('coding-at-home.material2.cards'); @lang('coding-at-home.material2.larger-cards').
                    @lang('coding-at-home.material2.pieces-of-paper').
                    <a href="http://codemooc.org/wp-content/uploads/2020/02/cards-sheet.pdf">@lang('coding-at-home.material2.card-alternative')</a>

                </div>


            </section>

            @include('static.youtube', ['video_id' => 'KojwZhYo48Q'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.the-snake.questions.content.1')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection