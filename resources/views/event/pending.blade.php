@extends('layout.new_base')

<x-tailwind></x-tailwind>

@php
    $list = [
        (object) ['label' => 'Pending Activities', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-privacy-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-20">
                <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col">
                        <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat'] mb-6">
                            @lang('menu.pending')
                        </h2>
                        <p class="text-xl font-normal text-white p-0 max-md:max-w-full max-w-[864px]">
                            @lang('event.total_pending_events') {{$events->total()}}
                        </p>
                        @if($country_iso)
                            <a class="bg-[#F95C22] rounded-full py-3 px-12 font-['Blinker'] hover:bg-hover-orange duration-300 mt-4" href="{{'/api/event/approveAll/' . $country_iso}}">
                                <span class="text-base font-semibold leading-7 text-white normal-case">
                                    Approve all events
                                </span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 py-10 md:py-20 bg-yellow-50">
            <div class="codeweek-container">
                @role('super admin')
                <country-select :target="'pending'" :code="'{{$country_iso}}'" :countries="{{$countries}}"></country-select>
                @endrole

                <div class="mt-4">
                    @if($events->count() > 0)
                        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6 xl:gap-10">
                            @foreach($events as $event)
                                @component('event.event_tile_approval', ['event'=>$event, 'moderation'=>'true'])
                                @endcomponent
                            @endforeach
                        </div>
                        <!-- Pagination Links -->
                        <div class="mt-5">
                            {{ $events->links('vendor.pagination') }}
                        </div>
                    @else
                        <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px text-center">No pending event found.</p>
                    @endif
                </div>
            </div>
        </section>
    </section>
@endsection
