<?php
/**
 * @Author: Bernard Hanna
 * @Date:   2025-03-20 10:42:36
 * @Last Modified by:   Bernard Hanna
 * @Last Modified time: 2025-03-20 16:06:02
 */
?>
@extends('layout.new_base')

@section('title', 'Join EU Code Week – Learn, Create, & Have Fun with Coding')
@section('description', 'EU Code Week is a grassroots initiative bringing coding and digital creativity to everyone in a fun way. Join events & access resources, and start coding!')

@section('non-vue-content')
    <section id="codeweek-homepage" class="codeweek-page font-['Blinker']">
        <section class="relative flex overflow-hidden">
            <div id="slider-wrapper" class="relative flex w-full transition-all bg-secondary-gradient">
                @foreach ($activities as $index => $activity)
                    <div
                        class="absolute top-0 left-0 flex flex-col justify-end flex-shrink-0 w-full h-full pb-10 overflow-hidden md:px-16 md:p-0 md:flex-row md:items-center">
                        <div class="relative h-full flex-grow-1">
                            <button id="slider-prev-small-btn"
                                class="absolute z-10 top-1/2 -translate-y-1/2 -left-2 hover:left-0 bg-white hover:bg-[#F95C22] p-4 pl-6 rounded-r-full duration-300 block md:hidden"
                                style="display: none;">
                                <img class="w-8 h-8 rotate-180" src="/images/arrow-right-icon.svg" />
                            </button>
                            <button id="slider-next-small-btn"
                                class="absolute z-10 top-1/2 -translate-y-1/2 -right-2 hover:right-0 bg-white hover:bg-[#F95C22] p-4 pr-6 rounded-l-full duration-300 block md:hidden"
                                style="display: none;">
                                <img class="w-8 h-8" src="/images/arrow-right-icon.svg" />
                            </button>
                        </div>
                        <div id="activity-{{ $index }}"
                            class="flex items-end duration-1000 home-activity codeweek-container-lg md:items-center"
                            style="opacity: {{ $index === 0 ? 1 : 0 }}">
                            <div
                                class="px-6 py-10 max-md:w-full md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                                @if ($index === 0)
                                    <div x-data="countdownTimer('2025-10-14T00:00:00')" x-init="startCountdown()"
                                        class="flex gap-2.5 items-start max-md:gap-2 max-sm:gap-1.5 mt-4 mb-4" role="timer"
                                        aria-label="Countdown timer">

                                        <!-- Days -->
                                        <div class="px-2 py-1 text-3xl leading-9 text-white bg-black max-md:px-1.5 max-md:py-1 max-md:text-2xl max-md:leading-8 max-sm:px-1 max-sm:py-0.5 max-sm:text-xl max-sm:leading-7"
                                            aria-label="Days" x-text="days">00</div>
                                        <div class="text-3xl leading-9 text-black max-md:text-2xl max-md:leading-8 max-sm:text-xl max-sm:leading-7"
                                            aria-hidden="true">:</div>

                                        <!-- Hours -->
                                        <div class="px-2 py-1 text-3xl leading-9 text-white bg-black max-md:px-1.5 max-md:py-1 max-md:text-2xl max-md:leading-8 max-sm:px-1 max-sm:py-0.5 max-sm:text-xl max-sm:leading-7"
                                            aria-label="Hours" x-text="hours">00</div>
                                        <div class="text-3xl leading-9 text-black max-md:text-2xl max-md:leading-8 max-sm:text-xl max-sm:leading-7"
                                            aria-hidden="true">:</div>

                                        <!-- Minutes -->
                                        <div class="px-2 py-1 text-3xl leading-9 text-white bg-black max-md:px-1.5 max-md:py-1 max-md:text-2xl max-md:leading-8 max-sm:px-1 max-sm:py-0.5 max-sm:text-xl max-sm:leading-7"
                                            aria-label="Minutes" x-text="minutes">00</div>
                                        <div class="text-3xl leading-9 text-black max-md:text-2xl max-md:leading-8 max-sm:text-xl max-sm:leading-7"
                                            aria-hidden="true">:</div>

                                        <!-- Seconds -->
                                        <div class="px-2 py-1 text-3xl leading-9 text-white bg-black max-md:px-1.5 max-md:py-1 max-md:text-2xl max-md:leading-8 max-sm:px-1 max-sm:py-0.5 max-sm:text-xl max-sm:leading-7"
                                            aria-label="Seconds" x-text="seconds">00</div>
                                    </div>
                                @endif
                                <script>
                                    function countdownTimer(targetDate) {
                                        return {
                                            target: new Date(targetDate).getTime(),
                                            days: "00",
                                            hours: "00",
                                            minutes: "00",
                                            seconds: "00",
                                            startCountdown() {
                                                setInterval(() => {
                                                    let now = new Date().getTime();
                                                    let distance = this.target - now;

                                                    if (distance <= 0) {
                                                        this.days = "00";
                                                        this.hours = "00";
                                                        this.minutes = "00";
                                                        this.seconds = "00";
                                                        return;
                                                    }

                                                    this.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                    this.hours = String(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)))
                                                        .padStart(2, '0');
                                                    this.minutes = String(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60))).padStart(2,
                                                        '0');
                                                    this.seconds = String(Math.floor((distance % (1000 * 60)) / 1000)).padStart(2, '0');
                                                }, 1000);
                                            }
                                        };
                                    }
                                </script>

                                <h2
                                    class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                    @lang($activity['title'])
                                </h2>
                                <p
                                    class="text-xl md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                    {{ strip_tags(__(''.$activity['description'])) }}
                                </p>
                                <div class="flex flex-col md:flex-row md:space-x-4 space-y-4 md:space-y-0">
                                    <a class="inline-block bg-primary hover:bg-hover-orange rounded-full py-4 px-6 md:px-10 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300"
                                        href="{{ $activity['url'] }}">
                                        @lang($activity['btn_lang'])
                                    </a>

                                    @if (isset($activity['btn2_lang']) && !is_null($activity['btn2_lang']))
                                    <a class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                        target="_blank" href="{{ $activity['url2'] }}">
                                        <span>@lang($activity['btn2_lang'])</span>
                                        <div class="flex w-4 gap-2 overflow-hidden">
                                            <img src="/images/arrow-right-icon.svg"
                                                class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                            <img src="/images/arrow-right-icon.svg"
                                                class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                        </div>
                                    </a>
                                    @endif
                                </div>

                                <div
                                    class="absolute top-0 -translate-y-1/2 bg-yellow py-3 md:py-4 px-8 md:px-10 rounded-full text-secondary font-semibold text-[16px] m:dtext-base">
                                    #EUCodeWeek
                                </div>
                            </div>
                            
                            @php
                                $backgroundImages = [
                                    asset('images/homepage/slide1.png'),
                                    asset('images/search/search_bg_lg_2.jpeg'),
                                ];
                            @endphp

                            @if(isset($backgroundImages[$index]))
                                <img class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                                    loading="lazy"
                                    src="{{ $backgroundImages[$index] }}"
                                    style="clip-path: ellipse(71% 73% at 40% 20%);" />

                                <img class="absolute top-0 right-0 h-full min-w-[55%] max-w-[calc(70vw)] object-cover hidden md:block"
                                    loading="lazy"
                                    src="{{ $backgroundImages[$index] }}"
                                    style="clip-path: ellipse(70% 140% at 70% 25%);" />
                            @endif

                        </div>
                    </div>
                @endforeach

                <button id="slider-prev-btn"
                    class="absolute top-28 md:top-1/2 -translate-y-1/2 -left-2 hover:left-0 bg-white hover:bg-[#F95C22] p-4 pl-6 rounded-r-full duration-300 hidden md:block"
                    style="display: none;">
                    <img class="w-8 h-8 rotate-180" src="/images/arrow-right-icon.svg" />
                </button>
                <button id="slider-next-btn"
                    class="absolute top-28 md:top-1/2 -translate-y-1/2 -right-2 hover:right-0 bg-white hover:bg-[#F95C22] p-4 pr-6 rounded-l-full duration-300 hidden md:block"
                    style="display: none;">
                    <img class="w-8 h-8" src="/images/arrow-right-icon.svg" />
                </button>
        </section>

        <section class="relative animation-section bg-yellow-2">
            <div class="absolute w-full h-full bg-white md:hidden" style="clip-path: ellipse(100% 58% at 38% 39%)"></div>
            <div class="absolute hidden w-full h-full bg-white md:block" style="clip-path: ellipse(70% 60% at 50% 40%);">
            </div>
            <div
                class="relative z-10 flex flex-col-reverse items-center gap-12 py-16 pb-32 codeweek-container-lg md:flex-row md:pb-48">
                <div class="flex-1">
                    <div class="relative inline-block observer-element">
                        <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/homepage/toolkits.png" />
                        <img class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                            loading="lazy" src="/images/shape.png" style="transform: translate(-16px, -24px)" />
                    </div>
                </div>
                <div class="flex-1">
                    <h2 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @lang('home.toolkits_title')
                    </h2>
                    <p class="text-[#333E48] text-lg md:text-xl leading-7 p-0 mb-10">
                        @lang('home.toolkits_description')
                    </p>
                    <div class="flex flex-col gap-4 xl:flex-row">
                        <a class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                            href="/guide">
                            <span>@lang('home.toolkits_button1')</span>
                            <div class="flex w-4 gap-2 overflow-hidden">
                                <img src="/images/arrow-right-icon.svg"
                                    class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg"
                                    class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                            </div>
                        </a>
                        <a class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                            href="/toolkits">
                            <span>@lang('home.toolkits_button2')</span>
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
        </section>

        <section class="relative bg-yellow-2">
            <div
                class="relative z-10 codeweek-container-lg flex flex-col md:flex-row items-center py-16 md:py-[186px] gap-12">
                <div class="flex-1">
                    <img class="max-w-full" loading="lazy" src="/images/dream-jobs/dream_jobs_logo.svg" />
                    <p class="text-left text-lg md:text-2xl md:leading-8 text-[#20262C] p-0 my-6">
                        @lang('home.minecraft_description1')
                    </p>
                    <p class="text-[16px] md:text-lg text-[#333E48] p-0 mb-8">
                        @lang('home.minecraft_description2')
                    </p>
                    <a class="inline-flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#FFEF99] group"
                        href="{{route('dream-jobs-in-digital')}}">
                        <span>@lang('home.get_involved')</span>
                        <div class="flex w-4 gap-2 overflow-hidden">
                            <img src="/images/arrow-right-icon.svg"
                                class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                            <img src="/images/arrow-right-icon.svg"
                                class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                        </div>
                    </a>
                </div>
                <div class="flex-1 observer-element">
                    <img class="duration-700 animation-element fade-scale-right" loading="lazy"
                        src="/images/homepage/dream-job.png" />
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden animation-section">
            <div class="relative z-10 flex flex-col-reverse items-center gap-12 py-16 codeweek-container-lg md:flex-row">
                <div class="flex-1">
                    <div class="relative inline-block observer-element">
                        <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/homepage/activity.png" />
                        <img class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                            loading="lazy" src="/images/shape.png" style="transform: translate(-16px, -24px)" />
                    </div>
                </div>
                <div class="flex-1">
                    <h2 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @lang('home.activity_title')
                    </h2>
                    <p class="text-[#333E48] text-lg md:text-xl leading-7 p-0 mb-10">
                        @lang('home.activity_description')
                    </p>
                    <div class="flex flex-col gap-4 xl:flex-row">
                        <a class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                            href="/add?skip=1">
                            <span>@lang('home.activity_button1')</span>
                            <div class="flex w-4 gap-2 overflow-hidden">
                                <img src="/images/arrow-right-icon.svg"
                                    class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg"
                                    class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                            </div>
                        </a>
                        <a class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                            href="/events">
                            <span>@lang('home.activity_button2')</span>
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
            <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-36 w-28 md:w-72 h-28 md:h-72 bg-[#99E1F4] rounded-full lg:hidden xl:block"
                style="transform: translate(-16px, -24px)"></div>
            <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-12 right-20 w-28 h-28 hidden xl:block bg-[#99E1F4] rounded-full"
                style="transform: translate(-16px, -24px)"></div>
        </section>

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden"
                style="clip-path: ellipse(170% 90% at 38% 90%);"></div>
            <div class="absolute hidden w-full h-full bg-blue-gradient md:block"
                style="clip-path: ellipse(88% 90% at 50% 90%);"></div>
            <div
                class="relative z-10 flex flex-col items-center gap-12 pb-16 codeweek-container-lg md:flex-row pt-28 md:pt-48">
                <div class="flex-1">
                    <h2 class="text-white text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @lang('home.resouce_title')
                    </h2>
                    <p class="p-0 mb-10 text-lg leading-7 text-white md:text-xl">
                        @lang('home.resouce_description')
                    </p>
                    <div class="flex flex-col gap-4 xl:flex-row">
                        <a class="flex justify-center items-center gap-2 text-white border-solid border-2 border-white rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#061b45] hover:text-white group"
                            href="/resources/CodingAtHome">
                            <span>@lang('home.resouce_button1')</span>
                            <div class="flex w-4 gap-2 overflow-hidden">
                                <img src="/images/arrow-right-icon.svg"
                                    class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg"
                                    class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                            </div>
                        </a>
                        <a class="flex justify-center items-center gap-2 text-white border-solid border-2 border-white rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#061b45] hover:text-white group"
                            href="/training">
                            <span>@lang('home.resouce_button2')</span>
                            <div class="flex w-4 gap-2 overflow-hidden">
                                <img src="/images/arrow-right-icon.svg"
                                    class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg"
                                    class="duration-500 transform -translate-x-6 min-w-4 group-hover:translate-x-0" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="relative flex justify-center flex-1 observer-element">
                    <img class="z-10 w-full duration-700 animation-element fade-scale-bottom" loading="lazy"
                        src="/images/homepage/resource-training.png" />
                    <img class="animation-element fade-scale-bottom duration-700 absolute z-0 -bottom-10 sm:-bottom-16 -right-16 sm:-right-60 w-[184px] sm:w-[324px]"
                        src="/images/homepage/resource-training-icon.png" />
                </div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')
    {{-- @include('static.chatbot') --}}
    @include('static.countdown')
@endpush

@push('scripts')
    <script type="text/javascript">
        const waitForDOM = (callback, interval = 100, maxRetries = 50) => {
            let retries = 0;
            const checkDOM = () => {
                const target = document.getElementById('codeweek-homepage');
                if (target) {
                    callback(target);
                } else if (retries < maxRetries) {
                    retries++;
                    setTimeout(checkDOM, interval);
                } else {
                    console.error('DOM not ready after retries');
                }
            };
            checkDOM();
        };

        waitForDOM((target) => {
            triggerAnimations(target);

            const activities = @json($activities);
            const sliderWraper = document.getElementById('slider-wrapper');

            if (activities?.length && sliderWraper) {
                sliderWraper.style.height = '760px';
            }

            const handleSlider = ({
                prevBtnId,
                nextBtnId
            }) => {
                const scrollBarWidth = Math.max(window.innerWidth - document.body.clientWidth, 0);

                // Slider
                let currentIndex = 0;
                const prevButton = document.getElementById(prevBtnId);
                const nextButton = document.getElementById(nextBtnId);

                if (!prevButton || !nextButton) return;

                if (activities.length > 1) {
                    nextButton.style.display = '';
                }

                const handleMove = (idx) => {
                    const slider = document.getElementById('slider-wrapper');
                    const activityElements = slider.querySelectorAll('.home-activity');
                    activityElements?.forEach((element, index) => {
                        element.style.opacity = index === idx ? 1 : 0;
                    })
                    if (idx === 0) prevButton.style.display = 'none';
                    else prevButton.style.display = '';

                    if (idx === activities.length - 1) nextButton.style.display = 'none';
                    else nextButton.style.display = '';
                }

                prevButton.addEventListener('click', () => {
                    currentIndex = Math.max(currentIndex - 1, 0);
                    handleMove(currentIndex);
                });
                nextButton.addEventListener('click', () => {
                    currentIndex = Math.min(currentIndex + 1, activities.length - 1);
                    handleMove(currentIndex);
                });
            }

            handleSlider({
                prevBtnId: 'slider-prev-small-btn',
                nextBtnId: 'slider-next-small-btn'
            });
            handleSlider({
                prevBtnId: 'slider-prev-btn',
                nextBtnId: 'slider-next-btn'
            });
        });
    </script>
@endpush
