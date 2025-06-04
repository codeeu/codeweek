@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'My certificates', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@include('components.tailwind')
@include('components.livewire')

@section('content')
    <section class="bg-light-blue">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-20">
                <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col">
                        <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat'] mb-6">
                            @lang('locations.title')
                        </h2>
                        <p class="text-xl font-normal text-white p-0 max-md:max-w-full max-w-[864px] mb-10 tablet:mb-6">
                            Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero.
                        </p>
                        <a
                            class="text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-base"
                            href="/add"
                        >
                            <span>Create an activity</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 tablet:py-20 bg-yellow-50">
            <div class="codeweek-container">
                <h2 class="text-dark-blue text-2xl font-medium tablet:text-4xl font-['Montserrat'] mb-6 tablet:mb-8">
                    Your activity venues
                </h2>
                <div class="tablet:hidden flex flex-col gap-y-6">
                    @foreach($locations as $location)
                        <div class="border-2 border-[#B399D6] rounded-lg overflow-hidden">
                            <div class="flex">
                                <div class="px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                    Name
                                </div>
                                <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1">
                                    <a class="text-dark-blue font-semibold text-xl" href="{{route('create_event', ['location'=> $location->id])}}">{{ucfirst($location->name)}}</a>
                                </div>
                            </div>
                            <div class="flex">
                                <div class="px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                    Address
                                </div>
                                <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 font-normal text-xl">
                                    {{$location->location}}
                                </div>
                            </div>
                            <div class="flex">
                                <div class="px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                    Action
                                </div>
                                <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-[#B399D6] font-normal flex-1">
                                    <a class="text-dark-blue" href="{{route('create_event', ['location'=> $location->id])}}">GO</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="overflow-hidden rounded-lg border-2 border-[#B399D6] hidden tablet:block">
                    <table class="w-full border-collapse">
                        <thead>
                        <tr class="bg-[#410098] text-white">
                            <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">Name</th>
                            <th class="border-r border-[#B399D6] px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">Address</th>
                            <th class="px-6 py-4 text-left font-['Montserrat'] font-semibold text-xl">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locations as $location)
                        <tr class="{{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }}">
                            <td class="border-r border-[#B399D6] px-6 py-4 font-semibold text-xl">
                                <span class="text-slate-500 font-semibold">{{ucfirst($location->name)}}</span>
                            </td>
                            <td class="border-r border-[#B399D6] px-6 py-4 font-normal text-xl">{{$location->location}}</td>
                            <td class="px-6 py-4 font-normal text-xl">
                                <a class="text-dark-blue" href="{{route('create_event', ['location'=> $location->id])}}">GO</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
@endsection