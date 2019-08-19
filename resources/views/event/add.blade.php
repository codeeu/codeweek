@extends('layout.base')

@section('content')


    <section id="codeweek-events-add-page" class="codeweek-page">

        <section class="codeweek-content-wrapper">

            <h1>@lang('event.main_title')</h1>
            <a href="{{route('guide')}}" target="_blank">@lang('event.howto')?</a>
            <p>@lang('event.required')</p>

            <form enctype="multipart/form-data" method="post" role="form" class="codeweek-form" action="/events">

                {{csrf_field()}}


                <div class="codeweek-form-inner-two-columns">

                    <div class="codeweek-form-inner-container">

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">* @lang('event.title.label')</label>
                                <input id="id_title" maxlength="255" name="title"
                                   placeholder="@lang('event.title.placeholder')" type="text"
                                   value="{{old('title')}}">
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
                                       value="{{old('organizer')}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'organizer'])@endcomponent
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
                                <select id="id_activity_type" name="activity_type" class="codeweek-input-select">
                                    <option value="open-online">@lang('event.activitytype.open online')</option>
                                    <option value="invite-online">@lang('event.activitytype.invite online')</option>
                                    <option value="open-in-person">@lang('event.activitytype.open in person')</option>
                                    <option value="invite-in-person">@lang('event.activitytype.invite in person')</option>
                                    <option value="other">@lang('event.organizertype.other')</option>
                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'activity_type'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field align-flex-start">
                                <label for="id_description">*@lang('event.description.label')</label>
                                <textarea cols="40" id="id_description" name="description"
                                          placeholder="@lang('event.description.placeholder')" rows="10"> {{old('description')}}</textarea>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'description'])@endcomponent
                            </div>
                        </div>

                        <h3>@lang('event.who')</h3>


                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_audience">*@lang('event.audience_title')</label>
                                <multiselect :options="{{ $audiences }}" value="{{ old('audience') }}" name="audience" label="event.audience"></multiselect>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'audience'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_theme">*@lang('event.theme_title')</label>
                                <multiselect :options="{{ $themes }}" value="{{ old('theme') }}" name="theme" label="event.theme"></multiselect>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'theme'])@endcomponent
                            </div>
                        </div>


                    </div>

                    <div class="codeweek-form-inner-container">

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field align-flex-start">
                                <label for="id_location">*@lang('event.address.label')</label>
                                <div>
                                    <autocomplete-geo name="location" placeholder="@lang('event.address.placeholder')" ></autocomplete-geo>
                                    <div class="errors" style="margin-bottom: 10px; margin-left:0;">
                                        @component('components.validation-errors', ['field'=>'location'])@endcomponent
                                    </div>
                                    <div id = "events-add-map"></div>
                                </div>
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_country">* @lang('event.country')</label>
                                <select id="id_country" name="country_iso" class="codeweek-input-select">
                                    <option value=""></option>
                                    @foreach ($countries as $country)
                                        <option value="{{$country->name}}">@lang('countries.'. $country->name)</option>
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
                                           value="{{old('start_date')}}"></date-time>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'start_date'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_end_date">*@lang('event.end.label')</label>
                                <date-time name="end_date" placeholder="@lang('event.end.placeholder')"
                                           value="{{old('end_date')}}"></date-time>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'end_date'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_event_url">@lang('event.website.label')</label>
                                <input id="id_event_url" maxlength="200" name="event_url"
                                       placeholder="@lang('event.website.placeholder')" type="text" value="{{old('event_url')}}">
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_contact_person">@lang('event.public.label')</label>
                                <input id="id_contact_person" maxlength="75" name="contact_person"
                                       placeholder="@lang('event.public.placeholder')" type="text">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'contact_person'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_tags">@lang('event.tags')</label>
                                <input-tags value="{{old('tags')}}"></input-tags>
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field align-flex-start">
                                <label for="id_codeweek_forall_code_label">@lang('event.codeweek_for_all_participation_code.title')</label>
                                <div class="group-fields">
                                    <input id="id_codeweek_forall_code" maxlength="75"
                                           name="codeweek_for_all_participation_code" value="">
                                    <span style="font-size: 13px;font-style: italic;">
                                        @lang('event.codeweek_for_all_participation_code.explanation')
                                        <a href="/codeweek4all">@lang('event.codeweek_for_all_participation_code.link')</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="codeweek-form-field">
                            <label for="id_picture">@lang('event.image')</label>
                            <div data-provides="fileinput" data-name="picture">
                                <div class="fileinput-new">
                                    <div class="fileinput-preview fileinput-exists"></div>
                                    <div>
                                        <picture-form></picture-form>
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
                                   value="{{old('user_email')}}">
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'user_email'])@endcomponent
                        </div>
                    </div>
                </div>

                <div class="codeweek-form-field-privacy">
                    <label>
                        <input id="checkPrivacy" name="privacy" type="checkbox" {{ auth()->user()->privacy === 1 ? 'checked="checked"' : '' }}>
                        @lang('event.privacy')
                        <a href="/privacy" target="_blank"><i class="fa fa-external-link" style="color: blue;"></i></a>
                    </label>
                    @component('components.validation-errors', ['field'=>'privacy'])
                    @endcomponent
                </div>


                <div class="codeweek-form-button-container">
                    <div class="codeweek-button">
                        <input type="submit" id="add-button" onclick="javascript:return addEvent('{{__('school.required.location')}}');" value="@lang('event.button')">
                    </div>
                </div>

            </form>

        </section>

    </section>


    {{--<section>
        <div class="container">

            <div class="clearfix">

                <div class="how-to">

                </div>
            </div>


            <form enctype="multipart/form-data" method="post" id="event" role="form" class="form-horizontal clearfix"
                  action="/events">
                {{csrf_field()}}
                <div class="clearfix">
                    <div class="col-md-6 first">


                        <div class="form-group @if($errors->has('title')) has-error @endif">
                            <label for="id_title" class="col-sm-3 control-label">* @lang('event.title.label')</label>

                            <div class="col-sm-9">
                                <input class="form-control" id="id_title" maxlength="255" name="title"
                                       placeholder="@lang('event.title.placeholder')" type="text"
                                       value="{{old('title')}}">
                            </div>
                            @component('components.validation-errors', ['field'=>'title'])
                            @endcomponent


                        </div>

                        <div class="form-group @if($errors->has('organizer')) has-error @endif">
                            <label for="id_organizer" class="col-sm-3 control-label">
                                * @lang('event.organizer.label')
                            </label>

                            <div class="col-sm-9">
                                <input class="form-control" id="id_organizer" maxlength="255"
                                       name="organizer"
                                       placeholder="@lang('event.organizer.placeholder')" type="text"
                                       value="{{old('organizer')}}"
                                >
                            </div>
                            @component('components.validation-errors', ['field'=>'organizer'])
                            @endcomponent

                        </div>


                        <div class="form-group @if($errors->has('organizer')) has-error @endif">
                            <label for="id_organizer" class="col-sm-3 control-label">
                                * @lang('event.organizertype.label')
                            </label>

                            <div class="col-sm-9">


                                <select id="id_organizer_type" name="organizer_type" class="form-control">
                                    <option value="school">@lang('event.organizertype.school')</option>
                                    <option value="library">@lang('event.organizertype.library')</option>
                                    <option value="non profit">@lang('event.organizertype.non profit')</option>
                                    <option value="private business">@lang('event.organizertype.private business')</option>
                                    <option value="other">@lang('event.organizertype.other')</option>
                                </select>


                            </div>
                            @component('components.validation-errors', ['field'=>'organizer'])
                            @endcomponent

                        </div>

                        <div class="form-group @if($errors->has('activity_type')) has-error @endif">
                            <label for="activity_type" class="col-sm-3 control-label">
                                * @lang('event.activitytype.label')
                            </label>

                            <div class="col-sm-9">


                                <select id="id_activity_type" name="activity_type" class="form-control">
                                    <option value="open-online">@lang('event.activitytype.open online')</option>
                                    <option value="invite-online">@lang('event.activitytype.invite online')</option>
                                    <option value="open-in-person">@lang('event.activitytype.open in person')</option>
                                    <option value="invite-in-person">@lang('event.activitytype.invite in person')</option>
                                    <option value="other">@lang('event.organizertype.other')</option>
                                </select>


                            </div>
                            @component('components.validation-errors', ['field'=>'activity_type'])
                            @endcomponent

                        </div>

                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            <label for="id_description" class="col-sm-3 control-label">
                                *
                                @lang('event.description.label')
                            </label>

                            <div class="col-sm-9">
                            <textarea class="form-control" cols="40" id="id_description" name="description"
                                      placeholder="@lang('event.description.placeholder')" rows="10"

                            > {{old('description')}}</textarea>
                            </div>

                            @component('components.validation-errors', ['field'=>'description'])
                            @endcomponent

                        </div>

                        <div class="form-group @if($errors->has('audience')) has-error @endif">
                            <span class="help-block col-sm-9 col-sm-offset-3">@lang('event.who')</span>
                            <label for="id_audience" class="col-sm-3 control-label">
                                *
                                @lang('event.audience_title')
                            </label>

                            <div class="col-sm-9">
                                --}}{{--@component('components.checkbox-audience',['audiences'=>$audiences, 'selection'=>[],'mode'=>'add'])
                                @endcomponent--}}{{--
                                <multiselect :options="{{ $audiences }}" value="{{ old('audience') }}" name="audience" label="event.audience"></multiselect>
                            </div>
                            @component('components.validation-errors', ['field'=>'audience'])
                            @endcomponent
                        </div>

                        <div class="form-group @if($errors->has('theme')) has-error @endif">

                            <label for="id_theme" class="col-sm-3 control-label">
                                *
                                @lang('event.theme_title')
                            </label>

                            <div class="col-sm-9">
                                --}}{{--@component('components.checkbox-theme',['themes'=>$themes,'selection'=>[],'mode'=>'add'])
                                @endcomponent--}}{{--
                                <multiselect :options="{{ $themes }}" value="{{ old('theme') }}" name="theme" label="event.theme"></multiselect>
                            </div>
                            @component('components.validation-errors', ['field'=>'theme'])
                            @endcomponent

                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group @if($errors->has('location')) has-error @endif">
                            <label for="id_location" class="col-sm-3 control-label">
                                *
                                @lang('event.address.label')
                            </label>

                            <div class="col-sm-9 first last">
                                <autocomplete-geo name="location" class="form-control" placeholder="@lang('event.address.placeholder')" style="margin-bottom: 10px;"></autocomplete-geo>
                                <div id = "events-add-map" class="form-control"></div>
                            </div>

                            @component('components.validation-errors', ['field'=>'location'])
                            @endcomponent
                        </div>

                        <div class="form-group @if($errors->has('country')) has-error @endif">
                            <label for="id_country" class="col-sm-3 control-label">
                                * @lang('event.country')
                            </label>

                            <div class="col-sm-9 input-group">

                                <select id="id_country" name="country_iso" class="form-control">

                                    <option value=""></option>

                                    @foreach ($countries as $country)
                                        <option value="{{$country->name}}">@lang('countries.'. $country->name)</option>
                                    @endforeach

                                </select>

                            </div>
                            @component('components.validation-errors', ['field'=>'country'])
                            @endcomponent

                        </div>


                        <div class="form-group @if($errors->has('start_date')) has-error @endif">
                            <label for="id_start_date" class="col-sm-3 control-label">
                                *
                                @lang('event.start.label')
                            </label>

                            <div class="col-sm-9 input-group">

                                <date-time name="start_date" placeholder="@lang('event.start.placeholder')"
                                           value="{{old('start_date')}}"></date-time>

                            </div>


                            @component('components.validation-errors', ['field'=>'start_date'])
                            @endcomponent
                        </div>

                        <div class="form-group @if($errors->has('end_date')) has-error @endif">
                            <label for="id_end_date" class="col-sm-3 control-label">
                                *
                                @lang('event.end.label')
                            </label>

                            <div class="col-sm-9 input-group">
                                <date-time name="end_date" placeholder="@lang('event.end.placeholder')"
                                           value="{{old('end_date')}}"></date-time>


                            </div>


                            @component('components.validation-errors', ['field'=>'end_date'])
                            @endcomponent
                        </div>
                        <div class="form-group ">
                            <span class="help-block col-sm-9 col-sm-offset-3"></span>
                            <label for="id_event_url" class="col-sm-3 control-label">

                                @lang('event.website.label')
                            </label>

                            <div class="col-sm-9 first last">
                                <input class="form-control" id="id_event_url" maxlength="200"
                                       name="event_url"
                                       placeholder="@lang('event.website.placeholder')"
                                       type="text"
                                       value="{{old('event_url')}}">
                            </div>

                        </div>

                        <div class="form-group @if($errors->has('contact_person')) has-error @endif">
                            <span class="help-block col-sm-9 col-sm-offset-3"></span>
                            <label for="id_contact_person" class="col-sm-3 control-label">

                                @lang('event.public.label')
                            </label>

                            <div class="col-sm-9 first last">
                                <input class="form-control" id="id_contact_person" maxlength="75"
                                       name="contact_person"
                                       placeholder="@lang('event.public.placeholder')" type="text">

                                @component('components.validation-errors', ['field'=>'contact_person'])
                                @endcomponent

                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="id_tags" class="col-sm-3 control-label">
                                @lang('event.tags')
                            </label>

                            <div class="col-sm-9 first last">

                                <input-tags value="{{old('tags')}}"></input-tags>

                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="id_codeweek_forall_code_label" class="col-sm-3 control-label">
                                @lang('event.codeweek_for_all_participation_code.title')
                            </label>

                            <div class="col-sm-9 first last">

                                <input class="form-control" id="id_codeweek_forall_code" maxlength="75"
                                       name="codeweek_for_all_participation_code" value=""></input>

                                <span class="help-block">@lang('event.codeweek_for_all_participation_code.explanation') <a href="/codeweek4all">@lang('event.codeweek_for_all_participation_code.link')</a></span>
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="id_picture" class="col-sm-3 control-label">
                                @lang('event.image')
                            </label>

                            <div class="col-sm-9 first last fileinput fileinput-new"
                                 data-provides="fileinput"
                                 data-name="picture">

                                <div class="fileinput-new">
                                    --}}{{--<img src="/static/img/image_placeholder.png" alt="Image Placeholder"--}}{{--
                                    --}}{{--style="max-height: 204px; max-width: 100%">--}}{{--
                                </div>
                                <div class="fileinput-preview fileinput-exists">

                                </div>

                                <div>
                                    --}}{{--<span class="help-block">Larger images will be resized to 256 x 512 pixels. Maximum upload size is 256 x 1024.</span>--}}{{--
                                    --}}{{--<span class="btn btn-sm btn-file">--}}{{--
                                    <picture-form></picture-form>

                                    --}}{{--<span class="fileinput-new">Select image</span>--}}{{--
                                    --}}{{--<span class="fileinput-exists">Change</span>--}}{{--
                                    --}}{{--<input type="file"></span>--}}{{--

                                    --}}{{--<a href="#" class="btn btn-sm fileinput-exists"--}}{{--
                                    --}}{{--data-dismiss="fileinput">Remove</a>--}}{{--
                                </div>


                            </div>
                        </div>
                    </div>


                </div>
                <div class="clearfix well well-sm">

                    <div class="aluminum">
                        @lang('event.contact.explanation')
                    </div>
                    <div class="col-md-6 first">
                        <div class="form-group ">
                            <span class="help-block col-sm-9 col-sm-offset-3"></span>
                            <label for="id_user_email" class="col-sm-3 control-label">
                                * @lang('event.contact.label')
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" id="id_user_email" name="user_email" type="email" required
                                       placeholder="@lang('event.contact.placeholder')"
                                       value="{{old('user_email')}}"
                                >
                                @component('components.validation-errors', ['field'=>'user_email'])
                                @endcomponent
                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group @if($errors->has('privacy')) has-error @endif">
                    <div class="col-sm-9">
                        <label>
                            <input id="checkPrivacy" name="privacy" type="checkbox" {{ auth()->user()->privacy === 1 ? 'checked="checked"' : '' }}>
                            @lang('event.privacy')
                            <a href="/privacy" target="_blank"><i class="fa fa-external-link" style="color: blue;"></i></a>
                        </label>
                        @component('components.validation-errors', ['field'=>'privacy'])
                        @endcomponent
                    </div>
                </div>

                <div class="col-md-6 first">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="btn btn-primary btn-directional fa-plus-circle btn-lg submit-button-wrapper" id="add-div">
                            <input type="submit" id="add-button" onclick="javascript:return addEvent('{{__('school.required.location')}}');" value="@lang('event.button')">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>--}}

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
            "custom": ["js/hideMenuMap.js"]
        }
    </script>

    <script src="{{asset('js/map-add-event.js')}}"></script>


@endpush
