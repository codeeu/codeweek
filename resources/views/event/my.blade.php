@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'My activities', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

<x-tailwind></x-tailwind>

@section('content')
    <section class="bg-light-blue font-['Blinker']">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-20">
                <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col">
                        <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat'] mb-6">
                            @lang('myevents.created_by') {{ Auth::user()->fullName }}
                        </h2>
                        <p class="text-xl font-normal text-white p-0 max-md:max-w-full max-w-[864px] mb-10 tablet:mb-6">
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero.
                        </p>
                        <div class="flex flex-col md:flex-row gap-4 md:gap-2">
                            <a
                                class="text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-base"
                                href="/add"
                            >
                                <span>Create an activity</span>
                            </a>
                            <a
                                class="w-full md:w-fit flex justify-center items-center gap-2 text-white border-solid border-2 border-white rounded-full py-2.5 px-6 font-semibold text-base transition-all duration-300 group"
                                href="/"
                            >
                                <span>Guide for organisers </span>
                                <div class="flex gap-2 w-4 overflow-hidden">
                                    <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                    <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-10 pb-2 tablet:pt-20 tablet:pb-8 bg-yellow-50">
            <div class="codeweek-container">
                @if(!$events || (count($events) == 0))
                    <p class="text-xl text-center font-normal text-slate-500 p-0">
                        @lang('myevents.no_events.first_call_to_action')
                        <a href="{{route('create_event')}}">@lang('myevents.no_events.first_link')</a>
                        @lang('myevents.no_events.second_call_to_action')
                        <a href="{{route('guide')}}">@lang('myevents.no_events.second_link')</a>?
                    </p>
                @else
                    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 xl:gap-10">
                        @foreach($events as $event)
                            @component('event.event_tile', ['event'=>$event])
                            @endcomponent
                        @endforeach
                    </div>
                    <div>
                        {{ $events->links('vendor.pagination') }}
                    </div>
                @endif
            </div>
        </section>
    </section>
@endsection
