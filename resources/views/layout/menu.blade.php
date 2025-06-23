<header class="sticky top-0 pt-16 md:pt-12 !px-5 md:!px-0 pb-5 z-[1000] border-b-[3px] border-primary">
  <div class="codeweek-container-lg flex items-center gap-6">
      <div id="logo-wrapper" class="relative w-full flex justify-center sm:block sm:w-auto">
          <a id="primary-menu-trigger" class="absolute sm:static sm:pr-6 -left-6 top-1/2 -translate-y-1/2 sm:translate-y-0" href="/">
              <img class="menu" src="/images/menu_icon.svg">
              <img class="close hide" src="/images/close_menu_icon.svg">
          </a>
          <a id="logo" href="/">
              <img src="/images/logo_icon.svg" alt="CodeWeek">
          </a>
      </div>

      <nav id="primary-menu" class="flex-grow font-['Montserrat']">
          <ul class="max-xl:flex max-xl:flex-col max-xl:!items-start max-xl:overflow-auto max-xl:pt-6 main-menu">
              <li class="!pt-16 md:!pt-12 !pb-8 xl:hidden max-xl:w-full">
                  <div class="relative flex justify-center">
                    <a id="primary-menu-trigger" class="absolute xl:static left-0 sm:left-3 top-1/2 sm:top-2 -translate-y-1/2 sm:translate-y-0" href="/">
                        <img class="close hide" src="/images/close_menu_icon.svg">
                    </a>
                    <a id="logo" href="/">
                        <img src="/images/logo_icon.svg" alt="CodeWeek">
                    </a>
                  </div>
              </li>

              {{-- language --}}
              <li class="main-menu-item xl:hidden">
                  <a
                      class="cookweek-link hover-underline !text-[#1C4DA1] !text-[16px]"
                      href="javascript:void(null);"
                  >
                      <span class="lang-value">{{App::getLocale()}}</span>
                      <span class="lang-title">@lang('menu.select_language')</span>
                      <img class="arrow-icon" src="/images/chevron-down-icon.svg" alt="">
                  </a>

                  <ul class="sub-menu lang-list">
                      @foreach ($locales as $key => $value)
                          <li class="lang-menu-item {{ App::getLocale() === $value ? 'selected' : '' }}">
                              <a class="relative" href="/setlocale/?locale={{$value}}">
                                @lang('base.languages_menu.' . $value)
                                @if(App::getLocale() === $value)
                                  <img
                                    class="absolute right-4 top-1/2 -translate-y-1/2"
                                    src="/images/check.svg"
                                    alt=""
                                  >
                                @endif
                              </a>
                          </li>
                      @endforeach
                  </ul>
              </li>

              {{-- search side --}}
              <li class="main-menu-item xl:hidden w-full">
                <div class="relative w-full">
                  <input
                      class="pl-6 pr-14 py-3 w-full rounded-full border-solid border-2 border-[#A4B8D9] text-[#333E48]"
                      placeholder="@lang('menu.search_site')"
                  />
                  <button class="absolute right-2 top-1/2 -translate-y-1/2 p-2 duration-300 hover:bg-[#E8EDF6] rounded-full">
                    <img class="text-dark-blue" src="/images/search-icon.svg" alt="">
                  </button>
                </div>
              </li>

              {{-- activities --}}
              <li class="main-menu-item">
                  <a
                      class="cookweek-link hover-underline !text-[#1C4DA1] !text-[16px]"
                      href="javascript:void(null);"
                  >
                      @lang('menu.events')
                      <img class="arrow-icon" src="/images/chevron-down-icon.svg" alt="">
                  </a>
                  <ul class="sub-menu">
                      <li class="menu-title max-xl:!hidden">
                        @lang('menu.events')
                        <img src="/images/arrow-right-icon.svg" class="menu-title-icon" />
                      </li>
                      <li><a class="cookweek-link hover-underline" href="{{route('events_map')}}">@lang('menu.map')</a></li>
                      <li><a class="cookweek-link hover-underline" href="{{route('featured_activities')}}">@lang('menu.featured_activities')</a></li>
                      <li><a class="cookweek-link hover-underline" href="{{route('create_event')}}">@lang('menu.add_event')</a></li>
                      <li><a class="cookweek-link hover-underline" href="{{route('scoreboard')}}">@lang('event.scoreboard_by_country')</a></li>
                  </ul>
              </li>

              {{-- resources --}}
              <li class="main-menu-item">
                  <a
                      class="cookweek-link hover-underline !text-[#1C4DA1] !text-[16px] cursor-pointer"
                      onclick="document.body.clientWidth > 1280 && (window.location.href='{{ route('educational-resources') }}')"
                  >
                      @lang('menu.resources')
                      <img class="arrow-icon" src="/images/chevron-down-icon.svg" alt="">
                  </a>
                  <ul class="sub-menu">
                      <li class="menu-title max-xl:!hidden">
                          <a class="flex items-center gap-2"  href="{{route('educational-resources')}}">
                              @lang('menu.resources')
                              <img src="/images/arrow-right-icon.svg" class="menu-title-icon" />
                          </a>
                      </li>
                      <li class="flex flex-col xl:flex-row gap-16">
                          <div class="flex-grow flex flex-col gap-4 mb-1 xl:mb-0 max-xl:w-full">
                              <div class="hidden xl:block text-[#20262C] font-semibold text-lg">@lang('menu.resources')</div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('coding@home')}}">@lang('menu.coding@home')</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="/podcasts">Podcasts</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('online-courses')}}">Online Courses</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('training.index')}}">@lang('menu.training')</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('resources_all')}}">@lang('menu.learn')</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('toolkits')}}">@lang('menu.toolkits')</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('webinars')}}">@lang('menu.webinars')</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('girls-in-digital-week')}}">@lang('menu.girls_in_digital')</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('dream-jobs-in-digital')}}">@lang('menu.careers_in_digital')</a></div>
                            </div>
                            <div class="flex-grow flex flex-col gap-4 max-xl:w-full">
                              <div class="hidden xl:block text-[#20262C] font-semibold text-lg whitespace-nowrap">@lang('menu.game_and_competitions')</div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('challenges')}}">@lang('menu.challenges')</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('hackathons')}}">Hackathons</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('dance')}}">@lang('snippets.dance.menu')</a></div>
                              <div><a class="cookweek-link hover-underline !px-0" href="{{route('treasure-hunt')}}">@lang('menu.treasure-hunt')</a></div>
                          </div>
                          <div class="relative flex-grow hidden xl:flex flex-col gap-4 w-60 mb-2">
                              <img class="w-full h-full rounded-lg object-cover" src="/images/homepage/dream-job.png" alt="">
                              <div
                                  class="absolute w-full h-full top-0 left-0"
                                  style="background: linear-gradient(180deg, rgba(28, 77, 161, 0) 45.36%, #1C4DA1 66.72%);"
                              ></div>
                              <div class="absolute w-full bottom-0 left-0 p-4">
                                  <div class="text-white text-xl font-semibold mb-1">@lang('menu.careers_in_digital')</div>
                                  <div class="text-white text-[16px] font-medium mb-2">
                                      Meet our role models and find your dream job
                                  </div>
                                  <a class="block w-full bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300" href="{{route('dream-jobs-in-digital')}}">
                                    <span class="text-base leading-7 font-semibold text-black normal-case">
                                        See more
                                    </span>
                                  </a>
                              </div>
                          </div>
                      </li>
                  </ul>
              </li>

              {{-- commnity --}}
              <li class="main-menu-item menu-item">
                  <a class="cookweek-link hover-underline !text-[#1C4DA1] !text-[16px]" href="{{route('community')}}">
                      @lang('community.titles.0')
                  </a>
              </li>

              {{-- schools --}}
              <li class="main-menu-item">
                  <a
                      class="cookweek-link hover-underline !text-[#1C4DA1] !text-[16px]"
                      href="javascript:void(null);"
                  >
                      @lang('menu.schools')
                      <img class="arrow-icon" src="/images/chevron-down-icon.svg" alt="">
                  </a>
                  <ul class="dropdown-menu sub-menu">
                      <li class="menu-title max-xl:!hidden">
                        @lang('menu.schools')
                        <img src="/images/arrow-right-icon.svg" class="menu-title-icon" />
                      </li>
                      <li><a class="cookweek-link hover-underline" href="{{route('schools')}}">@lang('menu.why')?</a></li>
                      <li><a class="cookweek-link hover-underline" href="/remote-teaching">@lang('remote-teaching.remote-teaching')</a></li>
                  </ul>
              </li>

              {{-- about --}}
              <li class="main-menu-item">
                  <a
                      class="cookweek-link hover-underline !text-[#1C4DA1] !text-[16px]"
                      href="javascript:void(null);"
                  >
                      @lang('menu.about')
                      <img class="arrow-icon" src="/images/chevron-down-icon.svg" alt="">
                  </a>
                  <ul class="sub-menu">
                      <li class="menu-title max-xl:!hidden">
                        @lang('menu.about')
                        <img src="/images/arrow-right-icon.svg" class="menu-title-icon" />
                      </li>
                      <li><a class="cookweek-link hover-underline" href="/about">Code Week</a></li>

                      <li><a class="cookweek-link hover-underline" href="{{route('codeweek4all')}}">Code Week 4 All</a></li>
                      <li><a class="cookweek-link hover-underline" href="/treasure-hunt">@lang('snippets.treasure-hunt.menu')</a></li>
                      <li><a class="cookweek-link hover-underline" href="/why-coding">@lang('why-coding.titles.0')</a></li>
                      <li><a class="cookweek-link hover-underline" href="/our-values">@lang('menu.values')</a></li>
                      <li><a class="cookweek-link hover-underline" href="/partners">@lang('about.partners_and_sponsors')</a></li>
                  </ul>
              </li>

              {{-- blog --}}
              <li class="main-menu-item menu-item">
                  <a
                      class="cookweek-link hover-underline !text-[#1C4DA1] !text-[16px]"
                      href="https://codeweek.eu/blog/"
                      rel="noreferer noopener"
                  >
                      @lang('menu.blog')
                  </a>
              </li>

              {{-- My account --}}
              @if (Auth::check())
                  <li class="main-menu-item xl:!hidden">
                      <a
                          class="cookweek-link hover-underline !text-[#1C4DA1] !text-[16px]"
                          href="javascript:void(null);"
                      >
                          My account
                          <img class="arrow-icon" src="/images/chevron-down-icon.svg" alt="">
                      </a>
                      <ul class="sub-menu">
                          @include('layout.menu-profile-dropdown')
                      </ul>
                  </li>
              @endif

              {{-- actions --}}
              <li class="main-menu-item flex-grow flex h-full items-end xl:hidden max-xl:w-full">
                  <div class="flex flex-col gap-4 items-center w-full pb-12 pt-5">
                      @if (Auth::check())
                          <a class="bg-primary hover:bg-hover-orange rounded-full py-2.5 px-6 font-['Blinker'] duration-300 w-full text-center" href="/add">
                              <span class="text-[16px] leading-7 font-semibold">@lang('menu.register_activity')</span>
                          </a>
                      @else
                          <a class="border-2 border-[#1C4DA1] hover:bg-[#E8EDF6] duration-300 !text-[#1C4DA1] rounded-full px-6 py-[7px] w-full text-center" href="/login">
                              <span class="text-[16px] leading-[30px] font-semibold">
                                  @lang('menu.login') / @lang('menu.signup')
                              </span>
                          </a>
                      @endif
                  </div>
              </li>
          </ul>
      </nav>
      <div id="right-menu" class="flex gap-2">
          <span id="search-menu-trigger-show" class="border-2 border-[#1C4DA1] hover:bg-[#E8EDF6] duration-300 rounded-full p-[13px] font-['Blinker'] cursor-pointer">
              <img class="text-dark-blue" src="/images/search-icon.svg" alt="">
          </span>
          @if (Auth::check())
              <div class="bg-[#1C4DA1] rounded-full p-[13px] font-['Blinker'] hover:bg-hover-blue duration-300 round-button-user-menu menu-trigger user-menu">
                  <a href="javascript:void(null);">
                      <img src="/images/user_icon.svg" class="text-white">
                  </a>
                  <ul class="menu-dropdown">
                      @include('layout.menu-profile-dropdown')
                  </ul>
              </div>
          @else
              <a class="bg-[#1C4DA1] hover:bg-[#001E52] rounded-full p-[13px] font-['Blinker'] duration-300"  href="/login">
                  <img src="/images/user_icon.svg" alt="Sign-in" class="text-white">
              </a>
          @endif

          <a class="max-xl:!hidden bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300" href="/add">
              <span class="text-base leading-7 font-semibold text-black normal-case">
                  @lang('menu.register_activity')
              </span>
          </a>

          <div id="tools" class="h-[50px]">
              <div class="menu-trigger lang-menu relative flex items-center gap-1 cursor-pointer px-2 h-full menu-item">
                  <a class="cookweek-link hover-underline flex items-center gap-1 !text-[#1C4DA1] !text-[16px] font-semibold font-['Montserrat']" href="javascript:void(null);">
                    {{App::getLocale()}}
                    <img class="arrow-icon" src="/images/chevron-down-icon.svg" alt="">
                  </a>


                  <div class="menu-dropdown lang-menu-dropdown absolute top-14">
                      <ul class="lang-sub-menu">
                          @foreach ($locales as $key => $value)
                              <li class="lang-menu-item {{ App::getLocale() === $value ? 'selected' : '' }}">
                                  <a class="cookweek-link {{ App::getLocale() === $value ? 'cursor-default' : 'hover-underline' }} !capitalize"
                                     href="/setlocale/?locale={{$value}}">
                                      @lang('base.languages_menu.' . $value)
                                      <img class="arrow-icon {{ App::getLocale() === $value ? '' : 'hidden' }}" src="/images/check.svg" alt="">
                                  </a>
                              </li>
                          @endforeach
                      </ul>
                  </div>
              </div>
          </div>
      </div>

      <div
        id="search-menu"
        class="fixed left-0 top-[139px] md:top-[123px] z-50 flex flex-col items-center justify-center w-full p-6 h-[calc(100dvh-139px)] md:h-[calc(100dvh-123px)] bg-white font-['Montserrat'] duration-300"
        style="display: none;"
      >
        <div class="flex-shrink-0 flex justify-end w-full">
          <button
            id="search-menu-trigger-hide"
            class="block bg-[#FFD700] hover:bg-[#F95C22] rounded-full p-4 duration-300"
          >
            <img class="w-6 h-6" src="/images/close_menu_icon.svg">
          </button>
        </div>
        <div class="flex-grow flex flex-col justify-center max-w-[720px] w-full mx-auto pb-14">
          <div class="text-4xl text-[#1C4DA1] font-medium mb-10">
            @lang('menu.what_you_looking_for')
          </div>
          <div class="relative w-full">
            <input
              id="search-menu-input"
              class="pl-6 pr-48 py-4 w-full text-[16px] rounded-full border-solid border-2 border-[#A4B8D9] text-[#333E48] font-semibold"
              placeholder="@lang('menu.type_to_search')"
            />
            <button
              class="absolute right-1.5 top-1/2 text-[18px] -translate-y-1/2 px-[60px] py-3 bg-[#F95C22] hover:bg-[#FB9D7A] rounded-full font-semibold font-['Blinker'] duration-300"
              onclick="const searchValue = document.getElementById('search-menu-input')?.value?.trim() || ''; window.location.href = searchValue ? `/search?searchQuery=${searchValue}` : '/search'"
            >
              @lang('menu.search')
            </button>
          </div>
        </div>
      </div>
  </div>
</header>
