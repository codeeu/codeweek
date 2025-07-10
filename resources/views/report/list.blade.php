@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Report my activities', 'href' => ''],
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
                            @lang('eventreports.reports_by'){{ Auth::user()->fullName }}
                        </h2>
                        <p class="text-xl font-normal text-white p-0 max-md:max-w-full max-w-[864px] mb-0">
                            @lang('eventreports.report')
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-10 pb-2 tablet:pt-20 tablet:pb-8 bg-yellow-50">
            <div class="codeweek-container">
                @if($events->isEmpty())
                    <p class="text-xl text-center font-normal text-slate-500 p-0">
                        @lang('eventreports.no_reports')
                    </p>
                @else
                    <div class="bg-white rounded-lg border-2 border-[#B399D6] overflow-hidden sm:rounded-md mt-6">
                        <ul class="m-0">
                            @foreach($events as $event)
                                @if ($loop->first)
                                    <li class="">
                                @else
                                    <li class="border-t border-dark-blue">
                                @endif
                                    @if($loop->odd)
                                        <a href="{{route('report_event', compact('event'))}}"
                                            class="block hover:bg-dark-blue-50 focus:outline-none focus:bg-orange-50 transition duration-150 ease-in-out">
                                    @else
                                        <a href="{{route('report_event', compact('event'))}}"
                                            class="block hover:bg-dark-blue-50 focus:outline-none focus:bg-orange-50 transition duration-150 ease-in-out bg-orange-100">
                                   @endif
                                            <div class="flex items-center px-4 py-4 sm:px-6">
                                                <div class="min-w-0 flex-1 flex items-center">
                                                    <div class="flex-shrink-0">
                                                        <img class="h-12 w-12 rounded-lg border border-dark-blue-400"
                                                             src="{{$event->picture_path()}}" alt="">
                                                    </div>
                                                    <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                                        <div class="text-slate-500">
                                                            <div class="text-xl leading-5 font-semibold truncate">
                                                                {{$event->title}}</div>
                                                            <div class="mt-2 flex items-center leading-5 text-[18px]">
                                                                <span class="truncate">{{$event->organizer}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="hidden md:flex items-center">
                                                            <div>
                                                                <div class="flex items-center leading-5 text-slate-500 text-[18px]">
                                                                    <svg class="flex-shrink-0 h-6 w-6 text-primary mr-2"
                                                                         viewBox="0 0 20 20"
                                                                         fill="currentColor">
                                                                        <path fill-rule="evenodd"
                                                                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                                              clip-rule="evenodd"/>
                                                                    </svg>
                                                                    Ended on: {{$event->end_date}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <svg class="h-8 w-8 text-dark-blue" viewBox="0 0 20 20"
                                                         fill="currentColor">
                                                        <path fill-rule="evenodd"
                                                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                            @endforeach
                        </ul>
                    </div>

                    <div>
                        {{ $events->links('vendor.livewire.pagination') }}
                    </div>
                @endif
            </div>
        </section>
    </section>
@endsection