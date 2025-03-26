<section class="relative z-10">
    <div class="codeweek-container-lg py-10 tablet:py-20">
        <div class="grid grid-cols-1 tablet:grid-cols-2 gap-10 tablet:gap-32">
            <div class="flex flex-col justify-center">
                <div class="bg-[#F4F6FA] p-6 rounded-xl">
                    <p class="text-slate-500 font-semibold text-lg p-0 mb-2">
                        Published: {{Carbon\Carbon::parse($podcast->created_at)->isoFormat('DD/M/YY')}} - 25 MIN
                    </p>
                    <audio controls="controls" id="podcast" class="w-full">
                        <source src="{{$podcast->filename}}"
                                type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
            <div>
                @if($podcast->guests->count() == 1)
                    <p class="text-dark-blue text-4xl font-medium p-0 mb-6">About our guest</p>
                @else
                    <p class="text-dark-blue text-4xl font-medium p-0 mb-6">About our guests</p>
                @endif
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    Welcome to the EU Code Week Podcast Series. We bring coding, computational thinking, robotics and innovation closer to you, your community and your school.
                </p>
                <p class="text-[#333E48] font-normal text-lg md:text-xl p-0">
                    Join Arjana Blazic, Eugenia Casariego and Eirini Symeonidou, from the EU Code Week team, as they explore a range of topics, from media literacy to robotics, with the help of expert guests – to empower you to equip your students with the skills to confront the challenges and opportunities posed by a digital future.
                </p>
            </div>
        </div>
    </div>
    <div
        class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
        style="transform: translate(-16px, -24px)"
    ></div>
    <div
        class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-28 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
        style="transform: translate(-16px, -24px)"
    ></div>
</section>

<section class="relative overflow-hidden">
    <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(570% 90% at 38% 90%);"></div>
    <div class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
    <div class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden" style="clip-path: ellipse(288% 90% at 50% 90%);"></div>
    <div class="absolute w-full h-full bg-yellow-50 hidden xl:block" style="clip-path: ellipse(98% 90% at 50% 90%);"></div>
    <div class="relative pt-20 pb-16 md:pt-52 md:pb-28">
        <div class="relative">
            <div class="absolute left-0 top-0 bottom-0 w-48 bg-yellow-transparent-gradient z-[8]"></div>
            <div class="absolute right-0 top-0 bottom-0 w-48 bg-yellow-transparent-opposite-gradient z-[8]"></div>
            <div class="slick-slider relative">
                @foreach($podcast->guests as $guest)
                    <div class="leading-normal mx-5">
                        <div class="rounded-lg bg-white overflow-hidden">
                            <div class="relative">
                                <img alt="Placeholder" class="block w-full rounded" src="{{$guest->image_path}}" />
                                <a href="/" class="bg-white rounded-full w-12 h-12 flex justify-center items-center absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                    <img class="w-6 ml-1" src="/images/fi_play.svg" />
                                </a>
                            </div>
                            <div class="px-6 py-8">
                                <a href="/" class="text-dark-blue text-center text-lg p-0 font-semibold mb-2 font-['Montserrat'] block">{{$guest->name}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

