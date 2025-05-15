@extends('layout.new_base')

@section('title', 'EU Code Week Scoreboard: Track Participation Across Europe')
@section('description',
    'See how different countries and regions are contributing to EU Code Week. Track coding events
    and engagement on the live scoreboard!')

    <x-tailwind></x-tailwind>
    <x-alpine></x-alpine>
    @php
        $list = [(object) ['label' => 'Scoreboard', 'href' => '/scoreboard']];
    @endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="coding-at-home-page" class="font-['Blinker'] overflow-hidden">

        <section class="relative z-10">
            <div class="relative z-10 flex justify-center pt-10 md:pt-20 codeweek-container-lg">
                <div class="w-full max-w-[900px]">
                    <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @lang('event.scoreboard_by_country')
                    </h2>
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                        @lang('scoreboard.title')
                        @lang('scoreboard.paragraph')
                    </p>
                </div>
            </div>
            <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
                style="transform: translate(-16px, -24px)"></div>
            <div class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-28 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
                style="transform: translate(-16px, -24px)"></div>
        </section>


        <section class="relative flex overflow-hidden bg-white">
            <div class="flex flex-col items-center w-full pt-0 pb-5 mx-auto max-w-container max-lg:px-5">
                <div class="flex flex-col items-start justify-between w-full max-w-[450px] sm:py-10 sm:flex-row"
                    aria-label="Activity statistics and filters">
                    <!-- Statistics Display -->
                    <div class="h-full w-fit max-sm:mb-10">
                        <h3
                            class="mb-4 text-[#333e48] text-base font-normal font-['Blinker'] leading-snug w-full md:whitespace-nowrap tracking-[.1px]">
                            Total number of @lang('scoreboard.events')
                        </h3>
                        <p x-data="{ count: 0, total: {{ $total }} }" x-init="let interval = setInterval(() => {
                            if (count < total) {
                                count += Math.ceil(total / 50);
                                if (count > total) count = total;
                            } else {
                                clearInterval(interval);
                            }
                        }, 10)" x-text="count"
                            class="p-0 text-4xl font-semibold leading-none text-zinc-800 ">
                            0
                        </p>
                    </div>

                    <div class="text-base leading-none text-gray-700 w-full md:w-[200px]">
                        <label for="edition"
                            class="block mb-2 text-[#333e48] text-base font-normal font-['Blinker'] leading-snug">
                            Select year
                        </label>

                        <div class="relative w-full md:w-[260px]">
                            <form id="faceted-search-events" method="get" action="/scoreboard" class="relative z-50"
                                enctype="multipart/form-data">
                                <!-- Calendar icon inside -->
                                <div class="absolute inset-y-0 flex items-center pointer-events-none left-4">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19 4.5H5C3.89543 4.5 3 5.39543 3 6.5V20.5C3 21.6046 3.89543 22.5 5 22.5H19C20.1046 22.5 21 21.6046 21 20.5V6.5C21 5.39543 20.1046 4.5 19 4.5Z"
                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M3 10.5H21" stroke="black" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M16 2.5V6.5" stroke="black" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M8 2.5V6.5" stroke="black" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>

                                <!-- SELECT input -->
                                <select id="edition" name="edition" onchange="this.form.submit()"
                                    class="flex appearance-none gap-10 justify-between items-center py-3 pr-10 pl-14 w-full bg-white rounded-3xl border border-gray-200 shadow-sm whitespace-nowrap hover:bg-hover hover:text-hover focus:outline-none focus:ring-2 focus:ring-blue-500 text-base font-normal font-['Blinker'] leading-snug text-[#333e48]">
                                    @foreach ($years as $year_label)
                                        <option value="{{ $year_label }}" {{ $year_label == $edition ? 'selected' : '' }}>
                                            {{ $year_label }}
                                        </option>
                                    @endforeach
                                </select>

                                <!-- DROPDOWN ARROW icon (new one you sent) -->
                                <div
                                    class="absolute inset-y-0 flex items-center px-2 text-gray-700 pointer-events-none right-4">
                                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 9.5L12 15.5L18 9.5" stroke="#1C4DA1" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </section>


        <section class="md:mt-10 xl:mt-20">
            <div class="relative pt-48">
                <div class="absolute w-full h-[500px] bg-yellow-50 md:hidden top-0"
                    style="clip-path: ellipse(270% 90% at 38% 90%)"></div>
                <div class="absolute w-full h-[500px] bg-yellow-50 hidden md:block top-0"
                    style="clip-path: ellipse(88% 90% at 50% 90%)"></div>
                <div class="-mt-24 sm:-mt-20 bg-yellow-50">
                    <div class="relative z-10">
                        <div class="max-w-[1428px] mx-auto flex flex-col items-center">
                            @foreach ($events as $event)
                                @if ($loop->first)
                                    <!-- First Country - full width with decorations -->
                                    <div
                                        class="flex flex-row items-center justify-center w-full mb-6 sm:mb-12 scoreboard-card first max-md:px-5 max-xl:px-8">

                                        <!-- Left decoration -->
                                        <div class="h-full my-auto overflow-hidden xl:mr-8 xxl:mr-10">
                                            <!-- Your left decorative images -->
                                            <img role="presentation"
                                                class="object-contain relative h-full w-full max-w-[82px] max-sm:hidden"
                                                src="/images/left-first.svg">
                                        </div>

                                        <!-- First Card -->
                                        <article
                                            class="flex relative gap-4 md:gap-10 items-center p-4 md:p-10 my-auto bg-white rounded-2xl border-b-8 border-[#FBBB26] border-solid max-sm:h-[224px] lg:h-[320px] w-full max-w-[560px] max-sm-px-2 max-md:px-5 max-md:max-w-full"
                                            aria-labelledby="country-name">
                                            <div class="relative flex items-center justify-center w-1/3 h-full mx-auto">
                                                <img src="/images/trophy.svg" alt="Country illustration"
                                                    class="h-full object-contain z-0 shrink-0 my-auto w-[100px] md:w-[177px] relative left-[3px]" />
                                                <span
                                                    class="absolute left-0 right-0 z-0 flex items-start justify-center w-full h-full text-6xl font-bold leading-none tracking-tighter text-center max-sm:top-8 top-4 text-zinc-800 max-md:text-4xl"
                                                    aria-hidden="true">
                                                    1
                                                </span>
                                            </div>
                                            <div class="z-0 flex flex-col justify-center w-2/3 h-full my-auto max-sm:p-[10px]">
                                                <h2 id="country-name"
                                                    class="font-medium leading-none tracking-tighter text-blue-800">
                                                    <a
                                                        href="/events?country_iso={{ $event->country_iso }}&year={{ $edition }}">
                                                        <span
                                                            class="text-[#1c4da1] max-xs:text-[20px] text-[30px] md:text-4xl font-medium font-['Montserrat'] leading-[44px]">@lang('countries.' . $event->country_name)</span>
                                                    </a>
                                                </h2>
                                                <p class="text-[16px] max-sm:p-0 sm:text-base leading-none text-gray-700">
                                                    @lang('scoreboard.parcipating_with')
                                                </p>
                                                <div
                                                    class="flex gap-1 sm:gap-2.5 items-center mt-2 text-[20px] md:text-2xl font-semibold leading-none whitespace-nowrap text-zinc-800">
                                                    <span
                                                        class="flex items-center justify-center w-fit h-10 text-center text-[#20262c]  text-[20px] md:text-2xl px-2  font-semibold font-['Blinker'] bg-orange-500 rounded"
                                                        aria-label="Activity count">
                                                        {{ $event->total }}
                                                    </span>
                                                    <span>@lang('search.' . str_plural('event', $event->total))</span>
                                                </div>
                                            </div>
                                        </article>

                                        <!-- Right decoration -->
                                        <div class="h-full my-auto overflow-hidden xl:ml-8 xxl:ml-10">
                                            <img role="presentation"
                                                class="object-contain relative h-full w-full max-w-[82px] max-sm:hidden"
                                                src="/images/right-first.svg">
                                        </div>

                                    </div>
                                @else
                                    @break
                                @endif
                            @endforeach

                            <!-- Now the grid for all the normal countries -->
                            <div
                                class="grid w-full grid-cols-1 gap-4 px-5 pb-24 tablet:gap-6 tablet:grid-cols-2 xl:grid-cols-3 max-xl:px-5">
                                @foreach ($events as $event)
                                    @if ($loop->first)
                                        @continue
                                    @endif
                                    @php
                                        if ($loop->iteration == 2) {
                                            $borderColorClass = 'border-[#A9A9A9]'; // Silver
                                        } elseif ($loop->iteration == 3) {
                                            $borderColorClass = 'border-[#CA8A00]'; // Bronze
                                        } else {
                                            $borderColorClass = 'border-[#FFEF99]'; // Default
                                        }
                                    @endphp

                                    <article
                                        class="relative flex items-center gap-4 md:gap-6 p-4 md:p-8 max-sm:h-[224px] bg-white border-b-8 border-solid rounded-2xl {{ $borderColorClass }}"
                                        aria-labelledby="country-name">
                                        <div class="relative flex items-center justify-center w-1/3 mx-auto">
                                            <img src="/images/trophy.svg" alt="Country illustration"
                                                class="object-contain z-0 shrink-0 my-auto w-[100px] md:w-[130px]" />
                                            <span
                                                class="absolute left-0 right-0 z-0 flex items-start justify-center w-full h-full font-bold leading-none tracking-[.1px] text-center max-sm:top-6 top-4 max-md:text-4xl md:text-5xl text-zinc-800 "
                                                aria-hidden="true">
                                                {{ $loop->iteration }}
                                            </span>
                                        </div>
                                        <div class="z-0 flex-1 w-2/3 my-auto max-sm:p-[10px">
                                            <h2 id="country-name"
                                                class="text-[20px] md:text-2xl font-medium leading-none tracking-tighter text-blue-800">
                                                <a class="hover:text-primary"
                                                    href="/events?country_iso={{ $event->country_iso }}&year={{ $edition }}">
                                                    <span
                                                        class="text-secondary max-xs:text-[20px] max-2xl::text-[30px] 2xl:text-4xl font-medium font-['Montserrat'] leading-[44px]">@lang('countries.' . $event->country_name)</span>
                                                </a>
                                            </h2>
                                            <p
                                                class="text-[#333e48] text-[16px] max-sm:p-0 sm:text-base font-normal font-['Blinker']">
                                                @lang('scoreboard.parcipating_with')
                                            </p>
                                            <div
                                                class="flex gap-1 sm:gap-2.5 items-center mt-2 text-lg font-semibold leading-none whitespace-nowrap text-zinc-800">
                                                <span
                                                    class="flex items-center justify-center h-8 px-1 text-center text-black bg-orange-500 rounded w-fit min-w-8"
                                                    aria-label="Activity count">
                                                    {{ $event->total }}
                                                </span>
                                                <span>@lang('search.' . str_plural('event', $event->total))</span>
                                            </div>
                                        </div>
                                    </article>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>
    </section>
@endsection
