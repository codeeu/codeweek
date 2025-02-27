@extends('layout.base')

@section('content')
    <section id="codeweek-events-add-page" class="codeweek-page thank_you">
        @include('event.event_header')

        <section class="w-full mx-auto codeweek-content-wrapper" style="margin-top:0px;"
            x-data="addActivity()">
            <div class="flex flex-col max-w-full m-auto" role="main" aria-labelledby="confirmation-title">
                <div class="flex flex-col w-full py-8 lg:py-16 max-md:max-w-full max-sm:px-4 max-md:px-8">
                    <div class="flex flex-col items-center justify-center w-full">
                        <svg width="80" height="80" viewBox="0 0 80 80" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="80" height="80" rx="40" fill="#99CC28" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M28 35.999L24 39.999L36 51.999L56 31.999L52 27.999L36 43.999L28 35.999Z"
                                fill="#164194" />
                        </svg>

                        <h1 id="confirmation-title"
                            class="mt-6 text-2xl font-bold leading-tight text-center text-orange-500 lg:text-40 max-md:max-w-full">
                            @lang('event.thanks_page.title')
                        </h1>
                        <div class="max-md:max-w-full m-auto max-w-[730px] pt-[20px] text-center">
                            <span class="leading-6 text-center text-black text-default">
                                @lang('event.thanks_page.phrase1')
                                <a href="{{ $event->path() }}"><strong>{{ $event->title }}</strong></a>
                                @lang('event.thanks_page.phrase2') @lang('event.thanks_page.phrase3')<a href="{{ route('ambassadors') }}">
                                    @lang('event.thanks_page.phrase4')</a>
                                <br />
                            </span>
                            <br />
                            <span class="block">
                                @if ($event->codeweek_for_all_participation_code)
                                    @lang('event.thanks_page.phrase7')
                                    <strong>{{ $event->codeweek_for_all_participation_code }}</strong>
                                @endif
                            </span>
                            <br />
                            <span class="block">See the information you supplied below:</span>
                        </div>
                    </div>
                    <div class="flex flex-col w-full mt-10 max-md:max-w-full">
                        <div class="flex flex-col w-full max-md:max-w-full">
                            <h2 class="text-2xl font-bold leading-none text-black max-md:max-w-full">
                                Activity
                            </h2>
                            <div class="flex flex-col w-full mt-4 text-black text-default max-md:max-w-full">
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default"
                                    role="group" aria-labelledby="activity-title">
                                    <div id="activity-title" class="self-stretch w-40 my-auto max-xxs:font-bold">@lang('event.title.label')</div>
                                    <div class="self-stretch w-40 my-auto">{{ $event->title }}</div>
                                </div>
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default "
                                    role="group" aria-labelledby="activity-type">
                                    <div id="activity-type" class="self-stretch w-40 my-auto max-xxs:font-bold">@lang('event.activitytype.label')</div>
                                    <div class="self-stretch w-40 my-auto">
                                        {{ ucfirst(str_replace('-', ' ', $event->activity_type)) }}</div>
                                </div>
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default "
                                    role="group" aria-labelledby="activity-date">
                                    <div id="activity-date" class="self-stretch w-40 my-auto max-xxs:font-bold">@lang('event.start.label')</div>
                                    <div class="self-stretch w-40 my-auto">{{ $event->start_date }} – {{ $event->end_date }}
                                    </div>
                                </div>
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 whitespace-nowrap max-md:max-w-full text-default"
                                    role="group" aria-labelledby="activity-address">
                                    <div id="activity-address" class="self-stretch w-40 my-auto max-xxs:font-bold">@lang('event.address.label')</div>
                                    <div class="self-stretch w-40 my-auto">{{ $event->location }}</div>
                                </div>
                                <div class="flex flex-col items-start w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default"
                                    role="group" aria-labelledby="activity-description">
                                    <div id="activity-description" class="w-40 my-auto welf-stretch max-xxs:font-bold">@lang('event.description.label')</div>
                                    <div class="flex-1 leading-6 shrink basis-0 max-md:max-w-full">
                                        {!! $event->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col w-full mt-10 max-md:max-w-full">
                            <h2 class="text-2xl font-bold leading-none text-black max-md:max-w-full">
                                Who is the activity for?
                            </h2>
                            <div class="flex flex-col w-full mt-4 text-black text-default max-md:max-w-full">
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 max-xxs:gap-2 xxs:flex-row bg-grey-3 whitespace-nowrap max-md:max-w-full"
                                    role="group" aria-labelledby="activity-audience">
                                    <div id="activity-audience" class="self-stretch w-40 my-auto max-xxs:font-bold">@lang('event.audience_title')</div>
                                    <div class="self-stretch w-40 my-auto">
                                        @if($event->audiences->count())
                                            {{ implode(', ', $event->audiences->pluck('name')->toArray()) }}
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 whitespace-nowrap max-md:max-w-full text-default"
                                    role="group" aria-labelledby="activity-theme">
                                    <div id="activity-theme" class="self-stretch w-40 my-auto max-xxs:font-bold">@lang('event.theme_title')</div>
                                    <div class="self-stretch w-40 my-auto">
                                        @php
                                            $themes = $event->themes->pluck('name')->toArray();
                                        @endphp

                                        @if (count($themes))
                                            {{ implode(', ', $themes) }}
                                        @else
                                            N/A
                                        @endif
                                    </div>
                                </div>
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default "
                                    role="group" aria-labelledby="activity-participants">
                                    <div id="activity-participants" class="self-stretch w-40 my-auto max-xxs:font-bold">Number of participants
                                    </div>
                                    <div class="self-stretch my-auto">
                                        {{ $event->participants_count }} – {{ $event->percentage_of_females }} Females,
                                        {{ $event->percentage_of_males }} Males, {{ $event->percentage_of_other }} Others
                                    </div>
                                </div>
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 whitespace-nowrap max-md:max-w-full text-default"
                                    role="group" aria-labelledby="activity-age">
                                    <div id="activity-age" class="self-stretch w-40 my-auto max-xxs:font-bold">Age</div>
                                    <div class="self-stretch w-40 my-auto">{{ $event->age_group }}</div>
                                </div>
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default "
                                    role="group" aria-labelledby="activity-extra">
                                    <div id="activity-extra" class="self-stretch w-40 my-auto max-xxs:font-bold">Extracuricular activity
                                    </div>
                                    <div class="self-stretch w-40 my-auto">{{ ucfirst($event->extracurricular_activity) }}
                                    </div>
                                </div>
                                <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default "
                                    role="group" aria-labelledby="activity-recurring">
                                    <div id="activity-recurring" class="self-stretch w-40 my-auto max-xxs:font-bold">Recurring event</div>
                                    <div class="self-stretch w-40 my-auto">{{ ucfirst($event->frequency) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col w-full mt-10 text-black max-md:max-w-full">
                            <div class="flex flex-col items-center w-full gap-6 px-4 py-2 max-xxs:gap-2 xxs:flex-row text-default bg-grey-3 max-md:max-w-full"
                                role="group" aria-labelledby="activity-code">
                                <div id="activity-code" class="self-stretch w-40 my-auto max-xxs:font-bold">@lang('event.codeweek_for_all_participation_code.title')</div>
                                <div class="self-stretch my-auto">{{ $event->codeweek_for_all_participation_code }}</div>
                            </div>
                            <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row text-default bg-grey-3 max-md:max-w-full"
                                role="group" aria-labelledby="activity-teachers">
                                <div id="activity-teachers" class="self-stretch w-40 my-auto max-xxs:font-bold">@lang('community.titles.2')</div>
                                <div class="self-stretch my-auto">
                                      @if($event->leadingTeacher)
                                          {{ $event->leadingTeacher->name }}
                                      @else
                                          N/A
                                      @endif
                                </div>
                            </div>
                            <div class="flex flex-col items-start w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default"
                                role="group" aria-labelledby="activity-image">
                                <div id="activity-image" class="w-40 text-default ">@lang('event.image')</div>
                                <div class="flex flex-col justify-center min-w-[240px] w-[280px]">
                                    @if ($event->picture)
                                        <div class="text-default">Image attached</div>
                                        <img loading="lazy" src="{{ asset('storage/' . $event->picture) }}"
                                            class="object-contain mt-2 max-w-full aspect-[1.77] w-[280px]"
                                            alt="Activity cover image" />
                                        <div class="mt-2 text-sm">{{ basename($event->picture) }}</div>
                                    @else
                                        <div class="text-default">No image uploaded</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-full mt-10 max-md:max-w-full">
                        <h2 class="text-2xl font-bold leading-none text-black max-md:max-w-full">
                            Organisation
                        </h2>
                        <div class="flex flex-col w-full mt-4 text-black text-default max-md:max-w-full">
                            <div class="flex flex-col items-center w-full gap-6 px-4 py-2 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default"
                                role="group" aria-labelledby="org-name">
                                <div id="org-name" class="self-stretch w-40 my-auto max-xxs:font-bold">Name of organisation</div>
                                <div class="self-stretch w-40 my-auto">{{ $event->organizer }}</div>
                            </div>
                            <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default "
                                role="group" aria-labelledby="org-type">
                                <div id="org-type" class="self-stretch w-40 my-auto max-xxs:font-bold">Type of organisation</div>
                                <div class="self-stretch w-40 my-auto">{{ ucfirst($event->organizer_type ?? 'N/A') }}
                                </div>
                            </div>
                            <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 whitespace-nowrap max-md:max-w-full text-default"
                                role="group" aria-labelledby="org-language">
                                <div id="org-language" class="self-stretch w-40 my-auto max-xxs:font-bold">Language</div>
                                <div class="self-stretch w-40 my-auto">
                                    {{ $event->language ? __('base.languages.' . $event->language) : 'N/A' }}</div>
                            </div>
                            <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 whitespace-nowrap max-md:max-w-full text-default"
                                role="group" aria-labelledby="org-country">
                                <div id="org-country" class="self-stretch w-40 my-auto max-xxs:font-bold">@lang('event.country')</div>
                                <div class="self-stretch w-40 my-auto">
                                    {{ $event->country_iso ? __('countries.' . $event->country_iso) : 'N/A' }}</div>
                            </div>
                            <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 whitespace-nowrap max-md:max-w-full text-default"
                                role="group" aria-labelledby="org-website">
                                <div id="org-website" class="self-stretch w-40 my-auto max-xxs:font-bold">Website</div>
                                <div class="self-stretch w-40 my-auto">
                                    @if ($event->event_url)
                                        <a href="{{ $event->event_url }}" target="_blank"
                                            class="text-blue-600 underline">
                                            {{ $event->event_url }}
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </div>
                            </div>
                            <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default "
                                role="group" aria-labelledby="org-public-email">
                                <div id="org-public-email" class="self-stretch w-40 my-auto max-xxs:font-bold">Public email</div>
                                <div class="self-stretch w-40 my-auto">{{ $event->contact_person }}</div>
                            </div>
                            <div class="flex flex-col items-center w-full gap-6 px-4 py-2 mt-1 max-xxs:gap-2 xxs:flex-row bg-grey-3 max-md:max-w-full text-default "
                                role="group" aria-labelledby="org-private-email">
                                <div id="org-private-email" class="self-stretch w-40 my-auto max-xxs:font-bold">Private email</div>
                                <div class="self-stretch w-40 my-auto">{{ $event->user_email ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex flex-col items-start justify-between w-full gap-10 mt-10 font-bold text-black sm:flex-row text-default max-md:max-w-full">
                        <a href="/"
                            class="flex items-start justify-center py-3 text-center text-black border-2 border-solid border-primary rounded-3xl hover:bg-primary focus:outline-none focus:ring-2 focus:ring-primary w-full sm:w-[208px]"
                            role="button">
                            BACK TO HOMEPAGE
                        </a>
                        <a href="/activities-locations"
                            class="flex items-start justify-center py-3 text-center text-black border-2 border-solid bg-primary rounded-3xl hover:bg-white focus:outline-none focus:ring-2 focus:ring-primary border-primary w-full sm:w-[208px]"
                            role="button">
                            ADD ANOTHER ACTIVITY
                        </a>
                    </div>
                </div>

        </section>

    </section>
@endsection
