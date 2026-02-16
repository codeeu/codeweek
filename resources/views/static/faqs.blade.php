@extends('layout.new_base')

@section('title', 'FAQs - EU Code Week')
@section('description', 'Frequently asked questions about EU Code Week.')

@php
    $list = [
        (object) ['label' => 'FAQs', 'href' => ''],
    ];
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
                        <img class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%]  md:h-full object-cover transition-all duration-300 hero-image"
                            src="images/contact-us.png" />
                        <div
                            class="flex flex-col-reverse justify-between items-center mx-auto w-full max-md:h-full md:flex-row codeweek-container-lg">
                            <div class="flex justify-center items-center w-full h-full md:w-1/2 max-md:max-h-[50%] max-md:h-full">
                                <div
                                    class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-fit h-fit relative -top-6">
                                    <h1
                                        class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                        Frequently Asked Questions
                                    </h1>
                                    <p
                                        class="text-xl  md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                        Find quick answers about EU Code Week, activities, participation, and resources.
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

        <section class="overflow-hidden relative bg-white">
            <div class="flex relative justify-center py-20 md:py-28 codeweek-container-lg">
                <div class="w-full max-w-[708px]">
                    <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-10">
                        Frequently Asked Questions
                    </h2>

                    <h3 class="text-dark-blue text-xl md:text-2xl leading-8 font-medium font-['Montserrat'] mt-10 mb-4">
                        Getting started
                    </h3>
                    <div class="accordion">
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How can I take part in EU Code Week?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Use the guide on <a class="cookweek-link hover-underline" href="https://codeweek.eu/guide" target="_blank" rel="noopener">this page</a> to join EU Code Week by organising an activity and pinning it on the map. It explains what Code Week is, what you need (a group, a venue, devices or an unplugged option), and how to run a hands-on session using free resources. You'll also find promotion tips, toolkits, and ambassador support if needed.
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-dark-blue text-xl md:text-2xl leading-8 font-medium font-['Montserrat'] mt-10 mb-4">
                        Activities
                    </h3>
                    <div class="accordion">
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How do I create an activity?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Use the step-by-step guide on <a class="cookweek-link hover-underline" href="https://codeweek.eu/guide" target="_blank" rel="noopener">this page</a>. It walks you through everything you need to submit an activity, including details to include, adding participants, promotion, adding your event to the map, and more.
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Why isn't my activity showing up on the map?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Most of the time, it's because your activity is still waiting for approval, or it has been rejected. You'll get an email when your activity status changes, so if you haven't received anything yet, it likely just hasn't been reviewed.
                                    <br><br>
                                    If a couple of days pass and it's still not appearing, email info@codeweek.eu and include key details like the country and the activity name (and anything else that helps identify it).
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>I submitted an activity but didn't get a confirmation email. What should I do?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    You'll receive an email only when there's a change to your activity's status, for example if it's approved or rejected). If you haven't received that email yet, your submission is probably still in the review queue.
                                    <br><br>
                                    If it's been a couple of days and you still have no update, contact info@codeweek.eu and share your country, activity name, and any other identifying details.
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>My school's address isn't showing in the dropdown. What can I do?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Code Week uses <a class="cookweek-link hover-underline" href="https://geocode.arcgis.com/arcgis/" target="_blank" rel="noopener">ArcGIS</a>, an open-source mapping system. Sometimes a school name won't appear because the ArcGIS database isn't fully up to date or doesn't match the exact wording of your school's name. If that happens, choose the street name and number, or the closest matching address instead.
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How do I report my activity once it's finished?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    You don't need to submit a separate report anymore. Since June 2025, the activity submission form already includes the reporting metrics.
                                    <br><br>
                                    If you need to correct or update the information you originally submitted, go to <a class="cookweek-link hover-underline" href="https://codeweek.eu/events_to_report" target="_blank" rel="noopener">this page</a> while logged into your account. It's the page that lists your activities that have started or finished, and it lets you adjust the numbers for statistical purposes and claim your Code Week participation certificate (you'll get one certificate per activity).
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-dark-blue text-xl md:text-2xl leading-8 font-medium font-['Montserrat'] mt-10 mb-4">
                        Certificates
                    </h3>
                    <div class="accordion">
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How do I get a Code Week certificate?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    It depends on the type of certificate. Code Week has three types: Certificate of Participation, Certificate of Excellence, and Super Organiser certificate.
                                    <br><br>
                                    Participation certificates are created by the activity organiser once the activity is finished. The other two are generated by the Code Week team, usually around March, for everyone who was eligible in the previous calendar year.
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>I took part in an activity. How do I get my Certificate of Participation?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Your activity organiser is the person who provides participation certificates. If you haven't received yours, the quickest way is to contact the organiser directly and ask them to generate it for you.
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>I organised an activity. How do I generate Certificates of Participation for my class or group?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Go to <a class="cookweek-link hover-underline" href="https://codeweek.eu/participation" target="_blank" rel="noopener">this page</a> for a form to generate certificates of participation. You'll be asked to enter your participants' names. You'll then receive the individual certificates of participation for each name you entered.
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>Where do I download the certificates I generated?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Use <a class="cookweek-link hover-underline" href="https://codeweek.eu/participation" target="_blank" rel="noopener">this link</a> to open the page that lists your certificates to download. Make sure you're logged in to your Code Week account, or you won't see your generated certificates.
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How do I change a name or fix a mistake on a participation certificate?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    You can't edit a participation certificate after it's created. If something is wrong (name spelling, formatting, etc), you'll need to generate it again using the same steps as above: go back to the certificate generation link, re-enter the correct details, and download the new version.
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>When will I receive my Certificate of Excellence?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Certificates of Excellence are usually generated by the Code Week team around March, covering eligible awardees from the previous calendar year (for example, certificates for 2026 are typically generated around March 2027).
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>When will I get my super organiser certificate?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Super organiser certificates are usually generated around March, for people who were eligible in the previous calendar year (for example, certificates for 2026 are typically generated around March 2027).
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How do I download my organiser certificate?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    If you qualify for a super organiser certificate, you'll receive an email when it's generated. You can download your certificate directly from that email, or via <a class="cookweek-link hover-underline" href="/certificates">this link</a>.
                                    <br><br>
                                    If you're looking for certificates of participation (for your class or group), you'll need to generate them yourself using <a class="cookweek-link hover-underline" href="https://codeweek.eu/participation" target="_blank" rel="noopener">this link</a>. Add each participant's name separated by commas, submit the form, and the individual certificates will be created. Once generated, you can download them from <a class="cookweek-link hover-underline" href="https://codeweek.eu/participation" target="_blank" rel="noopener">this link</a>. Just make sure you're logged in to your account!
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-dark-blue text-xl md:text-2xl leading-8 font-medium font-['Montserrat'] mt-10 mb-4">
                        The Code Week 4 All Challenge
                    </h3>
                    <div class="accordion">
                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>What is the Code Week 4 All challenge?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    The Code Week 4 All challenge is a simple way to team up with other organisers and earn a Code Week certificate of excellence together. You link your Code Week activities with friends, colleagues, or partner organisations using a shared code. If your alliance reaches 10 linked activities from 10 different organisers, or involves 3 countries, everyone in the alliance earns the certificate.
                                </div>
                            </div>
                        </div>

                        <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                            <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                <p>How do I take part in the Code Week 4 All challenge?</p>
                                <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                    <img class="duration-300" src="/images/digital-girls/arrow.svg" />
                                </button>
                            </div>
                            <div class="overflow-hidden max-h-0 transition-all duration-300">
                                <div class="pb-4 pt-2 text-[#333E48] text-xl font-normal">
                                    Submit your activity on the EU Code Week map. If you're starting a new alliance, wait for approval, then use the unique Code Week 4 All code emailed to you and share it with others. If you're joining an alliance, enter the code when registering your activity. The challenge runs to 31 December, and certificates arrive January/February after reporting.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const accordionItemHeaders = document.querySelectorAll('.accordion-item-header');

            accordionItemHeaders.forEach(accordionItemHeader => {
                accordionItemHeader.addEventListener('click', () => {
                    accordionItemHeader.classList.toggle('active');

                    const button = accordionItemHeader.querySelector('button');
                    button.classList.toggle('!bg-primary');
                    button.classList.toggle('!hover:bg-hover-orange');

                    const arrowIcon = accordionItemHeader.querySelector('img, svg');
                    if (arrowIcon) {
                        arrowIcon.classList.toggle('rotate-180');
                    }

                    const accordionItemBody = accordionItemHeader.nextElementSibling;
                    if (accordionItemHeader.classList.contains('active')) {
                        accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + 'px';
                    } else {
                        accordionItemBody.style.maxHeight = 0;
                    }
                });
            });
        });
    </script>
@endpush
