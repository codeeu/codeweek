@extends('layout.base')

{{--@include('components.tailwind')--}}
@include('components.livewire')
{{--@include('components.alpine')--}}

@section('content')

    <section id="codeweek-report-event-page" class="codeweek-page">

        <section class="codeweek-content-header">

            <h1>Leading Teacher Registration</h1>
            <p>Please fill this form to apply as a leading teacher</p>

        </section>


        <section class="codeweek-content-wrapper" style="margin-top:0;">

            <livewire:leading-teacher-signup-form/>


        </section>

    </section>

@endsection
