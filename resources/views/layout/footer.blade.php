@php
    $hideStickyFooterOnPages = [
      'activities-locations',
      'add',
    ];
@endphp

<footer id="page-footer" class="border-t-[3px] border-primary bg-white">
    <div class="py-10 md:py-16 border-b">
        <div class="codeweek-container-lg flex flex-col xl:flex-row xl:justify-between">
            <div class="flex flex-col justify-between">
                <div>
                    <div class="mb-6">
                        <a href="/">
                            <img src="/images/footer_logo.svg" class="w-[208px] md:w-[329px] xl:w-full" alt="CodeWeek">
                        </a>
                    </div>
                    <div class="flex gap-[22px] mb-10 xl:mb-0">
                        <a class="cookweek-link hover-underline" href="https://www.linkedin.com/company/codeweek/" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/linkedin.svg" alt="LinkedIn" />
                        </a>
                        <a class="cookweek-link hover-underline" href="https://twitter.com/CodeWeekEU" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/twitter.svg" alt="X" />
                        </a>
                        <a class="cookweek-link hover-underline" href="https://www.instagram.com/codeweekeu/" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/instagram.svg" alt="Instagram" />
                        </a>
                        <a class="cookweek-link hover-underline" href="https://www.youtube.com/channel/UCw30ZaWtCvGb4yudW6tCXAA" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/youtube.svg" alt="Youtube" />
                        </a>
                        <a class="cookweek-link hover-underline" href="https://www.facebook.com/codeEU/" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/facebook.svg" alt="Facebook" />
                        </a>
                    </div>
                </div>
                <img width="200px" alt="Funded by the European Union Logo" src="/images/EU_logo_new.jpg" class="mb-10 xl:mb-0">
            </div>

            <div class="grid md:grid-cols-3 gap-8 xl:gap-[120px]">
                <div>
                    <p class="font-normal font-['Blinker'] text-xl leading-[30px] mb-6 p-0">@lang('footer.about_us')</p>
                    <ul class="m-0 p-0">
                        <li class="mb-4">
                            <a href="/about" class="cookweek-link hover-underline">@lang('footer.about_code_week')</a>
                        </li>
                        <li class="mb-4">
                            <a href="/our-values" class="cookweek-link hover-underline">@lang('footer.our_values')</a>
                        </li>
                        <li class="mb-4">
                            <a href="/scoreboard" class="cookweek-link hover-underline">@lang('footer.statistics')</a>
                        </li>
                        <li class="mb-4">
                            <a href="/partners" class="cookweek-link hover-underline">@lang('footer.partners_sponsors')</a>
                        </li>
                        <li class="mb-4">
                            <a href="/community" class="cookweek-link hover-underline">@lang('footer.community')</a>
                        </li>
                        {{-- <li>
                            <a href="/" class="cookweek-link hover-underline">Contact us</a>
                        </li> --}}
                    </ul>
                </div>
                <div>
                    <p class="font-normal font-['Blinker'] text-xl leading-[30px] mb-6 p-0">@lang('footer.quick_links')</p>
                    <ul class="m-0 p-0">
                        <li class="mb-4">
                            <a href="/register" class="cookweek-link hover-underline">@lang('footer.register')</a>
                        </li>
                        <li class="mb-4">
                            <a href="/events" class="cookweek-link hover-underline">@lang('footer.activities_events')</a>
                        </li>
                        <li class="mb-4">
                            <a href="/resources/learn" class="cookweek-link hover-underline">@lang('footer.learn_teach')</a>
                        </li>
                        <li class="mb-4">
                            <a href="/blog" class="cookweek-link hover-underline">@lang('footer.news')</a>
                        </li>
                        <li class="mb-4">
                            <a href="https://mailp.ro/f/OCxYWv" target="_blank" class="cookweek-link hover-underline">@lang('footer.newsletter_signup')</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-normal font-['Blinker'] text-xl leading-[30px] mb-6 p-0">@lang('footer.educational_resources')</p>
                    <ul class="m-0 p-0">
                        <li class="mb-4">
                            <a href="/resources/CodingAtHome" class="cookweek-link hover-underline">@lang('footer.coding_home')</a>
                        </li>
                        <li class="mb-4">
                            <a href="/podcasts" class="cookweek-link hover-underline">@lang('footer.podcast')</a>
                        </li>
                        {{-- <li class="mb-4">
                            <a href="/" class="cookweek-link hover-underline">Webinars</a>
                        </li> --}}
                        {{-- <li class="mb-4">
                            <a href="/" class="cookweek-link hover-underline">Careers in Digital</a>
                        </li> --}}
                        <li class="mb-4">
                            <a href="/challenges" class="cookweek-link hover-underline">@lang('footer.challenges')</a>
                        </li>
                        <li>
                            <a href="/hackathons" class="cookweek-link hover-underline">@lang('footer.hackathons')</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="codeweek-container-lg pt-8 pb-20 md:pb-8 xl:py-4 flex flex-col xl:flex-row gap-8 justify-between">
        <ul class="m-0 p-0 flex-shrink-0 flex flex-col items-start xl:items-center xl:flex-row gap-4 xl:gap-10">
            <li>
                <a href="/privacy" class="cookweek-link hover-underline !text-sm">@lang('footer.privacy_policy')</a>
            </li>
            <li>
                <a href="/cookie" class="cookweek-link hover-underline !text-sm">@lang('footer.cookies_policy')</a>
            </li>
            {{-- <li>
                <a href="/" class="cookweek-link hover-underline !text-sm">Accessibility</a>
            </li> --}}
            {{-- <li>
                <a href="/" class="cookweek-link hover-underline !text-sm">Terms & Conditions</a>
            </li> --}}
            {{-- <li>
                <a href="/" class="cookweek-link hover-underline !text-sm">Sitemap</a>
            </li> --}}
        </ul>
        <p class="p-0 text-slate font-['Montserrat'] font-medium text-sm mb-8 md:mb-0">
            ©CodeWeek 2025 | @lang('footer.designed_and_developed_by') <a href="https://www.matrixinternet.ie/" target="_blank" class="cookweek-link hover-underline !text-sm">Matrix Internet</a> . @lang('footer.all_rights_reserved')
        </p>
    </div>
    <div
        id="scroll-top-btn"
        class="fixed z-[100] -bottom-2 hover:bottom-0 right-[20px] bg-yellow hover:bg-primary p-3 pb-4 md:p-4 md:pb-6 rounded-t-full duration-300 cursor-pointer"
    >
        <img class="icon-rotate-270 w-6 h-6 md:w-8 md:h-8" src="/images/arrow-up-icon.svg" />
    </div>

    @if (!collect($hideStickyFooterOnPages)->contains(fn($path) => request()->is($path)))
        <div id="footer-scroll-activity" class="fixed md:hidden bottom-0 left-0 border-t-2 border-primary flex justify-center py-4 px-[44px] w-full bg-white z-[99]">
            <a class="bg-primary hover:bg-hover-orange rounded-full py-2.5 px-6 font-['Blinker'] duration-300 w-full text-center" href="{{ Auth::check() ? '/add' : '/login' }}">
                <span class="text-base leading-7 font-semibold text-[#20262C]">@lang('menu.register_activity')</span>
            </a>
        </div>
    @endif
</footer>

@push('scripts')
<script type="text/javascript">
  // Scroll Top
  const scrollTopBtn = document.getElementById("scroll-top-btn");

  scrollTopBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });

  // toggle bottom sticky bar when scroll on mobile
  const scrollFooterActivity = document.getElementById('footer-scroll-activity');

  window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    if (scrollFooterActivity) {
      if (scrollTop > 0) {
        scrollFooterActivity.classList.add('visible');
      } else {
        scrollFooterActivity.classList.remove('visible');
      }
    }
  });
</script>
@endpush
