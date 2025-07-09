@extends('layout.new_base')
@section('title', 'About EU Code Week – Empowering Digital Skills for All')
@section('description', 'Learn about EU Code Week’s mission to promote coding and digital literacy across Europe. Get involved and start coding today!')
@php
    $list = [
        (object) ['label' => 'About Us', 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
@section('content')
    <section id="codeweek-contact-page" class="font-['Blinker'] overflow-hidden">
       <section class="flex overflow-hidden relative flex-col bg-violet-gradient">
            <div class="relative w-full transition-all">
                <div
                    class="relative flex flex-col justify-end w-full overflow-hidden md:p-0 md:flex-row md:items-center h-[760px]">
                    <div class="flex relative justify-start items-center w-full h-full duration-1000 home-activity">
                        <!-- Image with clip-path -->
                        <img class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%]  md:h-full object-cover transition-all duration-300 hero-image"
                            src="images/get-involved-4.png"
                            />
                        <div
                            class="flex flex-col-reverse justify-between items-center mx-auto w-full max-md:h-full md:flex-row codeweek-container-lg">
                            <div class="flex justify-center items-center w-full h-full md:w-1/2">
                                <div
                                    class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-fit h-fit relative -top-6">
                                    <h1
                                        class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                        @lang('about.about_banner_title')
                                    </h1>
                                    <p class="text-xl  md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                        @lang('about.about_banner_content')
                                    </p>
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
                <h2 class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                  @lang('about.when-title')
                </h2>
                <div class="text-[#20262C] font-normal text-lg md:text-2xl p-0 mb-6">
                @lang('about.when-text')
                </div>
                 <span class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                 @lang('about.codeweek_in_numbers-title')
                </span>
                 <div class="text-[#333E48] font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                 @lang('about.codeweek_in_numbers-text')
                </div>
            </div>
        </div>
        <div
            class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-1/3 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
            style="transform: translate(-16px, -24px)"
        ></div>
        <div
            class="animation-element move-background duration-[1.5s] absolute z-0 lg:-bottom-20 xl:-bottom-36 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
            style="transform: translate(-16px, -24px)"
        ></div>
    </section>

    <section class="overflow-hidden relative">
            <div class="absolute w-full h-full bg-yellow-50 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-yellow-50 xl:block" style="clip-path: ellipse(158% 90% at 50% 90%);"></div>
    <section class="flex overflow-hidden relative">
        <div class="flex flex-col items-center px-5 max-lg:pt-5 max-lg:pb-5 lg:py-[10rem] mx-auto w-full max-w-7xl">
            <div class="w-full">
                <div class="w-full">
                    <span class="text-4xl font-medium leading-none text-blue-800 max-md:text-3xl">
                        Code Week in numbers
                    </span>
                </div>

                <div class="grid grid-cols-1 gap-10 justify-center items-start mt-12 w-full md:grid-cols-2 lg:grid-cols-4 max-md:mt-10">
                    <article class="flex flex-col justify-center">
                        <div class="flex gap-2.5 items-center justify-start p-7 bg-yellow-400 h-[120px] rounded-[60px] w-[120px] max-md:px-5   bg-[#FFD700]">
                           <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
                                <g clip-path="url(#clip0_3503_26116)">
                                    <mask id="mask0_3503_26116" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="65" height="65">
                                    <path d="M0.0078125 0.000492096H64.0078V64.0005H0.0078125V0.000492096Z" fill="white"/>
                                    </mask>
                                    <g mask="url(#mask0_3503_26116)">
                                    <path d="M20.8816 47.2331C18.7078 47.2331 16.9453 45.4706 16.9453 43.2981C16.9453 41.2731 18.4753 39.6056 20.4416 39.3856C20.5866 39.3706 20.7328 39.3619 20.8816 39.3619C23.0553 39.3619 24.8166 41.1244 24.8166 43.2981C24.8166 45.1919 23.4791 46.7731 21.6953 47.1481C21.4328 47.2044 21.1603 47.2331 20.8816 47.2331ZM43.1341 17.1969C45.3078 17.1969 47.0703 18.9594 47.0703 21.1331C47.0703 23.1444 45.5616 24.8019 43.6153 25.0394C43.4578 25.0581 43.2966 25.0681 43.1341 25.0681C40.9603 25.0681 39.1991 23.3069 39.1991 21.1331C39.1991 19.2056 40.5828 17.6019 42.4128 17.2631C42.6466 17.2194 42.8878 17.1969 43.1341 17.1969ZM60.1116 21.1331C55.7528 9.86561 44.8141 1.87561 32.0078 1.87561C25.3541 1.87561 19.2041 4.03311 14.2191 7.68686C14.4716 8.20686 14.6141 8.79061 14.6141 9.40686C14.6141 11.5806 12.8516 13.3431 10.6778 13.3431C9.98031 13.3431 9.32531 13.1619 8.75781 12.8444C6.72406 15.3094 5.07531 18.1019 3.90406 21.1331C2.59781 24.5044 1.88281 28.1694 1.88281 32.0006C1.88281 35.9956 2.66031 39.8094 4.07281 43.2981C8.54156 54.3381 19.3653 62.1256 32.0078 62.1256C38.6616 62.1256 44.8116 59.9681 49.7966 56.3144C49.5441 55.7944 49.4016 55.2106 49.4016 54.5944C49.4016 52.4206 51.1641 50.6581 53.3378 50.6581C54.0353 50.6581 54.6903 50.8394 55.2578 51.1569C57.1953 48.8094 58.7828 46.1631 59.9428 43.2981C61.3553 39.8094 62.1328 35.9956 62.1328 32.0006C62.1328 28.1694 61.4178 24.5044 60.1116 21.1331Z" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M43.9331 32.0006C43.9331 35.9956 43.6256 39.8094 43.0656 43.2981C41.2969 54.3381 37.0119 62.1256 32.0056 62.1256C27.6044 62.1256 23.7606 56.1056 21.6931 47.1481C23.4769 46.7731 24.8144 45.1919 24.8144 43.2981C24.8144 41.1244 23.0531 39.3619 20.8794 39.3619C20.7306 39.3619 20.5844 39.3706 20.4394 39.3856C20.2031 37.0231 20.0781 34.5481 20.0781 32.0006C20.0781 28.1694 20.3619 24.5044 20.8781 21.1331C22.6044 9.86561 26.9356 1.87561 32.0056 1.87561C36.4731 1.87561 40.3681 8.07936 42.4106 17.2631C40.5806 17.6019 39.1969 19.2056 39.1969 21.1331C39.1969 23.3069 40.9581 25.0681 43.1319 25.0681C43.2944 25.0681 43.4556 25.0581 43.6131 25.0394C43.8219 27.2731 43.9331 29.6044 43.9331 32.0006Z" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M47.0705 21.1331C47.0705 23.1443 45.5617 24.8018 43.6155 25.0393C43.458 25.0581 43.2967 25.0681 43.1342 25.0681C40.9605 25.0681 39.1992 23.3068 39.1992 21.1331C39.1992 19.2056 40.583 17.6018 42.413 17.2631C42.6467 17.2193 42.888 17.1968 43.1342 17.1968C45.308 17.1968 47.0705 18.9593 47.0705 21.1331Z" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M60.5141 21.1331H60.1116H47.0703" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M39.1975 21.1331H20.8787H3.9025H3.5" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M60.5139 43.298H59.9427H43.0677H24.8164" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M16.9437 43.298H4.07125H3.5" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M24.8166 43.298C24.8166 45.1917 23.4791 46.773 21.6953 47.148C21.4328 47.2042 21.1603 47.233 20.8816 47.233C18.7078 47.233 16.9453 45.4705 16.9453 43.298C16.9453 41.273 18.4753 39.6055 20.4416 39.3855C20.5866 39.3705 20.7328 39.3617 20.8816 39.3617C23.0553 39.3617 24.8166 41.1242 24.8166 43.298Z" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M14.6147 9.40683C14.6147 11.5806 12.8522 13.3431 10.6784 13.3431C9.98094 13.3431 9.32594 13.1618 8.75844 12.8443C7.55594 12.1706 6.74219 10.8831 6.74219 9.40683C6.74219 7.23308 8.50469 5.47058 10.6784 5.47058C12.2359 5.47058 13.5809 6.37433 14.2197 7.68683C14.4722 8.20683 14.6147 8.79058 14.6147 9.40683Z" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M57.2748 54.5943C57.2748 56.7681 55.5123 58.5306 53.3386 58.5306C51.7811 58.5306 50.4361 57.6268 49.7973 56.3143C49.5448 55.7943 49.4023 55.2106 49.4023 54.5943C49.4023 52.4206 51.1648 50.6581 53.3386 50.6581C54.0361 50.6581 54.6911 50.8393 55.2586 51.1568C56.4611 51.8306 57.2748 53.1181 57.2748 54.5943Z" stroke="black" stroke-width="3.75" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    </g>
                                </g>
                                <defs>
                                    <clipPath id="clip0_3503_26116">
                                    <rect width="64" height="64" fill="white"/>
                                    </clipPath>
                                </defs>
                                </svg>
                        </div>
                        <div class="pt-1 mt-2.5 w-full text-gray-700">
                            <h2 class="text-2xl font-medium leading-7 text-gray-700">
                                4 million people in more than 80 countries
                            </h2>
                            <p class="mt-2 !p-0 text-base leading-6 text-gray-700">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </article>

                    <article class="flex flex-col justify-center">
                        <div class="flex gap-2.5 items-center justify-center p-7 bg-yellow-400 h-[120px] rounded-[60px] w-[120px] max-md:px-5   bg-[#FFD700]">
                           <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
  <g clip-path="url(#clip0_3503_26148)">
    <path d="M61.1108 21.6449V19.6314C61.1108 17.9775 60.8231 16.2517 60.1759 14.382C62.1894 12.8719 63.4119 10.4989 63.4119 8.05393C63.4119 3.5955 59.8164 0 55.4299 0C51.0434 0 50.3243 1.36629 48.8142 3.66741C47.304 3.23595 45.8658 3.02022 44.5715 3.02022H42.4142C40.976 3.02022 39.4658 3.23595 37.8838 3.73932C36.3737 1.36629 33.9288 0 31.1962 0C26.8097 0 23.2142 3.5955 23.2142 8.05393C23.2142 10.6427 24.5086 13.0876 26.7378 14.5977C26.1625 16.3955 25.8748 18.0494 25.8748 19.6314V21.3573C24.0771 22.364 22.9265 24.2337 22.9265 26.2472C22.9265 28.2607 23.0704 27.7573 23.4299 28.4764H17.8209L19.1872 26.0314L15.8793 24.1618L14.6569 26.3191L13.1468 24.1618L9.98272 26.3191L11.7086 28.8359C6.9625 30.0584 3.51081 34.2292 3.51081 38.9033V42.4269C3.51081 43.0741 3.79845 43.6494 4.30182 44.009C2.14452 44.8 0.5625 46.8854 0.5625 49.3303C0.5625 51.7752 3.07935 54.9393 6.17149 54.9393H6.67486C8.68834 60.4045 13.794 64 19.5468 64H23.2142C28.967 64 34.1445 60.3325 36.0861 54.9393C39.1063 54.8674 41.5512 52.3505 41.5512 49.3303C41.5512 46.3101 40.113 45.0157 38.0276 44.1528C38.6029 43.7932 38.9625 43.2179 38.9625 42.4988V40.8449C38.9625 40.8449 39.0344 40.8449 39.1063 40.8449C39.9692 41.0606 40.904 41.2045 41.9827 41.2045H45.0029C45.722 41.2045 46.513 41.1326 47.304 40.9887C48.6703 40.773 49.9647 40.3415 51.1872 39.7663C54.2793 38.2562 56.6524 35.8112 58.0906 32.5033L58.3063 31.9281C61.3265 31.8562 63.7714 29.3393 63.7714 26.3191C63.7714 23.2989 62.8366 22.7955 61.2546 21.7168L61.1108 21.6449ZM37.5962 49.2584C37.5962 49.8337 37.3085 50.409 36.8052 50.6966C36.8052 50.5528 36.8052 50.337 36.8052 50.1932V47.8202C37.2366 48.1797 37.5962 48.6831 37.5962 49.2584ZM5.66811 51.0561C4.80519 50.9123 4.22991 50.1932 4.22991 49.2584C4.22991 48.3236 4.80519 47.6764 5.5962 47.5326V50.1932C5.5962 50.4809 5.5962 50.7685 5.66811 51.0561ZM58.4501 10.7865C56.94 8.41348 54.8546 6.47191 52.3377 5.10562C53.1288 4.3146 54.2074 3.81123 55.358 3.81123C57.6591 3.81123 59.5288 5.6809 59.5288 7.98202C59.5288 10.2831 59.1692 9.9955 58.4501 10.7146V10.7865ZM59.7445 26.2472C59.7445 26.8225 59.4568 27.3258 59.0254 27.6854C59.0254 27.4696 59.0254 27.2539 59.0254 27.0382V24.9528C59.4568 25.3123 59.7445 25.8157 59.7445 26.3191V26.2472ZM9.40744 44.2966H10.3423C12.2119 44.2966 14.0816 43.4337 15.2322 41.9236C16.3827 43.3618 18.1805 44.2966 20.1939 44.2966H32.9939V50.1932C32.9939 55.6584 28.5355 60.1168 23.0704 60.1168H19.4029C13.9378 60.1168 9.47935 55.6584 9.47935 50.1932V44.2966H9.40744ZM18.1086 39.4067C17.9647 39.191 17.749 38.9033 17.6052 38.5438C17.3895 38.1123 17.2456 37.7528 17.2456 37.6809C17.1737 36.818 16.4546 36.0989 15.5917 35.955C14.0097 35.7393 13.4344 37.1056 12.7153 38.9753C12.3558 39.9101 11.4209 40.5573 10.4142 40.5573H7.53778C7.39396 40.5573 7.32205 40.5573 7.17823 40.5573V38.9033C7.17823 37.1775 7.89733 35.4517 9.26362 34.2292C10.6299 33.0067 12.4277 32.2876 14.3692 32.2876H27.8883C28.5355 32.2876 29.1827 32.3595 29.8299 32.5753C32.7063 33.2944 34.8636 35.6674 35.0793 38.5438C35.0793 38.6876 35.0793 38.7595 35.0793 38.9033V40.4854C35.0793 40.4854 35.0074 40.4854 34.9355 40.4854H20.1939C19.331 40.4854 18.6119 40.1258 18.1086 39.4067ZM28.176 11.0742C27.385 10.2831 26.8816 9.20449 26.8816 8.05393C26.8816 6.90337 27.313 5.89663 28.1041 5.10562C28.8951 4.3146 29.9737 3.88314 31.0524 3.88314C32.2748 3.88314 33.3535 4.38651 34.1445 5.24943C31.6996 6.61573 29.6142 8.62921 28.1041 11.0742H28.176ZM27.6726 24.6652V26.9663C27.6726 27.2539 27.6726 27.5416 27.6726 27.8292C27.0254 27.5416 26.5939 26.9663 26.5939 26.2472C26.5939 25.5281 27.0254 24.9528 27.6726 24.6652ZM31.4838 26.9663V24.3056H37.4524C39.6097 24.3056 41.2636 23.5146 42.4142 22.0045C43.4209 23.0831 44.931 24.3056 47.0883 24.3056H55.2141V26.9663C55.2141 27.6854 55.0703 28.3326 54.9984 29.1236V29.4112C54.8546 29.7708 54.7108 30.0584 54.6389 30.418L54.4231 31.0651C53.4164 33.3663 51.6186 35.2359 49.3894 36.3146C48.4546 36.746 47.5917 37.0337 46.513 37.1775C46.1535 37.2494 45.5063 37.3213 44.8591 37.3213H41.8389C41.1198 37.3213 40.4726 37.2494 39.6816 37.0337C39.322 37.0337 38.9625 36.8899 38.6029 36.746C37.8119 33.2944 35.2232 30.418 31.7715 29.1955C31.5557 28.4764 31.4838 27.7573 31.4838 26.9663ZM44.6434 18.6247C43.9962 17.9056 43.2771 16.9708 42.1265 16.9708C40.976 16.9708 41.8389 16.9708 41.6951 16.9708C41.1917 17.0427 40.2569 17.4741 39.8973 18.7685C39.4658 20.1348 38.6748 20.4225 37.5243 20.4225H29.6142V19.5595C29.6142 17.7618 29.9737 16.0359 30.6928 14.4539C31.9872 11.4337 34.5041 8.98876 37.5962 7.76629C39.0344 7.19101 40.6883 6.83146 42.3423 6.83146H44.4995C46.0097 6.83146 47.5198 7.1191 49.0299 7.69438C52.1939 8.84494 54.7827 11.2899 56.2209 14.382C56.94 16.0359 57.3715 17.8337 57.3715 19.6314V20.4944C57.3715 20.4944 57.3714 20.4944 57.2995 20.4944H47.2321C46.2973 20.4944 45.4344 19.4876 44.7153 18.6247H44.6434Z" fill="black"/>
    <path d="M48.8867 28.1889C49.7496 28.1889 50.4687 27.4698 50.4687 26.6069C50.4687 25.7439 49.7496 25.0248 48.8867 25.0248C48.0238 25.0248 47.3047 25.7439 47.3047 26.6069C47.3047 27.4698 48.0238 28.1889 48.8867 28.1889Z" fill="black"/>
    <path d="M43.2067 33.2226C45.4359 33.2226 47.2336 31.4248 47.2336 29.1956V28.8361H43.4224V29.1956C43.4224 29.2675 43.2067 29.2675 43.2067 29.2675C43.2067 29.2675 42.9909 29.2675 42.9909 29.1956V28.8361H39.1797V29.1956C39.1797 31.4248 40.9774 33.2226 43.2067 33.2226Z" fill="black"/>
    <path d="M20.9137 54.7237C23.1429 54.7237 24.9406 52.9259 24.9406 50.6967V50.3372H21.1294V50.6967C21.1294 50.7686 20.9137 50.7686 20.9137 50.7686C20.9137 50.7686 20.698 50.7686 20.698 50.6967V50.3372H16.8867V50.6967C16.8867 52.9259 18.6845 54.7237 20.9137 54.7237Z" fill="black"/>
    <path d="M15.1601 49.6899C16.0231 49.6899 16.7422 48.9708 16.7422 48.1078C16.7422 47.2449 16.0231 46.5258 15.1601 46.5258C14.2972 46.5258 13.5781 47.2449 13.5781 48.1078C13.5781 48.9708 14.2972 49.6899 15.1601 49.6899Z" fill="black"/>
    <path d="M26.668 49.6899C27.5309 49.6899 28.25 48.9708 28.25 48.1078C28.25 47.2449 27.5309 46.5258 26.668 46.5258C25.805 46.5258 25.0859 47.2449 25.0859 48.1078C25.0859 48.5393 25.2298 48.9708 25.5893 49.2584C25.9489 49.546 26.3084 49.7618 26.7399 49.7618L26.668 49.6899Z" fill="black"/>
    <path d="M37.5234 28.1889C38.3863 28.1889 39.1055 27.4698 39.1055 26.6069C39.1055 25.7439 38.3863 25.0248 37.5234 25.0248C36.6605 25.0248 35.9414 25.7439 35.9414 26.6069C35.9414 27.4698 36.6605 28.1889 37.5234 28.1889Z" fill="black"/>
  </g>
  <defs>
    <clipPath id="clip0_3503_26148">
      <rect width="64" height="64" fill="white"/>
    </clipPath>
  </defs>
</svg>
                        </div>
                        <div class="pt-1 mt-2.5 w-full text-gray-700">
                            <h2 class="text-2xl font-medium leading-7 text-gray-700">
                                Average participant 11 years old
                            </h2>
                            <p class="mt-2 !p-0 text-base leading-6 text-gray-700">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </article>

                    <article class="flex flex-col justify-center">
                        <div class="flex gap-2.5 items-center justify-center p-7 bg-yellow-400 h-[120px] rounded-[60px] w-[120px] max-md:px-5   bg-[#FFD700]">
                           <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
  <g clip-path="url(#clip0_3503_26162)">
    <path d="M47.0331 36.2716C55.3223 27.985 55.3223 14.5016 47.0331 6.215C38.7438 -2.07175 25.2563 -2.07175 16.9669 6.215C8.67769 14.5016 8.67769 27.985 16.9669 36.2716C20.4757 39.7793 24.9158 41.8016 29.4987 42.3399V49.4552H24.4964C23.1151 49.4552 21.9953 50.5747 21.9953 51.9556C21.9953 53.3365 23.1151 54.456 24.4964 54.456H29.4987V61.4995C29.4988 62.8804 30.6186 63.9999 32.0001 63.9999C33.3814 63.9999 34.5012 62.8804 34.5012 61.4995V54.456H39.5036C40.8849 54.456 42.0047 53.3365 42.0047 51.9556C42.0047 50.5747 40.8849 49.4552 39.5036 49.4552H34.5012V42.34C39.0842 41.8016 43.5243 39.7793 47.0331 36.2716ZM20.5042 32.7355C14.1653 26.3986 14.1653 16.0879 20.5042 9.751C26.8429 3.41438 37.1568 3.414 43.4959 9.751C49.8348 16.0879 49.8348 26.3986 43.4959 32.7355C37.1571 39.0723 26.8431 39.0723 20.5042 32.7355Z" fill="black"/>
  </g>
  <defs>
    <clipPath id="clip0_3503_26162">
      <rect width="64" height="64" fill="white"/>
    </clipPath>
  </defs>
</svg>
                        </div>
                        <div class="pt-1 mt-2.5 w-full text-gray-700">
                            <h2 class="text-2xl font-medium leading-7 text-gray-700">
                                49% of participants are women
                            </h2>
                            <p class="mt-2 !p-0 text-base leading-6 text-gray-700">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </article>

                    <article class="flex flex-col justify-center">
                        <div class="flex gap-2.5 items-center justify-center p-7 bg-yellow-400 h-[120px] rounded-[60px] w-[120px] max-md:px-5  bg-[#FFD700]">
                     <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64" fill="none">
                    <g clip-path="url(#clip0_3503_26171)">
                    <path d="M31.9975 24.2432C27.6415 24.2432 24.0977 27.7869 24.0977 32.143C24.0977 36.499 27.6415 40.043 31.9975 40.043C36.3538 40.043 39.8974 36.499 39.8974 32.143C39.8974 27.7869 36.3537 24.2432 31.9975 24.2432ZM31.9975 36.2929C29.7094 36.2929 27.8477 34.4312 27.8477 32.1429C27.8477 29.8548 29.7094 27.993 31.9975 27.993C34.2859 27.993 36.1474 29.8547 36.1474 32.1429C36.1474 34.4313 34.2858 36.2929 31.9975 36.2929Z" fill="black"/>
                    <path d="M62.125 42.175H51.95V25.0527L53.3158 25.6736C53.5675 25.788 53.8311 25.8423 54.0906 25.8423C54.8032 25.8423 55.4844 25.4336 55.7986 24.7426C56.2271 23.7999 55.8104 22.6884 54.8675 22.2599L33.875 12.7176V5.75825H40.0335C41.0689 5.75825 41.9085 4.91875 41.9085 3.88325V1.875C41.9085 0.8395 41.0689 0 40.0335 0H32C30.9646 0 30.125 0.8395 30.125 1.875V12.7176L9.13262 22.2598C8.19 22.6882 7.773 23.7998 8.20175 24.7425C8.63 25.6852 9.74175 26.1019 10.6844 25.6735L12.0501 25.0526V42.175H1.875C0.839625 42.175 0 43.0145 0 44.05V62.125C0 63.1605 0.839625 64 1.875 64H13.925H25.975H38.0247H50.0747H62.125C63.1606 64 64 63.1605 64 62.125V44.05C64 43.0145 63.1606 42.175 62.125 42.175ZM12.05 60.25H3.75V45.925H12.05V60.25ZM36.1499 60.25H27.8501V51.9501H36.1499V60.25ZM48.2 44.05V60.25H39.9V50.0751C39.9 49.0396 39.0606 48.2001 38.025 48.2001H25.9753C24.9399 48.2001 24.1003 49.0396 24.1003 50.0751V60.25H15.8003V44.05H15.8V23.3481L32 15.9845L48.2 23.3481V44.05ZM60.25 60.25H51.95V45.925H60.25V60.25Z" fill="black"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_3503_26171">
                    <rect width="64" height="64" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
                                            </div>
                        <div class="pt-1 mt-2.5 w-full text-gray-700">
                            <h2 class="text-2xl font-medium leading-7 text-gray-700">
                                88% of Code Week events take part in schools
                            </h2>
                            <p class="mt-2 !p-0 text-base leading-6 text-gray-700">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    </article>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-10 items-start mt-20 w-full lg:grid-cols-2 max-md:mt-10">
                <div class="flex flex-col justify-center">
                    <p class="text-xl leading-8 text-gray-700">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud exercitation ullamco laboris.Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua.
                        <br />
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.Lorem
                        ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud exercitation ullamco laboris.
                    </p>

                    <div class="flex flex-col gap-2 items-start mt-6 w-full text-lg font-semibold leading-loose sm:flex-row">
                        <div class="flex gap-2 items-start min-h-12 text-zinc-800">
                            <button
                                class="btn flex gap-2 justify-center items-center px-10 h-[48px]  bg-primary min-h-12 rounded-[100px] max-md:px-5 w-fit whitespace-nowrap hover:bg-orange-500  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500"
                                aria-label="Add your activity to Code Week"
                            >
                                <span class="text-zinc-800">Add your activity</span>
                            </button>
                        </div>

                        <div class="flex gap-10 items-start text-blue-800">
                            <button
                                class="flex overflow-hidden flex-col justify-center px-6 h-[48px] whitespace-nowrap rounded-3xl border-2 border-blue-800 border-solid btn max-md:px-5 w-fit hover:bg-secondary hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-800"
                                aria-label="Show activity map"
                            >
                                <div class="flex gap-2 items-center">
                                   Show activity map
                                    <img
                                        src="https://cdn.builder.io/api/v1/image/assets/f35586c581c84ecf82b6de32c55ed39e/8fc3296536a7475f67194943256e39f6f12eb8cc?placeholderIfAbsent=true"
                                        alt=""
                                        class="object-contain w-4 h-4 shrink-0"
                                        aria-hidden="true"
                                    />
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="text-sm font-semibold leading-none text-black">
                    <div class="flex flex-col justify-center bg-white rounded-[32px] p-4">
                            <div class="flex relative gap-2 items-center py-2 mb-0 lg:py-8 max-lg:flex-wrap lg:flex-row" role="tablist" aria-label="Map view options">
                                <button
                                    class="flex gap-2 justify-center items-center px-4 py-1 text-white whitespace-nowrap bg-blue-800 rounded-2xl btn w-fit hover:bg-hover hover:text-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-800"
                                    role="tab"
                                    aria-selected="true"
                                    aria-controls="activities-view"
                                >
                                    <span>Activities</span>
                                </button>

                                <button
                                    class="flex gap-2 justify-center items-center px-4 py-1 whitespace-nowrap bg-cyan-100 rounded-2xl btn w-fit hover:bg-hover hover:text-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-100"
                                    role="tab"
                                    aria-selected="false"
                                    aria-controls="participants-view"
                                >
                                    <span>Participants</span>
                                </button>

                                <button
                                    class="flex gap-2 justify-center items-center px-4 py-1 whitespace-nowrap bg-cyan-100 rounded-2xl btn w-fit hover:bg-hover hover:text-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-100"
                                    role="tab"
                                    aria-selected="false"
                                    aria-controls="countries-view"
                                >
                                    <span>Countries</span>
                                </button>
                            </div>
                        <div class="flex relative flex-col items-start w-full rounded-2xl">
                            <img
                                src="https://placehold.co/600x400"
                                alt="Code Week activity map showing global participation"
                                class="object-cover  min-h-[453px] relative inset-0 rounded-2xl size-full"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Add keyboard navigation for tab buttons
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('[role="tab"]');

            tabButtons.forEach((button, index) => {
                button.addEventListener('keydown', function(e) {
                    if (e.key === 'ArrowRight' || e.key === 'ArrowLeft') {
                        e.preventDefault();

                        // Remove focus from current button
                        button.setAttribute('aria-selected', 'false');
                        button.classList.remove('bg-blue-800', 'text-white');
                        button.classList.add('bg-cyan-100');

                        // Calculate next button index
                        let nextIndex;
                        if (e.key === 'ArrowRight') {
                            nextIndex = (index + 1) % tabButtons.length;
                        } else {
                            nextIndex = (index - 1 + tabButtons.length) % tabButtons.length;
                        }

                        // Focus and activate next button
                        const nextButton = tabButtons[nextIndex];
                        nextButton.focus();
                        nextButton.setAttribute('aria-selected', 'true');
                        nextButton.classList.remove('bg-cyan-100');
                        nextButton.classList.add('bg-blue-800', 'text-white');
                    }
                });

                button.addEventListener('click', function() {
                    // Reset all buttons
                    tabButtons.forEach(btn => {
                        btn.setAttribute('aria-selected', 'false');
                        btn.classList.remove('bg-blue-800', 'text-white');
                        btn.classList.add('bg-cyan-100');
                    });

                    // Activate clicked button
                    button.setAttribute('aria-selected', 'true');
                    button.classList.remove('bg-cyan-100');
                    button.classList.add('bg-blue-800', 'text-white');
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const filterButtons = document.querySelectorAll('[role="tab"]');
        const image = document.querySelector('img[alt*="Code Week activity map"]');

        const images = {
            "activities-view": "https://placehold.co/600x400?text=Activities",
            "participants-view": "https://placehold.co/600x400?text=Participants",
            "countries-view": "https://placehold.co/600x400?text=Countries"
        };

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
            filterButtons.forEach(b => b.setAttribute('aria-selected', 'false'));
            button.setAttribute('aria-selected', 'true');
            const view = button.getAttribute('aria-controls');
            image.src = images[view];
            });
        });
        });
        </script>
    </section>



     <section class="flex overflow-hidden relative">
        <div class="flex flex-col items-center pt-5 pb-5 mx-auto w-full max-w-[1428px] max-lg:px-5">
            <div class="flex flex-col items-center py-24">
                <article class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center rounded-lg w-full max-w-[1428px]">
                    <div class="flex-1 shrink basis-0 min-w-60 max-md:max-w-full">
                        <h4 class="text-4xl font-medium leading-none text-blue-800 max-md:max-w-full">
                            Run by volunteers
                        </h4>
                        <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                            veniam, quis nostrud exercitation ullamco laboris.Lorem ipsum dolor sit
                            amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris.Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris.
                        </p>
                    </div>
                    <img
                        src="/images/about/1.png"
                        alt="Volunteers working together in a collaborative environment"
                        class="object-contain rounded-2xl aspect-[1.5] min-w-60 w-full max-w-[674px] max-md:max-w-full"
                    />
                </article>

                <article class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mt-24 rounded-lg w-full max-w-[1428px] max-md:mt-10">
                    <img
                        src="/images/about/2.png"
                        alt="Students learning coding and programming skills"
                        class="object-contain rounded-2xl aspect-[1.5] min-w-60 w-full max-w-[674px] max-md:max-w-full lg:order-1"
                    />
                    <div class="flex-1 shrink basis-0 min-w-60 max-md:max-w-full lg:order-2">
                        <h4 class="text-4xl font-medium leading-none text-blue-800 max-md:max-w-full">
                            Why coding?
                        </h4>
                        <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                            veniam, quis nostrud exercitation ullamco laboris.Lorem ipsum dolor sit
                            amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris.Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris.
                        </p>
                    </div>
                </article>
            </div>
        </div>
    </section>


    <section class="flex overflow-hidden relative bg-[#E8EDF6]" role="region" aria-labelledby="commission-heading">

            <div class="py-20 grid grid-cols-1 lg:grid-cols-2 gap-10 items-center mx-auto w-full max-w-[1428px] px-5">
                <div class="flex-1 min-w-60">
                    <h2 id="commission-heading" class="text-4xl font-medium leading-10 text-blue-800 max-md:max-w-full">
                        Supported by the European Commission
                    </h2>
                    <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud exercitation ullamco laboris.Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris.Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris.
                    </p>
                </div>
                <div class="min-w-60">
                    <img
                        src="/images/eulogofunded.svg"
                        alt="European Commission logo and branding"
                        class="object-contain w-full h-auto max-w-[674px]"
                        loading="lazy"
                    />
                </div>
            </div>
    
    </section>


    <section class="flex overflow-hidden relative">
         <div class="flex flex-col items-center w-full mx-auto max-w-[1428px] py-[5rem] px-5">
            <div class="grid grid-cols-1 gap-10 items-center w-full rounded-lg lg:grid-cols-2">
                <div class="flex-1 shrink basis-0 min-w-60 max-md:max-w-full">
                    <span class="w-full text-4xl font-medium leading-none text-blue-800">
                        Schools
                    </span>
                    <p class="mt-6 text-xl leading-8 text-gray-700 max-md:max-w-full">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                        veniam, quis nostrud exercitation ullamco laboris.Lorem ipsum dolor sit
                        amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                        exercitation ullamco laboris.Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris.
                    </p>
                </div>
                <img
                    src="/images/about/3.png"
                    alt="School building exterior showing modern architecture with students walking in the courtyard"
                    class="object-contain my-auto rounded-lg aspect-[1.5] min-w-60 w-full max-w-[674px] max-md:max-w-full"
                />
            </div>
        </div>
    </section>

