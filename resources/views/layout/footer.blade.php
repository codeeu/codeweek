<footer>
    <div class="py-10 md:py-16 border-b">
        <div class="codeweek-container-lg flex flex-col lg:flex-row lg:justify-between">
            <div class="flex flex-col justify-between">
                <div>
                    <div class="mb-6">
                        <a href="/">
                            <img src="/images/footer_logo.svg" class="w-[248px] lg:w-full" alt="CodeWeek">
                        </a>
                    </div>
                    <div class="flex gap-[22px] mb-6 lg:mb-0">
                        <a href="https://www.linkedin.com/company/codeweek/" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/linkedin.svg" alt="LinkedIn" />
                        </a>
                        <a href="https://twitter.com/CodeWeekEU" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/twitter.svg" alt="X" />
                        </a>
                        <a href="https://www.instagram.com/codeweekeu/" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/instagram.svg" alt="Instagram" />
                        </a>
                        <a href="https://www.youtube.com/channel/UCw30ZaWtCvGb4yudW6tCXAA" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/youtube.svg" alt="Youtube" />
                        </a>
                        <a href="https://www.facebook.com/codeEU/" target="_blank" rel="noreferer, noopener">
                            <img src="/images/social/facebook.svg" alt="Facebook" />
                        </a>
                    </div>
                </div>
                <img width="200px" alt="Funded by the European Union Logo" src="/images/EU_logo_new.jpg" class="mb-16 lg:mb-0">
            </div>

            <div class="flex flex-col md:flex-row md:justify-between gap-8 md:gap-[120px]">
                <div>
                    <p class="font-normal font-['Blinker'] text-xl leading-[30px] mb-6 p-0">About us</p>
                    <ul class="m-0 p-0 font-['Montserrat'] font-semibold text-base">
                        <li class="mb-4">
                            <a href="/about" class="text-dark-blue">About Code Week</a>
                        </li>
                        <li class="mb-4">
                            <a href="/our-values" class="text-dark-blue">Our Values</a>
                        </li>
                        <li class="mb-4">
                            <a href="/" class="text-dark-blue">Statistics</a>
                        </li>
                        <li class="mb-4">
                            <a href="/partners" class="text-dark-blue">Partners & Sponsors</a>
                        </li>
                        <li class="mb-4">
                            <a href="/community" class="text-dark-blue">Community</a>
                        </li>
                        <li>
                            <a href="/" class="text-dark-blue">Contact us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-normal font-['Blinker'] text-xl leading-[30px] mb-6 p-0">Quick links</p>
                    <ul class="m-0 p-0 font-['Montserrat'] font-semibold text-base">
                        <li class="mb-4">
                            <a href="/" class="text-dark-blue">Register</a>
                        </li>
                        <li class="mb-4">
                            <a href="/" class="text-dark-blue">Activities & Events</a>
                        </li>
                        <li class="mb-4">
                            <a href="/resources/learn" class="text-dark-blue">Learn & Teach</a>
                        </li>
                        <li class="mb-4">
                            <a href="/blog" class="text-dark-blue">News</a>
                        </li>
                        <li>
                            <a href="/" class="text-dark-blue">Content migration</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="font-normal font-['Blinker'] text-xl leading-[30px] mb-6 p-0">Educational Resources</p>
                    <ul class="m-0 p-0 font-['Montserrat'] font-semibold text-base">
                        <li class="mb-4">
                            <a href="/resources/CodingAtHome" class="text-dark-blue">Coding @ Home</a>
                        </li>
                        <li class="mb-4">
                            <a href="/podcasts" class="text-dark-blue">Podcast</a>
                        </li>
                        <li class="mb-4">
                            <a href="/" class="text-dark-blue">Webinars</a>
                        </li>
                        <li class="mb-4">
                            <a href="/" class="text-dark-blue">Careers in Digital</a>
                        </li>
                        <li class="mb-4">
                            <a href="/challenges" class="text-dark-blue">Challenges</a>
                        </li>
                        <li>
                            <a href="/hackathons" class="text-dark-blue">Hackathons</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="codeweek-container-lg py-8 md:py-4 flex flex-col lg:flex-row gap-8 justify-between">
        <ul class="m-0 p-0 flex flex-col items-start md:items-center md:flex-row gap-4 md:gap-10 font-['Montserrat'] font-semibold text-base md:text-sm">
            <li>
                <a href="/" class="text-dark-blue">Privacy Policy</a>
            </li>
            <li>
                <a href="/" class="text-dark-blue">Cookie Policy</a>
            </li>
            <li>
                <a href="/" class="text-dark-blue">Accessibility</a>
            </li>
            <li>
                <a href="/" class="text-dark-blue">Terms & Conditions</a>
            </li>
            <li>
                <a href="/" class="text-dark-blue">Sitemap</a>
            </li>
        </ul>
        <p class="p-0 text-slate font-['Montserrat'] font-medium text-sm mb-8 md:mb-0">
            ©CodeWeek 2025 | Designed and developed by <a href="/" class="text-dark-blue font-semibold">Matrix Internet</a> . All Rights Reserved
        </p>
    </div>
    <div
      id="scroll-top-btn"
      class="fixed z-[100] -bottom-2 hover:bottom-0 right-[50px] bg-[#FFD700] hover:bg-[#F95C22] p-4 pb-6 rounded-t-full duration-300 cursor-pointer"
    >
      <img class="icon-rotate-270" src="/images/arrow-up-icon.svg" />
    </div>
</footer>

@push('scripts')
<script type="text/javascript">
// Scroll Top
  const scrollTopBtn = document.getElementById("scroll-top-btn");

  scrollTopBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
</script>
@endpush
