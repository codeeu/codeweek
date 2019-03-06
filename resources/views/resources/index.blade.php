@extends('layout.base')

@section('content')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>


    @if ($section === "teach")
        <a href="/schools">
            @include('static.banner_training')
        </a>
    @endif




    <div class="container resources-container">

        <div class="flex flex-col justify-center text-center w-full uppercase">
            {{--<h1>Resources</h1>--}}

        </div>


        <resource-form
                :section="'{{ $section }}'"
                :levels="{{ $levels }}"
                :programming-languages="{{ $programmingLanguages }}"
                :languages="{{ $languages }}"
                :categories="{{ $categories }}"
                :subjects="{{ $subjects }}"
                :types="{{ $types }}"
        ></resource-form>


    </div>
    </section>


@endsection