@php
    $partners = collect([
        [
            'name' => 'JA EUROPE',
            'logo_url' => 'images/partners/JAEurope1.jpg',
        ],
        [
            'name' => 'CoderDojo Belgium',
            'logo_url' => 'images/partners/coderdojo.png',
        ],
        [
            'name' => 'Profil Klett',
            'logo_url' => 'images/partners/profilklett.jpg',
        ],
         [
            'name' => 'Digitale Wolven',
            'logo_url' => 'images/partners/DigitaleWolven.png',
        ],
                [
            'name' => 'Matrix Internet',
            'logo_url' => 'images/partners/matrix.png',
        ],
        [
            'name' => 'eSkills Malta Foundation',
            'logo_url' => 'images/partners/eskills.jpg',
        ],
        [
            'name' => 'PJA Ukraine',
            'logo_url' => 'images/partners/JAUkraine1.png',
        ],
         [
            'name' => 'CityLab, STEM Labs (GREECE)',
            'logo_url' => 'images/partners/citylab.png',
        ],
    ]);
@endphp
<style>
.partner-slider {
    visibility: hidden;
}
.partner-slider.slick-initialized {
    visibility: visible;
}
    .slick-track {
        gap: 1rem;
        display: flex;
    }
</style>
<section class="overflow-hidden relative py-8">
    <div class="mx-auto max-w-[1428px] relative">
        <div class="px-5 w-full">
            <h4 class="text-4xl font-medium tracking-tighter leading-none text-blue-800 max-md:max-w-full">
                Partners and Sponsors
            </h4>
            <p class="mt-6 text-xl text-gray-700 max-md:max-w-full">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua.
            </p>
        </div>
    </div>
