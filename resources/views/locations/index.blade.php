@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Activity venues', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@include('components.tailwind')
@include('components.livewire')

@section('content')
    <section class="bg-white">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full py-10 tablet:py-20">
                <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col items-center">
                        <h2 class="text-dark-blue text-[22px] tablet:text-4xl font-medium font-['Montserrat'] mb-6">
                            @lang('locations.title')
                        </h2>
                        <div class="flex flex-col gap-4 items-center max-w-[864px] text-[16px] tablet:text-xl text-slate-500 font-[Blinker]">
                          <p class="p-0 text-center">
                              For your next activity, register a new venue <b>OR</b> add a new activity using one of your existing venues from the list below.
                          </p>
                          <div class="flex flex-col md:flex-row gap-6 md:gap-[50px]">
                              <a
                                  class="text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-3 px-6 font-semibold text-base"
                                  href="/add?skip=1"
                              >
                                  <span>Register a new venue</span>
                              </a>
                              <button
                                  id="scroll-to-venue"
                                  class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                              >
                                  <span>Use existing venue</span>
                                  <div class="flex w-4 gap-2 overflow-hidden rotate-90">
                                    <img src="/images/arrow-right-icon.svg"
                                        class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                    <img src="/images/arrow-right-icon.svg"
                                        class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                </div>
                              </button>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative w-full pt-10 md:pt-32">
            <div
              class="absolute top-0 w-full h-64 bg-gray-10 md:hidden"
              style="clip-path: ellipse(100% 90% at 50% 90%)"
            ></div>
            <div
              class="absolute top-0 w-full h-64 bg-gray-10 hidden md:block lg:hidden"
              style="clip-path: ellipse(75% 90% at 50% 90%)"
            ></div>
            <div
              class="absolute top-0 w-full h-64 bg-gray-10 hidden lg:block xl:hidden"
              style="clip-path: ellipse(70% 90% at 50% 90%)"
            ></div>
            <div
              class="absolute top-0 w-full h-64 bg-gray-10 hidden xl:block"
              style="clip-path: ellipse(65% 90% at 50% 90%)"
            ></div>
            <div class="bg-gray-10 md:pb-20">
              <div id="venue-table" class="codeweek-container-lg relative pb-16 bg-gray-10 pt-10">
                <div class="codeweek-container-lg flex flex-col items-center mb-6">
                      <h2 class="text-dark-blue text-[22px] tablet:text-4xl font-medium font-['Montserrat'] mb-6 text-center">
                          Existing venues
                      </h2>
                      <div class="flex flex-col gap-4 items-center max-w-[864px] text-[16px] tablet:text-xl text-slate-500 font-[Blinker]">
                          <p class="p-0 text-center">
                              A list of activity venues you have already created
                          </p>
                      </div>
                  </div>
                  <div class="tablet:hidden flex flex-col gap-y-6">
                      @foreach($locations as $location)
                          <div class="border-2 border-[#B399D6] rounded-lg overflow-hidden">
                              <div class="flex">
                                  <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                      Name
                                  </div>
                                  <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1">
                                      <a class="text-dark-blue font-semibold text-xl" href="{{route('create_event', ['location'=> $location->id])}}">{{ucfirst($location->name)}}</a>
                                  </div>
                              </div>
                              <div class="flex">
                                  <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                      Address
                                  </div>
                                  <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-b border-[#B399D6] flex-1 font-normal text-xl">
                                      {{$location->location}}
                                  </div>
                              </div>
                              <div class="flex">
                                  <div class="flex items-center px-4 py-5 bg-[#410098] border-r border-b border-[#B399D6] font-['Montserrat'] font-semibold text-base text-white w-[108px]">
                                      Action
                                  </div>
                                  <div class="px-4 py-5 {{ $loop->even ? 'bg-[#F5F2FA]' : 'bg-white' }} border-[#B399D6] font-normal flex-1">
                                      <a
                                          class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                          href="{{route('create_event', ['location'=> $location->id])}}"
                                      >
                                          <span>Go</span>
                                          <div class="flex w-4 gap-2 overflow-hidden">
                                            <img src="/images/arrow-right-icon.svg"
                                                class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                            <img src="/images/arrow-right-icon.svg"
                                                class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                        </div>
                                      </a>
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
                              <td class="px-6 py-4 font-normal text-xl" width="270">
                                  <a
                                      class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                      href="{{route('create_event', ['location'=> $location->id])}}"
                                  >
                                      <span>Go</span>
                                      <div class="flex w-4 gap-2 overflow-hidden">
                                        <img src="/images/arrow-right-icon.svg"
                                            class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                        <img src="/images/arrow-right-icon.svg"
                                            class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                    </div>
                                  </a>
                              </td>
                          </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
        </section>
    </section>
@endsection
