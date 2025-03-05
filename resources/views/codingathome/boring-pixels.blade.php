@extends('layout.base')

@section('title', 'Boring Pixels – Fun with Digital Art & Coding')
@section('description', 'By giving Roby instructions to form a picture square by square, pixel by pixel, we discover that when many squares in a row have the same colour.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>19. @lang('coding-at-home.boring-pixels.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.boring-pixels.text')<br/><br/>

                    @lang('coding-at-home.material.required'): @lang('coding-at-home.boring-pixels.material')


                </div>


            </section>


            @include('static.youtube', ['video_id' => '_Wu6lbEwN1s'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.boring-pixels.questions.content.1')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection

