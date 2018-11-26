@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            <div class="clearfix">
                <h1 class="pull-left">@lang('edit.title')</h1>

            </div>
            <p class="aluminum">@lang('edit.required_fields')</p>

            <form enctype="multipart/form-data" method="post" id="event" role="form" class="form-horizontal clearfix"
                  action="/events/{{$event->id}}">
                {{csrf_field()}}
                {{ method_field('PATCH') }}
                <div class="clearfix">
                    <div class="col-md-6 first">


                        <div class="form-group @if($errors->has('title')) has-error @endif">
                            <label for="id_title" class="col-sm-3 control-label">* @lang('event.title.label')</label>

                            <div class="col-sm-9">
                                <input class="form-control" id="id_title" maxlength="255" name="title"
                                       placeholder="@lang('event.title.placeholder')" type="text"
                                       value="{{old('title',$event->title)}}">
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
                                       value="{{old('organizer',$event->organizer)}}"
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

                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            <label for="id_description" class="col-sm-3 control-label">
                                * @lang('edit.description')
                            </label>

                            <div class="col-sm-9">
                            <textarea class="form-control" cols="40" id="id_description" name="description"
                                      placeholder="Tell us a bit about your event." rows="10"

                            > {{old('description',$event->description)}}</textarea>
                            </div>

                            @component('components.validation-errors', ['field'=>'description'])
                            @endcomponent

                        </div>

                        <div class="form-group @if($errors->has('audience')) has-error @endif">
                            <span class="help-block col-sm-9 col-sm-offset-3">@lang('event.who')</span>
                            <label for="id_audience" class="col-sm-3 control-label">
                                *
                                @lang('edit.audience')
                            </label>

                            <div class="col-sm-9">
                                {{--@component('components.checkbox-audience',['audiences'=>$audiences, 'selection'=>$selected_audiences, 'mode'=>'edit'])
                                @endcomponent--}}
                                <multiselect :options="{{ $audiences }}" value="{{$selected_audiences}}" name="audience"></multiselect>
                            </div>
                            @component('components.validation-errors', ['field'=>'audience'])
                            @endcomponent
                        </div>

                        <div class="form-group @if($errors->has('theme')) has-error @endif">
                            <span class="help-block col-sm-9 col-sm-offset-3">@lang('edit.aspect')</span>
                            <label for="id_theme" class="col-sm-3 control-label">
                                *
                                @lang('edit.theme')
                            </label>

                            <div class="col-sm-9">
                                {{--@component('components.checkbox-theme',['themes'=>$themes, 'selection'=>$selected_themes, 'mode'=>'edit'])
                                @endcomponent--}}
                                <multiselect :options="{{ $themes }}" value="{{$selected_themes}}" name="theme"></multiselect>
                            </div>
                            @component('components.validation-errors', ['field'=>'theme'])
                            @endcomponent

                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="form-group @if($errors->has('location')) has-error @endif">
                            <label for="id_location" class="col-sm-3 control-label">
                                *
                                @lang('edit.location')
                            </label>

                            <div class="col-sm-9 first last">
                                <autocomplete-geo name="location" class="form-control" placeholder="@lang('event.address.placeholder')" style="margin-bottom: 10px;"
                                                  value="{{old('location',$event->location)}}"
                                                    geoposition="{{old('geoposition',$event->geoposition)}}"></autocomplete-geo>
                                <div id = "events-edit-map" class="form-control"></div>
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
                                        <option value="{{$country->name}}" {{$selected_country == $country->name ? 'selected' : ''}}>@lang('countries.'. $country->name)</option>
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
                                           value="{{old('start_date',$event->start_date)}}"></date-time>

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
                                           value="{{old('end_date',$event->end_date)}}"></date-time>


                            </div>


                            @component('components.validation-errors', ['field'=>'end_date'])
                            @endcomponent
                        </div>
                        <div class="form-group ">
                            <span class="help-block col-sm-9 col-sm-offset-3"></span>
                            <label for="id_event_url" class="col-sm-3 control-label">

                                @lang('edit.website')
                            </label>

                            <div class="col-sm-9 first last">
                                <input class="form-control" id="id_event_url" maxlength="200"
                                       name="event_url"
                                       placeholder="@lang('event.website.placeholder')"
                                       type="text"
                                       value="{{old('event_url',$event->event_url)}}">
                            </div>

                        </div>

                        <div class="form-group @if($errors->has('contact_person')) has-error @endif">
                            <span class="help-block col-sm-9 col-sm-offset-3"></span>
                            <label for="id_contact_person" class="col-sm-3 control-label">

                                @lang('edit.contact')
                            </label>

                            <div class="col-sm-9 first last">
                                <input class="form-control" id="id_contact_person" maxlength="75"
                                       name="contact_person"
                                       placeholder="@lang('event.public.placeholder')" type="text"
                                       value="{{old('contact_person')?old('contact_person'):$event->contact_person}}">

                                @component('components.validation-errors', ['field'=>'contact_person'])
                                @endcomponent
                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="id_tags" class="col-sm-3 control-label">

                                @lang('edit.tags')
                            </label>

                            <div class="col-sm-9 first last">

                                <input-tags value="{{$tags}}"></input-tags>

                            </div>


                        </div>

                        <div class="form-group ">
                            <label for="id_codeweek_forall_code_label" class="col-sm-3 control-label">
                                @lang('event.codeweek_for_all_participation_code.title')
                            </label>

                            <div class="col-sm-9 first last">

                                <input class="form-control" id="id_codeweek_forall_code" maxlength="75"
                                       name="codeweek_for_all_participation_code" value="{{old('codeweek_for_all_participation_code')?old('codeweek_for_all_participation_code'):$event->codeweek_for_all_participation_code}}"></input>

                                <span class="help-block">@lang('event.codeweek_for_all_participation_code.explanation') <a href="/codeweek4all">@lang('event.codeweek_for_all_participation_code.link')</a></span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="id_picture" class="col-sm-3 control-label">
                                @lang('edit.image')
                            </label>

                            <div class="col-sm-9 first last fileinput fileinput-new"
                                 data-provides="fileinput"
                                 data-name="picture">

                                <div class="fileinput-new">
                                    {{--<img src="/static/img/image_placeholder.png" alt="Image Placeholder"--}}
                                    {{--style="max-height: 204px; max-width: 100%">--}}
                                </div>
                                <div class="fileinput-preview fileinput-exists">

                                </div>

                                <div>
                                    <span class="help-block">@lang('edit.help')</span>
                                    {{--<span class="btn btn-sm btn-file">--}}
                                    <picture-form picture="{{$event->picture_path()}}" image="{{$event->picture}}"></picture-form>

                                    {{--<span class="fileinput-new">Select image</span>--}}
                                    {{--<span class="fileinput-exists">Change</span>--}}
                                    {{--<input type="file"></span>--}}

                                    {{--<a href="#" class="btn btn-sm fileinput-exists"--}}
                                    {{--data-dismiss="fileinput">Remove</a>--}}
                                </div>


                            </div>
                        </div>
                    </div>


                </div>
                <div class="clearfix well well-sm">
                    <h3>@lang('edit.privacy_disclaimer.header')</h3>
                    <div class="aluminum">
                        @lang('edit.privacy_disclaimer.text_1')
                        <a href="/ambassadors/" target="_blank">@lang('edit.privacy_disclaimer.link_1')</a> @lang('edit.privacy_disclaimer.text_2')
                    </div>
                    <div class="col-md-6 first">
                        <div class="form-group ">
                            <span class="help-block col-sm-9 col-sm-offset-3"></span>
                            <label for="id_user_email" class="col-sm-3 control-label">
                                * @lang('edit.privacy_disclaimer.contact_email')
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" id="id_user_email" name="user_email" type="email"
                                       value="{{old('user_email')?old('user_email'):$event->user_email}}" required>
                                @component('components.validation-errors', ['field'=>'user_email'])
                                @endcomponent
                            </div>

                        </div>
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
    </section>

@endsection


@push('css')



@endpush

@push('scripts')


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

    <script src="{{asset('js/map-add-event.js')}}"></script>


@endpush

