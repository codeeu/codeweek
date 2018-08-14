@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            <div class="clearfix">
                <h1 class="pull-left">@lang('event.main_title')</h1>
                <div class="how-to">
                    <a href="{{route('guide')}}" target="_blank"
                       class="btn btn-sm pull-right">@lang('event.howto')?
                    </a>
                </div>
            </div>
            <p class="aluminum">@lang('event.required')</p>

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
                            <span class="help-block col-sm-9 col-sm-offset-3">Who is the event for?</span>
                            <label for="id_audience" class="col-sm-3 control-label">
                                *
                                @lang('event.audience_title')
                            </label>

                            <div class="col-sm-9">
                                @component('components.checkbox-audience',['audiences'=>$audiences, 'selection'=>[],'mode'=>'add'])
                                @endcomponent
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
                                @component('components.checkbox-theme',['themes'=>$themes,'selection'=>[],'mode'=>'add'])
                                @endcomponent
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
                                {{--TODO: REMOVE--}}
                                <input type="hidden" name="country_iso" id="country_iso" value="{{old('country_iso')}}">
                                <input type="hidden" name="geoposition" id="geoposition" value="{{old('geoposition')}}">
                                <input class="form-control" id="autocomplete" maxlength="1000"
                                       name="location"
                                       placeholder="@lang('event.address.placeholder')" type="text"
                                       autocomplete="off"
                                       onkeydown="if (event.keyCode == 13) {return false;}"
                                       value="{{old('location')}}">

                            </div>


                            @component('components.validation-errors', ['field'=>'location'])
                            @endcomponent
                        </div>

                        <div id="view-event-map-wrapper" class="event-map col-sm-9 col-sm-offset-3">
                            <div id="map" style="width:100%; height:100%"></div>
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

                                Tags
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

                                <span class="help-block">@lang('event.codeweek_for_all_participation_code.explanation') <a href="#">@lang('event.codeweek_for_all_participation_code.link')</a></span>
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="id_picture" class="col-sm-3 control-label">
                                Image
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
                                    {{--<span class="help-block">Larger images will be resized to 256 x 512 pixels. Maximum upload size is 256 x 1024.</span>--}}
                                    {{--<span class="btn btn-sm btn-file">--}}
                                    <picture-form></picture-form>

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
                                <input class="form-control" id="id_user_email" name="user_email" type="email"
                                       placeholder="@lang('event.contact.placeholder')">
                                @component('components.validation-errors', ['field'=>'user_email'])
                                @endcomponent
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 first">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="btn btn-primary btn-directional fa-plus-circle btn-lg submit-button-wrapper">
                            <input type="submit" value="@lang('event.button')">
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



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZivlK6i8_JWt15x-BewfW9Vw2mhWPd7o&libraries=places"></script>
    <script src="{{asset('js/map-add-event.js')}}"></script>


@endpush
