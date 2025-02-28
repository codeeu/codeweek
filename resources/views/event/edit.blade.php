@extends('layout.base')

@section('content')

    <section id="codeweek-events-edit-page" class="codeweek-page">

        <section class="codeweek-banner simple">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('edit.title')</h1>
            </div>
        </section>

        <section class="codeweek-content-wrapper" style="margin-top:0px;"
                 x-data="addActivity('{{$event->activity_type}}')">

            <form enctype="multipart/form-data" method="post" id="event" role="form" class="codeweek-form"
                  action="/events/{{$event->id}}">
                <p>@lang('event.required')</p>

                {{csrf_field()}}
                {{ method_field('PATCH') }}

                <div class="codeweek-form-inner-two-columns">

                    <div class="codeweek-form-inner-container">

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">* @lang('event.title.label')</label>
                                <input id="id_title" maxlength="255" name="title"
                                       placeholder="@lang('event.title.placeholder')" type="text"
                                       value="{{old('title',$event->title)}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'title'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_organizer">* @lang('event.organizer.label')</label>
                                <input id="id_organizer" maxlength="255"
                                       name="organizer" placeholder="@lang('event.organizer.placeholder')" type="text"
                                       value="{{old('organizer',$event->organizer)}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'organizer'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_language">* @lang('resources.Languages')</label>
                                <select id="id_language" name="language" class="codeweek-input-select">
                                    @if(is_null($event->language))
                                        <option value="" disabled selected>---</option>
                                    @endif

                                    @foreach($languages as $key => $value)
                                        <option value="{{$key}}" {{ $key == $event->language ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'language'])@endcomponent
                            </div>

                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_organizer">* @lang('event.organizertype.label')</label>
                                <select id="id_organizer_type" name="organizer_type" class="codeweek-input-select">
                                    <option value="school">@lang('event.organizertype.school')</option>
                                    <option value="library">@lang('event.organizertype.library')</option>
                                    <option value="non profit">@lang('event.organizertype.non profit')</option>
                                    <option value="private business">@lang('event.organizertype.private business')</option>
                                    <option value="other">@lang('event.organizertype.other')</option>
                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'organizer_type'])@endcomponent
                            </div>
                        </div>


                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="activity_type">* @lang('event.activitytype.label')</label>
                                <select id="id_activity_type" name="activity_type" class="codeweek-input-select"
                                        x-model="selectedActivityType">
                                    <option value="open-online" {{$event->activity_type == 'open-online' ? 'selected' : ''}}>@lang('event.activitytype.open-online')</option>
                                    <option value="invite-online" {{$event->activity_type == 'invite-online' ? 'selected' : ''}}>@lang('event.activitytype.invite-online')</option>
                                    <option value="open-in-person" {{$event->activity_type == 'open-in-person' ? 'selected' : ''}}>@lang('event.activitytype.open-in-person')</option>
                                    <option value="invite-in-person" {{$event->activity_type == 'invite-in-person' ? 'selected' : ''}}>@lang('event.activitytype.invite-in-person')</option>
                                    <option value="other" {{(is_null($event->activity_type) || $event->activity_type == 'other')  ? 'selected' : ''}}>@lang('event.organizertype.other')</option>
                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'activity_type'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field align-flex-start">
                                <label for="id_description">*@lang('event.description.label')</label>
                                <textarea cols="60" id="id_description" name="description"
                                          placeholder="@lang('event.description.placeholder')"
                                          rows="10"> {{old('description',$event->description)}}</textarea>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'description'])@endcomponent
                            </div>
                        </div>

                        <h3>@lang('event.who')</h3>


                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_audience">*@lang('event.audience_title')</label>
                                <multiselect :options="{{ $audiences }}" value="{{$selected_audiences}}" name="audience"
                                             :multiple="true"
                                             label="event.audience"></multiselect>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'audience'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_theme">*@lang('event.theme_title')</label>
                                <multiselect :options="{{ $themes }}" value="{{$selected_themes}}" name="theme"
                                             :multiple="true"
                                             label="event.theme"></multiselect>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'theme'])@endcomponent
                            </div>
                        </div>

                    </div>

                    <div class="codeweek-form-inner-container">

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field align-flex-start">
                                <label for="id_location"><span
                                            x-show="!isOnlineActivitySelected()">*</span>@lang('event.address.label')
                                </label>
                                <div>
                                    <autocomplete-geo name="location" placeholder="@lang('event.address.placeholder')"
                                                      location="{{$event->location}}"
                                                      value="{{old('location',$event->location)}}"
                                                      geoposition="{{old('geoposition',$event->geoposition)}}"></autocomplete-geo>
                                    <div class="errors" style="margin-bottom: 10px; margin-left:0;">
                                        @component('components.validation-errors', ['field'=>'location'])@endcomponent
                                    </div>
                                    <div id="events-edit-map"></div>
                                </div>
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_country">* @lang('event.country')</label>
                                <select id="id_country" name="country_iso" class="codeweek-input-select">
                                    <option value=""></option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->iso}}" {{$selected_country == $country->iso ? 'selected' : ''}}>@lang('countries.'. $country->name)</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'country'])@endcomponent
                            </div>
                        </div>


                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_start_date">*@lang('event.start.label')</label>
                                <date-time name="start_date" placeholder="@lang('event.start.placeholder')"
                                           value="{{old('start_date',$event->start_date)}}"></date-time>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'start_date'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_end_date">*@lang('event.end.label')</label>
                                <date-time name="end_date" placeholder="@lang('event.end.placeholder')"
                                           value="{{old('end_date',$event->end_date)}}"></date-time>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'end_date'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_event_url"><span
                                            x-show="isOnlineActivitySelected()">*</span>@lang('event.website.label')
                                </label>
                                <input id="id_event_url" maxlength="200" name="event_url"
                                       placeholder="@lang('event.website.placeholder')" type="text"
                                       value="{{old('event_url')?old('event_url'):$event->event_url}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'event_url'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_contact_person">@lang('event.public.label')</label>
                                <input id="id_contact_person" maxlength="75" name="contact_person"
                                       placeholder="@lang('event.public.placeholder')" type="text"
                                       value="{{old('contact_person')?old('contact_person'):$event->contact_person}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'contact_person'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_tags">@lang('event.tags')</label>
                                <input-tags value="{{$tags}}"></input-tags>
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field align-flex-start">
                                <label for="id_codeweek_forall_code_label">@lang('event.codeweek_for_all_participation_code.title')</label>
                                <div class="group-fields">
                                    <input id="id_codeweek_forall_code" maxlength="75"
                                           name="codeweek_for_all_participation_code"
                                           value="{{old('codeweek_for_all_participation_code')?old('codeweek_for_all_participation_code'):$event->codeweek_for_all_participation_code}}">
                                    <span style="font-size: 13px;font-style: italic;">
                                        @lang('event.codeweek_for_all_participation_code.explanation')
                                        <a href="/codeweek4all">@lang('event.codeweek_for_all_participation_code.link')</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field-searchable">
                                <label for="id_leading_teacher_tag_label">@lang('community.titles.2')</label>
                                <singleselect :options="{{ json_encode($leading_teachers) }}"
                                              value="{{old('leading_teacher_tag')?old('leading_teacher_tag'):$event->leading_teacher_tag}}"
                                              name="leading_teacher_tag"
                                              placeholder="{{__('community.titles.2')}}"

                                ></singleselect>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'theme'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field">
                            <label for="id_picture">@lang('event.image')</label>
                            <div data-provides="fileinput" data-name="picture">
                                <div class="fileinput-new">
                                    <div class="fileinput-preview fileinput-exists"></div>
                                    <div>
                                        <picture-form picture="{{$event->picture_detail_path()}}"
                                                      image="{{$event->picture}}"></picture-form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="codeweek-form-message">
                    <div class="message">
                        @lang('event.contact.explanation')
                    </div>
                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="id_user_email">* @lang('event.contact.label')</label>
                            <input id="id_user_email" name="user_email" type="email"
                                   placeholder="@lang('event.contact.placeholder')"
                                   value="{{old('user_email')?old('user_email'):$event->user_email}}">
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'user_email'])@endcomponent
                        </div>
                    </div>
                </div>

                <div class="codeweek-form-field-privacy">
                    <label>
                        <input id="checkPrivacy" name="privacy"
                               type="checkbox" {{ auth()->user()->privacy === 1 ? 'checked="checked"' : '' }}>
                        @lang('event.privacy')
                        <a href="/privacy" target="_blank">
                            <img src="/images/external-link.svg" width="16" class="static-image">
                        </a>
                    </label>
                    @component('components.validation-errors', ['field'=>'privacy'])
                    @endcomponent
                </div>


                <div class="codeweek-form-button-container">
                    <div class="codeweek-button">
                        <input type="submit" id="add-button"
                               onclick="javascript:return addEvent('{{__('school.required.location')}}');"
                               value="@lang('event.update_activity')">
                    </div>
                </div>

            </form>


        </section>

    </section>

@endsection

@push('scripts')

    {{--    <script defer src="//europa.eu/webtools/load.js" type="text/javascript"></script>--}}

    {{--    <script src="{{asset('js/map-add-event.js')}}"></script>--}}

    <script defer src="//europa.eu/webtools/load.js" type="text/javascript"></script>
    <script type="application/json">
        {
            "service" : "map",
            "version" : "2.0",
            "renderTo" : "events-edit-map",
            "height": "250",
            "width": "422",
            "custom": ["/js/hideMenuMap.js"]
        }



    </script>

    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>

    <script>

        tinymce.init({
            selector: '#id_description',
            height: 400,
            width: 460
        });

        function addActivity(activityType) {
            return {
                selectedActivityType: activityType,
                isOnlineActivitySelected() {
                    return (this.selectedActivityType === 'open-online' || this.selectedActivityType === 'invite-online')
                },
            }
        }
    </script>

@endpush

