@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>2. @lang('coding-at-home.right-and-left.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.right-and-left.text')
                </div>


            </section>

            @include('static.youtube', ['video_id' => 'mSi2K9IbPwc'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.right-and-left.questions.content.1')<br/><br/>
                    @lang('coding-at-home.right-and-left.questions.content.2')<br/><br/>
                    @lang('coding-at-home.right-and-left.questions.content.3')<br/><br/>
                    @lang('coding-at-home.right-and-left.questions.content.4')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection