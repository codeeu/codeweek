@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>@lang('coding-at-home.intro.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.intro.text')
                </div>


            </section>

            @include('static.youtube', ['video_id' => 'o2ZGGZagWmM'])

            <section class="codeweek-content-wrapper-inside">

                <p>
                    @lang('coding-at-home.texts.2')
                </p>
                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection