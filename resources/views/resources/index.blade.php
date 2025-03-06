@extends('layout.base')

@php
    $currentUrl = request()->url();
@endphp

@if(strpos($currentUrl, route('resources_learn')) !== false)
    @section('title', 'Learn Coding with EU Code Week – Free Educational Resources')
    @section('description', 'Explore a collection of free resources, courses, and tutorials designed to help students and beginners learn coding at their own pace.')
@elseif(strpos($currentUrl, route('resources_teach')) !== false)
    @section('title', 'Teaching Coding – Free EU Code Week Resources for Educators')
    @section('description', 'Access high-quality resources, lesson plans, and guides to effectively teach coding in classrooms and beyond.')
@else
    @section('title', 'Free Coding Resources – EU Code Week')
    @section('description', 'Access a wide range of free coding resources, including lesson plans, tutorials, and activities for students, teachers, and coding enthusiasts.')
@endif

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
        <resource-form
                :prp-query="'{{$query}}'"
                :prp-levels="{{$selected_levels}}"
                :prp-types="{{$selected_types}}"
                :prp-programming-languages="{{$selected_programming_languages}}"
                :prp-categories="{{$selected_categories}}"
                :prp-languages="{{$selected_languages}}"
                :prp-subjects="{{$selected_subjects}}"
                :section="'{{ $section }}'"
                :levels="{{ $levels }}"
                :programming-languages="{{ $programmingLanguages }}"
                :languages="{{ $languages }}"
                :categories="{{ $categories }}"
                :subjects="{{ $subjects }}"
                :types="{{ $types }}"
                :locale="'{{App::getLocale()}}'"
        ></resource-form>

    </section>


@endsection
