@extends('layout.base')




@section('content')

    @include('components.tailwind')
    @include('components.livewire')
    @include('components.alpine')

    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header" style="display: flex; justify-content: space-between;">

            <h1>Leading Teachers List</h1>
        </section>

            <section class="codeweek-content-wrapper" style="margin-top:0;">

            <livewire:leading-teachers-list-table per-page="100"  exportable="true"/>

        </section>

    </section>
@endsection
