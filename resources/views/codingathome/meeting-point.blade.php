@extends('layout.base')

@section('title', 'Meeting Point – A Coding at Home Challenge')
@section('description', 'Use coding to create a virtual meeting point where different elements interact, enhancing your logical thinking and problem-solving skills.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>15. @lang('coding-at-home.meeting-point.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.meeting-point.text')<br/><br/>

                    @lang('coding-at-home.material.required'): @lang('coding-at-home.meeting-point.material')


                </div>


            </section>

            @include('static.youtube', ['video_id' => 'uny3nRkqOHk'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.meeting-point.questions.content.1')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection