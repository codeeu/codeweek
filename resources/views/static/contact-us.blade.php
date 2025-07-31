@extends('layout.new_base')

@section('title', 'Get in Touch – EU Code Week Support & Inquiries')
@section('description',
    'Connect with the EU Code Week organisers to ask questions, explore partnership opportunities, or share your feedback.')
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
    <section id="codeweek-contact-us" class="font-['Blinker'] overflow-hidden">
        <section class="flex overflow-hidden relative flex-col bg-violet-gradient">
            <div class="relative w-full transition-all">
                <div
                    class="relative flex flex-col justify-end w-full overflow-hidden md:p-0 md:flex-row md:items-center h-[760px]">
                    <div class="flex relative justify-start items-center w-full h-full duration-1000 home-activity">
                        <!-- Image with clip-path -->
                        <img class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%]  md:h-full object-cover transition-all duration-300 hero-image"
                            src="images/contact-us.png" />
                        <div
                            class="flex flex-col-reverse justify-between items-center mx-auto w-full max-md:h-full md:flex-row codeweek-container-lg">
                            <div class="flex justify-center items-center w-full h-full md:w-1/2 max-md:max-h-[50%] max-md:h-full">
                                <div
                                    class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-fit h-fit relative -top-6">
                                    <h1
                                        class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                        Contact us
                                    </h1>
                                    <p
                                        class="text-xl  md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                        We love hearing from the Code Week community — questions, ideas, feedback, or even just a quick hello. Let’s get to know you! 
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
                <h2
                    class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-6">
                     We’re here to help
                </h2>
                <p class="text-[#333E48] font-normal text-[16px] md:text-xl leading-[22px] md:leading-[30px] p-0">
                   Need help planning your activity? Not sure where to start? Our team is here to guide you every step of the way, from finding resources to getting your event online.
                </p>
            </div>
        </div>
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
            <div class="w-full md:bg-white max-w-[1186px] mx-auto md:p-8 lg:px-[6rem] lg:py-[4rem]">
                @if (session('success'))
                    <div class="p-4 mb-4 text-green-700 bg-green-100 rounded border border-green-400">
                        {{ session('success') }}
                    </div>
                @endif

                <form id="contactForm" class="space-y-6" novalidate method="POST" action="{{ route('contact.submit') }}">
                    @csrf

                    <fieldset>
                        <legend class="sr-only">Personal Information</legend>

                        <!-- First + Last Name -->
                        <div class="grid grid-cols-1 gap-6 text-xl lg:grid-cols-2">
                            <div>
                                <label for="first_name" class="text-xl cursor-pointer text-slate-500">First name *</label>
                                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                    placeholder="Enter first name" required aria-required="true" autocomplete="given-name"
                                    class="px-6 mt-2 w-full h-12 text-xl rounded-full border-2 border-solid border-dark-blue-200 text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary placeholder-slate-200" />
                            </div>

                            <div>
                                <label for="last_name" class="text-xl cursor-pointer text-slate-500">Last name *</label>
                                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                    placeholder="Enter last name" required aria-required="true" autocomplete="family-name"
                                    class="px-6 mt-2 w-full h-12 text-xl rounded-full border-2 border-solid border-dark-blue-200 text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary placeholder-slate-200" />
                            </div>
                        </div>

                        <!-- Email + Phone -->
                        <div class="grid grid-cols-1 gap-6 mt-6 text-xl lg:grid-cols-2">
                            <div>
                                <label for="email" class="text-xl cursor-pointer text-slate-500">Email address *</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter your email" required aria-required="true" autocomplete="email"
                                    class="px-6 mt-2 w-full h-12 text-xl rounded-full border-2 border-solid border-dark-blue-200 text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary placeholder-slate-200" />
                            </div>

                            <div>
                                <label for="phone" class="text-xl cursor-pointer text-slate-500">Phone</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="Enter your phone" autocomplete="tel"
                                    class="px-6 mt-2 w-full h-12 text-xl rounded-full border-2 border-solid border-dark-blue-200 text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary placeholder-slate-200" />
                            </div>
                        </div>
                    </fieldset>

                    <!-- Subject Dropdown -->
                    <div class="mt-6 text-xl">
                        <label for="subject" class="text-xl cursor-pointer text-slate-500">Subject *</label>
                        <div class="relative mt-2">
                            <select id="subject" name="subject" required aria-required="true"
                                class="w-full px-6 py-3 rounded-3xl border-2 border-[#A4B8D9] bg-white appearance-none text-slate-600 focus:outline-none focus:ring-2 focus:ring-primary placeholder-slate-200">
                                <option value="">Select subject</option>
                                <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General
                                    Feedback</option>
                                <option value="activities" {{ old('subject') == 'activities' ? 'selected' : '' }}>
                                    Activities</option>
                                <option value="certificates" {{ old('subject') == 'certificates' ? 'selected' : '' }}>
                                    Certificates</option>
                                <option value="resources" {{ old('subject') == 'resources' ? 'selected' : '' }}>Resources
                                </option>
                                <option value="others" {{ old('subject') == 'others' ? 'selected' : '' }}>Others</option>
                            </select>
                            <div class="flex absolute inset-y-0 right-6 items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                    viewBox="0 0 24 25" fill="none">
                                    <path d="M18 9.5L12 15.5L6 9.5" stroke="#5F718A" stroke-width="1.5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="mt-6 text-xl">
                        <label for="message" class="text-xl cursor-pointer text-slate-500">Your message *</label>
                        <textarea id="message" name="message" rows="6" required aria-required="true" placeholder="Enter message"
                            class="mt-2 px-6 py-3 w-full bg-white rounded-3xl border-2 border-[#A4B8D9] text-slate-600 placeholder-slate-200 focus:outline-none focus:ring-2 focus:ring-primary resize-none">{{ old('message') }}</textarea>
                    </div>
                    
                    <!-- Terms -->
                    <label class="flex gap-2 items-start mt-10 cursor-pointer lg:items-center">
                        <input type="checkbox" id="terms" name="terms" required aria-required="true"
                            aria-describedby="terms-description"
                            class="w-8 h-8 bg-white rounded-lg border-2 border-blue-800 text-primary focus:ring-primary focus:ring-2" />
                        <span class="text-xl text-slate-500">
                            <span>I have read and agree with the privacy policy terms described in this document.</span>
                            <a class="ml-1 inline underline hover:no-underline text-[#1C4DA1]"
                                href="/privacy/contact-points" target="_blank">Privacy policy terms</a>
                        </span>
                    </label>

                  <div class="flex justify-center mt-6">
                        <div class="cf-turnstile"></div>
                        <input type="hidden" id="cf-turnstile-response" name="cf-turnstile-response" />
                        <input type="text" name="website" style="display:none;" tabindex="-1" autocomplete="off">
                    </div>

                    <!-- Submit -->
                    <div class="flex justify-center mt-6">
                        <button id="submitButton" type="submit" disabled
                            class="flex gap-2 items-center px-8 py-4 text-base font-semibold leading-7 text-gray-500 normal-case whitespace-nowrap bg-gray-300 rounded-full transition duration-300 cursor-not-allowed max-md:w-fit lg:px-20 disabled:bg-gray-300 disabled:text-gray-500">
                            Send message
                        </button>
                    </div>
                </form>
            </div>
        </div>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js?onload=turnstileCallback" async defer></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('contactForm');
        const submitButton = document.getElementById('submitButton');
        const requiredFields = form.querySelectorAll('[required]');
        const captchaInput = document.getElementById('cf-turnstile-response');

        function validateForm() {
            let allValid = true;
            requiredFields.forEach(field => {
                if ((field.type === 'checkbox' && !field.checked) ||
                    (field.tagName === 'SELECT' && !field.value) ||
                    ((field.tagName === 'INPUT' || field.tagName === 'TEXTAREA') && !field.value.trim())) {
                    allValid = false;
                }
            });

            // Also require CAPTCHA token
            if (!captchaInput.value) allValid = false;

            submitButton.disabled = !allValid;
            submitButton.classList.toggle('bg-primary', allValid);
            submitButton.classList.toggle('hover:bg-hover-orange', allValid);
            submitButton.classList.toggle('cursor-pointer', allValid);
            submitButton.classList.toggle('cursor-not-allowed', !allValid);
            submitButton.classList.toggle('bg-gray-300', !allValid);
            submitButton.classList.toggle('text-gray-500', !allValid);
            submitButton.classList.toggle('text-black', allValid);
        }

        // Watch for form input changes
        form.addEventListener('input', validateForm);
        form.addEventListener('change', validateForm);

        // Turnstile will call this once rendered
        window.turnstileCallback = function () {
            turnstile.render('.cf-turnstile', {
                sitekey: '{{ env('TURNSTILE_SITEKEY') }}',
                callback: function (token) {
                    captchaInput.value = token;
                    validateForm(); // ensure button re-validates once CAPTCHA succeeds
                }
            });
        };
    });
</script>

        </div>
    </section>
    </section>

@endsection
