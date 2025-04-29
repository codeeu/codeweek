@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Resources', 'href' => '/resources'],
      (object) ['label' => 'Role models', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-matchmaking-tool" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-48 md:pt-32 pb-0 md:py-16">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="home-activity codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <h2 class="text-dark-blue text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4 max-md:max-w-full max-w-[525px]">
                                Connect & support
                            </h2>
                            <p class="text-xl md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px] mb-4">
                                Facilitating meetings... Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero.
                            </p>
                        </div>
                        <img
                                class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                                loading="lazy"
                                src="/images/matchmaking-tool/matchmaking-banner.png"
                                style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                                class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                                loading="lazy"
                                src="/images/matchmaking-tool/matchmaking-banner.png"
                                style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative z-10">
            <div class="relative z-10 py-10 md:py-20 codeweek-container-lg flex justify-center">
                <div class="w-full max-w-[880px] gap-2">
                    <p class="text-[#20262C] text-lg md:text-2xl font-normal mb-6 p-0">
                        Are you an expert, industry leader, or organisation ready to inspire students? Or a school looking for digital professionals to bring real-world expertise into the classroom? 
                    </p>
                    <p class="p-0 text-slate-500 text-default md:text-xl font-normal mb-6">
                        Join our growing EU Code Week Community and help build a strong network of digital professionals, companies, academics and educators to inspire students, both online and in person.  
                    </p>
                    <p class="p-0 text-slate-500 text-default md:text-xl font-normal mb-6">
                        <span class="font-semibold">Experts & Organisation</span> – Sign up to share your knowledge with educators.
                    </p>
                    <div class="flex flex-col tablet:flex-row gap-6 mb-6">
                        <div class="p-6 flex flex-col items-center bg-yellow-50 rounded-lg flex-1">
                            <p class="p-0 text-slate-500 text-default md:text-xl font-semibold">
                                Registering as an individual?
                            </p>
                            <p class="p-0 text-slate-500 text-default md:text-xl font-normal mb-4">
                                Fill out this form:
                            </p>
                            <a href="/" class="flex justify-center w-fit bg-[#F95C22] rounded-full py-2.5 px-10 font-['Blinker'] hover:bg-hover-orange duration-300">
                                <span
                                    class="text-base leading-7 font-semibold text-black normal-case"
                                >
                                    Individual registration forn
                                </span>
                            </a>
                        </div>
                        <div class="p-6 flex flex-col items-center bg-yellow-50 rounded-lg flex-1">
                            <p class="p-0 text-slate-500 text-default md:text-xl font-semibold">
                                Signing up as an organisation?
                            </p>
                            <p class="p-0 text-slate-500 text-default md:text-xl font-normal mb-4">
                                Let us know here:
                            </p>
                            <a href="/" class="flex justify-center w-fit bg-[#F95C22] rounded-full py-2.5 px-10 font-['Blinker'] hover:bg-hover-orange duration-300">
                                <span
                                    class="text-base leading-7 font-semibold text-black normal-case"
                                >
                                    Organisation registration forn
                                </span>
                            </a>
                        </div>
                    </div>
                    <p class="p-0 text-slate-500 text-default md:text-xl font-normal mb-6">
                        <span class="font-semibold">Schools & Educators</span> – Browse the database to find the right expert and organisation for your students.
                    </p>
                    <p class="text-[#20262C] text-lg md:text-2xl font-semibold p-0">
                        Register today!
                    </p>
                </div>
            </div>
        </section>

        <match-making-tool-form
            :prp-query="'{{$query}}'"
            :prp-languages="{{$selected_languages}}"
            :prp-locations="{{$selected_locations}}"
            :prp-types="{{$selected_types}}"
            :prp-topics="{{$selected_topics}}"
            :languages="{{ $languages }}"
            :locations="{{ $locations }}"
            :types="{{ $types }}"
            :topics="{{ $topics }}"
            :locale="'{{App::getLocale()}}'"
        ></match-making-tool-form>
    </section>
@endsection
