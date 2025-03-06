@extends('layout.base')

@section('title', 'Explorer Without Footprints – A Coding at Home Challenge')
@section('description', 'Guide an explorer through a journey using logic and coding principles in this fun, screen-free activity.')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>5. @lang('coding-at-home.explorer-without-footprints.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.explorer-without-footprints.text')<br/><br/>

                    @lang('coding-at-home.material.required'): <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/board-and-roby-en.pdf">@lang('coding-at-home.material.chequered')</a>, <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/CodyFeet-sheet.pdf">@lang('coding-at-home.material.footprint')</a>, @lang('coding-at-home.explorer-without-footprints.material')
                    <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/coding%40home/explorer-materials.zip"><img src="/img/download.png" width="20px" style="margin-left:8px;position:absolute"></a>
                </div>


            </section>

            @include('static.youtube', ['video_id' => 'Di891TiFiUI'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.explorer-without-footprints.questions.content.1')<br/><br/>
                    @lang('coding-at-home.explorer-without-footprints.questions.content.2')<br/><br/>
                    @lang('coding-at-home.explorer-without-footprints.questions.content.3')<br/><br/>
                    @lang('coding-at-home.explorer-without-footprints.questions.content.4')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>
            @include("include.licence")
        </section>

    </section>

@endsection