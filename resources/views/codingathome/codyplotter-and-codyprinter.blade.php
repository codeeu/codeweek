@extends('layout.base')

@section('content')

    <section id="codeweek-training-page" class="codeweek-page">

        @include('codingathome.banner')

        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside">

                <h1>18. @lang('coding-at-home.codyplotter-and-codyprinter.title')</h1>

                <div style="margin-top:10px;margin-bottom:10px">
                    @lang('coding-at-home.codyplotter-and-codyprinter.text')<br/><br/>

                    @lang('coding-at-home.material.required'): @lang('coding-at-home.codyplotter-and-codyprinter.material')


                </div>


            </section>

            @include('static.youtube', ['video_id' => 'NBdFByXSjZo'])

            <section class="codeweek-content-wrapper-inside">

                <h2>@lang('coding-at-home.questions')</h2>


                <p>
                    @lang('coding-at-home.codyplotter-and-codyprinter.questions.content.1')<br/><br/>
                    @lang('coding-at-home.codyplotter-and-codyprinter.questions.content.2')
                </p>


                <p>
                    @lang('coding-at-home.texts.3')
                </p>


            </section>

        </section>

    </section>

@endsection