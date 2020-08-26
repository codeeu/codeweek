@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')
    <section id="codeweek-report-events-page" class="codeweek-page">

        <section class="codeweek-content-header">
            <h1>@lang('eventreports.reports_by'){{ Auth::user()->fullName }}</h1>
            <p>@lang('eventreports.report')</p>
        </section>


        <div class="bg-white overflow-hidden rounded-lg">
            <div class="px-4 py-5 sm:p-6">

                @if($events->isEmpty())
                    <p>@lang('eventreports.no_reports')</p>
                @else
                    {{--                <div class="codeweek-grid-layout">--}}
                    {{--                    @foreach($events as $event)--}}
                    {{--                        @lang('events.report_and_claim')--}}
                    {{--                        --}}
                    {{--                        @component('event.event_tile', ['event'=>$event])--}}
                    {{--                        @endcomponent--}}
                    {{--                    @endforeach--}}
                    {{--                </div>--}}

                    <div class="bg-white rounder border border-orange-200 overflow-hidden sm:rounded-md">
                        <ul class="mt-0">
                            @foreach($events as $event)
                                @if ($loop->first)
                                    <li class="">
                                @else
                                    <li class="border-t border-orange-200">
                                        @endif


                                        @if($loop->odd)
                                            <a href="{{route('report_event', compact('event'))}}"
                                               class="block hover:bg-orange-200 focus:outline-none focus:bg-orange-50 transition duration-150 ease-in-out">
                                                @else
                                                    <a href="{{route('report_event', compact('event'))}}"
                                                       class="block hover:bg-orange-200 focus:outline-none focus:bg-orange-50 transition duration-150 ease-in-out bg-orange-100">
                                                        @endif

                                                        <div class="flex items-center px-4 py-4 sm:px-6">

                                                            <div class="min-w-0 flex-1 flex items-center">
                                                                <div class="flex-shrink-0">
                                                                    <img class="h-12 w-12 rounded-lg border border-orange-300"
                                                                         src="{{$event->picture_path()}}" alt="">
                                                                </div>
                                                                <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                                                                    <div>
                                                                        <div class="text-sm leading-5 font-medium text-indigo-600 truncate">
                                                                            {{$event->title}}</div>
                                                                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                                            <span class="truncate">{{$event->organizer}}</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="hidden md:block">
                                                                        <div>

                                                                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                                                                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-green-400 mr-2"
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
                                                                <svg class="h-5 w-5 text-orange-400" viewBox="0 0 20 20"
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


                    <div class="codeweek-pagination">
                        {{ $events->links() }}
                    </div>
                @endif
            </div>
        </div>


    </section>

@endsection