@extends('layout.new_base')

@include('components.tailwind')
@include('components.livewire')

@php
    $list = [
        (object) ['label' => 'Online Activities', 'href' => ''],
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
                            @lang('menu.online_events')
                        </h2>
                        <p class="text-xl font-normal text-white p-0 max-md:max-w-full max-w-[864px]">
                            Total of Online Activities: {{$events->total()}}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10 py-10 md:py-20 codeweek-container-lg">
            @role('super admin')

            <div class="mb-4">
                <div class="border-b border-gray-200">
                    <nav class="-mb-px flex">
                        @role('activities admin')
                            @include('online-calendar.admin._tab', [
                                'targetParam'=>'online/list',
                                'route'=>'admin.online-events',
                                'title'=>'All Online Activities'
                            ])
                        @endrole
                            @include('online-calendar.admin._tab', [
                                'targetParam'=>'online/promoted',
                                'route'=>'promoted_events',
                                'title'=>'Pending Approval Activities'
                            ])
                            @include('online-calendar.admin._tab', [
                                'targetParam'=>'online/featured',
                                'route'=>'featured_events',
                                'title'=>'Featured Activities'
                            ])
                    </nav>
                </div>
            </div>
            <div class="relative flex flex-col">
                <country-select :target="'{{$target}}'" :code="'{{$country_iso}}'" :countries="{{$countries}}"></country-select>
            </div>
            @endrole

            <div class="overflow-hidden rounded-2xl border-2 border-[#B399D6] mt-6">
                <table class="w-full border-collapse">
                    <thead>
                    <tr class="bg-[#410098] text-white">
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">
                            Title
                        </th>
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">
                            Language
                        </th>
                        <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">
                            Country
                        </th>
                        <th class="px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                    @foreach($events as $event)

                        @livewire('online-event-card', ['event' => $event, 'countryName' => $countryNames[$event->country_iso], 'loop' => $loop])

                    @endforeach

                    </tbody>


                </table>
            </div>

            <!-- Pagination Links -->
            <div class="mt-5">
                {{ $events->links('vendor.pagination') }}
            </div>
        </section>
    </section>
@endsection


