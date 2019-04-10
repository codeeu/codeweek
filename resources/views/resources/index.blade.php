@extends('layout.base')

@section('content')
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
          rel="stylesheet" type="text/css"/>







    <div class="resources-container">

        <div class="flex flex-col justify-center text-center w-full">
        @if ($section === "teach")

            <div class="container">
                <a href="/training">
                    <img src="/img/banner_training_horizontal.svg" class="lg:-mt-6 mb-1">
                </a>
            </div>

        @endif
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


@endsection



