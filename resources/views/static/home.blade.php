@extends('layout.new_base')

@section('content')
    <section id="codeweek-homepage" class="codeweek-page font-['Blinker']">
      <section class="relative flex overflow-hidden">
          <div id="slider-wrapper" class="flex relative transition-all duration-500" style="width: fix-content">
            @foreach ($activities as $index => $activity)
              <div id="activity-{{ $index }}" class="relative bg-secondary-gradient overflow-hidden md:px-16 pb-16 pt-80 md:py-[140px] w-[calc(100vw-15px)] flex-shrink-0">
                  <div class="codeweek-container-lg flex items-end md:items-center">
                      <div class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                          <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                              {{ $activity->title }}
                          </h2>
                          <a
                            id="activity-countdown-link"
                            class="inline-block rounded-full py-4 px-6 md:px-10 text-white mb-4 font-semibold text-[16px] w-full md:w-auto bg-gray-200 text-center"
                            href="{{ $activity->url }}"
                          >
                            <span>@lang('home.count_down'):</span>
                            <span class="ml-1" id="activity-countdown-text">0 @lang('home.mins')</span>
                          </a>
                          <p class="text-xl md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                              {{ $activity->description }}
                          </p>
                          <a
                            class="inline-block bg-primary rounded-full py-4 px-6 md:px-10 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300 hover:bg-primary/80"
                            href="{{ $activity->url }}"
                          >
                              @lang('home.explore_event')
                          </a>
                          <div class="absolute top-0 -translate-y-1/2 bg-yellow py-3 md:py-4 px-8 md:px-10 rounded-full text-secondary font-semibold text-[16px] m:dtext-base">
                              #EUCodeWeek
                          </div>
                      </div>
                      <img
                        class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                        loading="lazy"
                        src="{{ $activity->picture_path() }}"
                        style="clip-path: ellipse(71% 73% at 40% 20%);"
                      />
                      <img
                        class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                        loading="lazy"
                        src="{{ $activity->picture_path() }}"
                        style="clip-path: ellipse(70% 140% at 70% 25%);"
                      >
                      <img src="/images/homepage/robot.png" class="absolute right-0 bottom-0 hidden md:block" />

                    </div>
                </div>
              @endforeach
            </div>

            <button
              id="slider-prev-btn"
              class="absolute top-40 md:top-1/2 -translate-y-1/2 -left-2 hover:left-0 bg-white hover:bg-[#F95C22] p-4 pl-6 rounded-r-full duration-300 hidden"
            >
              <img class="rotate-180 w-8 h-8" src="/images/arrow-right-icon.svg" />
            </button>
            <button
              id="slider-next-btn"
              class="absolute top-40 md:top-1/2 -translate-y-1/2 -right-2 hover:right-0 bg-white hover:bg-[#F95C22] p-4 pr-6 rounded-l-full duration-300 hidden"
            >
              <img class="w-8 h-8" src="/images/arrow-right-icon.svg" />
            </button>
        </section>

        <section class="animation-section relative bg-yellow-2">
            <div class="absolute w-full h-full bg-white md:hidden" style="clip-path: ellipse(100% 58% at 38% 39%)"></div>
            <div class="absolute w-full h-full bg-white hidden md:block" style="clip-path: ellipse(70% 60% at 50% 40%);"></div>
            <div class="relative z-10 codeweek-container-lg flex flex-col-reverse md:flex-row items-center py-16 pb-32 md:pb-48 gap-12">
                <div class="flex-1">
                  <div class="inline-block observer-element relative">
                    <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/homepage/toolkits.png" />
                    <img
                      class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                      loading="lazy"
                      src="/images/homepage/shape.png"
                      style="transform: translate(-16px, -24px)"
                    />
                  </div>
                </div>
                <div class="flex-1">
                    <h2 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                        @lang('home.toolkits_title')
                    </h2>
                    <p class="text-[#333E48] text-lg md:text-xl leading-7 p-0 mb-10">
                      @lang('home.toolkits_description')
                    </p>
                    <div class="flex flex-col xl:flex-row gap-4">
                        <a
                          class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#1C4DA1] hover:text-white"
                          href="/toolkits"
                        >
                            <span>@lang('home.toolkits_button1')</span>
                            <img src="/images/arrow-right-icon.svg" />
                        </a>
                        <a
                          class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#1C4DA1] hover:text-white"
                          href="/toolkits"
                        >
                          <span>@lang('home.toolkits_button2')</span>
                            <img src="/images/arrow-right-icon.svg" />
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative bg-yellow-2">
            <div class="relative z-10 codeweek-container-lg flex flex-col md:flex-row items-center py-16 md:py-[186px] gap-12">
                <div class="flex-1">
                    <img loading="lazy" src="/images/homepage/minecraftlogo.png" />
                    <p class="text-left text-lg md:text-2xl md:leading-8 text-[#20262C] p-0 mb-6">
                        @lang('home.minecraft_description1')
                    </p>
                    <p class="text-[16px] md:text-lg text-[#333E48] p-0 mb-8">
                        @lang('home.minecraft_description2')
                    </p>
                    <a
                      class="inline-flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#1C4DA1] hover:text-white"
                      href="https://www.codeweekcoders.eu/"
                    >
                        <span>@lang('home.minecraft_button')</span>
                        <img src="/images/arrow-right-icon.svg" />
                    </a>
                </div>
                <div class="observer-element flex-1">
                    <img class="animation-element fade-scale-right duration-700" loading="lazy" src="/images/homepage/minecraft1.png" />
                </div>
            </div>
        </section>

        <section class="animation-section relative overflow-hidden">
            <div class="relative z-10 codeweek-container-lg flex flex-col-reverse md:flex-row items-center py-16 gap-12">
                <div class="flex-1">
                  <div class="inline-block observer-element relative">
                    <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/homepage/activity.png" />
                    <img
                      class="animation-element move-background duration-[1.5s] absolute top-0 left-0 w-full max-w-xl"
                      loading="lazy"
                      src="/images/homepage/shape.png"
                      style="transform: translate(-16px, -24px)"
                    />
                  </div>
                </div>
                <div class="flex-1">
                    <h2 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                      @lang('home.activity_title')
                    </h2>
                    <p class="text-[#333E48] text-lg md:text-xl leading-7 p-0 mb-10">
                      @lang('home.activity_description')
                    </p>
                    <div class="flex flex-col xl:flex-row gap-4">
                        <a
                          class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#1C4DA1] hover:text-white"
                          href="/add"
                        >
                            <span>@lang('home.activity_button1')</span>
                            <img src="/images/arrow-right-icon.svg" />
                        </a>
                        <a
                          class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#1C4DA1] hover:text-white"
                          href="/events"
                        >
                            <span>@lang('home.activity_button2')</span>
                            <img src="/images/arrow-right-icon.svg" />
                        </a>
                    </div>
                </div>
            </div>
            <div
              class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-36 w-28 md:w-72 h-28 md:h-72 bg-[#99E1F4] rounded-full"
              style="transform: translate(-16px, -24px)"
            ></div>
            <div
              class="animation-element move-background duration-[1.5s] absolute z-0 bottom-12 right-20 w-28 h-28 hidden md:block bg-[#99E1F4] rounded-full"
              style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section class="relative overflow-hidden">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden" style="clip-path: ellipse(170% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden md:block" style="clip-path: ellipse(88% 90% at 50% 90%);"></div>
            <div class="relative z-10 codeweek-container-lg flex flex-col md:flex-row items-center pt-28 md:pt-48 pb-16 gap-12">
                <div class="flex-1">
                    <h2 class="text-white text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6">
                      @lang('home.resouce_title')
                    </h2>
                    <p class="text-white text-lg md:text-xl leading-7 p-0 mb-10">
                      @lang('home.resouce_description')
                    </p>
                    <div class="flex flex-col xl:flex-row gap-4">
                        <a
                          class="flex justify-center items-center gap-2 text-white border-solid border-2 border-white rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#061b45] hover:text-white group"
                          href="/resources/CodingAtHome"
                        >
                            <span>@lang('home.resouce_button1')</span>
                            <div class="flex gap-2 w-4 overflow-hidden">
                                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                            </div>
                        </a>
                        <a
                          class="flex justify-center items-center gap-2 text-white border-solid border-2 border-white rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#061b45] hover:text-white group"
                          href="/training"
                        >
                            <span>@lang('home.resouce_button2')</span>
                            <div class="flex gap-2 w-4 overflow-hidden">
                                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="observer-element flex-1 flex justify-center relative">
                    <img
                        class="animation-element fade-scale-bottom duration-700 w-full z-10"
                        loading="lazy"
                        src="/images/homepage/resource-training.png"
                    />
                    <img
                        class="animation-element fade-scale-bottom duration-700 absolute z-0 -bottom-10 sm:-bottom-16 -right-16 sm:-right-60 w-[184px] sm:w-[324px]"
                        src="/images/homepage/resource-training-icon.png"
                    />
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
  // Animation
  const observerElements = document.querySelectorAll('.observer-element');

  observerElements?.forEach(observerElement => {
    const animationElements = observerElement.querySelectorAll(".animation-element");

    // Fade Scale animation
    animationElements?.forEach(element => {
      let classList = [];

      if (element.classList.contains('fade-scale-right')) {
        classList = ['scale-0', 'opacity-0', 'translate-x-1/2'];
      }
      if (element.classList.contains('fade-scale-bottom')) {
        classList = ['scale-0', 'opacity-0', 'translate-y-1/2'];
      }

      element.classList.add(...classList);

      const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) {
          element.classList.remove(...classList);
        }
      }, { threshold: 0 });

      observer.observe(observerElement);
    });
  });

  const sectionElements = document.querySelectorAll('.animation-section');

  sectionElements?.forEach(section => {
    const animationElements = section.querySelectorAll(".animation-element");

    // Move Background animation
    animationElements?.forEach(element => {
      if (!element.classList.contains('move-background')) return;

      let placementX = 'left';
      let placementY = 'bottom';

      const handleMoveShape = () => {
        if (placementX === 'left' && placementY === 'top') {
          element.style.transform = 'translate(-16px, -24px)';
        }
        if (placementX === 'left' && placementY === 'bottom') {
          element.style.transform = 'translate(-32px, 16px)';
        }
        if (placementX === 'right' && placementY === 'top') {
          element.style.transform = 'translate(32px, -16px)';
        }
        if (placementX === 'right' && placementY === 'bottom') {
          element.style.transform = 'translate(16px, 32px)';
        }
      }

      const observer = new IntersectionObserver(([entry]) => {
        if (entry.isIntersecting) handleMoveShape();
      }, { threshold: 0 });

      observer.observe(section);

      section.addEventListener('mousemove', (event) => {
        const { top, left, height, width } = section.getBoundingClientRect();
        const isOnLeft = (width / 2) > (event.clientX - left);
        const isOnTop = (height / 2) > (event.clientY - top);
        placementX = isOnLeft ? 'right' : 'left';
        placementY = isOnTop ? 'bottom' : 'top';
        handleMoveShape();
      });
    });
  });
