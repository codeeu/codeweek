@extends('layout.base')

@section('title', 'Storytelling – A Creative Coding at Home Activity')
@section('description', 'Learn how to use coding to create and tell interactive stories in this fun and educational activity.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>12. @lang('coding-at-home.storytelling.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.storytelling.text')<br/><br/>

                    @lang('coding-at-home.material.required'):
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">@lang('coding-at-home.material2.chequered-with-labels')</a>; @lang('coding-at-home.material2.cards'); @lang('coding-at-home.material2.larger-cards').
                    @lang('coding-at-home.material2.pieces-of-paper').
                    <a href="http://codemooc.org/wp-content/uploads/2020/02/storytelling-characters.pdf">@lang('coding-at-home.material2.small-drawings')</a>.
                    @lang('coding-at-home.material2.rest-of-cards').


                </div>


            </section>

            @include('static.youtube', ['video_id' => 'fUtMFBmv-P8'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.storytelling.questions.content.1')<br/><br/>
                    @lang('coding-at-home.storytelling.questions.content.2')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection