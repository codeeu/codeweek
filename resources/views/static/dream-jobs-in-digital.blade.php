@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Careers in Digital', 'href' => ''],
    ];

    $hasDreamJobsPageTable = \Illuminate\Support\Facades\Schema::hasTable('dream_jobs_page');
    $hasDreamJobsResourcesTable = \Illuminate\Support\Facades\Schema::hasTable('dream_jobs_resources');
    $page = $hasDreamJobsPageTable ? \App\DreamJobsPage::config() : null;
    $heroDynamic = $page && $page->hero_dynamic;
    $aboutDynamic = $page && $page->about_dynamic;
    $roleModelsDynamic = $page && $page->role_models_dynamic;
    $resourcesDynamic = $page && $page->resources_dynamic;

    $fallbackRoles = [
        [
            'id' => '1',
            'first_name' => 'Anny',
            'last_name' => 'Tubbs',
            'slug' => 'anny-tubbs',
            'role' => 'Multimedia producer at First Move Productions',
            'image' => '/images/dream-jobs/anny-tubbs.png',
            'country' => 'be'
        ],
        [
            'id' => '2',
            'first_name' => 'Magda',
            'last_name' => 'Vanzetto',
            'slug' => 'magda-vanzetto',
            'role' => 'Head of Energy Engineers at Siemens',
            'image' => '/images/dream-jobs/magda-vanzetto.png',
            'country' => 'sz'
        ],
        [
            'id' => '3',
            'first_name' => 'Roxana',
            'last_name' => 'Freusse',
            'slug' => 'roxana-freusse',
            'role' => 'Team Lead Cloud Solutions & DevOps, Scrum Master at Siemens',
            'image' => '/images/dream-jobs/roxana-freusse.png',
            'country' => 'sz'
        ],
        [
            'id' => '4',
            'first_name' => 'Vasileios',
            'last_name' => 'Linardos',
            'slug' => 'vasileios-linardos',
            'role' => 'Head of AI at ARCHEIOTHIKI SA',
            'image' => '/images/dream-jobs/vasileios-linardos.png',
            'country' => 'gr'
        ],
        [
            'id' => '5',
            'first_name' => 'Carole',
            'last_name' => 'Colley',
            'slug' => 'carole-colley',
            'role' => 'Bid & Proposal Management at Avanade',
            'image' => '/images/dream-jobs/carole-colley.png',
            'country' => 'fr'
        ],
        [
            'id' => '6',
            'first_name' => 'Christina',
            'last_name' => 'Kiamili',
            'slug' => 'christina-kiamili',
            'role' => 'Digital Portfolio Manager at Siemens',
            'image' => '/images/dream-jobs/christina-kiamili.png',
            'country' => 'sz'
        ],
        [
            'id' => '7',
            'first_name' => 'Devon',
            'last_name' => 'Young',
            'slug' => 'devon-young',
            'role' => 'UX Design at Avanade',
            'image' => '/images/dream-jobs/devon-young.png',
            'country' => 'uk'
        ],
        [
            'id' => '9',
            'first_name' => 'Paula',
            'last_name' => 'Panarra',
            'slug' => 'paula-panarra',
            'role' => 'General Manager at Avanade UK & Ireland',
            'image' => '/images/dream-jobs/paula-panarra.png',
            'country' => 'sp'
        ],
        [
            'id' => '10',
            'first_name' => 'Ribka',
            'last_name' => 'Balakrishnan',
            'slug' => 'ribka-balakrishnan',
            'role' => 'Mechanical Design Engineer at WSAudiology',
            'image' => '/images/dream-jobs/ribka-balakrishnan.png',
            'country' => 'da'
        ],
        [
            'id' => '11',
            'first_name' => 'Jeevantika',
            'last_name' => 'Lingalwar',
            'slug' => 'jeevantika-lingalwar',
            'role' => 'Cloud Solution Architect at Microsoft',
            'image' => '/images/dream-jobs/jeevantika-lingalwar.png',
            'country' => 'ei'
        ],
        [
            'id' => '12',
            'first_name' => 'Dominik',
            'last_name' => 'Bolerác',
            'slug' => 'dominik-bolerác',
            'role' => 'Application Developer at Zurich Insurance Company',
            'image' => '/images/dream-jobs/dominik-bolerác.png',
            'country' => 'lo'
        ],
        [
            'id' => '13',
            'first_name' => 'Sara',
            'last_name' => 'Mathews',
            'slug' => 'sara-mathews',
            'role' => 'Group Responsible AI Manager at The Adecco Group',
            'image' => '/images/dream-jobs/sara-mathews.png',
            'country' => 'gm'
        ],
        [
            'id' => '14',
            'first_name' => 'Paraskevi',
            'last_name' => 'Nomikou',
            'slug' => 'paraskevi-nomikou',
            'role' => 'Marine Geologist and an Assistant Professor at the Department of Geology and Geoenvironment at the National and Kapodistrian University of Athens',
            'image' => '/images/dream-jobs/paraskevi-nomikou.png',
            'country' => 'gr'
        ],
    ];

    $hasRoleModelsTable = \Illuminate\Support\Facades\Schema::hasTable('dream_job_role_models');
    $hasDbRoleModels = $hasRoleModelsTable
        ? \App\DreamJobRoleModel::query()->where('active', true)->exists()
        : false;

    if ($hasDbRoleModels) {
        $sortedResults = \App\DreamJobRoleModel::query()
            ->where('active', true)
            ->orderBy('position')
            ->orderBy('first_name')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => (string) $item->id,
                    'first_name' => (string) $item->first_name,
                    'last_name' => (string) $item->last_name,
                    'slug' => (string) $item->slug,
                    'role' => (string) $item->role,
                    'image' => (string) $item->image,
                    'country' => (string) $item->country,
                ];
            });
    } else {
        $sortedResults = collect($fallbackRoles)->sortBy('first_name');
    }

    $fallbackResources = [
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_1'),
            'description' =>  __('dream-jobs-in-digital.resource_description_1'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_1'),
            'button_link' => '/docs/dream-jobs/C4E WP4 Careers in Digital Guide Toolkit.pdf',
            'image' => '/images/dream-jobs/career-guide.png',
        ],
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_2'),
            'description' =>  __('dream-jobs-in-digital.resource_description_2'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_2'),
            'button_link' => '/docs/dream-jobs/C4E WP4 Career Day Toolkit.pdf',
            'image' => '/images/dream-jobs/inspiration-day.png',
        ],
        (object) [
            'title' =>  __('dream-jobs-in-digital.resource_title_3'),
            'description' =>  __('dream-jobs-in-digital.resource_description_3'),
            'button_text' =>  __('dream-jobs-in-digital.resource_button_3'),
            'button_link' => '/docs/dream-jobs/Practical Skills – VET Toolkit.pdf',
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

    $dbResources = \App\ResourceItem::query()
        ->whereJsonContains('groups', 'Careers in Digital')
        ->whereHas('languages', function ($query) {
            $query->where('code', App::getLocale());
        })
        ->orderByDesc('weight')
        ->get()
        ->map(function ($item) {
            return (object) [
                'title'       => $item->name,
                'description' => $item->description,
                'button_text' => __('dream-jobs-in-digital.resource_button_1'),
                'button_link' => $item->source,
                'image'       => $item->thumbnail,
            ];
        });

    $fallbackResources = $dbResources->concat(collect($fallbackResources))->all();

    $dynamicResources = ($page && $hasDreamJobsResourcesTable) ? $page->resourcesForLocale() : [];
    $resources = ($resourcesDynamic && !empty($dynamicResources)) ? $dynamicResources : $fallbackResources;
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-digital-girls" class="font-['Blinker'] overflow-hidden">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-orange-gradient pt-48 md:pt-32 pb-0 md:py-[7.5rem]">
                <div class="w-full overflow-hidden pb-10 md:p-0 flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="home-activity codeweek-container-lg flex flex-col md:flex-row md:items-center duration-1000 gap-28 md:gap-4 xl:gap-28">
                        <div class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 relative">
                            <img
                                class="mb-4 max-w-full"
                                src="/images/dream-jobs/dream_jobs_logo.svg"
                            />
                            <div class="text-xl md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px] mb-4 [&_p]:p-0 [&_p]:m-0 [&_p]:mb-4 [&_p:last-child]:mb-0">
                                @if($heroDynamic && $page && $page->contentForLocale('hero_intro'))
                                    {!! $page->contentForLocale('hero_intro') !!}
                                @else
                                    @lang('dream-jobs-in-digital.landing_header')
                                @endif
                            </div>
                            <a
                                class="text-nowrap md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-4 px-8 font-semibold text-lg"
                                href="{{ ($heroDynamic && $page && $page->hero_cta_link) ? $page->hero_cta_link : '#dream-job-resources' }}"
                            >
                                <span>
                                    @if($heroDynamic && $page && $page->contentForLocale('hero_cta_text'))
                                        {{ $page->contentForLocale('hero_cta_text') }}
                                    @else
                                        @lang('dream-jobs-in-digital.get_involved')
                                    @endif
                                </span>
                            </a>
                        </div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/dream-jobs/dream_jobs_bg.png"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/dream-jobs/dream_jobs_bg.png"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative flex overflow-hidden">
            <div class="relative pt-10 md:pt-28 codeweek-container-lg">
                <h2 class="text-dark-blue text-[22px] md:text-4xl md:leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-10 block">
                    @if($aboutDynamic && $page && $page->contentForLocale('about_title'))
                        {{ $page->contentForLocale('about_title') }}
                    @else
                        @lang('dream-jobs-in-digital.about_title')
                    @endif
                </h2>
                <div class="text-[#20262C] font-normal text-[16px] leading-[22px] md:text-xl p-0 mb-6 md:mb-10 max-w-4xl [&_p]:p-0 [&_p]:m-0 [&_p]:mb-6 [&_p:last-child]:mb-0">
                    @if($aboutDynamic && $page && $page->contentForLocale('about_description'))
                        {!! $page->contentForLocale('about_description') !!}
                    @else
                        @lang('dream-jobs-in-digital.about_description')
                    @endif
                </div>
                <div class="relative">
                    <img
                        class="w-full rounded-2xl object-cover object-center h-[calc(80vw-40px)] sm:h-auto"
                        loading="lazy"
                        src="/images/dream-jobs/career-about.png"
                    />
                    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
                        @include('layout.video-player', [
                          'id' => 'careers-about',
                          'src' => ($aboutDynamic && $page && $page->about_video_url) ? $page->about_video_url : 'https://www.youtube.com/embed/pzP-kToeym4?si=FzutCQGW4rO5M_5A',
                        ])
                    </div>
                </div>
            </div>
        </section>

        <section class="relative flex z-10">
            <div class="relative pt-10 pb-10 md:pt-12 md:pb-28 codeweek-container-lg z-[1]">
                <h2 class="text-dark-blue text-2xl md:text-4xl md:leading-[44px] font-medium font-['Montserrat'] mb-10">
                    @if($roleModelsDynamic && $page && $page->contentForLocale('role_models_title'))
                        {{ $page->contentForLocale('role_models_title') }}
                    @else
                        @lang('dream-jobs-in-digital.our_role_models')
                    @endif
                </h2>
                <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-6 lg:gap-8">
                    @foreach($sortedResults as $result)
                        @php
                            $countryCode = strtolower(trim((string) ($result['country'] ?? '')));
                            if ($countryCode === 'po') {
                                $countryCode = 'pl';
                            }
                            $localFlagCodes = ['be', 'da', 'ei', 'fr', 'gm', 'gr', 'lo', 'sp', 'sz', 'uk'];
                            $flagSrc = in_array($countryCode, $localFlagCodes, true)
                                ? "/images/flags/{$countryCode}-flag.svg"
                                : "https://flagcdn.com/w80/{$countryCode}.png";
                        @endphp
                        <div class="p-4 rounded-2xl border-2 border-solid border-[#A4B8D9] flex flex-col gap-4 md:gap-8 bg-white">
                            <div class="flex flex-1 items-start gap-4 md:gap-8">
                                <div class="relative w-32 flex-shrink-0">
                                    <img
                                        class="block w-32 h-32 object-cover object-center rounded-lg"
                                        src="{{ $result['image'] }}"
                                    />
                                    <img class="absolute w-[26px] h-auto object-center bottom-2.5 right-2.5 shadow-lg rounded-sm"
                                        src="{{ $flagSrc }}" onerror="this.style.display='none';" />
                                </div>
                                <div class="flex flex-1 flex-col justify-between h-full">
                                    <div class="flex-grow">
                                        <p class="p-0 font-medium text-dark-blue text-[22px] lg:text-xl font-['Montserrat']">{{ $result['first_name'] }} {{ $result['last_name'] }}</p>
                                        <p class="p-0 font-medium text-[#333E48] text-lg mb-4 font-['Montserrat'] lg:line-clamp-2">{{ $result['role'] }}</p>
                                    </div>

                                    <a
                                        class="hidden sm:flex text-nowrap justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                        href="{{route('dream-jobs-in-digital-role', $result['slug'])}}"
                                    >
                                        <span>@lang('dream-jobs-in-digital.more_about') {{ $result['first_name'] }}</span>
                                        <div class="flex gap-2 w-4 overflow-hidden">
                                            <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                            <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <a
                                class="flex sm:hidden text-nowrap justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                                href="{{route('dream-jobs-in-digital-role', $result['slug'])}}"
                            >
                                <span>@lang('dream-jobs-in-digital.more_about') {{ $result['first_name'] }}</span>
                                <div class="flex gap-2 w-4 overflow-hidden">
                                    <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                    <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                </div>
                            </a>
                        </div>
                    @endforeach
                    
                    {{-- <div class="mt-6 lg:mt-12">
                        {{ $results->links('vendor.livewire.pagination') }}
                    </div> --}}
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

        <section class="relative overflow-hidden" id="dream-job-resources">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden lg:block xl:hidden" style="clip-path: ellipse(168% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden xl:block" style="clip-path: ellipse(98% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-48 md:pb-28">
                <h2 class="text-white md:text-center text-3xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-16">
                    @if($resourcesDynamic && $page && $page->contentForLocale('resources_title'))
                        {{ $page->contentForLocale('resources_title') }}
                    @else
                        @lang('dream-jobs-in-digital.resources')
                    @endif
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
                                        {{ \Illuminate\Support\Str::words(strip_tags($resource->description), 30, '...') }}
                                    </p>
                                </div>
                                <a
                                    class="text-nowrap flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-lg"
                                    href="{{ $resource->button_link }}"
                                    target="_blank"
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
