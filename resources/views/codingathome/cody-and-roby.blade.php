@extends('layout.base')

@section('title', 'Cody and Roby – Unplugged Coding for Beginners')
@section('description', 'Learn the basics of coding with Cody and Roby, a fun unplugged activity that teaches programming concepts without a computer.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>8. @lang('coding-at-home.cody-and-roby.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.cody-and-roby.text')<br/><br/>

                    @lang('coding-at-home.material.required'):
                    <a href="http://www.codeweek.it/cody-roby-en/ecw-edition/">@lang('coding-at-home.cody-and-roby.starter-kit')</a><br/>
                    @lang('coding-at-home.cody-and-roby.material') <a
                            href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/coding%40home/lessons-8-9.zip"><img
                                src="/img/download.png" width="20px" style="margin-left:8px;position:absolute"></a>

                </div>


            </section>

            @include('static.youtube', ['video_id' => 'do1qBzwxRJg'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.cody-and-roby.questions.content.1')<br/><br/>
                    @lang('coding-at-home.cody-and-roby.questions.content.2')<br/><br/>
                    @lang('coding-at-home.cody-and-roby.questions.content.3')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection