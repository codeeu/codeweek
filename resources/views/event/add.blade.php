@extends('layout.new_base')

@section('content')
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <section id="codeweek-events-add-page" class="codeweek-page event">
            @include('event.event_header')
            <section class="codeweek-content-wrapper mx-auto max-w-[680px] py-16 max-sm:px-4 max-md:px-8" x-data="multiStepForm"
                x-init="console.log('Section initialized')" style="margin-top:0px;">
                <div class="flex items-start self-center">
                    <div class="flex flex-col w-20">
                        <div
                            x-bind:class="{
                                'bg-lime': currentStep >= 1,
                                'bg-slate-200': currentStep < 1,
                                'flex flex-col justify-center items-center self-center px-2.5 w-12 h-12 rounded-full': true
                            }">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.7988 12.5997L5.3988 14.9997L12.5988 22.1997L24.5988 10.1997L22.1988 7.79968L12.5988 17.3997L7.7988 12.5997Z"
                                    fill="#164194" />
                            </svg>
                        </div>
                        <span
                            x-bind:class="{
                                'text-black': currentStep >= 1,
                                'text-gray-400': currentStep < 1,
                                'mt-2 font-bold text-center': true
                            }">Activity</span>
                    </div>
                    <div class="flex flex-col pt-6 w-[100px]">
                        <div
                            x-bind:class="{
                                'bg-lime': currentStep >= 2,
                                'bg-slate-200': currentStep < 2,
                                'flex w-full min-h-[2px]': true
                            }">
                        </div>
                    </div>
                    <div class="flex flex-col items-center text-center">
                        <div
                            x-bind:class="{
                                'bg-lime': currentStep >= 2,
                                'bg-slate-200': currentStep < 2,
                                'flex flex-col items-center justify-center w-12 h-12 rounded-full': true
                            }">
                            <!-- Show '2' on Step 1 -->
                            <span x-show="currentStep === 1" class="text-2xl font-bold text-secondary">2</span>

                            <!-- Show SVG on Step 2 -->
                            <svg x-show="currentStep === 2" xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                viewBox="0 0 30 30" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M7.7988 12.5997L5.3988 14.9997L12.5988 22.1997L24.5988 10.1997L22.1988 7.79968L12.5988 17.3997L7.7988 12.5997Z"
                                    fill="#164194" />
                            </svg>
                        </div>
                        <span
                            x-bind:class="{
                                'text-black': currentStep >= 2,
                                'text-gray-400': currentStep < 2,
                                'mt-2': true
                            }">Organisation</span>
                    </div>
                </div>

                <div class="flex flex-col w-full mt-10 max-md:max-w-full">
                    <h2 class="text-4xl font-bold leading-tight text-orange-500 max-md:max-w-full">
                        <span x-show="currentStep === 1">Join the community</span>
                        <span x-show="currentStep === 2">Tell us about your organisation</span>
                    </h2>
                    <p class="mb-4 leading-6 text-black text-form max-md:max-w-full">
                        <span x-show="currentStep === 1">Ready to inspire the next generation of
                            coders? Share your event details to promote it to a wider audience. Who knows — your event might be
                            featured on our official Code Week channels!</span>
                        <span x-show="currentStep === 2">Help us get to know your organisation better! By giving us these
                            details, you’re making it easier for EU Code Week to support and promote your activity.</span>
                    </p>
                </div>


                <form enctype="multipart/form-data" method="post" role="form" class="codeweek-form" action="/events">
                    <p class="hidden">@lang('event.required')</p>

                    {{ csrf_field() }}


                    <div class="step-one" x-show="currentStep === 1" x-cloak>
                        <div class="codeweek-form-inner-container">
                            <div class="flex flex-col mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="id_title">@lang('event.title.label')*</label>
                                    <div class="flex flex-col w-full md:max-w-[472px]">
                                        <input
                                            class="w-full px-6 py-3 text-form md:max-w-[472px] text-black-light rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
                                            id="id_title" maxlength="255" name="title" placeholder="@lang('event.title.placeholder')"
                                            type="text" value="{{ old('title', isset($title) ? $title : '') }}"
                                            x-on:input="clearFieldError('title')">
                                    </div>

                                </div>
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                        for="id_title"></label>
                                    <div class="flex flex-col w-full md:max-w-[472px] errors">
                                        @component('components.validation-errors', ['field' => 'title'])
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row mt-4 codeweek-form-field-wrapper max-sm:flex-col max-sm:items-start">
                                <div
                                    class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="activity_type"> @lang('event.activitytype.label')*</label>
                                    <div class="flex flex-col w-full md:max-w-[472px]">
                                        <div class="relative inline-block w-full text-gray-700">
                                            <select id="id_activity_type" name="activity_type"
                                                class="w-full px-6 border-0 py-3 text-form text-black-light md:max-w-[472px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full codeweek-input-select"
                                                required>
                                                <option value="" disabled {{ old('activity_type') ? '' : 'selected' }}>
                                                    @lang('event.activitytype.placeholder')
                                                </option>
                                                <option value="open-online"
                                                    {{ old('activity_type') == 'open-online' ? 'selected' : '' }}>
                                                    @lang('event.activitytype.open-online')
                                                </option>
                                                <option value="invite-online"
                                                    {{ old('activity_type') == 'invite-online' ? 'selected' : '' }}>
                                                    @lang('event.activitytype.invite-online')
                                                </option>
                                                <option value="open-in-person"
                                                    {{ old('activity_type') == 'open-in-person' ? 'selected' : '' }}>
                                                    @lang('event.activitytype.open-in-person')
                                                </option>
                                                <option value="invite-in-person"
                                                    {{ old('activity_type') == 'invite-in-person' ? 'selected' : '' }}>
                                                    @lang('event.activitytype.invite-in-person')
                                                </option>
                                                <option value="other" {{ old('activity_type') == 'other' ? 'selected' : '' }}>
                                                    @lang('event.organizertype.other')
                                                </option>
                                            </select>
                                            <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                    viewBox="0 0 24 25" fill="none">
                                                    <path d="M6 9.40002L12 15.4L18 9.40002" stroke="black" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>

                                        <!-- Error display -->
                                        <div class="errors">
                                            @component('components.validation-errors', ['field' => 'activity_type'])
                                            @endcomponent
                                        </div>
                                    </div>


                                </div>
                            </div>


                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="id_start_date">@lang('event.start.label')*</label>
                                    <date-time :start-date-value="'{{ old('start_date') }}'"
                                        :end-date-value="'{{ old('end_date') }}'" placeholder-start="@lang('event.start.placeholder')"
                                        placeholder-end="@lang('event.end.placeholder')"></date-time>
                                </div>
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                        for="id_title"></label>
                                    <div class="flex flex-col w-full md:max-w-[472px] errors">
                                        @component('components.validation-errors', ['field' => 'start_date'])
                                        @endcomponent
                                        @component('components.validation-errors', ['field' => 'end_date'])
                                        @endcomponent
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex items-start justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="mt-2 text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="id_location"><span
                                            x-show="!isOnlineActivitySelected()"></span>@lang('event.address.label')*
                                        <br />

                                    </label>
                                    <div class="w-full md:max-w-[472px] flex address_ flex-col">
                                        <autocomplete-geo class="w-full" name="location"
                                            :initial-location="'{{ old('location') ?: $location->location ?? '' }}'"
                                            :initial-geoposition="'{{ old('geoposition') ?: $location->geoposition ?? '' }}'"
                                            placeholder="@lang('event.address.placeholder')"></autocomplete-geo>

                                        <div class="errors" style="margin-bottom: 10px; margin-left:0;">
                                            @component('components.validation-errors', ['field' => 'location'])
                                            @endcomponent
                                        </div>
                                        <div id="events-add-map"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="id_description">@lang('event.description.label')*</label>
                                    <textarea
                                        class="h-[280px] block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-dark-orange sm:text-sm/6"
                                        cols="40" id="id_description" name="description" placeholder="@lang('event.description.placeholder')" rows="10">{{ old('description') }}</textarea>
                                </div>
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap"
                                        for="id_title"></label>
                                    <div class="flex flex-col w-full md:max-w-[472px] errors">
                                        @component('components.validation-errors', ['field' => 'description'])
                                        @endcomponent
                                    </div>
                                </div>
                            </div>

                            <h3
                                class="text-xl font-bold leading-none text-orange-500 md:text-2xl md:pb-4 md:pt-8 max-md:max-w-full max-md:mt-8">
                                @lang('event.who')</h3>


                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex items-start justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="mt-2 text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="id_audience">@lang('event.audience_title')*</label>
                                    <multiselect class="w-full max-w-[472px]" :options="{{ $audiences }}"
                                        value="{{ old('audience') }}" name="audience" :multiple="true"
                                        label="event.audience" placeholder="Select audience"></multiselect>

                                </div>
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                        for="id_title"></label>
                                    <div class="flex flex-col w-full md:max-w-[472px] errors">
                                        @component('components.validation-errors', ['field' => 'audience'])
                                        @endcomponent
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="id_theme">@lang('event.theme_title')</label>
                                    <multiselect class="w-full max-w-[472px]" :options="{{ $themes }}"
                                        value="{{ old('theme') }}" name="theme" :multiple="true"
                                        label="event.theme" placeholder="Select activity type"></multiselect>
                                </div>
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                        for="id_title"></label>
                                    <div class="flex flex-col w-full md:max-w-[472px] errors">
                                        @component('components.validation-errors', ['field' => 'theme'])
                                        @endcomponent
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper" x-data="{
                                totalCount: 0,
                                femaleCount: 0,
                                maleCount: 0,
                                otherCount: 0,
                                sumOfGenderCounts() {
                                    return this.femaleCount + this.maleCount + this.otherCount;
                                }
                            }">
                                <div
                                    class="flex items-start justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 pt-2 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="id_participants_count">Number of Participants*</label>
                                    <div class="flex flex-col w-full md:max-w-[472px]">
                                        <input type="number" id="id_participants_count" name="participants_count"
                                            min="0" onkeydown="return event.keyCode !== 189"
                                            oninput="this.value = this.value.replace('-', '')" x-model.number="totalCount"
                                            class="w-full px-6 py-3 text-black-light md:max-w-[472px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
                                            placeholder="Enter number of participants" />

                                        <div class="flex flex-col p-4 mt-4 rounded-2xl bg-pearl max-w-[472px]"
                                            :class="{ '': totalCount < 1 }" aria-labelledby="gender-count-title">
                                            <label id="gender-count-title" class="mb-2 font-normal text-black text-form">
                                                Of this number of participants, how many are:
                                            </label>

                                            <div class="flex flex-row flex-wrap justify-between w-full gap-2 mb-2">
                                                <!-- Female Participants -->
                                                <div class="flex flex-row items-center max-w-[218px]">
                                                    <label for="percentage_of_females"
                                                        class="flex items-center self-stretch w-[61px] xl:mr-[15px]">Females</label>
                                                    <input type="number" id="percentage_of_females"
                                                        name="percentage_of_females" placeholder="Enter number"
                                                        min="0" x-model.number="femaleCount"
                                                        :disabled="totalCount < 1"
                                                        class="text-center py-3 text-form w-[145px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full disabled:bg-gray-100 disabled:cursor-not-allowed" />
                                                </div>

                                                <!-- Male Participants -->
                                                <div class="flex flex-row items-center max-w-[218px]">
                                                    <label for="percentage_of_males"
                                                        class="flex items-center self-stretch w-[61px]">Males</label>
                                                    <input type="number" id="percentage_of_males" name="percentage_of_males"
                                                        placeholder="Enter number" min="0" x-model.number="maleCount"
                                                        :disabled="totalCount < 1"
                                                        class="text-center py-3 text-form w-[145px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full disabled:bg-gray-100 disabled:cursor-not-allowed" />
                                                </div>
                                            </div>

                                            <div class="flex flex-row flex-wrap w-full gap-2">
                                                <!-- Other Gender Participants -->
                                                <div class="flex flex-row items-center max-w-[218px]">
                                                    <label for="percentage_of_other"
                                                        class="flex items-center self-stretch w-[61px] xl:mr-[15px]">Other</label>
                                                    <input type="number" id="percentage_of_other" name="percentage_of_other"
                                                        placeholder="Enter number" min="0" x-model.number="otherCount"
                                                        :disabled="totalCount < 1"
                                                        class="text-center py-3 text-form w-[145px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full disabled:bg-gray-100 disabled:cursor-not-allowed" />
                                                </div>
                                            </div>

                                            <!-- Validation message -->
                                            <div x-show="sumOfGenderCounts() > totalCount" class="mt-2 text-sm text-red-600">
                                                The sum of gender counts cannot exceed the total number of participants.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex items-start justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="id_age">Age (optional)</label>
                                    <div class="flex flex-col gap-2.5 w-full md:max-w-[472px]">
                                        <!-- Option 1 -->
                                        <div class="flex flex-row items-center mr-4">
                                            <input type="radio" id="age_0_5" name="age_group" value="0-5"
                                                class="w-[24px] h-[24px] mr-2 text-black bg-gray-100 border-gray-300 focus:ring-dark-orange focus:ring-2"
                                                {{ old('age_group') == '0-5' ? 'checked' : '' }}
                                                aria-labelledby="label-age_0_5" />
                                            <label id="label-age_0_5" for="age_0_5" class="text-gray-900">0-5</label>
                                        </div>

                                        <!-- Option 2 -->
                                        <div class="flex items-center flex-row mb-2.5">
                                            <input type="radio" id="age_6_18" name="age_group" value="6-18"
                                                class="w-[24px] h-[24px] mr-2 text-black bg-gray-100 border-gray-300 focus:ring-dark-orange focus:ring-2"
                                                {{ old('age_group') == '6-18' ? 'checked' : '' }}
                                                aria-labelledby="label-age_6_18" />
                                            <label id="label-age_6_18" for="age_6_18" class="text-gray-900">6-18</label>
                                        </div>

                                        <!-- Option 3 -->
                                        <div class="flex items-center flex-row mb-2.5">
                                            <input type="radio" id="age_19_25" name="age_group" value="19-25"
                                                class="w-[24px] h-[24px] mr-2 text-black bg-gray-100 border-gray-300 focus:ring-dark-orange focus:ring-2"
                                                {{ old('age_group') == '19-25' ? 'checked' : '' }}
                                                aria-labelledby="label-age_19_25" />
                                            <label id="label-age_19_25" for="age_19_25" class="text-gray-900">19-25</label>
                                        </div>

                                        <!-- Option 4 -->
                                        <div class="flex items-center flex-row mb-2.5">
                                            <input type="radio" id="age_over_25" name="age_group" value="Over 25"
                                                class="w-[24px] h-[24px] mr-2 text-black bg-gray-100 border-gray-300 focus:ring-dark-orange focus:ring-2"
                                                {{ old('age_group') == 'Over 25' ? 'checked' : '' }}
                                                aria-labelledby="label-age_over_25" />
                                            <label id="label-age_over_25" for="age_over_25" class="text-gray-900">Over
                                                25</label>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="mt-2 text-form leading-6 text-black w-[147px] max-sm:mb-2"
                                        for="id_extracurricular_activity">
                                        Is this an extracurricular activity?*
                                    </label>
                                    <div class="flex flex-row items-center w-full md:max-w-[472px]">
                                        <div class="flex flex-row items-center mr-4">
                                            <input type="radio" id="extracurricular_yes" name="extracurricular_activity"
                                                value="yes"
                                                class="w-[24px] h-[24px] mr-2 text-black bg-gray-100 border-gray-300 focus:ring-dark-orange focus:ring-2"
                                                @if (old('extracurricular_activity') == 'yes') checked @endif required />
                                            <label for="extracurricular_yes" class="text-base text-gray-900">Yes</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input type="radio" id="extracurricular_no" name="extracurricular_activity"
                                                value="no"
                                                class="w-[24px] h-[24px] mr-2 text-black bg-gray-100 border-gray-300 focus:ring-dark-orange focus:ring-2"
                                                @if (old('extracurricular_activity') == 'no') checked @endif required />
                                            <label for="extracurricular_no" class="text-base text-gray-900">No</label>
                                        </div>
                                    </div>

                                </div>
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                        for="id_extracurricular_activity"></label>
                                    <div class="flex flex-col w-full md:max-w-[472px] errors">
                                        @component('components.validation-errors', ['field' => 'extracurricular_activity'])
                                        @endcomponent
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper" x-data="{ isRecurring: '' }">
                                <div
                                    class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px] max-sm:mb-2"
                                        for="id_recurring_event">
                                        Is it a recurring event?*
                                    </label>
                                    <div class="flex flex-col w-full md:max-w-[472px]" x-data="{ isRecurring: '{{ old('recurring_event') == 'yes' ? 'yes' : 'no' }}' }"
                                        x-init="$nextTick(() => { isRecurring = '{{ old('recurring_event', 'no') }}' })">
                                        <!-- Radio Buttons for Yes/No -->
                                        <div class="flex flex-row items-center w-full mb-4">
                                            <div class="flex flex-row items-center mr-4">
                                                <input type="radio" id="recurring_event_yes" name="recurring_event"
                                                    value="yes"
                                                    class="w-[24px] h-[24px] mr-2 text-black bg-gray-100 border-gray-300 focus:ring-dark-orange focus:ring-2"
                                                    @if (old('recurring_event') == 'yes') checked @endif
                                                    x-on:click="isRecurring = 'yes'" required />
                                                <label for="recurring_event_yes" class="text-base text-gray-900">Yes</label>
                                            </div>
                                            <div class="flex items-center">
                                                <input type="radio" id="recurring_event_no" name="recurring_event"
                                                    value="no"
                                                    class="w-[24px] h-[24px] mr-2 text-black bg-gray-100 border-gray-300 focus:ring-dark-orange focus:ring-2"
                                                    @if (old('recurring_event') == 'no') checked @endif
                                                    x-on:click="isRecurring = 'no'" required />
                                                <label for="recurring_event_no" class="text-base text-gray-900">No</label>
                                            </div>
                                        </div>

                                        <!-- Conditional Section for Frequency -->
                                        <div x-show="isRecurring === 'yes'" x-cloak
                                            class="rounded-2xl bg-pearl min-h-[88px] p-4 w-[317px]">
                                            <label class="mb-4 font-normal text-black text-form">How frequently?</label>
                                            <div class="flex items-center w-full gap-6 mt-4 whitespace-nowrap">
                                                <div class="relative flex items-center self-stretch gap-2 my-auto">
                                                    <input type="radio" id="daily" name="frequency" value="daily"
                                                        class="w-[24px] h-[24px] bg-white text-black border-2 border-solid rounded-full border-slate-300"
                                                        @if (old('frequency') == 'daily') checked @endif />
                                                    <label for="daily" class="z-0 self-stretch my-auto">Daily</label>
                                                </div>
                                                <div class="flex items-center self-stretch gap-2 my-auto">
                                                    <input type="radio" id="weekly" name="frequency" value="weekly"
                                                        class="w-[24px] h-[24px] bg-white text-black border-2 border-solid rounded-full border-slate-300"
                                                        @if (old('frequency') == 'weekly') checked @endif />
                                                    <label for="weekly" class="self-stretch my-auto">Weekly</label>
                                                </div>
                                                <div class="flex items-center self-stretch gap-2 my-auto">
                                                    <input type="radio" id="monthly" name="frequency" value="monthly"
                                                        class="w-[24px] h-[24px] bg-white text-black border-2 border-solid rounded-full border-slate-300"
                                                        @if (old('frequency') == 'monthly') checked @endif />
                                                    <label for="monthly" class="self-stretch my-auto">Monthly</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap"
                                        for="id_recurring_event"></label>
                                    <div class="flex flex-col w-full md:max-w-[472px] errors">
                                        @component('components.validation-errors', ['field' => 'recurring_event'])
                                        @endcomponent
                                        @component('components.validation-errors', ['field' => 'frequency'])
                                        @endcomponent
                                    </div>
                                </div>
                            </div>




                        </div>

                        <div class="codeweek-form-inner-container">
                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form leading-6 text-black w-[147px]"
                                        for="id_codeweek_forall_code_label">@lang('event.codeweek_for_all_participation_code.title')</label>
                                    <div class="w-full group-fields max-w-[472px]">


                                        <input
                                            class="w-full px-6 py-3 text-form md:max-w-[472px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
                                            id="id_codeweek_forall_code" maxlength="12"
                                            name="codeweek_for_all_participation_code"
                                            value="{{ old('codeweek_for_all_participation_code') }}"
                                            placeholder="XXX-XXX-XXX">
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                                <div
                                    class="flex justify-between w-full items-max-sm:items-start codeweek-form-field max-sm:flex-col max-sm:items-start-searchable">
                                    <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                        for="id_leading_teacher_tag_label">@lang('community.titles.2')</label>
                                    <singleselect class="w-full max-w-[472px]"
                                        :options="{{ json_encode($leading_teachers) }}"
                                        value="{{ old('leading_teacher_tag') }}" name="leading_teacher_tag"
                                        placeholder="Select {{ __('community.titles.2') }}"></singleselect>
                                </div>
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                        for="id_title"></label>
                                </div>
                            </div>

                            <div
                                class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                    for="id_picture">@lang('event.image')</label>
                                <div class="w-full max-w-[478px]" data-provides="fileinput" data-name="picture">
                                    <div class="fileinput-new">
                                        <div class="fileinput-preview fileinput-exists"></div>
                                        <div class="w-full max-w-[478px]">
                                            <picture-form></picture-form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="flex justify-end w-full relative mt-6 -left-[4px]">
                            <button type="button" x-on:click="nextStep()"
                                class="flex justify-center items-center leading-none px-2.5 py-3 border-2 border-solid rounded-3xl w-[160px] h-[48px] text-base font-bold whitespace-nowrap transition-colors duration-200 bg-primary text-black border-primary hover:bg-white">
                                Next Step
                            </button>
                        </div>

                    </div>
                    <div class="step-two" x-show="currentStep === 2" x-cloak>

                        <div class="flex flex-col mt-4 codeweek-form-field-wrapper">
                            <div
                                class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                    for="id_organizer">@lang('event.organizer.label')*</label>
                                <input
                                    class="w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
                                    id="id_organizer" maxlength="255" name="organizer" placeholder="@lang('event.organizer.placeholder')"
                                    type="text" value="{{ old('organizer') ?: $location->name ?? '' }}">
                            </div>
                            <div
                                class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                    for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                    @component('components.validation-errors', ['field' => 'organizer'])
                                    @endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div
                                class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                    for="id_organizer">@lang('event.organizertype.label')* </label>
                                <div class="flex flex-col w-full md:max-w-[472px]">
                                    <div class="relative inline-block w-full text-gray-700">
                                        <select
                                            class="w-full px-6 border-0 py-3 text-form md:max-w-[472px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full codeweek-input-select"
                                            id="id_organizer_type" name="organizer_type" class="codeweek-input-select">
                                            <option disabled value>Select Type</option>
                                            <option value="school" {{ old('organizer_type') == 'school' ? 'selected' : '' }}>
                                                @lang('event.organizertype.school')</option>
                                            <option value="library"
                                                {{ old('organizer_type') == 'library' ? 'selected' : '' }}>@lang('event.organizertype.library')
                                            </option>
                                            <option value="non profit"
                                                {{ old('organizer_type') == 'non profit' ? 'selected' : '' }}>
                                                @lang('event.organizertype.non profit')</option>
                                            <option value="private business"
                                                {{ old('organizer_type') == 'private business' ? 'selected' : '' }}>
                                                @lang('event.organizertype.private business')</option>
                                            <option value="other" {{ old('organizer_type') == 'other' ? 'selected' : '' }}>
                                                @lang('event.organizertype.other')</option>
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                viewBox="0 0 24 25" fill="none">
                                                <path d="M6 9.40002L12 15.4L18 9.40002" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                        <div
                                            class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                            <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                                for="id_title"></label>
                                            <div class="flex flex-col w-full md:max-w-[472px] errors">
                                                @component('components.validation-errors', ['field' => 'organizer_type'])
                                                @endcomponent
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div
                                class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                    for="id_language">@lang('resources.Languages')* </label>
                                <div class="flex flex-col w-full md:max-w-[472px]">
                                    <div class="relative inline-block w-full text-gray-700">
                                        <select
                                            class="w-full border-0 px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
                                            id="id_language" name="language" class="codeweek-input-select">
                                            <option value="" disabled selected>Select Language</option>
                                            @foreach ($languages as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == App::getLocale() ? 'selected' : '' }}>
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                viewBox="0 0 24 25" fill="none">
                                                <path d="M6 9.40002L12 15.4L18 9.40002" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div
                                class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                    for="id_country">@lang('event.country')* </label>
                                <div class="flex flex-col w-full md:max-w-[472px]">
                                    <div class="relative inline-block w-full text-gray-700">
                                        <select id="id_country" name="country_iso"
                                            class="border-0 w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full codeweek-input-select">
                                            <option value="">Select Country</option>
                                            @isset($location)
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->iso }}"
                                                        {{ $location->country_iso == $country->iso ? 'selected' : '' }}>
                                                        @lang('countries.' . $country->name)</option>
                                                @endforeach
                                            @else
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->iso }}">@lang('countries.' . $country->name)</option>
                                                @endforeach
                                            @endisset
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25"
                                                viewBox="0 0 24 25" fill="none">
                                                <path d="M6 9.40002L12 15.4L18 9.40002" stroke="black" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                    for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                    @component('components.validation-errors', ['field' => 'country'])
                                    @endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div
                                class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                    for="id_event_url"><span x-show="isOnlineActivitySelected()"></span>@lang('event.website.label')*
                                </label>
                                <input
                                    class="w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
                                    id="id_event_url" maxlength="200" name="event_url" placeholder="@lang('event.website.placeholder')"
                                    type="text" value="{{ old('event_url') }}">
                            </div>
                            <div
                                class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                    for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                    @component('components.validation-errors', ['field' => 'event_url'])
                                    @endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div
                                class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                    for="id_contact_person">
                                    @lang('event.public.label')
                                </label>
                                <input
                                    class="w-full px-6 py-3 text-form md:max-w-[472px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
                                    id="id_contact_person" maxlength="75" name="contact_person"
                                    placeholder="@lang('event.public.placeholder')" type="text" value="{{ old('contact_person') }}">
                            </div>
                            <!-- Error Display -->
                            <div
                                class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap"
                                    for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                    @component('components.validation-errors', ['field' => 'contact_person'])
                                    @endcomponent
                                </div>
                            </div>
                        </div>


                        <div class="flex-wrap hidden mt-4 codeweek-form-field-wrapper">
                            <div
                                class="flex items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"
                                    for="id_tags">@lang('event.tags')</label>
                                <input-tags value="{{ old('tags') }}"></input-tags>
                            </div>
                        </div>
                        <div class="w-full codeweek-form-message xl:w-[712px] relative xl:-left-[15px]">
                            <div
                                class="flex flex-wrap items-start w-full p-4 mt-4 rounded-2xl bg-pearl max-md:max-w-full codeweek-form-field-wrapper">
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label
                                        class="text-form leading-6 text-black w-[147px] whitespace-nowrap max-sm:mb-2"for="id_user_email">@lang('event.contact.label')*
                                    </label>
                                    <div class="flex flex-col w-full md:max-w-[472px]">
                                        <input
                                            class="w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
                                            id="id_user_email" name="user_email" type="email"
                                            placeholder="@lang('event.contact.placeholder')" value="{{ old('user_email') }}" track-by="tag"
                                            label="tag">
                                    </div>
                                </div>
                                <div
                                    class="flex flex-row items-center justify-between w-full codeweek-form-field max-sm:flex-col max-sm:items-start">
                                    <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap"
                                        for="id_title"></label>
                                    <div class="flex flex-col">
                                        <div class="flex flex-col w-full md:max-w-[472px] errors">
                                            @component('components.validation-errors', ['field' => 'user_email'])
                                            @endcomponent
                                        </div>
                                        <div
                                            class="flex items-start mt-2 text-xs leading-5 text-black max-sm:hidden message max-md:max-w-full">
                                            <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 20 20" fill="none">
                                                <path
                                                    d="M9 15H11V9H9V15ZM10 7C10.2833 7 10.521 6.904 10.713 6.712C10.905 6.52 11.0007 6.28267 11 6C10.9993 5.71733 10.9033 5.48 10.712 5.288C10.5207 5.096 10.2833 5 10 5C9.71667 5 9.47933 5.096 9.288 5.288C9.09667 5.48 9.00067 5.71733 9 6C8.99933 6.28267 9.09533 6.52033 9.288 6.713C9.48067 6.90567 9.718 7.00133 10 7ZM10 20C8.61667 20 7.31667 19.7373 6.1 19.212C4.88334 18.6867 3.825 17.9743 2.925 17.075C2.025 16.1757 1.31267 15.1173 0.788001 13.9C0.263335 12.6827 0.000667933 11.3827 1.26582e-06 10C-0.000665401 8.61733 0.262001 7.31733 0.788001 6.1C1.314 4.88267 2.02633 3.82433 2.925 2.925C3.82367 2.02567 4.882 1.31333 6.1 0.788C7.318 0.262667 8.618 0 10 0C11.382 0 12.682 0.262667 13.9 0.788C15.118 1.31333 16.1763 2.02567 17.075 2.925C17.9737 3.82433 18.6863 4.88267 19.213 6.1C19.7397 7.31733 20.002 8.61733 20 10C19.998 11.3827 19.7353 12.6827 19.212 13.9C18.6887 15.1173 17.9763 16.1757 17.075 17.075C16.1737 17.9743 15.1153 18.687 13.9 19.213C12.6847 19.739 11.3847 20.0013 10 20Z"
                                                    fill="#164194" />
                                            </svg>
                                            <span class="max-w-[445px] w-full  max-md:max-w-full">
                                                @lang('event.contact.explanation')
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pt-4 pb-8 codeweek-form-field-privacy">
                            <label>
                                <input id="checkPrivacy" name="privacy" type="checkbox"
                                    {{ auth()->user()->privacy === 1 ? 'checked="checked"' : '' }}>
                                @lang('event.privacy')
                            </label>
                            @component('components.validation-errors', ['field' => 'privacy'])
                            @endcomponent
                        </div>
                        <div class="flex justify-between w-full">
                            <button type="button" x-on:click="previousStep()"
                                class="flex justify-center items-center leading-none px-2.5 py-3 bg-white border-2 border-solid border-primary rounded-3xl w-[160px] h-[48px] text-base font-bold text-black whitespace-nowrap hover:bg-primary">
                                Previous
                            </button>
                            <button type="submit" onclick="document.querySelector('form.codeweek-form').submit()"
                                class="flex justify-center items-center leading-none px-2.5 py-3 bg-primary border-2 border-solid border-primary rounded-3xl w-[160px] h-[48px] text-base font-bold text-black whitespace-nowrap hover:bg-white">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>

            </section>

        </section>

    @endsection


    @push('scripts')
        <script defer src="//europa.eu/webtools/load.js" type="text/javascript"></script>
        <script type="application/json">
        {
            "service" : "map",
            "version" : "2.0",
            "renderTo" : "events-add-map",
            "height": "250",
            "width": "422",
            "custom": ["/js/hideMenuMap.js"]
        }









    </script>

        <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>



        <script>
            tinymce.init({
                selector: '#id_description',
                height: 400,
                width: '100%',
                setup: function(editor) {
                    editor.on('init', function() {
                        editor.getContainer().style.width = '100%';
                    });

                    editor.on('input', function() {
                        const errorContainer = document.querySelector('.errors [data-field="description"]');
                        if (errorContainer) {
                            errorContainer.style.display = 'none';
                            const alpine = document.querySelector('[x-data="multiStepForm"]')?.__x?.data;
                            if (alpine) {
                                alpine.clearFieldError('description');
                            }
                        }
                    });
                }
            });
            $(document).ready(function() {
                $('select').niceSelect();
            });

            document.addEventListener('click', function(event) {
                const radioGroup = document.getElementById('age-radio-group');
                const radios = document.querySelectorAll('input[name="age"]');

                // Check if the click was outside the radio group
                if (!radioGroup.contains(event.target)) {
                    radios.forEach(radio => {
                        radio.checked = false; // Deselect all radio buttons
                    });
                }
            });


            document.addEventListener('alpine:init', () => {
                Alpine.data('multiStepForm', () => ({
                    currentStep: 1,
                    totalSteps: 2,
                    hasErrors: false,
                    fieldErrors: {},

                    init() {
                        // Initial setup and error check
                        this.setupValidationHandlers();
                        this.checkErrors();

                        // Set up mutation observer for dynamic error changes
                        const observer = new MutationObserver(() => {
                            this.checkErrors();
                        });

                        // Observe the entire form for changes
                        const form = document.querySelector('form.codeweek-form');
                        if (form) {
                            observer.observe(form, {
                                childList: true,
                                subtree: true,
                                characterData: true
                            });
                        }
                    },

                    setupValidationHandlers() {
                        // Get all form fields
                        const formFields = document.querySelectorAll('input, select, textarea');

                        formFields.forEach(field => {
                            // Skip fields that don't need validation
                            if (!field.name || field.type === 'hidden') return;

                            // Handle input events
                            field.addEventListener('input', () => {
                                // Find the error container for this field
                                const errorContainer = document.querySelector(
                                    `.errors [data-field="${field.name}"]`);
                                if (errorContainer) {
                                    errorContainer.style.display = 'none';
                                    this.clearFieldError(field.name);
                                }
                            });

                            // Handle change events for select elements
                            if (field.tagName === 'SELECT') {
                                field.addEventListener('change', () => {
                                    const errorContainer = document.querySelector(
                                        `.errors [data-field="${field.name}"]`);
                                    if (errorContainer) {
                                        errorContainer.style.display = 'none';
                                        this.clearFieldError(field.name);
                                    }
                                });
                            }
                        });

                        // Setup TinyMCE handler if it exists
                        this.setupTinyMCE();

                        // Setup multiselect handlers
                        this.setupMultiselectHandlers();
                    },

                    setupTinyMCE() {
                        if (tinymce.get('id_description')) {
                            tinymce.get('id_description').on('input', () => {
                                const errorContainer = document.querySelector(
                                    '.errors [data-field="description"]');
                                if (errorContainer) {
                                    errorContainer.style.display = 'none';
                                    this.clearFieldError('description');
                                }
                            });
                        }
                    },

                    setupMultiselectHandlers() {
                        // Handle vue-multiselect components
                        document.querySelectorAll('.multiselect-wrapper').forEach(select => {
                            const input = select.querySelector('input[type="hidden"]');
                            if (input) {
                                const name = input.name;
                                // Watch for changes in the multiselect
                                select.addEventListener('change', () => {
                                    const errorContainer = document.querySelector(
                                        `.errors [data-field="${name}"]`);
                                    if (errorContainer) {
                                        errorContainer.style.display = 'none';
                                        this.clearFieldError(name);
                                    }
                                });
                            }
                        });
                    },

                    checkErrors() {
                        // Reset errors first
                        this.fieldErrors = {};
                        this.hasErrors = false;

                        // Check for Laravel validation errors that are visible
                        const errorLists = document.querySelectorAll('.errorlist[data-field]');
                        errorLists.forEach(errorList => {
                            const fieldName = errorList.getAttribute('data-field');
                            // Only count visible errors
                            if (fieldName && errorList.offsetParent !== null) {
                                this.fieldErrors[fieldName] = true;
                            }
                        });

                        // Update hasErrors based on visible errors
                        this.hasErrors = Object.keys(this.fieldErrors).length > 0;

                        // Update styling for components
                        this.updateComponentStyles();
                    },

                    updateComponentStyles() {
                        // Update TinyMCE styling
                        const editor = tinymce.get('id_description');
                        if (editor) {
                            const hasError = !!this.fieldErrors['description'];
                            editor.getContainer().style.border = hasError ?
                                '2px solid rgb(249, 92, 34)' :
                                '1px solid rgb(209, 213, 219)';
                        }

                        // Update multiselect styling
                        document.querySelectorAll('.multiselect-wrapper').forEach(select => {
                            const input = select.querySelector('input[type="hidden"]');
                            if (input) {
                                const name = input.name;
                                const hasError = !!this.fieldErrors[name];
                                const tagsElement = select.querySelector('.multiselect__tags');
                                if (tagsElement) {
                                    if (hasError) {
                                        tagsElement.classList.add('ring-2', 'ring-dark-orange');
                                        tagsElement.classList.remove('ring-gray-300');
                                    } else {
                                        tagsElement.classList.remove('ring-2', 'ring-dark-orange');
                                        tagsElement.classList.add('ring-gray-300');
                                    }
                                }
                            }
                        });
                    },

                    clearFieldError(fieldName) {
                        if (this.fieldErrors[fieldName]) {
                            delete this.fieldErrors[fieldName];
                            this.checkErrors();
                        }
                    },

                   /* nextStep() {
                        // Create a hidden submit button and click it to trigger Laravel validation
                        const form = document.querySelector('form.codeweek-form');
                        const tempButton = document.createElement('button');
                        tempButton.type = 'submit';
                        tempButton.style.display = 'none';
                        form.appendChild(tempButton);
                        tempButton.click();
                        form.removeChild(tempButton);

                        // The form submission will handle showing all validation errors
                        // If there are no errors, the page will refresh with the next step
                    }, */

                    nextStep() {
                        // Check if there are any validation error messages visible
                        const errorMessages = document.querySelectorAll('.errorlist:not([style*="display: none"])');
                        
                        if (errorMessages.length === 0) {
                            // No validation errors, proceed to step 2
                            if (this.currentStep < this.totalSteps) {
                                this.currentStep++;
                            }
                        } else {
                            // Validation errors exist, stay on step 1
                            this.currentStep = 1;
                        }
                    },

                    previousStep() {
                        if (this.currentStep > 1) {
                            this.currentStep--;
                        }
                    },

                    isOnlineActivitySelected() {
                        const activityType = document.getElementById('id_activity_type')?.value;
                        return activityType === 'open-online' || activityType === 'invite-online';
                    }
                }));
            });
        </script>
    @endpush
