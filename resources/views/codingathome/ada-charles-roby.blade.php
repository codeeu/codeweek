@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner', ['title' => __('coding-at-home.ada-charles-roby.title')])

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>7. @lang('coding-at-home.ada-charles-roby.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.ada-charles-roby.text')<br/><br/>

                    @lang('coding-at-home.material.required'): @lang('coding-at-home.ada-charles-roby.material')


                </div>


            </section>

            {{--            @include('static.youtube', ['video_id' => 'BmCgTAfGmgw'])--}}

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.ada-charles-roby.questions.content.1')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection