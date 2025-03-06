@extends('layout.base')

@section('title', 'Turning Code into Pictures – Creative Coding at Home')
@section('description', 'Use code to generate digital images and patterns in this engaging activity.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>20. @lang('coding-at-home.turning-code-into-pictures.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.turning-code-into-pictures.text.1')<br/><br/>

                    @lang('coding-at-home.material.required'): @lang('coding-at-home.turning-code-into-pictures.material')


                </div>


            </section>

            @include('static.youtube', ['video_id' => '93vxOad9OxI'])

            <section class="codeweek-content-wrapper-inside">



                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.turning-code-into-pictures.questions.content.1')
                </p>

                @lang('coding-at-home.turning-code-into-pictures.text.2')<br/><br/>

                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection
