
@extends('layout.base')

@section('content')

    <section id="codeweek-events-add-page" class="codeweek-page">

        <section class="flex relative flex-col justify-center items-start px-24 w-full font-bold text-white bg-blue-900 min-h-[280px] max-md:px-5 max-md:max-w-full">
        <div class="flex z-0 flex-col w-full max-w-[751px]">
            <h1 class="text-6xl leading-none text-white max-md:text-4xl">Add your Code Week activity</h1>
            <span class="mt-4 leading-6 text-white text-default max-w-[90%]">Register your activity today and become part of the movement! By adding your event, you're helping to inspire others — don't forget to promote and share your event with your community.</span>
        </div>
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/f35586c581c84ecf82b6de32c55ed39e/1baaf125172670f36e9f5d79351bbac3207e79a2782c6c5224915d450c414391?apiKey=f35586c581c84ecf82b6de32c55ed39e&" alt="Decorative image representing Code Week activities" class="object-contain absolute right-0 bottom-0 z-0 max-w-full aspect-[1.82] h-[280px] w-[509px]" />
        </section>
        
        <section class="codeweek-content-wrapper mx-auto max-w-[680px] py-16" style="margin-top:0px;" x-data="addActivity()">
              <div class="flex items-start self-center">
                <div class="flex flex-col w-20">
                <div class="flex flex-col justify-center items-center self-center px-2.5 w-12 h-12 bg-lime rounded-3xl min-h-[48px]">
                   <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7988 12.5997L5.3988 14.9997L12.5988 22.1997L24.5988 10.1997L22.1988 7.79968L12.5988 17.3997L7.7988 12.5997Z" fill="#164194"/>
                    </svg>
                </div>
                <span class="mt-2 font-bold text-center text-black text-form">Activity</span>
                </div>
                <div class="flex flex-col pt-6 w-[100px]">
                <div class="flex w-full bg-slate-200 min-h-[2px]" aria-hidden="true"></div>
                </div>
                <div class="flex flex-col items-center text-center whitespace-nowrap">
                <div class="flex flex-col items-center justify-center w-12 h-12 px-3 text-2xl font-bold leading-snug text-blue-900 rounded-3xl bg-slate-200">
                    <span class="opacity-[0.96]">2</span>
                </div>
                <span class="mt-2 text-black text-form">Organisation</span>
                </div>
            </div>

            <div class="flex flex-col w-full mt-10 max-md:max-w-full">
                <h2 class="text-4xl font-bold leading-tight text-orange-500 max-md:max-w-full">Join the community</h2>
                <p class="mt-4 leading-6 text-black text-form max-md:max-w-full">Ready to inspire the next generation of coders? Share your event details to promote it to a wider audience. Who knows — your event might be featured on our official Code Week channels!</p>
            </div>

            <form enctype="multipart/form-data" method="post" role="form" class="codeweek-form" action="/events">
                
                <p class="hidden">@lang('event.required')</p>
                
                {{csrf_field()}}


                <div class="step-one">


                    <div class="codeweek-form-inner-container">

                     <div class="flex flex-col mt-4 codeweek-form-field-wrapper">
                            <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_title">@lang('event.title.label')*</label>
                                <div class="flex flex-col w-full md:max-w-[472px]">
                                    <input class="w-full px-6 py-3 text-form md:max-w-[472px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full" id="id_title" maxlength="255" name="title"
                                        placeholder="@lang('event.title.placeholder')" type="text"
                                        value="{{old('title')}}">
                                </div>
                            </div>
                            <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                    @component('components.validation-errors', ['field'=>'title'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-row mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="activity_type"> @lang('event.activitytype.label')*</label>
                                <div class="flex flex-col w-full md:max-w-[472px]">
                                    <select id="id_activity_type" name="activity_type" class="w-full px-6 border-0 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full codeweek-input-select"
                                            x-model="selectedActivityType">
                                        <option value="open-online" {{ old('activity_type') == "open-online" ? 'selected' : '' }}>@lang('event.activitytype.open-online')</option>
                                        <option value="invite-online" {{ old('activity_type') == "invite-online" ? 'selected' : '' }}>@lang('event.activitytype.invite-online')</option>
                                        <option value="open-in-person" {{ old('activity_type') == "open-in-person" ? 'selected' : '' }}>@lang('event.activitytype.open-in-person')</option>
                                        <option value="invite-in-person" {{ old('activity_type') == "invite-in-person" ? 'selected' : '' }}>@lang('event.activitytype.invite-in-person')</option>
                                        <option value="other" {{ old('activity_type') == "other" ? 'selected' : '' }}>@lang('event.organizertype.other')</option>
                                    </select>
                                    <div class="errors">
                                        @component('components.validation-errors', ['field'=>'activity_type'])@endcomponent
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_start_date">@lang('event.start.label')*</label>
                                <date-time class="w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full" name="start_date" placeholder="@lang('event.start.placeholder')"
                                           value="{{old('start_date')}}"></date-time>
                            </div>
                          <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                @component('components.validation-errors', ['field'=>'start_date'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_end_date">@lang('event.end.label')*</label>
                                <date-time class="w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full" name="end_date" placeholder="@lang('event.end.placeholder')"
                                           value="{{old('end_date')}}"></date-time>
                            </div>
                        
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'end_date'])@endcomponent
                            </div>
                        </div>


                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_location"><span
                                            x-show="!isOnlineActivitySelected()"></span>@lang('event.address.label')*
                                    <br/>
                                    <a href="{{route('activities-locations')}}">
                                        <img src="{{asset('svg/address-book.svg')}}" class="static-image">
                                    </a>

                                </label>
                                <div class="w-full max-w-[472px]">
                                    <autocomplete-geo name="location" placeholder="@lang('event.address.placeholder')"
                                                      location="{{$location->location??''}}"
                                                      value="{{old('location')?:$location->location??''}}"
                                                      geoposition="{{old('geoposition')?:$location->geoposition??''}}"></autocomplete-geo>
                                    <div class="errors" style="margin-bottom: 10px; margin-left:0;">
                                        @component('components.validation-errors', ['field'=>'location'])@endcomponent
                                    </div>
                                    <div id="events-add-map"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_description">@lang('event.description.label')*</label>
                                <textarea class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-dark-orange sm:text-sm/6" cols="40" id="id_description" name="description"
                                          placeholder="@lang('event.description.placeholder')"
                                          rows="10"> {{old('description')}}</textarea>
                            </div>
                             <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                     @component('components.validation-errors', ['field'=>'description'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <h3 class="py-12 text-2xl font-bold leading-none text-orange-500 max-md:max-w-full">@lang('event.who')</h3>


                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_audience">@lang('event.audience_title')*</label>
                                <multiselect class="w-full max-w-[472px]" :options="{{ $audiences }}" value="{{ old('audience') }}" name="audience" :multiple="true" label="event.audience" placeholder="Select audience"></multiselect>

                            </div>
                             <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                     @component('components.validation-errors', ['field'=>'audience'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_theme">@lang('event.theme_title')</label>
                                <multiselect class="w-full max-w-[472px]"  :options="{{ $themes }}" value="{{ old('theme') }}" name="theme" :multiple="true" label="event.theme" placeholder="Select activity type"></multiselect>
                            </div>
                            <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                @component('components.validation-errors', ['field'=>'theme'])@endcomponent
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="codeweek-form-inner-container">

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px]" for="id_codeweek_forall_code_label">@lang('event.codeweek_for_all_participation_code.title')</label>
                                <div class="w-full group-fields max-w-[472px]">
                                    <input class="w-full px-6 py-3 text-form md:max-w-[472px] rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full" id="id_codeweek_forall_code" maxlength="75" name="codeweek_for_all_participation_code" value="" placeholder="XXX-XXX-XXX">
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field-searchable codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_leading_teacher_tag_label">@lang('community.titles.2')</label>
                                <singleselect class="w-full max-w-[472px]" :options="{{ json_encode($leading_teachers) }}"
                                              value="{{ old('leading_teacher_tag') }}"
                                              name="leading_teacher_tag"
                                              placeholder="{{__('community.titles.2')}}"
                                              ></singleselect>
                            </div>
                            <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                @component('components.validation-errors', ['field'=>'theme'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-between w-full codeweek-form-field">
                            <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_picture">@lang('event.image')</label>
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

                </div>
                  <div class="step-two">

                         <div class="flex flex-col mt-4 codeweek-form-field-wrapper">
                            <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_organizer">@lang('event.organizer.label')*</label>
                                <input class="w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full" id="id_organizer" maxlength="255"
                                       name="organizer" placeholder="@lang('event.organizer.placeholder')" type="text"
                                       value="{{old('organizer')?:$location->name??''}}">
                            </div>
                             <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                    @component('components.validation-errors', ['field'=>'organizer'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_organizer">@lang('event.organizertype.label')* </label>
                                <select class="border-0 w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full" id="id_organizer_type" name="organizer_type" class="codeweek-input-select">
                                    <option disabled value> ---</option>
                                    <option value="school" {{ old('organizer_type') == "school" ? 'selected' : '' }}>@lang('event.organizertype.school')</option>
                                    <option value="library" {{ old('organizer_type') == "library" ? 'selected' : '' }}>@lang('event.organizertype.library')</option>
                                    <option value="non profit" {{ old('organizer_type') == "non profit" ? 'selected' : '' }}>@lang('event.organizertype.non profit')</option>
                                    <option value="private business" {{ old('organizer_type') == "private business" ? 'selected' : '' }}>@lang('event.organizertype.private business')</option>
                                    <option value="other" {{ old('organizer_type') == "other" ? 'selected' : '' }}>@lang('event.organizertype.other')</option>
                                </select>
                            </div>
                             <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                 @component('components.validation-errors', ['field'=>'organizer_type'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_language">@lang('resources.Languages')* </label>
                                <select class="w-full border-0 px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full" id="id_language" name="language" class="codeweek-input-select">
                                    @foreach($languages as $key => $value)
                                        <option value="{{$key}}" {{ $key == App::getLocale() ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>


                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_country">@lang('event.country')* </label>
                                <select id="id_country" name="country_iso" class="border-0 w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full codeweek-input-select">
                                    <option value="">Select Country</option>
                                    @isset($location)

                                        @foreach ($countries as $country)
                                            <option value="{{$country->iso}}" {{$location->country_iso == $country->iso ? 'selected' : ''}}>@lang('countries.'. $country->name)</option>
                                        @endforeach
                                    @else
                                        @foreach ($countries as $country)
                                            <option value="{{$country->iso}}">@lang('countries.'. $country->name)</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                          <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                    @component('components.validation-errors', ['field'=>'country'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_event_url"><span
                                            x-show="isOnlineActivitySelected()"></span>@lang('event.website.label')* 
                                </label>
                                <input class="w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full" id="id_event_url" maxlength="200" name="event_url"
                                       placeholder="@lang('event.website.placeholder')" type="text"
                                       value="{{old('event_url')}}">
                            </div>
                             <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                        @component('components.validation-errors', ['field'=>'event_url'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_contact_person">@lang('event.public.label')</label>
                                <input class="w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full" id="id_contact_person" maxlength="75" name="contact_person"
                                       placeholder="@lang('event.public.placeholder')" type="text">
                            </div>
                        <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                                <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                                <div class="flex flex-col w-full md:max-w-[472px] errors">
                                @component('components.validation-errors', ['field'=>'contact_person'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap mt-4 codeweek-form-field-wrapper">
                            <div class="flex items-center justify-between w-full codeweek-form-field">
                                <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap" for="id_tags">@lang('event.tags')</label>
                                <input-tags value="{{old('tags')}}"></input-tags>
                            </div>
                        </div>
                <div class="w-full codeweek-form-message">
                    <div class="flex flex-wrap items-start w-full p-4 mt-4 rounded-2xl bg-pearl max-md:max-w-full codeweek-form-field-wrapper">
                        <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                            <label class="text-form leading-6 text-black w-[147px] whitespace-nowrap"for="id_user_email">@lang('event.contact.label')* </label>
                            <div class="flex flex-col w-full md:max-w-[472px]">
                        <input class="w-full px-6 py-3 text-form md:max-w-[472px]  rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange max-md:px-5 max-md:max-w-full"
                                id="id_user_email" 
                                name="user_email" 
                                type="email"
                                placeholder="@lang('event.contact.placeholder')"
                                value="{{old('user_email')}}"
                                track-by="tag"
                                label="tag">
                            </div>
                        </div>
                        <div class="flex flex-row items-center justify-between w-full codeweek-form-field">
                            <label class="text-form  leading-6 text-black w-[147px] whitespace-nowrap" for="id_title"></label>
                            <div class="flex flex-col">
                            <div class="flex flex-col w-full md:max-w-[472px] errors">
                                @component('components.validation-errors', ['field'=>'user_email'])@endcomponent
                            </div>
                                <div class="flex items-start mt-2 text-xs leading-5 text-black message max-md:max-w-full">
                                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M9 15H11V9H9V15ZM10 7C10.2833 7 10.521 6.904 10.713 6.712C10.905 6.52 11.0007 6.28267 11 6C10.9993 5.71733 10.9033 5.48 10.712 5.288C10.5207 5.096 10.2833 5 10 5C9.71667 5 9.47933 5.096 9.288 5.288C9.09667 5.48 9.00067 5.71733 9 6C8.99933 6.28267 9.09533 6.52033 9.288 6.713C9.48067 6.90567 9.718 7.00133 10 7ZM10 20C8.61667 20 7.31667 19.7373 6.1 19.212C4.88334 18.6867 3.825 17.9743 2.925 17.075C2.025 16.1757 1.31267 15.1173 0.788001 13.9C0.263335 12.6827 0.000667933 11.3827 1.26582e-06 10C-0.000665401 8.61733 0.262001 7.31733 0.788001 6.1C1.314 4.88267 2.02633 3.82433 2.925 2.925C3.82367 2.02567 4.882 1.31333 6.1 0.788C7.318 0.262667 8.618 0 10 0C11.382 0 12.682 0.262667 13.9 0.788C15.118 1.31333 16.1763 2.02567 17.075 2.925C17.9737 3.82433 18.6863 4.88267 19.213 6.1C19.7397 7.31733 20.002 8.61733 20 10C19.998 11.3827 19.7353 12.6827 19.212 13.9C18.6887 15.1173 17.9763 16.1757 17.075 17.075C16.1737 17.9743 15.1153 18.687 13.9 19.213C12.6847 19.739 11.3847 20.0013 10 20Z" fill="#164194"/>
                                    </svg>
                                    <span class="max-w-[445px] w-full  max-md:max-w-full">
                                        @lang('event.contact.explanation')
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-12 codeweek-form-field-privacy">
                    <label>
                        <input id="checkPrivacy" name="privacy"
                               type="checkbox" {{ auth()->user()->privacy === 1 ? 'checked="checked"' : '' }}>
                        @lang('event.privacy')
                        <a href="{{route('privacy-contact-points')}}" target="_blank">
                            <img src="/images/external-link.svg" width="16" class="static-image">
                        </a>
                    </label>
                    @component('components.validation-errors', ['field'=>'privacy'])
                    @endcomponent
                </div>

            </div>
         
                   <button type="submit"
                        class="flex justify-center items-start px-2.5 py-3 w-40 max-w-full bg-green-500 rounded-3xl min-h-[48px] text-white">
                        <span class="gap-2.5 self-stretch px-2.5">SUBMIT</span>
                    </button>
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

    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>


    <script>

        tinymce.init({
            selector: '#id_description',
            height: 400,
            width: 460
        });

    </script>

@endpush