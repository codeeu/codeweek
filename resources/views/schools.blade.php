@extends('layout.base')

@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="codeweek-banner schools">
            <div class="text">
                <h1>@lang('menu.why')</h1>
                <h2 style="text-transform: uppercase;">@lang('schools.title')</h2>
            </div>
            <div class="image">
                <img src="/images/banner_training.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            @foreach($questions as $question)
                @livewire('question-component', ['question' => $question])
            @endforeach

        </section>

    </section>

@endsection