</section>
<section class="overflow-hidden relative py-8">
    <div class="relative px-5 mx-auto w-full">
        <!-- Arrows (positioned absolutely over the slider container) -->
        <button class="absolute left-4 top-1/2 z-10 p-4 rounded-full duration-300 -translate-y-1/2 cursor-pointer prev-arrow bg-yellow hover:bg-primary" aria-label="Previous slide">
            <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.8335 16H7.16683" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16.5 6.66663L7.16667 16L16.5 25.3333" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        <button class="absolute right-4 top-1/2 z-10 p-4 rounded-full duration-300 -translate-y-1/2 cursor-pointer next-arrow bg-yellow hover:bg-primary" aria-label="Next slide">
            <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.16699 16H25.8337" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16.5 6.66663L25.8333 16L16.5 25.3333" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>

        <!-- Slick Slider -->
        <div class="partner-slider w-full mx-auto  !max-w-[1428px]" role="region" aria-label="Partner logos carousel">
            @foreach($partners as $partner)
                <article class="!flex flex-col justify-center items-center py-10 mx-2 bg-white rounded-2xl border-2 border-indigo-300 border-solid h-[167px]">
                    <img
                        src="{{ asset($partner['logo_url']) }}"
                        alt="{{ $partner['name'] }} logo"
                        class="object-contain max-w-full w-[200px]"
                        style="aspect-ratio: 2;"
                    />
                </article>
            @endforeach
        </div>
    </div>
    <script>
