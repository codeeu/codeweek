@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'Future Ready Csr', 'href' => ''],
    ];

    $resources = [
        (object) [
            'title' => __('csr-campaign.resource_title_1'),
            'description' => __('csr-campaign.resource_description_1'),
            'button_text' => __('csr-campaign.resource_button_1'),
            'button_link' => __('csr-campaign.resource_link_1'),
            'image' => '/images/csr/res1_explore_befefits_vertical.jpg',
            'image2' => '/images/csr/res1_explore_befefits_horizontal.jpg',
        ],
        (object) [
            'title' => __('csr-campaign.resource_title_2'),
            'description' => __('csr-campaign.resource_description_2'),
            'button_text' => __('csr-campaign.resource_button_2'),
            'button_link' => __('csr-campaign.resource_link_2'),
            'image' => '/images/csr/res2_first_steps_vertical.jpg',
            'image2' => '/images/csr/res2_first_steps_horizontal.jpg',
        ],
        (object) [
            'title' => __('csr-campaign.resource_title_3'),
            'description' => __('csr-campaign.resource_description_3'),
            'button_text' => __('csr-campaign.resource_button_3'),
            'button_link' => __('csr-campaign.resource_link_3'),
            'image' => '/images/csr/res3_pledge_badge_vertical.jpg',
            'image2' => '/images/csr/res3_pledge_badge_horizontal.jpg',
        ],
        (object) [
            'title' => __('csr-campaign.resource_title_4'),
            'description' => __('csr-campaign.resource_description_4'),
            'button_text' => __('csr-campaign.resource_button_4'),
            'button_link' => __('csr-campaign.resource_link_4'),
            'image' => '/images/csr/res4_csr_toolkit_vertical.jpg',
            'image2' => '/images/csr/res4_csr_toolkit_horizontal.jpg',
        ],
        (object) [
            'title' => __('csr-campaign.resource_title_5'),
            'description' => __('csr-campaign.resource_description_5'),
            'button_text' => __('csr-campaign.resource_button_5'),
            'button_link' => __('csr-campaign.resource_link_5'),
            'image' => '/images/csr/res5_employee_voluntering_vertical.jpg',
            'image2' => '/images/csr/res5_employee_voluntering_horizontal.jpg',
        ],
        (object) [
            'title' => __('csr-campaign.resource_title_6'),
            'description' => __('csr-campaign.resource_description_6'),
            'button_text' => __('csr-campaign.resource_button_6'),
            'button_link' => __('csr-campaign.resource_link_6'),
            'image' => '/images/csr/res6_mentorship_programme_vertical.jpg',
            'image2' => '/images/csr/res6_mentorship_programme_horizontal.jpg',
        ],
        (object) [
            'title' => __('csr-campaign.resource_title_7'),
            'description' => __('csr-campaign.resource_description_7'),
            'button_text' => __('csr-campaign.resource_button_7'),
            'button_link' => __('csr-campaign.resource_link_7'),
            'image' => '/images/csr/res7_empowering_industry_vertical.jpg',
            'image2' => '/images/csr/res7_empowering_industry_horizontal.jpg',
        ],
        (object) [
            'title' => __('csr-campaign.resource_title_8'),
            'description' => __('csr-campaign.resource_description_8'),
            'button_text' => __('csr-campaign.resource_button_8'),
            'button_link' => __('csr-campaign.resource_link_8'),
            'image' => '/images/csr/res8_csr_survey_vertical.jpg',
            'image2' => '/images/csr/res8_csr_survey_horizontal.jpg',
        ],
        (object) [
            'title' => __('csr-campaign.resource_title_9'),
            'description' => __('csr-campaign.resource_description_9'),
            'button_text' => __('csr-campaign.resource_button_9'),
            'button_link' => __('csr-campaign.resource_link_9'),
            'image' => '/images/csr/res9_faq_vertical.jpg',
            'image2' => '/images/csr/res9_faq_horizontal.jpg',
        ],
        (object) [
            'title' => __('csr-campaign.resource_title_10'),
            'description' => __('csr-campaign.resource_description_10'),
            'button_text' => __('csr-campaign.resource_button_10'),
            'button_link' => __('csr-campaign.resource_link_10'),
            'image' => '/images/csr/res10_happening_now_vertical.jpg',
            'image2' => '/images/csr/res10_happening_now_horizontal.jpg',
        ],
    ];

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
                            <p class="text-xl md:text-2xl leading-8 text-[#333E48] p-0 max-md:max-w-full max-w-[525px] mb-4">
                                @lang('csr-campaign.landing_header')
                            </p>
                            <div class="flex flex-col md:flex-row gap-3 md:gap-5 items-center">
                                <a
                                    class="text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-4 px-8 font-semibold text-lg"
                                    href="https://codeweek.eu/blog/futurereadycsr-campaign-launch"
                                >
                                    <span>@lang('csr-campaign.get_involved')</span>
                                </a>
                                <a
                                    class="text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-4 px-8 font-semibold text-lg"
                                    href="https://codeweek.eu/blog/futurereadycsr-resources"
                                >
                                    <span>@lang('csr-campaign.explore_resources')</span>
                                </a>
                            </div>
                        </div>
                        <img
                            class="absolute top-0 -left-1/4 w-[150vw] !max-w-none md:hidden"
                            loading="lazy"
                            src="/images/csr/csr_about1.jpg"
                            style="clip-path: ellipse(71% 73% at 40% 20%);"
                        />
                        <img
                            class="absolute top-0 right-0 h-full max-w-[calc(70vw)] object-cover hidden md:block"
                            loading="lazy"
                            src="/images/csr/csr_about1.jpg"
                            style="clip-path: ellipse(70% 140% at 70% 25%);"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section class="relative flex overflow-hidden">
            <div class="relative pt-10 md:pt-28 codeweek-container-lg">
                <h2 class="text-dark-blue text-[22px] md:text-4xl md:leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-10 block">
                    @lang('csr-campaign.about_title')
                </h2>
                <p class="text-[#20262C] font-normal text-[16px] leading-[22px] md:text-xl p-0 mb-6 md:mb-10 max-w-4xl">
                    @lang('csr-campaign.about_description')
                </p>
                <div class="relative">
                    <img
                        class="w-full rounded-2xl object-cover object-center h-[calc(80vw-40px)] sm:h-auto"
                        loading="lazy"
                        src="/images/csr/csr_hero1.jpg"
                    />
                </div>
            </div>
        </section>

        <section class="relative overflow-hidden" id="dream-job-resources">
            <div class="absolute w-full h-full bg-blue-gradient md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden lg:block xl:hidden" style="clip-path: ellipse(168% 90% at 50% 90%);"></div>
            <div class="absolute w-full h-full bg-blue-gradient hidden xl:block" style="clip-path: ellipse(98% 90% at 50% 90%);"></div>
            <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-48 md:pb-28">
                <h2 class="text-white md:text-center text-3xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-16">
                    @lang('csr-campaign.resources')
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
                                <div class="order-0 sm:order-2">
                                    <!-- Mobile -->
                                    <img
                                        class="block sm:hidden w-full rounded-lg object-cover object-center max-w-full h-full"
                                        src="{{ $resource->image2 }}"
                                        alt="{{ $resource->title }}"
                                    />
                                    <!-- Desktop / Tablet -->
                                    <img
                                        class="hidden sm:block w-full rounded-lg object-cover object-center max-w-full h-full"
                                        src="{{ $resource->image }}"
                                        alt="{{ $resource->title }}"
                                    />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
@endsection
