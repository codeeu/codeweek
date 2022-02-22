@extends('layout.base')

{{--@include('components.tailwind')--}}
@include('components.livewire')
{{--@include('components.alpine')--}}

@section('content')

    <section id="codeweek-report-event-page" class="codeweek-page">

        <section class="codeweek-content-header">

            <h1>Add an Action </h1>
            <p>Please fill this form</p>

        </section>


        <section class="codeweek-content-wrapper" style="margin-top:0;">

            <livewire:leading-teacher-report-form/>


        </section>

    </section>

@endsection
