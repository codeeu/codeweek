@extends('layout.new_base')

@php
    $id = request()->segment(2);

    $results = [
      [
          'id' => '1',
          'first_name' => 'Anny',
          'last_name' => 'Tubbs',
          'role' => 'Multimedia producer',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
      [
          'id' => '2',
          'first_name' => 'Magda',
          'last_name' => 'Vanzetto',
          'role' => 'Head of Project Development and Governance, Energy Performance Services at Siemens',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
      [
          'id' => '3',
          'first_name' => 'Roxana',
          'last_name' => 'Freusse',
          'role' => 'Team Lead Cloud Solutions & DevOps, Scrum Master at Siemens',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
      [
          'id' => '4',
          'first_name' => 'Vasileios',
          'last_name' => 'Linardos',
          'role' => 'Head of AI at ARCHEIOTHIKI SA',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
      [
          'id' => '5',
          'first_name' => 'Carole',
          'last_name' => 'Colley',
          'role' => 'Bid & Proposal Mgmt at Avanade',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
      [
          'id' => '6',
          'first_name' => 'Christina',
          'last_name' => 'Kiamili',
          'role' => 'Digital Portfolio Manager at Siemens',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
      [
          'id' => '7',
          'first_name' => 'Devon',
          'last_name' => 'Young',
          'role' => 'UX Design at Avanade',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
      [
          'id' => '8',
          'first_name' => 'Katrine',
          'last_name' => 'Moller',
          'role' => 'Robot Software Engineer at TinyMobile Robots',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
      [
          'id' => '9',
          'first_name' => 'Paula',
          'last_name' => 'Panarra',
          'role' => 'General Manager at Avanade UK & Ireland',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
      [
          'id' => '10',
          'first_name' => 'Ribka',
          'last_name' => 'Balakrishnan',
          'role' => 'Mechanical Design Engineer at WSAudiology',
          'image' => '/images/dream-jobs/jowita-michalska.png',
      ],
    ];

    $item = collect($results)->firstWhere('id', $id);

    $list = [
      (object) ['label' => 'Seasonal LP', 'href' => '/'],
      (object) ['label' => 'Role model detail', 'href' => ''],
    ];

    $resources = [
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_1'),
            'description' =>  __('dream-jobs-in-digital.resource_description_1'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_1'),
            'button_link' => '/',
            'image' => '/images/dream-jobs/career-guide.png',
        ],
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_2'),
            'description' =>  __('dream-jobs-in-digital.resource_description_2'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_2'),
            'button_link' => '/',
            'image' => '/images/dream-jobs/inspiration-day.png',
        ],
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_3'),
            'description' =>  __('dream-jobs-in-digital.resource_description_3'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_3'),
            'button_link' => 'https://jaye.sharepoint.com/:b:/r/sites/Code4EuropeProjectPlanner/Shared%20Documents/4_C4EU%20WP4/D4.4%20VET%20Teachers%20toolkit/VET%20Toolkit/02%20-%20FINAL/QA%20Review%20D4.4%20VET%20Toolkit%20Description%20-%20v17.pdf?csf=1&web=1&e=MtAbvn',
            'image' => '/images/dream-jobs/vet-activities.png',
        ],
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_4'),
            'description' =>  __('dream-jobs-in-digital.resource_description_4'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_4'),
            'button_link' => 'https://www.techskills.org/careers/quiz/',
            'image' => '/images/dream-jobs/skills-test.png',
        ],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-digital-girls-role-detail" class="font-['Blinker'] overflow-hidden">
        <section class="relative z-10">
            <div class="py-10 lg:py-20 codeweek-container-lg mb-8 lg:mb-0">
                <div class="flex items-center gap-6 mb-3">
                    <h2 class="text-dark-blue text-3xl md:text-4xl md:leading-[44px] font-medium font-['Montserrat']">
                        {{ $item['first_name'] }} {{ $item['last_name'] }}
                    </h2>
                    <img src="/images/flags/flag-pl.png" />
                </div>
                <p class="text-[22px] md:text-3xl text-[#333E48] font-medium font-['Montserrat'] p-0 mb-6">{{ $item['role'] }}</p>
                <div class="flex flex-col tablet:flex-row gap-6 xl:gap-12">
                    <div class="w-full tablet:w-1/3 xl:w-1/3">
                        <img class="rounded-xl mb-6" src="{{ $item['image'] }}" />
                        <p class="font-normal text-2xl p-0 mb-6">
                            Jowita Michalska Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>
                        <p class="text-[#333E48] font-normal text-xl p-0">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                        </p>
                    </div>
                    <div class="w-full tablet:w-2/3 xl:w-2/3">
                        <div class="relative rounded-xl mb-6">
                            <img class="rounded-xl" src="/images/dream-jobs/role-detail-video.png" />
                            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                                @include('layout.video-player', ['id' => 'carrer-about', 'src' => ''])
                            </div>
                        </div>
                        <p class="text-[22px] md:text-3xl text-[#333E48] font-medium font-['Montserrat'] p-0">Video title here</p>
                    </div>
                </div>
            </div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-2/3 -right-14 md:-right-36 w-28 md:w-72 h-28 md:h-72 bg-[#99E1F4] rounded-full hidden lg:block"
                style="transform: translate(-16px, -24px)"
            ></div>
            <div
                class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-32 right-40 w-28 h-28 hidden lg:block bg-[#99E1F4] rounded-full"
                style="transform: translate(-16px, -24px)"
            ></div>
        </section>

        <section class="relative">
            <div class="absolute w-full h-full bg-light-blue md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-light-blue hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-light-blue hidden lg:block xl:hidden" style="clip-path: ellipse(168% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-light-blue hidden xl:block" style="clip-path: ellipse(108% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-48 md:pb-28">
                <h2 class="text-dark-blue text-[22px] md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-10">
                    Explore Career Pathway Map
                </h2>
                <img class="rounded-xl w-full h-60 md:h-auto object-cover object-center mb-6 md:mb-12" src="/images/dream-jobs/pathway-map.png" />
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 xl:gap-12">
                    <p class="text-[#333E48] font-normal text-xl p-0">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                    </p>
                    <p class="text-[#333E48] font-normal text-xl p-0">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                    </p>
                </div>
            </div>
        </section>

        <section class="relative bg-light-blue">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden lg:block xl:hidden" style="clip-path: ellipse(168% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden xl:block" style="clip-path: ellipse(98% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-48 md:pb-28">
                <h2 class="text-white md:text-center text-3xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-16">
                    @lang('dream-jobs-in-digital.resources')
                </h2>
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 md:gap-10 xl:gap-20">
                    @foreach($resources as $resource)
                        <div class="px-6 py-8 md:p-12 rounded-2xl bg-white gap-4 sm:gap-10 grid grid-cols-1 sm:grid-cols-2">
                            <div class="flex-1 flex flex-col justify-between order-1">
                                <div>
                                    <p class="text-dark-blue text-[22px] md:text-3xl font-medium font-['Montserrat'] mb-4 md:mb-6 p-0">
                                        {{ $resource->title }}
                                    </p>
                                    <p class="text-[#333E48] font-normal text-lg md:text-xl leading-[30px] font-['Blinker'] p-0 mb-6 md:mb-10">
                                        {{ $resource->description }}
                                    </p>
                                </div>
                                <a
                                        class="text-nowrap flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg"
                                        href="{{ $resource->button_link }}"
                                >
                                    <span>{{ $resource->button_text }}</span>
                                </a>
                            </div>

                            <div class="order-0 sm:order-2">
                                <img
                                        class="w-full flex-1 rounded-lg object-cover object-center max-w-full h-full"
                                        src="{{ $resource->image }}"
                                />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
@endsection