$(document).ready(function(){
    const $slider = $('.partner-slider');
    if ($slider.length) {
        $slider.slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: false,
            infinite: true,
            arrows: false,
            responsive: [
                { breakpoint: 1587, settings: { slidesToShow: 3 }},
                { breakpoint: 1084, settings: { slidesToShow: 2 }},
                { breakpoint: 768, settings: { slidesToShow: 1 }}
            ]
        });

        $('.prev-arrow').on('click', () => $slider.slick('slickPrev'));
        $('.next-arrow').on('click', () => $slider.slick('slickNext'));
    }
});
</script>
</section>

<section class="flex overflow-hidden relative">
    <div class="flex flex-col items-center pt-5 pb-12 mx-auto w-full max-w-container max-lg:px-5">
        <div class="flex gap-2 items-start text-lg font-semibold leading-loose text-zinc-800">
            <a href="/partners/"
                class="btn flex gap-2 justify-center items-center px-10 py-2.5 bg-primary hover:bg-hover-orange duration-300 min-h-12 rounded-[100px] w-fit whitespace-nowrap transition-colors  focus:ring-orange-400"
                type="button"
                aria-label="Visit all partners page"
            >
                <span class="transition-colors duration-200 text-zinc-800">
                    Visit all partners
                </span>
            </a>
        </div>
    </div>
