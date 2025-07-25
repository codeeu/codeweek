@extends('layout.tall')

@include('components.tailwind')
@include('components.livewire')

@php
    $list = [
        (object) ['label' => 'Leading Teachers', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-privacy-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-28">
                <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg">
                        <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat']">
                            Leading Teachers List
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 py-10 md:py-20 codeweek-container-lg">
            <livewire:leading-teachers-table/>
        </section>
    </section>
@endsection
