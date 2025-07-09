@extends('layout.new_base')

@section('title', 'EU Code Week Values – Empowering Digital Skills for All')
@section('description', 'Discover the core values of EU Code Week: inclusion, innovation, collaboration, and digital
    empowerment for everyone.')
    @php
        $list = [(object) ['label' => 'Get Involved', 'href' => '']];
    @endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection
            <style>
                @media (min-width: 768px) {
                    .hero-image {
                        clip-path: ellipse(70% 120% at 70% -2%);
                    }
                }
            </style>
@section('content')
    <section id="codeweek-get-involved" class="font-['Blinker'] overflow-hidden">
        <section class="flex overflow-hidden relative flex-col bg-violet-gradient">
            <div class="relative w-full transition-all">
                <div
                    class="relative flex flex-col justify-end w-full overflow-hidden md:p-0 md:flex-row md:items-center h-[760px]">
                    <div class="flex relative justify-start items-center w-full h-full duration-1000 home-activity">
                        <!-- Image with clip-path -->
                        <img class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%]  md:h-full object-cover transition-all duration-300 hero-image"
                            src="images/get-involved.png" />
                        <div
                            class="flex flex-col-reverse justify-between items-center mx-auto w-full max-md:h-full md:flex-row codeweek-container-lg">
                            <div class="flex justify-center items-center w-full h-full md:w-1/2">
                                <div
                                    class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-fit h-fit relative -top-6">
                                    <h1
                                        class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                        @lang('cw2020.get-involved.title')
                                    </h1>
                                    <p
                                        class="text-xl  md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie
                                        consequat, vel illum dolore eu feugiat nulla facilisis at vero.
                                    </p>
                                    <a class="inline-block bg-primary hover:bg-hover-orange rounded-full py-4 px-6 md:px-10 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300"
                                        href="/guide">
                                        Get involved </a>
                                </div>
                            </div>
                            <button class="hidden justify-center items-center w-full md:w-1/2 group max-md:h-full">
                                <svg class="z-50 transition-all duration-300" width="80" height="80"
                                    viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="80" height="80" rx="40"
                                        class="transition-all duration-300 fill-[#FFD700] group-hover:fill-white" />
                                    <path d="M31.3335 25L54.6668 40L31.3335 55V25Z" stroke="black" stroke-width="3.33333"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <section class="overflow-hidden relative z-10">
        <div class="flex relative z-10 justify-center py-10 md:py-20 codeweek-container-lg">
            <div class="w-full max-w-[880px] gap-2">
                <h2
                    class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                    How you can participate and make a difference
                </h2>
                <p class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                </p>
                <p class="text-[#333E48] font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                </p>
            </div>
        </div>
        <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
            style="transform: translate(-16px, -24px)"></div>
        <div class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-36 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
            style="transform: translate(-16px, -24px)"></div>
    </section>
    <section class="overflow-hidden relative">
        <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
        <div class="hidden absolute w-full h-full bg-yellow-50 md:block lg:hidden"
            style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
        <div class="hidden absolute w-full h-full bg-yellow-50 lg:block xl:hidden"
            style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
        <div class="hidden absolute w-full h-full bg-yellow-50 xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);">
        </div>
        <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
            <div class="overflow-hidden pt-3 w-full max-w-full">
                <div class="flex flex-col items-center w-full max-w-full max-md:px-5">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start w-full max-w-[1428px]">
                        <!-- Left Column - Main Content -->
                        <div class="flex-1 max-w-full min-w-60">
                            <h3
                                class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                                Ways to engage with EU Code Week
                            </h3>
                            <p class="mt-6 max-w-full text-xl leading-8 text-gray-700">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                ad minim veniam, quis nostrud exercitation ullamco laboris.Lorem
                                ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.
                                <br><br>
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris.Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
                            </p>
                        </div>

                        <!-- Right Column - Engagement Options -->
                        <div class="min-w-60 w-full max-w-[674px]">
                            <!-- First Row of Icons -->
                            <div class="grid grid-cols-1 gap-10 items-center mb-12 w-full md:grid-cols-2 max-md:mb-10">
                                <!-- Connect with Community -->
                                <article class="flex flex-col justify-center engagement-card">
                                    <div class="engagement-icon flex gap-2.5 items-center p-7 bg-[#FFD700] h-[120px] rounded-[60px] w-[120px] max-md:px-5 mb-2.5"
                                        role="img" aria-label="Community connection icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                            viewBox="0 0 64 64" fill="none">
                                            <path
                                                d="M32 29.2525C36.6073 29.2525 40.3556 25.5043 40.3556 20.8969C40.3556 16.2895 36.6074 12.5413 32 12.5413C27.3926 12.5413 23.6444 16.2896 23.6444 20.8969C23.6444 25.5041 27.3927 29.2525 32 29.2525ZM32 16.5413C34.4017 16.5413 36.3556 18.4951 36.3556 20.8969C36.3556 23.2985 34.4017 25.2525 32 25.2525C29.5982 25.2525 27.6444 23.2986 27.6444 20.8969C27.6444 18.4951 29.5984 16.5413 32 16.5413ZM38.8893 32.4745C36.65 32.1179 34.3321 31.9371 32 31.9371C29.6679 31.9371 27.3501 32.1179 25.1109 32.4745C19.6584 33.3429 15.701 37.9804 15.701 43.5015V49.4586C15.701 50.5631 16.5965 51.4586 17.701 51.4586H46.2991C47.4036 51.4586 48.2991 50.5631 48.2991 49.4586V43.5015C48.2991 37.9804 44.3418 33.3429 38.8893 32.4745ZM44.2991 47.4588H19.701V43.5016C19.701 39.9583 22.2407 36.9821 25.74 36.4248C27.7717 36.1013 29.878 35.9371 32.0001 35.9371C34.1222 35.9371 36.2285 36.1013 38.2603 36.4248C41.7595 36.982 44.2993 39.9583 44.2993 43.5016V47.4588H44.2991ZM50.6196 28.9728C54.5116 28.9728 57.678 25.8064 57.678 21.9144C57.678 18.0224 54.5116 14.856 50.6196 14.856C46.7276 14.856 43.5612 18.0224 43.5612 21.9144C43.5612 25.8064 46.7275 28.9728 50.6196 28.9728ZM50.6196 18.856C52.306 18.856 53.678 20.228 53.678 21.9144C53.678 23.6008 52.306 24.9728 50.6196 24.9728C48.9333 24.9728 47.5612 23.6008 47.5612 21.9144C47.5612 20.228 48.9331 18.856 50.6196 18.856ZM64 39.9051V43.2286C64 44.3331 63.1045 45.2286 62 45.2286H51.234C50.1295 45.2286 49.234 44.3331 49.234 43.2286C49.234 42.1241 50.1295 41.2286 51.234 41.2286H60V39.9051C60 37.2869 58.1234 35.0876 55.5378 34.676C53.9422 34.4219 52.2876 34.293 50.6195 34.293C49.1847 34.293 47.7549 34.3886 46.3695 34.5773C45.2746 34.726 44.2669 33.9599 44.1179 32.8655C43.9689 31.771 44.7352 30.763 45.8296 30.6139C47.3932 30.4009 49.0047 30.293 50.6194 30.293C52.4975 30.293 54.3639 30.4386 56.1668 30.7258C60.7056 31.4485 64 35.309 64 39.9051ZM13.3805 28.9728C17.2725 28.9728 20.4389 25.8064 20.4389 21.9144C20.4389 18.0224 17.2725 14.856 13.3805 14.856C9.4885 14.856 6.322 18.0224 6.322 21.9144C6.322 25.8064 9.4885 28.9728 13.3805 28.9728ZM13.3805 18.856C15.0669 18.856 16.4389 20.228 16.4389 21.9144C16.4389 23.6008 15.0669 24.9728 13.3805 24.9728C11.694 24.9728 10.322 23.6008 10.322 21.9144C10.322 20.228 11.6941 18.856 13.3805 18.856ZM14.766 43.2288C14.766 44.3333 13.8705 45.2288 12.766 45.2288H2C0.8955 45.2288 0 44.3333 0 43.2288V39.9053C0 35.309 3.29437 31.4486 7.83325 30.7259C9.636 30.4388 11.5024 30.2931 13.3805 30.2931C14.9951 30.2931 16.6066 30.4011 18.1702 30.614C19.2646 30.763 20.0311 31.7711 19.882 32.8656C19.733 33.9601 18.7254 34.7271 17.6304 34.5774C16.245 34.3888 14.8151 34.2931 13.3804 34.2931C11.7124 34.2931 10.0576 34.422 8.46225 34.6761C5.87663 35.0878 4 37.2869 4 39.9051V41.2286H12.766C13.8706 41.2288 14.766 42.1241 14.766 43.2288Z"
                                                fill="#20262C" />
                                        </svg>
                                    </div>
                                    <div class="pt-1 w-full text-gray-700">
                                        <h2 class="mb-2 text-2xl font-medium leading-7 text-gray-700">
                                            Connect with your local Code Week community
                                        </h2>
                                        <p class="text-base leading-6 text-gray-700  !p-0 !p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </article>

                                <!-- Register Activities -->
                                <article class="flex flex-col justify-center engagement-card">
                                    <div class="engagement-icon flex gap-2.5 items-center p-7 bg-[#FFD700] h-[120px] rounded-[60px] w-[120px] max-md:px-5 mb-2.5"
                                        role="img" aria-label="Activity registration icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                            viewBox="0 0 64 64" fill="none">
                                            <path
                                                d="M58.0003 34C55.8003 31.8 51.8003 31.8 49.6003 34L36.0003 47.4C35.4003 48 34.8003 48.8 34.6003 49.8L32.0003 57.4C31.8003 58.2 32.0003 59 32.4003 59.4C32.8003 59.8 33.2003 60 33.8003 60C34.0003 60 34.2003 60 34.4003 59.8L42.0003 57.2C42.8003 57 43.6003 56.4 44.4003 55.8L57.8003 42.4C59.0003 41.2 59.6003 39.8 59.6003 38.2C59.6003 36.6 59.2003 35 58.0003 34ZM55.2003 39.6L41.8003 53C41.6003 53.2 41.4003 53.4 41.0003 53.4L37.2003 54.6L38.4003 50.8C38.4003 50.6 38.6003 50.2 38.8003 50L52.2003 36.6C53.0003 35.8 54.2003 35.8 55.0003 36.6C55.4003 37 55.6003 37.4 55.6003 38C55.6003 38.6 55.6003 39.2 55.2003 39.6Z"
                                                fill="black" />
                                            <path
                                                d="M28 50H16C12.6 50 10 47.4 10 44V16C10 12.6 12.6 10 16 10H38C41.4 10 44 12.6 44 16V30C44 31.2 44.8 32 46 32C47.2 32 48 31.2 48 30V16C48 10.4 43.6 6 38 6H16C10.4 6 6 10.4 6 16V44C6 49.6 10.4 54 16 54H28C29.2 54 30 53.2 30 52C30 50.8 29.2 50 28 50Z"
                                                fill="black" />
                                            <path
                                                d="M36 18H18C16.8 18 16 18.8 16 20C16 21.2 16.8 22 18 22H36C37.2 22 38 21.2 38 20C38 18.8 37.2 18 36 18Z"
                                                fill="black" />
                                            <path
                                                d="M36 28H18C16.8 28 16 28.8 16 30C16 31.2 16.8 32 18 32H36C37.2 32 38 31.2 38 30C38 28.8 37.2 28 36 28Z"
                                                fill="black" />
                                            <path
                                                d="M30 38H18C16.8 38 16 38.8 16 40C16 41.2 16.8 42 18 42H30C31.2 42 32 41.2 32 40C32 38.8 31.2 38 30 38Z"
                                                fill="black" />
                                        </svg>
                                    </div>
                                    <div class="pt-1 w-full text-gray-700">
                                        <h2 class="mb-2 text-2xl font-medium leading-7 text-gray-700">
                                            Register your Code Week activities
                                        </h2>
                                        <p class="text-base leading-6 text-gray-700  !p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </article>
                            </div>

                            <!-- Second Row of Icons -->
                            <div class="grid grid-cols-1 gap-10 items-center w-full md:grid-cols-2">
                                <!-- Connect with Ambassadors -->
                                <article class="flex flex-col justify-center engagement-card">
                                    <div class="engagement-icon flex gap-2.5 items-center p-7 bg-[#FFD700] h-[120px] rounded-[60px] w-[120px] max-md:px-5 mb-2.5"
                                        role="img" aria-label="Ambassador connection icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                            viewBox="0 0 64 64" fill="none">
                                            <g clip-path="url(#clip0_3503_26003)">
                                                <path
                                                    d="M59.6691 38.711C56.8751 35.9121 53.1599 34.3708 49.2082 34.3708C45.5304 34.3708 42.0581 35.7065 39.3421 38.1479L33.8649 33.4835V29.5131C37.1104 29.1069 40.1116 27.6427 42.4613 25.289C48.2269 19.5134 48.2269 10.1159 42.4613 4.34025C39.6672 1.54137 35.9522 0 32.0004 0C28.0487 0 24.3337 1.54137 21.5397 4.34025C15.7741 10.1159 15.7741 19.5134 21.5397 25.289C23.8842 27.6376 26.8776 29.1003 30.1149 29.5103V33.473L24.6588 38.1476C21.9428 35.7064 18.4704 34.3706 14.7928 34.3706C14.7926 34.3706 14.7931 34.3706 14.7928 34.3706C10.8413 34.3706 7.12581 35.9123 4.33194 38.7109C-1.43356 44.4865 -1.43356 53.884 4.33194 59.6596C7.12581 62.4586 10.8409 64 14.7927 64C18.7444 64 22.4594 62.4586 25.2534 59.6598C30.3127 54.5918 30.9319 46.7351 27.1123 40.9837L31.9856 36.8085L36.8887 40.9839C33.0692 46.7351 33.6884 54.5918 38.7477 59.6598C41.5414 62.4586 45.2564 64 49.2082 64H49.2083C53.1598 64 56.8752 62.4584 59.6691 59.6598C65.4346 53.8841 65.4346 44.4866 59.6691 38.711ZM31.9901 16.0229C30.5888 16.0229 29.4488 14.8795 29.4488 13.474C29.4488 12.0685 30.5888 10.9251 31.9901 10.9251C33.3912 10.9251 34.5312 12.0685 34.5312 13.474C34.5312 14.8795 33.3912 16.0229 31.9901 16.0229ZM30.5318 19.7729H33.4691C35.9042 19.7729 37.9308 21.5545 38.3231 23.8853C36.4823 25.1794 34.2956 25.8791 32.0004 25.8791C29.7053 25.8791 27.5186 25.1793 25.6778 23.8853C26.0701 21.5545 28.0967 19.7729 30.5318 19.7729ZM24.1936 6.98962C26.2791 4.9005 29.0516 3.75 32.0004 3.75C34.9493 3.75 37.7218 4.9005 39.8073 6.98962C43.5648 10.7536 44.0434 16.5764 41.2452 20.866C40.3933 19.1444 38.9887 17.744 37.2641 16.9001C37.9061 15.9131 38.2813 14.7372 38.2813 13.4741C38.2813 10.0009 35.4591 7.17525 31.9902 7.17525C28.5212 7.17525 25.6989 10.0009 25.6989 13.4741C25.6989 14.741 26.0746 15.9215 26.7201 16.9102C25.0036 17.7554 23.6057 19.1518 22.7572 20.8684C19.9573 16.5784 20.4354 10.7542 24.1936 6.98962ZM14.7926 60.25C12.4973 60.25 10.3107 59.5501 8.46994 58.2561C8.86219 55.9253 10.8888 54.1436 13.3239 54.1436H16.2612C18.6963 54.1436 20.7229 55.9251 21.1152 58.256C19.2746 59.5501 17.0878 60.25 14.7926 60.25ZM14.7822 50.3936C13.3809 50.3936 12.2409 49.2502 12.2409 47.8447C12.2409 46.4393 13.3809 45.2959 14.7822 45.2959C16.1833 45.2959 17.3233 46.4393 17.3233 47.8447C17.3233 49.2502 16.1834 50.3936 14.7822 50.3936ZM24.0376 55.2364C23.1858 53.5149 21.7812 52.1146 20.0571 51.2706C20.6991 50.284 21.0734 49.1079 21.0734 47.8449C21.0734 44.3716 18.2512 41.546 14.7823 41.546C11.3133 41.546 8.49106 44.3716 8.49106 47.8449C8.49106 49.1115 8.86681 50.2914 9.51219 51.2798C7.79544 52.125 6.39806 53.5225 5.54944 55.2394C2.74944 50.9495 3.22756 45.1251 6.98569 41.3604C9.07119 39.2712 11.8437 38.1208 14.7926 38.1208C17.7414 38.1208 20.5139 39.2712 22.5994 41.3604C26.3568 45.1242 26.8354 50.9467 24.0376 55.2364ZM49.2083 60.25C46.9131 60.25 44.7264 59.5501 42.8857 58.2561C43.2779 55.9253 45.3046 54.1437 47.7397 54.1437H50.6769C53.1121 54.1437 55.1387 55.9253 55.5309 58.2561C53.6902 59.5501 51.5034 60.25 49.2083 60.25ZM49.1979 50.3936C47.7968 50.3936 46.6568 49.2502 46.6568 47.8447C46.6568 46.4393 47.7968 45.2959 49.1979 45.2959C50.5992 45.2959 51.7392 46.4393 51.7392 47.8447C51.7392 49.2502 50.5992 50.3936 49.1979 50.3936ZM58.4513 55.2395C57.5998 53.5169 56.1956 52.1159 54.4707 51.2715C55.1133 50.2845 55.4891 49.1085 55.4891 47.8449C55.4891 44.3716 52.6668 41.546 49.1978 41.546C45.7289 41.546 42.9067 44.3716 42.9067 47.8449C42.9067 49.1116 43.2832 50.2911 43.9287 51.2795C42.2116 52.1245 40.8137 53.522 39.9648 55.239C37.1651 50.9491 37.6433 45.125 41.4013 41.3605C43.4868 39.2714 46.2593 38.1209 49.2082 38.1209C52.1571 38.1209 54.9296 39.2714 57.0151 41.3605C60.7733 45.1251 61.2514 50.9495 58.4513 55.2395Z"
                                                    fill="#20262C" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_3503_26003">
                                                    <rect width="64" height="64" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="pt-1 w-full text-gray-700">
                                        <h2 class="mb-2 text-2xl font-medium leading-7 text-gray-700">
                                            Connect with EU Code Week Ambassadors
                                        </h2>
                                        <p class="text-base leading-6 text-gray-700  !p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </article>

                                <!-- Share Stories -->
                                <article class="flex flex-col justify-center engagement-card">
                                    <div class="engagement-icon flex gap-2.5 items-center p-7 bg-[#FFD700] h-[120px] rounded-[60px] w-[120px] max-md:px-5 mb-2.5"
                                        role="img" aria-label="Story sharing icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64"
                                            viewBox="0 0 64 64" fill="none">
                                            <path
                                                d="M15.4609 29.8402C15.4609 31.6931 16.3022 33.3983 17.7686 34.5237L20.8607 36.8996C21.2358 37.1838 21.6905 37.343 22.1793 37.343C22.6682 37.343 23.4412 37.0701 23.8959 36.5018C24.2483 36.047 24.3961 35.4786 24.3279 34.9102C24.2483 34.3419 23.9641 33.8303 23.498 33.4893L20.406 31.1134C19.8603 30.6928 19.7807 30.1471 19.7807 29.8515C19.7807 29.556 19.8376 29.1695 20.1786 28.7943H20.1218L23.4753 26.2138C23.93 25.8614 24.2256 25.3612 24.3051 24.7928C24.3847 24.2245 24.2256 23.6561 23.8732 23.2013C23.5208 22.7466 23.0206 22.4511 22.4522 22.3715C22.3499 22.3601 22.2589 22.3488 22.168 22.3488C21.6905 22.3488 21.2358 22.5079 20.8607 22.7921L17.7686 25.168C16.3022 26.2934 15.4609 27.9986 15.4609 29.8515V29.8402Z"
                                                fill="#20262C" />
                                            <path
                                                d="M41.8444 37.3316C42.481 37.3316 42.7538 37.1838 43.1631 36.8882L46.2551 34.5123C47.7216 33.3869 48.5628 31.6817 48.5628 29.8288C48.5628 27.9758 47.733 26.2934 46.2893 25.168L46.2438 25.1452L43.1517 22.7693C42.7652 22.4738 42.3105 22.326 41.833 22.326C41.3556 22.326 41.6398 22.326 41.5489 22.3487C40.9805 22.4283 40.4689 22.7125 40.1279 23.1786C39.7755 23.6447 39.6277 24.2017 39.6959 24.7814C39.7755 25.3498 40.0597 25.8614 40.5257 26.2024L43.6178 28.5783C44.1635 28.9989 44.243 29.5446 44.243 29.8402C44.243 30.1357 44.1635 30.6814 43.6178 31.102L40.5257 33.4779C40.071 33.8303 39.7755 34.3305 39.6959 34.8989C39.6163 35.4672 39.7755 36.0356 40.1279 36.4904C40.5257 37.0133 41.1737 37.3316 41.8444 37.3316Z"
                                                fill="#20262C" />
                                            <path
                                                d="M33.5567 22.3715C33.4089 22.3374 33.2725 22.326 33.1248 22.326C32.1244 22.326 31.2149 23.0308 30.999 24.0425L28.7709 34.7511C28.5321 35.9106 29.2824 37.0587 30.4419 37.3088C30.5783 37.3429 30.7148 37.3543 30.8853 37.3543C31.897 37.3543 32.7951 36.6268 32.9997 35.6378L35.2278 24.9292C35.4665 23.7697 34.7163 22.6216 33.5567 22.3715Z"
                                                fill="#20262C" />
                                            <path
                                                d="M60.9992 43.7317V15.2665C60.9992 10.3101 56.9636 6.28589 52.0072 6.28589H11.9923C7.03594 6.28589 3.01172 10.3101 3.01172 15.2665V44.6524C3.01172 49.6088 7.03594 53.6331 11.9923 53.6331H12.7199V53.7354C12.8449 55.2359 13.7089 56.5432 15.0389 57.2253C15.6755 57.5436 16.3462 57.7141 17.0169 57.7141C17.6876 57.7141 18.7676 57.4413 19.4951 56.9297L24.156 53.6331H52.0072C54.3717 53.6331 56.6112 52.7123 58.305 51.0526C59.9875 49.3928 60.9424 47.1761 60.9879 44.8116C60.9879 44.6524 60.9651 44.4819 60.931 44.2773V44.2546V44.2318C60.9651 44.0499 60.9879 43.8908 60.9879 43.7317H60.9992ZM56.7363 44.2773C56.7022 44.4478 56.6794 44.5956 56.6794 44.732C56.634 47.2557 54.5423 49.3133 52.0186 49.3133H23.4625C23.0192 49.3133 22.5758 49.4497 22.2234 49.7111L17.0397 53.3716V51.4732C17.0397 50.2795 16.0734 49.3133 14.8798 49.3133H12.0037C9.43456 49.3133 7.34288 47.2216 7.34288 44.6524V15.2665C7.34288 12.6974 9.43456 10.6057 12.0037 10.6057H52.0186C54.5877 10.6057 56.6794 12.6974 56.6794 15.2665V43.743C56.6794 43.9022 56.7022 44.0613 56.7363 44.2318V44.2546V44.2773Z"
                                                fill="#20262C" />
                                        </svg>
                                    </div>
                                    <div class="pt-1 w-full text-gray-700">
                                        <h2 class="mb-2 text-2xl font-medium leading-7 text-gray-700">
                                            Share your coding experience and stories
                                        </h2>
                                        <p class="text-base leading-6 text-gray-700  !p-0">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                            do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                        </p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="still-have-question-section">
        <div class="animation-section relative bg-[#F5F2FA]">
            <div class="flex relative z-10 flex-col gap-12 items-center py-20 codeweek-container-lg md:flex-row-reverse">
                <div class="flex flex-col flex-1 items-start">
                    <h4 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-4">
                        Placeholder headline
                    </h4>
                    <div class="flex flex-col w-full md:w-auto">
                        <ul class="w-full">
                            <li class="flex flex-wrap gap-3 items-center w-full max-md:max-w-full">
                                <div class="flex gap-2.5 items-center py-2 w-3">
                                    <div class="flex flex-1 self-stretch my-auto w-3 h-3 bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3"
                                        aria-hidden="true"></div>
                                </div>
                                <span class="flex-1 text-xl leading-8 text-gray-700 shrink basis-0 max-md:max-w-full">
                                    Lorme ispum dolar </span>
                            </li>

                            <li class="flex flex-wrap gap-3 items-center mt-6 w-full max-md:max-w-full">
                                <div class="flex gap-2.5 items-center py-2 w-3">
                                    <div class="flex flex-1 self-stretch my-auto w-3 h-3 bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3"
                                        aria-hidden="true"></div>
                                </div>
                                <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                                    Lorme ispum dolar </span>
                            </li>

                            <li class="flex flex-wrap gap-3 items-center mt-6 w-full max-md:max-w-full">
                                <div class="flex gap-2.5 items-center py-2 w-3">
                                    <div class="flex flex-1 self-stretch my-auto w-3 h-3 bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3"
                                        aria-hidden="true"></div>
                                </div>
                                <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                                    Lorme ispum dolar </span>
                            </li>

                            <li class="flex flex-wrap gap-3 items-center mt-6 w-full max-md:max-w-full">
                                <div class="flex gap-2.5 items-center py-2 w-3">
                                    <div class="flex flex-1 self-stretch my-auto w-3 h-3 bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3"
                                        aria-hidden="true"></div>
                                </div>
                                <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                                    Lorme ispum dolar </span>
                            </li>

                            <li class="flex flex-wrap gap-3 items-center mt-6 w-full max-md:max-w-full">
                                <div class="flex gap-2.5 items-center py-2 w-3">
                                    <div class="flex flex-1 self-stretch my-auto w-3 h-3 bg-orange-500 rounded-full shrink basis-0 fill-orange-500 min-h-3"
                                        aria-hidden="true"></div>
                                </div>
                                <span class="flex-1 text-xl text-gray-700 shrink basis-0 max-md:max-w-full">
                                    Lorme ispum dolar </span>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="inline-block relative observer-element">
                        <img class="relative z-10 w-full max-w-xl" loading="lazy" src="/images/get-involved-2.png" />
                    </div>
                </div>
            </div>
            <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-40 -left-36 w-72 h-72 bg-[#B399D6] rounded-full hidden md:block"
                style="transform: translate(-16px, -24px)"></div>
            <div class="animation-element move-background duration-[1.5s] absolute z-0 top-24 right-36 w-24 h-24 hidden md:block bg-[#B399D6] rounded-full"
                style="transform: translate(-16px, -24px)"></div>
            <div class="animation-element move-background duration-[1.5s] absolute z-0 bottom-12 left-40 w-28 h-28 hidden md:block bg-[#B399D6] rounded-full"
                style="transform: translate(-16px, -24px)"></div>
        </div>
    </section>


    <section class="overflow-hidden relative bg-[#F5F2FA]">
        <div class="absolute w-full h-full bg-[#410098] md:hidden" style="clip-path: ellipse(143% 90% at 38% 90%);"></div>
        <div class="hidden absolute w-full h-full bg-[#410098] md:block lg:hidden"
            style="clip-path: ellipse(244% 90% at 50% 90%);"></div>
        <div class="hidden absolute w-full h-full bg-[#410098] lg:block xl:hidden"
            style="clip-path: ellipse(144% 90% at 50% 90%);"></div>
        <div class="hidden absolute w-full h-full bg-[#410098] xl:block" style="clip-path: ellipse(64% 90% at 50% 90%);">
        </div>
        <div class="relative pt-20 pb-24 codeweek-container-lg md:pt-40 md:pb-28 max-w-[890px]">
            <h5
                class="justify-start text-white max-md:text-[22px] text-4xl font-medium font-['Montserrat'] leading-[44px]">
                Placeholder</h5>
            <p class="p-0 text-lg font-normal text-white md:text-xl max-md:mt-2 md:mt-8">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.Lorem ipsum dolor
                sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.
            </p>
        </div>
    </section>
@endsection