</script>
@endpush

@push('scripts')
<script type="text/javascript">
  const activities = @json($activities);
  console.log('activities', activities);
  const scrollBarWidth = Math.max(window.innerWidth - document.body.clientWidth, 0);

  // Slider
  activities.forEach((activity, index) => {
    const activityEl = document.querySelector(`#activity-${index}`);
    if (activityEl) {
      activityEl.style.width = `calc(100vw - ${scrollBarWidth}px)`;
    }
  });

  let currentIndex = 0;
  const prevButton = document.getElementById('slider-prev-btn');
  const nextButton = document.getElementById('slider-next-btn');

  if (activities.length > 1) {
    nextButton?.classList.remove('hidden');
  }

  const handleMove = (idx) => {
    const slider = document.getElementById('slider-wrapper');
    if (slider) {
      slider.style.transform = `translateX(calc(-${idx * 100}vw + ${idx * scrollBarWidth}px))`
    }
    if (idx === 0) prevButton?.classList.add('hidden');
    else prevButton?.classList.remove('hidden');

    if (idx === activities.length - 1) nextButton?.classList.add('hidden');
    else nextButton?.classList.remove('hidden');
  }

  prevButton.addEventListener('click', () => {
    currentIndex = Math.max(currentIndex - 1 , 0);
    handleMove(currentIndex);
  });
  nextButton.addEventListener('click', () => {
    currentIndex = Math.min(currentIndex + 1 , activities.length - 1);
    handleMove(currentIndex);
  });

  // Count down
  const daysText = @json(__('home.days'));
  const hoursText = @json(__('home.hours'));
  const minsText = @json(__('home.mins'));

  const formatCountDown = (timeLeft) => {
      let left = Math.max(timeLeft, 0);
      const days = Math.floor(left / (24 * 60 * 60 * 1000));

      left -= days * (24 * 60 * 60 * 1000);
      const hours = Math.floor(left / (60 * 60 * 1000));

      left -= hours * (60 * 60 * 1000);
      const mins = Math.floor(left / (60 * 1000));

      left -= mins * (60 * 1000);
      const secs = Math.floor(left / 1000);

      const list = [];
      if (days > 0) list.push(`${days} ${daysText}`);
      if (hours > 0) list.push(`${hours} ${hoursText}`);
      list.push(`${mins} ${minsText}`);

      return list.join(', ');
  }

  activities.forEach((activity, index) => {
    const countDonwLinkEl = document.querySelector(`#activity-${index} #activity-countdown-link`);
    const countDownTextEl = countDonwLinkEl?.querySelector('#activity-countdown-text');
    if (!countDownTextEl) return;
    
    let timeLeft = new Date(activity.end_date).getTime() - Date.now();
    if (!activity.end_date) timeLeft = 0;

    if (timeLeft <= 0) {
      countDonwLinkEl.removeAttribute('href');
      countDonwLinkEl.classList.remove('bg-count-gradient');
      countDonwLinkEl.classList.add('bg-gray-200');
    } else {
      countDonwLinkEl.classList.add('bg-count-gradient');
      countDonwLinkEl.classList.remove('bg-gray-200');
    }
    countDownTextEl.textContent = formatCountDown(timeLeft);

    setInterval(() => {
      timeLeft -= 1000;
      if (timeLeft <= 0) {
        countDonwLinkEl.removeAttribute('href');
        countDonwLinkEl.classList.remove('bg-count-gradient');
        countDonwLinkEl.classList.add('bg-gray-200');
      }
      countDownTextEl.textContent = formatCountDown(timeLeft);
    }, 60* 1000);
  });
</script>
@endpush
