@extends('layout.new_base')

@php
    $pageTitle = $page?->meta_title ?: 'Grassroots Grants – EU Code Week';
    $pageDescription = $page?->meta_description ?: 'EU Code Week Round 1 grassroots grant projects and impact across Europe.';
    $list = [
        (object) ['label' => 'Grassroots Grants', 'href' => ''],
    ];
@endphp

@section('title', $pageTitle)
@section('description', $pageDescription)

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

<style>
    @media (min-width: 768px) {
        .hero-image {
            clip-path: ellipse(70% 120% at 70% -2%);
        }
    }

    .grants-content ul {
        list-style: disc;
        padding-left: 1.5rem;
        margin-bottom: 1rem;
    }

    .grants-content li {
        margin-bottom: 0.5rem;
    }

    .grants-content p {
        margin-bottom: 1rem;
    }

    .grants-content a {
        color: #1C4DA1;
        text-decoration: underline;
    }

    .grants-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .grants-gallery img {
        width: 100%;
        height: 160px;
        object-fit: cover;
        border-radius: 12px;
    }
</style>

@section('content')
    <section id="codeweek-grassroots-grants" class="font-['Blinker'] overflow-hidden">
        @if(($previewMode ?? false) === true)
            <div class="bg-yellow-100 border-b border-yellow-300 text-[#20262C]">
                <div class="codeweek-container-lg py-3 text-sm md:text-base font-medium">
                    Preview mode: this page is not published yet. Share only the signed preview link from Nova.
                </div>
            </div>
        @endif

        <section class="flex overflow-hidden relative flex-col bg-violet-gradient">
            <div class="relative w-full transition-all">
                <div class="relative flex flex-col justify-end w-full overflow-hidden md:p-0 md:flex-row md:items-center h-[760px]">
                    <div class="flex relative justify-start items-center w-full h-full duration-1000 home-activity">
                        <img
                            class="absolute top-0 right-0 w-full md:w-[60vw] h-[50%] md:h-full object-cover transition-all duration-300 hero-image"
                            src="{{ $page?->hero_image ?: '/images/contact-us.png' }}"
                            alt=""
                        />
                        <div class="flex flex-col-reverse justify-between items-center mx-auto w-full max-md:h-full md:flex-row codeweek-container-lg">
                            <div class="flex justify-center items-center w-full h-full md:w-1/2 max-md:max-h-[50%] max-md:h-full">
                                <div class="px-6 py-10 md:px-14 md:py-[4.5rem] bg-white rounded-[32px] z-10 w-fit h-fit relative -top-6">
                                    <h1 class="text-[#1C4DA1] text-[30px] md:text-[60px] leading-9 md:leading-[72px] font-normal font-['Montserrat'] mb-4">
                                        {{ $page?->hero_title ?: 'EU Code Week Grants for Grassroots' }}
                                    </h1>
                                    <p class="text-xl md:text-2xl leading-8 text-[#333E48] p-0 mb-4 max-md:max-w-full max-w-[525px]">
                                        {{ $page?->hero_subtitle ?: 'Round 1 project highlights from grassroots coding initiatives across Europe.' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="overflow-hidden relative bg-white">
            <div class="flex relative justify-center py-20 md:py-28 codeweek-container-lg">
                <div class="w-full max-w-[900px]">
                    @if($page?->round_title)
                        <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-10">
                            {{ $page->round_title }}
                        </h2>
                    @endif

                    @if($page?->overview_intro)
                        <div class="grants-content text-[#333E48] text-lg md:text-xl font-normal mb-8">
                            {!! $page->overview_intro !!}
                        </div>
                    @endif

                    @if($page?->overview_activity_types)
                        <h3 class="text-dark-blue text-xl md:text-2xl leading-8 font-medium font-['Montserrat'] mt-10 mb-4">
                            Common types of activities delivered
                        </h3>
                        <div class="grants-content text-[#333E48] text-lg md:text-xl font-normal mb-8">
                            {!! $page->overview_activity_types !!}
                        </div>
                    @endif

                    @if($page?->overview_underserved)
                        <div class="grants-content text-[#333E48] text-lg md:text-xl font-normal mb-10">
                            {!! $page->overview_underserved !!}
                        </div>
                    @endif

                    <h2 class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-6 md:mb-10">
                        Funded projects by country hub
                    </h2>

                    <div class="accordion">
                        @forelse(($page?->activeHubs ?? collect()) as $hub)
                            <div class="bg-transparent border-b-2 border-solid border-[#A4B8D9]">
                                <div class="text-[#20262C] font-semibold text-lg py-4 cursor-pointer flex items-center justify-between duration-300 accordion-item-header">
                                    <p>{{ $hub->title }}</p>
                                    <button class="flex justify-center items-center rounded-full duration-300 bg-yellow hover:bg-primary min-w-12 min-h-12">
                                        <img class="duration-300" src="/images/digital-girls/arrow.svg" alt="" />
                                    </button>
                                </div>
                                <div class="overflow-hidden max-h-0 transition-all duration-300">
                                    <div class="pb-6 pt-2 text-[#333E48] text-lg md:text-xl font-normal grants-content">
                                        @if($hub->isStatusOnly())
                                            @if($hub->status_message)
                                                {!! $hub->status_message !!}
                                            @endif
                                        @else
                                            <div class="mb-4">
                                                @if($hub->projects_funded !== null)
                                                    <p><strong>Projects funded:</strong> {{ number_format($hub->projects_funded) }}</p>
                                                @endif
                                                @if($hub->participants_reached !== null)
                                                    <p><strong>Participants reached:</strong> {{ number_format($hub->participants_reached) }}</p>
                                                @endif
                                                @if($hub->educators_engaged !== null)
                                                    <p><strong>Educators engaged:</strong> {{ number_format($hub->educators_engaged) }}</p>
                                                @endif
                                                @if($hub->activities_on_platform !== null)
                                                    <p><strong>Activities on Code Week platform:</strong> {{ number_format($hub->activities_on_platform) }}</p>
                                                @endif
                                            </div>

                                            @if($hub->overview)
                                                <div class="mb-6">{!! $hub->overview !!}</div>
                                            @endif

                                            @if($hub->underserved_focus)
                                                <p class="mb-6"><strong>Underserved focus:</strong> {{ $hub->underserved_focus }}</p>
                                            @endif

                                            <h4 class="text-dark-blue text-xl font-medium font-['Montserrat'] mb-4">Funded Projects</h4>

                                            @foreach($hub->activeProjects as $project)
                                                <div class="mb-8 pb-6 border-b border-[#E8EDF6] last:border-b-0">
                                                    <h5 class="text-dark-blue text-lg md:text-xl font-semibold font-['Montserrat'] mb-2">{{ $project->title }}</h5>
                                                    @if($project->organisation)
                                                        <p><strong>Organisation:</strong> {{ $project->organisation }}</p>
                                                    @endif
                                                    @if($project->location)
                                                        <p><strong>Location:</strong> {{ $project->location }}</p>
                                                    @endif
                                                    @if($project->participants || $project->educators || $project->activities)
                                                        <p>
                                                            @if($project->participants)<strong>Participants:</strong> {{ $project->participants }}@endif
                                                            @if($project->educators) | <strong>Educators:</strong> {{ $project->educators }}@endif
                                                            @if($project->activities) | <strong>Activities:</strong> {{ $project->activities }}@endif
                                                        </p>
                                                    @endif
                                                    @if($project->description)
                                                        <div class="mt-3">{!! $project->description !!}</div>
                                                    @endif
                                                    @if($project->underserved_focus)
                                                        <p class="mt-3"><strong>Underserved focus:</strong> {{ $project->underserved_focus }}</p>
                                                    @endif
                                                    @if($project->links->isNotEmpty())
                                                        <div class="mt-3">
                                                            <p class="font-semibold mb-2">Links:</p>
                                                            <ul class="list-none pl-0">
                                                                @foreach($project->links as $link)
                                                                    <li class="mb-2">
                                                                        <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" class="cookweek-link hover-underline break-all">
                                                                            {{ $link->label ?: $link->url }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    @if($project->images->isNotEmpty())
                                                        <div class="grants-gallery">
                                                            @foreach($project->images as $image)
                                                                @if($image->isPdf())
                                                                    <a href="{{ $image->resolvedUrl() }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center p-4 bg-[#E8EDF6] rounded-xl text-dark-blue font-semibold text-sm text-center min-h-[160px]">
                                                                        PDF: {{ basename($image->url) }}
                                                                    </a>
                                                                @else
                                                                    <img src="{{ $image->resolvedUrl() }}" alt="{{ $image->alt ?: $project->title }}" loading="lazy" />
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-[#333E48] text-lg">Grant hub content will appear here once seeded.</p>
                        @endforelse
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
