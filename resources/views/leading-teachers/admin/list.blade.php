@extends('layout.tall')




@section('content')

    @include('components.tailwind')


    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header" style="display: flex; justify-content: space-between;">

            <h1>Leading Teachers List</h1>
        </section>

            <section class="codeweek-content-wrapper" style="margin-top:0;">

{{--            <livewire:leading-teachers-list-table per-page="100"  exportable="true"/>--}}
            <livewire:leading-teachers-table/>
        </section>

    </section>
@endsection
