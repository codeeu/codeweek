@extends('layout.base')

@section('title', 'Two Snakes – Interactive Coding at Home Challenge')
@section('description', 'Program two snakes to move and interact in this engaging coding activity. The snake is a type of solitaire played with CodyRoby cards. ')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>13. @lang('coding-at-home.two-snakes.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.two-snakes.text')<br/><br/>

                    @lang('coding-at-home.material.required'): @lang('coding-at-home.two-snakes.material')


                </div>


            </section>

            @include('static.youtube', ['video_id' => 'un6wyK8XArg'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.two-snakes.questions.content.1')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection