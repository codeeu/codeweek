
@extends('layout.new_base')

@section('title', 'Why Learn to Code? Discover the Benefits with EU Code Week')
@section('description', 'Coding is a key skill for the future! Learn why coding matters and how it fosters problem-solving, creativity, and digital literacy.')
@php
    $list = [
        (object) ['label' => 'Why get involved?', 'href' => ''],
    ];
        // Pull in the arrays from resources/lang/en/why-coding.php
    $titles = trans('why-coding.titles');
    $texts  = trans('why-coding.texts');
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection
  <style>
  @media (min-width: 768px) {
    .hero-image {
        clip-path: ellipse(70% 120% at 70% -2%);
    }
  }
  </style>
@section('content')
    <section id="codeweek-get-involved" class="font-['Blinker'] overflow-hidden">
       <section class="flex overflow-hidden relative flex-col bg-violet-gradient">
            <div class="relative w-full transition-all">
                <div
                    class="relative flex flex-col justify-end w-full overflow-hidden md:p-0 md:flex-row md:items-center h-[760px]">
                    <div class="flex relative justify-start items-center w-full h-full duration-1000 home-activity">
                        <!-- Image with clip-path -->
                        <img class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%]  md:h-full object-cover transition-all duration-300 hero-image"
                            src="images/get-involved-3.png"
                            />
                        <div
                            class="flex flex-col-reverse justify-between items-center mx-auto w-full max-md:h-full md:flex-row codeweek-container-lg">
                            <div class="flex justify-center items-center w-full h-full md:w-1/2 max-md:max-h-[50%] max-md:h-full">
                                <div
                                    class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-fit h-fit relative -top-6">
                                    <h1
                                        class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                         @lang('why-coding.titles.0')
                                    </h1>
                                    <p class="text-xl  md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                     Because it’s not just about technology — it’s about unlocking imagination, solving problems, and shaping the future. Coding helps us understand the digital world and gives everyone the power to build something new.
                                    </p>
                                    <a class="inline-block bg-primary  rounded-full py-4 px-6 md:px-10 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300 hover:bg-hover-orange" href="/guide">
                                    Get involved                                </a>
                                </div>
                            </div>
                            <button class="hidden justify-center items-center w-full md:w-1/2 group max-md:h-full">
                                <svg class="z-50 transition-all duration-300" width="80" height="80"
                                    viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40"
                                        class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white" />
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <section class="overflow-hidden relative z-10">
        <div class="flex relative z-10 justify-center py-10 md:py-20 codeweek-container-lg">
            <div class="w-full max-w-[880px] gap-2">
                <h2 class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                    @lang('why-coding.titles.1')
                </h2>
                 {{-- Now loop through the rediving texts if you want --}}
                @for($j =  count($titles); $j < count($texts); $j++)
                    <p class="text-[#20262C] font-normal text-lg md:text-2xl mb-2">
                        @lang("why-coding.texts.{$j}")
                    </p>
                @endfor
            </div>
        </div>
        <div
            class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
            style="transform: translate(-16px, -24px)"
        ></div>
        <div
            class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-26 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
            style="transform: translate(-16px, -24px)"
        ></div>
    </section>
        <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-[#F5F2FA] md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-[#F5F2FA] md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-[#F5F2FA] lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-[#F5F2FA] xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
        <div class="relative py-8 lg:pt-20 lg:pb-16 codeweek-container-lg md:pt-40 md:pb-28">
  <div class="flex overflow-hidden relative">
    <div class="flex flex-col items-center px-5 pt-5 pb-5 mx-auto w-full max-w-7xl">
      <div class="flex gap-10 rounded-[32px] w-full bg-white">
        <div class="flex flex-col flex-1 bg-white border-4 border-solid border-[#D9CCEA] rounded-[32px] w-full">
          <div class="hidden w-full tab-desktop lg:flex lg:flex-row">
            <nav class="border-r-2 border-solid border-r-[#D9CCEA] w-full flex flex-col lg:w-[440px]" role="tablist" aria-label="Get Involved Options">
              <button class="btn tab-button flex justify-between items-center px-6 py-5 w-full bg-violet-900 min-h-[84px] rounded-[32px_0_0_0]  hover:text-hover" role="tab" aria-selected="true" aria-controls="tab-panel-1" id="tab-1" tabindex="0">
                <h3 class="flex-1 text-2xl font-semibold text-left text-white">Ready to get involved?</h3>
                <div aria-hidden="true">
                  <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M24 1C36.7 1 47 11.3 47 24S36.7 47 24 47 1 36.7 1 24 11.3 1 24 1Z" stroke="#410098" stroke-width="2"/><path d="M17 24H31" stroke="#410098" stroke-width="2"/><path d="M24 17L31 24L24 31" stroke="#410098" stroke-width="2"/></svg>
                </div>
              </button>
              <button class="btn tab-button flex justify-between items-center px-6 py-5 w-full border-b-2 border-[#D9CCEA] min-h-[84px]  hover:text-hover" role="tab" aria-selected="false" aria-controls="tab-panel-2" id="tab-2" tabindex="-1">
                <h3 class="flex-1 text-2xl font-semibold text-left text-zinc-800">New to Coding? No worries</h3>
                <div aria-hidden="true"><svg width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M24 1C36.7 1 47 11.3 47 24S36.7 47 24 47 1 36.7 1 24 11.3 1 24 1Z" stroke="#410098" stroke-width="2"/><path d="M17 24H31" stroke="#410098" stroke-width="2"/><path d="M24 17L31 24L24 31" stroke="#410098" stroke-width="2"/></svg></div>
              </button>
              <button class="btn rounded-bl-[30px] tab-button flex justify-between items-center px-6 py-5 w-full border-y-2 border-[#D9CCEA] min-h-[84px]  hover:text-hover" role="tab" aria-selected="false" aria-controls="tab-panel-3" id="tab-3" tabindex="-1">
                <h3 class="flex-1 text-2xl font-semibold text-left text-zinc-800">Looking for an extra challenge?</h3>
                <div aria-hidden="true"><svg width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M24 1C36.7 1 47 11.3 47 24S36.7 47 24 47 1 36.7 1 24 11.3 1 24 1Z" stroke="#410098" stroke-width="2"/><path d="M17 24H31" stroke="#410098" stroke-width="2"/><path d="M24 17L31 24L24 31" stroke="#410098" stroke-width="2"/></svg></div>
              </button>
            </nav>
            <div class="bg-transparent tab-content-container">
              <div class="flex flex-col justify-center items-start p-16 w-full bg-transparent tab-panel" role="tabpanel" id="tab-panel-1" aria-labelledby="tab-1">
                <div class="flex flex-col w-full max-w-[819px]">
                  <h2 class="text-4xl font-medium text-blue-800">Ready to get involved?</h2>
                  <p class="mt-6 text-xl text-gray-700">Already convinced? Great! Add your activity to the Code Week map, explore events near you, or run a session in your school or community.</p>
                </div>
              </div>
              <div class="hidden flex-col justify-center items-start p-16 w-full bg-transparent tab-panel" role="tabpanel" id="tab-panel-2" aria-labelledby="tab-2">
                <div class="flex flex-col w-full max-w-[819px]">
                  <h2 class="text-4xl font-medium text-blue-800">New to Coding? No worries</h2>
                  <p class="mt-6 text-xl text-gray-700">Beginner-friendly resources, step-by-step tutorials, and a supportive community to help you learn at your own pace.</p>
                </div>
              </div>
              <div class="hidden flex-col justify-center items-start p-16 w-full bg-transparent tab-panel" role="tabpanel" id="tab-panel-3" aria-labelledby="tab-3">
                <div class="flex flex-col w-full max-w-[819px]">
                  <h2 class="text-4xl font-medium text-blue-800">Looking for an extra challenge?</h2>
                  <p class="mt-6 text-xl text-gray-700">Join hackathons, contribute to open source, or tackle real-world problems in your community.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="flex flex-col w-full accordion-mobile lg:hidden">
            <div class="border-b-2 accordion-item border-[#D9CCEA]">
              <button class="btn accordion-trigger flex justify-between items-center px-6 py-5 w-full bg-violet-900 border-4 border-[#D9CCEA] rounded-t-[32px]  hover:text-hover" aria-expanded="false" aria-controls="accordion-panel-1">
                <h3 class="flex-1 text-2xl font-semibold text-left text-white">Ready to get involved?</h3>
                <div aria-hidden="true">
                  <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M24 1C36.7 1 47 11.3 47 24S36.7 47 24 47 1 36.7 1 24 11.3 1 24 1Z" stroke="#410098" stroke-width="2"/><path d="M17 24H31" stroke="#410098" stroke-width="2"/><path d="M24 17L31 24L24 31" stroke="#410098" stroke-width="2"/></svg>
                </div>
              </button>
              <div class="hidden accordion-content" id="accordion-panel-1">
                <div class="flex flex-col p-6 bg-white">
                  <h2 class="text-3xl font-medium text-blue-800">Ready to get involved?</h2>
                  <p class="mt-4 text-lg text-gray-700">Already convinced? Great! Add your activity to the Code Week map, explore events near you, or run a session in your school or community.</p>
                </div>
              </div>
            </div>
            <div class="border-b-2 accordion-item border-[#D9CCEA]">
              <button class="flex justify-between items-center px-6 py-5 w-full btn accordion-trigger border-x-4 border-[#D9CCEA]  hover:text-hover" aria-expanded="false" aria-controls="accordion-panel-2">
                <h3 class="text-2xl font-semibold text-left text-zinc-800">New to Coding? No worries</h3>
                <div aria-hidden="true">
                  <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M24 1C36.7 1 47 11.3 47 24S36.7 47 24 47 1 36.7 1 24 11.3 1 24 1Z" stroke="#410098" stroke-width="2"/><path d="M17 24H31" stroke="#410098" stroke-width="2"/><path d="M24 17L31 24L24 31" stroke="#410098" stroke-width="2"/></svg>
                </div>
              </button>
              <div class="hidden accordion-content" id="accordion-panel-2">
                <div class="flex flex-col p-6 bg-white">
                  <h2 class="text-3xl font-medium text-blue-800">New to Coding? No worries</h2>
                  <p class="mt-4 text-lg text-gray-700">Beginner-friendly resources, step-by-step tutorials, and a supportive community to help you learn at your own pace.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <button class="btn lg:rounded-bl-[30px] accordion-trigger flex justify-between items-center px-6 py-3.5 w-full border-4 border-[#D9CCEA] rounded-[32px]   hover:text-hover" aria-expanded="false" aria-controls="accordion-panel-3">
                <h3 class="flex-1 text-2xl font-semibold text-left text-zinc-800">Looking for an extra challenge?</h3>
               <div aria-hidden="true">
                  <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><path d="M24 1C36.7 1 47 11.3 47 24S36.7 47 24 47 1 36.7 1 24 11.3 1 24 1Z" stroke="#410098" stroke-width="2"/><path d="M17 24H31" stroke="#410098" stroke-width="2"/><path d="M24 17L31 24L24 31" stroke="#410098" stroke-width="2"/></svg>
                </div>
              </button>
              <div class="hidden accordion-content" id="accordion-panel-3">
                <div class="flex flex-col p-6 bg-white">
                  <h2 class="text-3xl font-medium text-blue-800">Looking for an extra challenge?</h2>
                  <p class="mt-4 text-lg text-gray-700">Push your skills with advanced challenges and real-world problems.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const tabs = document.querySelectorAll('.tab-button');
  const panels = document.querySelectorAll('.tab-panel');

  function updateTabs(activeIndex) {
    tabs.forEach((t, idx) => {
      const isActive = idx === activeIndex;
      t.setAttribute('aria-selected', isActive);
      t.tabIndex = isActive ? 0 : -1;
      const heading = t.querySelector('h3');
      const svgPaths = t.querySelectorAll('svg path');
      if (isActive) {
        t.classList.add('bg-violet-900');
        heading.classList.remove('text-zinc-800');
        heading.classList.add('text-white');
        svgPaths.forEach(path => path.setAttribute('stroke', '#FFD700'));
      } else {
        t.classList.remove('bg-violet-900');
        heading.classList.remove('text-white');
        heading.classList.add('text-zinc-800');
        svgPaths.forEach(path => path.setAttribute('stroke', '#410098'));
      }
    });
    panels.forEach((p, idx) => p.classList.toggle('hidden', idx !== activeIndex));
  }

  tabs.forEach((tab, i) => {
    tab.addEventListener('click', () => updateTabs(i));
  });

  // initialize the first active tab on load
  const initialActive = [...tabs].findIndex(t => t.getAttribute('aria-selected') === 'true');
  updateTabs(initialActive >= 0 ? initialActive : 0);

  const triggers = document.querySelectorAll('.accordion-trigger');
  triggers.forEach(trigger => {
    trigger.addEventListener('click', () => {
      const content = document.getElementById(trigger.getAttribute('aria-controls'));
      const expanded = trigger.getAttribute('aria-expanded') === 'true';
      triggers.forEach(t => {
        t.setAttribute('aria-expanded','false');
        document.getElementById(t.getAttribute('aria-controls')).classList.add('hidden');
      });
      trigger.setAttribute('aria-expanded', !expanded);
      content.classList.toggle('hidden', expanded);
    });
  });

  function sync() {
    const isDesktop = window.innerWidth >= 1024;
    document.querySelector('.tab-desktop').classList.toggle('hidden', !isDesktop);
    document.querySelector('.accordion-mobile').classList.toggle('hidden', isDesktop);
  }
  sync();
  window.addEventListener('resize', sync);
});
</script>
</div>
    </section>

@endsection
