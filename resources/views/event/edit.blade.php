@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            <div class="clearfix">
                <h1 class="pull-left">Edit your #codeEU event</h1>

            </div>
            <p class="aluminum">Required fields are marked with an * asterisk. Feel free to add the event listing in
                your
                local language.</p>

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
                                *
                                Description
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
                            <span class="help-block col-sm-9 col-sm-offset-3">Who is the event for?</span>
                            <label for="id_audience" class="col-sm-3 control-label">
                                *
                                Audience
                            </label>

                            <div class="col-sm-9">
                                @component('components.checkbox-audience',['audiences'=>$audiences, 'selection'=>$event->audiences])
                                @endcomponent
                            </div>
                            @component('components.validation-errors', ['field'=>'audience'])
                            @endcomponent
                        </div>

                        <div class="form-group @if($errors->has('theme')) has-error @endif">
                            <span class="help-block col-sm-9 col-sm-offset-3">Which aspect of coding will your event cover?</span>
                            <label for="id_theme" class="col-sm-3 control-label">
                                *
                                Theme
                            </label>

                            <div class="col-sm-9">
                                @component('components.checkbox-theme',['themes'=>$themes, 'selection'=>$event->themes])
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
                                Location
                            </label>

                            <div class="col-sm-9 first last">
                                {{--TODO: REMOVE--}}
                                <input type="hidden" name="country_iso" id="country_iso" value="{{old('country_iso',$event->country_iso)}}">
                                <input type="hidden" name="geoposition" id="geoposition" value="{{old('geoposition',$event->geoposition)}}">
                                <input class="form-control" id="autocomplete" maxlength="1000"
                                       name="location"
                                       placeholder="Where will the event be taking place?" type="text"
                                       autocomplete="off"
                                       onkeydown="if (event.keyCode == 13) {return false;}"
                                       value="{{old('location',$event->location)}}">

                            </div>


                            <span class="help-block col-sm-9 col-sm-offset-3">Type in an address or click on the map below to set a location.</span>

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

                                Website
                            </label>

                            <div class="col-sm-9 first last">
                                <input class="form-control" id="id_event_url" maxlength="200"
                                       name="event_url"
                                       placeholder="Do you have a website with more information?"
                                       type="text"
                                       value="{{old('event_url',$event->event_url)}}">
                            </div>

                        </div>

                        <div class="form-group @if($errors->has('contact_person')) has-error @endif">
                            <span class="help-block col-sm-9 col-sm-offset-3"></span>
                            <label for="id_contact_person" class="col-sm-3 control-label">

                                Contact
                            </label>

                            <div class="col-sm-9 first last">
                                <input class="form-control" id="id_contact_person" maxlength="75"
                                       name="contact_person"
                                       placeholder="Would you like to display a contact email?" type="text"
                                       value="{{old('contact_person')?old('contact_person'):Auth::user()->email}}">

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
                                    <span class="help-block">Larger images will be resized to 256 x 512 pixels. Maximum upload size is 256 x 1024.</span>
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
                    <h3>Your contact information</h3>
                    <div class="aluminum">
                        This information will only be visible to
                        <a href="/ambassadors/" target="_blank">EU Code Week Ambassadors</a> and Code Week
                        organizers, who
                        will check your event before it appears on the map and might contact you if edits are
                        necessary or
                        for administering surveys for statistical purposes after the event.
                    </div>
                    <div class="col-md-6 first">
                        <div class="form-group ">
                            <span class="help-block col-sm-9 col-sm-offset-3"></span>
                            <label for="id_user_email" class="col-sm-3 control-label">
                                * Your contact email
                            </label>
                            <div class="col-sm-9">
                                <input class="form-control" id="id_user_email" name="user_email" type="email"
                                       value="">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 first">
                    <div class="col-sm-9 col-sm-offset-3">
                        <div class="btn btn-primary btn-directional fa-plus-circle btn-lg submit-button-wrapper">
                            <input type="submit" value="Add event">
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

