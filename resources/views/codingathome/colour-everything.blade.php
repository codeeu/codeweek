@extends('layout.base')

@section('title', 'Colour Everything – A Creative Coding at Home Activity')
@section('description', 'Discover how coding can be used to create colorful patterns and designs in this fun and interactive activity.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>17. @lang('coding-at-home.colour-everything.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.colour-everything.text')<br/><br/>

                    @lang('coding-at-home.material.required'): @lang('coding-at-home.colour-everything.material')


                </div>


            </section>


            @include('static.youtube', ['video_id' => 'XqMfcKHDM0g'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.colour-everything.questions.content.1')<br/><br/>
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>


@endsection