</section>


     <section class="overflow-hidden relative bg-yellow-50">
            <div class="absolute w-full h-full bg-[#410098] md:hidden" style="clip-path: ellipse(270% 90% at 38% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-[#410098] md:block lg:hidden" style="clip-path: ellipse(188% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-[#410098] lg:block xl:hidden" style="clip-path: ellipse(128% 90% at 50% 90%);"></div>
            <div class="hidden absolute w-full h-full bg-[#410098] xl:block" style="clip-path: ellipse(93% 90% at 50% 90%);"></div>
            <div class="flex relative justify-center pt-20 pb-16 codeweek-container-lg md:pt-40 md:pb-28">
                <div class="flex flex-col gap-10 lg:flex-row-reverse lg:gap-20">
                    <div class="relative flex-1 order-1">
                        <img src="{{asset('images/get-involved-5.png')}}" class="object-cover w-full">
                    </div>
                    <div class="flex flex-col flex-1 justify-center h-full order-0 md:order-2">
                        <h2 class="text-white text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                           Join EU Code Week
                        </h2>
                        <p class="p-0 mb-6 text-base font-normal leading-7 text-white tablet:text-xl">
                            Can’t wait to start coding? If you would like to join the EU Code Week community but don't know where to start, take a look at these resources that will help get you started, just in time for our annual celebration in October.
                        </p>
                        <div class="flex gap-2 items-center mb-6"><div class="w-3 h-3 rounded-full bg-primary"></div><a class="text-base font-normal text-white tablet:text-xl hover:underline" href="https://blog.codeweek.eu/getting-started-with-eu-code-week/">@lang('cw2020.get-involved.content.0')</a></div>
                        <div class="flex gap-2 items-center mb-6"><div class="w-3 h-3 rounded-full bg-primary"></div><a class="text-base font-normal text-white tablet:text-xl hover:underline" href="{{route("guide")}}">@lang('cw2020.get-involved.content.1')</a></div>
                        <div class="flex gap-2 items-center mb-6"><div class="w-3 h-3 rounded-full bg-primary"></div><a class="text-base font-normal text-white tablet:text-xl hover:underline" href="{{route("training.index")}}">@lang('cw2020.get-involved.content.2')</a></div>
                        <div class="flex gap-2 items-center mb-6"><div class="w-3 h-3 rounded-full bg-primary"></div><a class="text-base font-normal text-white tablet:text-xl hover:underline" href="https://bit.ly/DEEPDIVE2020">@lang('cw2020.get-involved.content.3')</a></div>
                        <div class="flex gap-2 items-center mb-6"><div class="w-3 h-3 rounded-full bg-primary"></div><a class="text-base font-normal text-white tablet:text-xl hover:underline" href="{{route("coding@home")}}">@lang('cw2020.get-involved.content.4')</a></div>
                    </div>
                </div>
            </div>
        </section>
</section>

@endsection
