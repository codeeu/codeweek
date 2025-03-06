@extends('layout.base')

@section('title', 'Round Trip – A Fun Coding at Home Challenge')
@section('description', 'Program a round-trip journey while learning coding logic and sequencing.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>14. @lang('coding-at-home.round-trip.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.round-trip.text')<br/><br/>

                    @lang('coding-at-home.material.required'): @lang('coding-at-home.round-trip.material')


                </div>


            </section>

            @include('static.youtube', ['video_id' => '0aJxd7nfKFQ'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.round-trip.questions.content.1')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection