@extends('layout.base')
<x-tailwind></x-tailwind>
@section('content')

    <section id="codeweek-schools-page" class="codeweek-page">

        <section class="flex flex-row justify-between" style="background-color: #FE6723">
            <div class="flex items-center w-full">
                <div class="m-12">
                    <div class="text-5xl text-white w-full text-white font-bold">@lang('event.main_title')</div>
                </div>
            </div>
        </section>

        <section class="codeweek-content-wrapper">
            <div class="m-6">

                <livewire:activity.register/>

            </div>

        </section>

    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '✓ ';
            color: #ee6a2c;
            font-weight: bold;
        }
    </style>
@endsection
