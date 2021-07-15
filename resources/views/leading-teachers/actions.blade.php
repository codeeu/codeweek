@extends('layout.base')

@section('content')

    @include('components.tailwind')
    @include('components.livewire')
    @include('components.alpine')

    <section id="codeweek-report-event-page" class="codeweek-page">

        <section class="codeweek-content-header">

            <h1>Leading Teacher Actions</h1>
            <h3 class="mt-10">
                <a href="{{route('LT.report')}}" class="codeweek-action-link-button">New Action</a>
            </h3>


        </section>

<div class="px-20">
    <livewire:leading-teacher-dashboard/>
</div>




    </section>

@endsection
