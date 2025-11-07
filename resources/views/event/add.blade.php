@extends('layout.new_base')

@php
    $list = [
        (object) ['label' => 'Activities & Events', 'href' => '/events'],
        (object) ['label' => 'Add activity', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-events-add-page" class="font-['Blinker'] overflow-hidden">
        <section id="add-event-hero-section" class="flex overflow-hidden relative">
            <div class="flex relative pt-32 pb-0 w-full transition-all bg-green-gradient md:py-20">
                <div
                    class="flex overflow-hidden flex-col flex-shrink-0 justify-end pb-10 w-full md:p-0 md:flex-row md:items-center">
                    <div
                        class="flex flex-col gap-28 duration-1000 codeweek-container-lg md:flex-row md:items-center md:gap-4 xl:gap-28">
                        <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2
                                class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                                @lang('event.add-your-codeweek-activity')
                            </h2>
                        </div>
                        <div class="flex z-10 flex-1 justify-center items-center order-0 md:order-2"></div>
                        <img class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden" loading="lazy"
                            src="/images/activity/banner.png" style="clip-path: ellipse(71% 73% at 40% 20%);" />
                        <img class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy" src="/images/activity/banner.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);" />
                    </div>
                </div>
            </div>
        </section>

        <activity-form
          token="{{ csrf_token() }}"
          :user="{{ auth()->user() }}"
          :themes='{{ $themes }}'
          :audiences='{{ $audiences }}'
          :leading-teachers="{{ json_encode($leading_teachers) }}"
          :languages="{{ json_encode($languages) }}"
          :countries="{{ $countries }}"
          :locale="'{{ App::getLocale() }}'"
          :location='@json($location ?? (object)[])'
          :privacy-link="'{{ route('privacy-contact-points') }}'"
        ></activity-form>
    </section>
@endsection
