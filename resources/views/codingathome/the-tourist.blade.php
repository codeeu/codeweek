@extends('layout.base')

@section('title', 'The Tourist – A Coding at Home Puzzle')
@section('description', 'Two teams challenge each other to find, in the shortest time possible, the sequence of instructions that will guide the tourist to the monuments for visit.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>9. @lang('coding-at-home.the-tourist.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.the-tourist.text')<br/><br/>

                    @lang('coding-at-home.material.required'):
                    <a href="http://www.codeweek.it/cody-roby-en/ecw-edition/">@lang('coding-at-home.cody-and-roby.starter-kit')</a><br/>
                    @lang('coding-at-home.cody-and-roby.material'). <a
                            href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/coding%40home/lessons-8-9.zip"><img
                                src="/img/download.png" width="20px" style="margin-left:8px;position:absolute"></a>
                    <br/>@lang('coding-at-home.the-tourist.material')

                </div>


            </section>

            @include('static.youtube', ['video_id' => 'Pu3pEEIsxF4'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.the-tourist.questions.content.1')<br/><br/>
                    @lang('coding-at-home.the-tourist.questions.content.2')<br/><br/>
                    @lang('coding-at-home.the-tourist.questions.content.3')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection