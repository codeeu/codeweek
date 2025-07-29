@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Activities & Events', 'href' => '/add'],
      (object) ['label' => 'Featured activities', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('title', 'Featured Coding Activities – Join Exciting Code Week Events')
@section('description', 'Discover and participate in featured coding activities from EU Code Week. Find engaging projects and workshops near you!')

@include('components.tailwind')
@include('components.livewire')

@include('components.alpine')

@section('content')
<section id="codeweek-digital-girls" class="font-['Blinker'] overflow-hidden">
    <section class="relative flex overflow-hidden">
        <div class="flex relative transition-all w-full bg-light-blue-gradient pt-60 pb-0 md:py-20">
            <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                <div class="home-activity codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                    <div class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                        <h2 class="text-dark-blue text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[530px]">
                            Featured activities
                        </h2>
                        <p class="text-xl font-normal md:text-2xl leading-8 text-slate-500 p-0 mb-0 max-md:max-w-full max-w-[637px]">
                            @lang('snippets.featured-activities')
                        </p>
                    </div>
                    <img
                        class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                        loading="lazy"
                        src="/img/2021/challenges/banner_bg.png"
                        style="clip-path: ellipse(71% 73% at 40% 20%);"
                    />
                    <img
                        class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                        loading="lazy"
                        src="/img/2021/challenges/banner_bg.png"
                        style="clip-path: ellipse(70% 140% at 70% 25%);"
                    />
                </div>
            </div>
        </div>
    </section>

    @livewire('online-calendar')

</section>
@endsection


