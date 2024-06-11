@extends('layout.base')

@section('content')


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>


    <section id="codeweek-resources-page" class="codeweek-page">

        <section class="codeweek-banner learn-teach">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('menu.'.$section)</h1>
            </div>
            <div class="image">
                <img src="/images/banner_learn_teach.svg" class="static-image">
            </div>
        </section>

        <x-intro-banner>@lang('snippets.'.$section)</x-intro-banner>
        <livewire:resources-section :section="$section"/>

    </section>


@endsection
