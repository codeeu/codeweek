<section class="relative flex overflow-hidden">
    <div class="flex relative transition-all w-full bg-orange-gradient pt-32 pb-0 md:py-40">
        <div class="w-full pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
            <div class="codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                <div class="order-1 flex-1 px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                    <h2 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[532px]">
                        {{$title}}
                    </h2>
                    <div class="absolute top-0 -translate-y-1/2 bg-yellow py-3 md:py-4 px-8 md:px-10 rounded-full text-secondary font-semibold text-[16px] leading-[22px]">
                      #EUCodeWeek
                  </div>
                </div>
                <div class="order-0 md:order-2 flex flex-1 justify-center items-center z-10"></div>
                <img
                        class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                        loading="lazy"
                        src="{{asset('images/coding-home/banner_bg.png')}}"
                        style="clip-path: ellipse(71% 73% at 40% 20%);"
                />
                <img
                        class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                        loading="lazy"
                        src="{{asset('images/coding-home/banner_bg.png')}}"
                        style="clip-path: ellipse(70% 140% at 70% 25%);"
                />
            </div>
        </div>
    </div>
</section>