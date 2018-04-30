@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            <div class="clearfix">
                <h1 class="pull-left">Add your #codeEU event</h1>
                <div class="how-to">
                    <a href="{{route('guide')}}" target="_blank"
                       class="btn btn-sm pull-right">How to organize your own event?
                    </a>
                </div>
            </div>
            <p class="aluminum">Required fields are marked with an * asterisk. Feel free to add the event listing in
                your
                local language.</p>

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

                        <div class="form-group @if($errors->has('description')) has-error @endif">
                            <label for="id_description" class="col-sm-3 control-label">
                                *
                                Description
                            </label>

                            <div class="col-sm-9">
                            <textarea class="form-control" cols="40" id="id_description" name="description"
                                      placeholder="Tell us a bit about your event." rows="10"

                            > {{old('description')}}</textarea>
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
                                @component('components.checkbox-audience',['audiences'=>$audiences])
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
                                <ul id="id_theme">


                                    @foreach($themes as $theme)
                                        <li><label for="id_theme_0"><input id="id_theme_{{$theme->id}}" name="theme[]"
                                                                           type="checkbox"
                                                                           value="{{$theme->id}}"> {{$theme->name}}
                                            </label></li>
                                    @endforeach


                                </ul>
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
                                <input type="text" name="country_iso" value="BE">
                                <input class="form-control" id="autocomplete" maxlength="1000"
                                       name="location"
                                       placeholder="Where will the event be taking place?" type="text"
                                       autocomplete="off"
                                       value="{{old('location')}}">

                            </div>


                            <span class="help-block col-sm-9 col-sm-offset-3">Type in an address or click on the map below to set a location.</span>

                            @component('components.validation-errors', ['field'=>'location'])
                            @endcomponent
                        </div>
                        <div id="view-event-map-wrapper" class="event-map col-sm-9 col-sm-offset-3">
                            <div id="view-event-map" style="position: relative; overflow: hidden;">
                                <div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                                    <div class="gm-style"
                                         style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
                                        <div style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;">
                                            <div style="z-index: 1; position: absolute; top: 0px; left: 0px; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                        <div aria-hidden="true"
                                                             style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;">
                                                            <div style="width: 256px; height: 256px; position: absolute; left: 30px; top: -51px;"></div>
                                                            <div style="width: 256px; height: 256px; position: absolute; left: 30px; top: 205px;"></div>
                                                            <div style="width: 256px; height: 256px; position: absolute; left: -226px; top: -51px;"></div>
                                                            <div style="width: 256px; height: 256px; position: absolute; left: -226px; top: 205px;"></div>
                                                            <div style="width: 256px; height: 256px; position: absolute; left: 286px; top: -51px;"></div>
                                                            <div style="width: 256px; height: 256px; position: absolute; left: 286px; top: 205px;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                                                    <div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
                                                        <div aria-hidden="true"
                                                             style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;">
                                                            <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 30px; top: -51px;"></div>
                                                            <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 30px; top: 205px;"></div>
                                                            <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -226px; top: -51px;"></div>
                                                            <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -226px; top: 205px;"></div>
                                                            <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 286px; top: -51px;"></div>
                                                            <div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 286px; top: 205px;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="position: absolute; z-index: 0; left: 0px; top: 0px;">
                                                    <div style="overflow: hidden; width: 389px; height: 250px;">
                                                    </div>
                                                </div>
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                                                    <div aria-hidden="true"
                                                         style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;">
                                                        <div style="position: absolute; left: 30px; top: -51px; transition: opacity 200ms ease-out;">
                                                            <img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i4!2i8!3i5!4i256!2m3!1e0!2sm!3i382074628!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=123019"
                                                                 draggable="false" alt=""
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div style="position: absolute; left: 30px; top: 205px; transition: opacity 200ms ease-out;">
                                                            <img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i4!2i8!3i6!4i256!2m3!1e0!2sm!3i382074628!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=27969"
                                                                 draggable="false" alt=""
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div style="position: absolute; left: -226px; top: -51px; transition: opacity 200ms ease-out;">
                                                            <img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i4!2i7!3i5!4i256!2m3!1e0!2sm!3i382074628!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=103276"
                                                                 draggable="false" alt=""
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div style="position: absolute; left: -226px; top: 205px; transition: opacity 200ms ease-out;">
                                                            <img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i4!2i7!3i6!4i256!2m3!1e0!2sm!3i382074628!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=8226"
                                                                 draggable="false" alt=""
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div style="position: absolute; left: 286px; top: -51px; transition: opacity 200ms ease-out;">
                                                            <img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i4!2i9!3i5!4i256!2m3!1e0!2sm!3i382074628!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=11691"
                                                                 draggable="false" alt=""
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                        <div style="position: absolute; left: 286px; top: 205px; transition: opacity 200ms ease-out;">
                                                            <img src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i4!2i9!3i6!4i256!2m3!1e0!2sm!3i382074628!3m9!2sen-US!3sUS!5e18!12m1!1e68!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=47712"
                                                                 draggable="false" alt=""
                                                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;"></div>
                                            <div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;">
                                                <div style="z-index: 1; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px;"></div>
                                            </div>
                                            <div style="z-index: 4; position: absolute; top: 0px; left: 0px; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);">
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div>
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div>
                                                <div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div>
                                            </div>
                                        </div>
                                        <div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
                                            <a target="_blank"
                                               href="https://maps.google.com/maps?ll=46.060814,14.497166&amp;z=4&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3"
                                               title="Click to see this area on Google Maps"
                                               style="position: static; overflow: visible; float: none; display: inline;">
                                                <div style="width: 66px; height: 26px; cursor: pointer;">
                                                    <img
                                                            src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png"
                                                            draggable="false"
                                                            style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                                                </div>
                                            </a></div>
                                        <div style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 45px; top: 35px;">
                                            <div style="padding: 0px 0px 10px; font-size: 16px;">Map Data
                                            </div>
                                            <div style="font-size: 13px;">Map data ©2017 Google, ORION-ME
                                            </div>
                                            <div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;">
                                                <img src="https://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png"
                                                     draggable="false"
                                                     style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                            </div>
                                        </div>
                                        <div class="gmnoprint"
                                             style="z-index: 1000001; position: absolute; right: 71px; bottom: 0px; width: 172px;">
                                            <div draggable="false" class="gm-style-cc"
                                                 style="user-select: none; height: 14px; line-height: 14px;">
                                                <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                    <div style="width: 1px;"></div>
                                                    <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                                </div>
                                                <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                    <a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Map
                                                        Data</a><span>Map data ©2017 Google, ORION-ME</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gmnoscreen"
                                             style="position: absolute; right: 0px; bottom: 0px;">
                                            <div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                                                Map data ©2017 Google, ORION-ME
                                            </div>
                                        </div>
                                        <div class="gmnoprint gm-style-cc" draggable="false"
                                             style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;">
                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                <div style="width: 1px;"></div>
                                                <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                            </div>
                                            <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                <a href="https://www.google.com/intl/en-US_US/help/terms_maps.html"
                                                   target="_blank"
                                                   style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms
                                                    of Use</a></div>
                                        </div>
                                        <div style="cursor: pointer; width: 25px; height: 25px; overflow: hidden; display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;">
                                            <img src="https://maps.gstatic.com/mapfiles/api-3/images/sv9.png"
                                                 draggable="false" class="gm-fullscreen-control"
                                                 style="position: absolute; left: -52px; top: -86px; width: 164px; height: 175px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                                        </div>
                                        <div draggable="false" class="gm-style-cc"
                                             style="user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;">
                                            <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                                                <div style="width: 1px;"></div>
                                                <div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                                            </div>
                                            <div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                                                <a target="_new"
                                                   title="Report errors in the road map or imagery to Google"
                                                   href="https://www.google.com/maps/@46.0608144,14.4971656,4z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3"
                                                   style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Report
                                                    a map error</a></div>
                                        </div>
                                        <div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom"
                                             draggable="false" controlwidth="28" controlheight="93"
                                             style="margin: 10px; user-select: none; position: absolute; bottom: 107px; right: 28px;">
                                            <div class="gmnoprint" controlwidth="28" controlheight="55"
                                                 style="position: absolute; left: 0px; top: 38px;">
                                                <div draggable="false"
                                                     style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 28px; height: 55px;">
                                                    <div title="Zoom in"
                                                         style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;">
                                                        <div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;">
                                                            <img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png"
                                                                 draggable="false"
                                                                 style="position: absolute; left: 0px; top: 0px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;">
                                                        </div>
                                                    </div>
                                                    <div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230); top: 0px;"></div>
                                                    <div title="Zoom out"
                                                         style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;">
                                                        <div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;">
                                                            <img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png"
                                                                 draggable="false"
                                                                 style="position: absolute; left: 0px; top: -15px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gm-svpc" controlwidth="28" controlheight="28"
                                                 style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default; position: absolute; left: 0px; top: 0px;">
                                                <div style="position: absolute; left: 1px; top: 1px;"></div>
                                                <div style="position: absolute; left: 1px; top: 1px;">
                                                    <div aria-label="Street View Pegman Control"
                                                         style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;">
                                                        <img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png"
                                                             draggable="false"
                                                             style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                    </div>
                                                    <div aria-label="Pegman is on top of the Map"
                                                         style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;">
                                                        <img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png"
                                                             draggable="false"
                                                             style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                    </div>
                                                    <div aria-label="Street View Pegman Control"
                                                         style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;">
                                                        <img src="https://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png"
                                                             draggable="false"
                                                             style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gmnoprint" controlwidth="28" controlheight="0"
                                                 style="display: none; position: absolute;">
                                                <div title="Rotate map 90 degrees"
                                                     style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; cursor: pointer; background-color: rgb(255, 255, 255); display: none;">
                                                    <img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png"
                                                         draggable="false"
                                                         style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                </div>
                                                <div class="gm-tilt"
                                                     style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);">
                                                    <img src="https://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png"
                                                         draggable="false"
                                                         style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gmnoprint"
                                             style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;">
                                            <div class="gm-style-mtc" style="float: left;">
                                                <div draggable="false" title="Show street map"
                                                     style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; min-width: 22px; font-weight: 500;">
                                                    Map
                                                </div>
                                                <div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; left: 0px; top: 29px; text-align: left; display: none;">
                                                    <div draggable="false"
                                                         title="Show street map with terrain"
                                                         style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;">
                                                    <span role="checkbox"
                                                          style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;"><div
                                                                style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img
                                                                    src="https://maps.gstatic.com/mapfiles/mv/imgs8.png"
                                                                    draggable="false"
                                                                    style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label
                                                                style="vertical-align: middle; cursor: pointer;">Terrain</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gm-style-mtc" style="float: left;">
                                                <div draggable="false" title="Show satellite imagery"
                                                     style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-left: 0px; min-width: 40px;">
                                                    Satellite
                                                </div>
                                                <div style="background-color: white; z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; position: absolute; right: 0px; top: 29px; text-align: left; display: none;">
                                                    <div draggable="false"
                                                         title="Show imagery with street names"
                                                         style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; user-select: none; font-size: 11px; background-color: rgb(255, 255, 255); padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap;">
                                                    <span role="checkbox"
                                                          style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; background-color: rgb(255, 255, 255); border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle;"><div
                                                                style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img
                                                                    src="https://maps.gstatic.com/mapfiles/mv/imgs8.png"
                                                                    draggable="false"
                                                                    style="position: absolute; left: -52px; top: -44px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label
                                                                style="vertical-align: middle; cursor: pointer;">Labels</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

                                Website
                            </label>

                            <div class="col-sm-9 first last">
                                <input class="form-control" id="id_event_url" maxlength="200"
                                       name="event_url"
                                       placeholder="Do you have a website with more information?"
                                       type="text"
                                       value="{{old('event_url')}}">
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
                                <input class="form-control" id="id_tags" name="tags"
                                       placeholder="example: Python, Django, Slovenia" type="text"
                                       value="{{old('tags')}}">

                            </div>


                        </div>

                        <div class="form-group">
                            <label for="id_picture" class="col-sm-3 control-label">
                                Image
                            </label>

                            <div class="col-sm-9 first last fileinput fileinput-new"
                                 data-provides="fileinput"
                                 data-name="picture">
                                <input type="hidden" name="picture" value="nochange">
                                <div class="fileinput-new">
                                    {{--<img src="/static/img/image_placeholder.png" alt="Image Placeholder"--}}
                                    {{--style="max-height: 204px; max-width: 100%">--}}
                                </div>
                                <div class="fileinput-preview fileinput-exists">

                                </div>
                                <div>
                                    <span class="help-block">Larger images will be resized to 256 x 512 pixels. Maximum upload size is 256 x 1024.</span>
                                    <span class="btn btn-sm btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file"></span>
                                    <a href="#" class="btn btn-sm fileinput-exists"
                                       data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hidden"><p class="geoposition-widget">
                            Latitude: <input class="geoposition" id="id_geoposition_0" name="geoposition_0"
                                             type="text"
                                             value="0"><br>
                            Longitude: <input class="geoposition" id="id_geoposition_1" name="geoposition_1"
                                              type="text"
                                              value="0">
                        </p><select id="id_country" name="country">
                            <option value="" selected="selected">---------</option>
                            <option value="AF">Afghanistan</option>
                            <option value="AL">Albania</option>
                            <option value="DZ">Algeria</option>
                            <option value="AS">American Samoa</option>
                            <option value="AD">Andorra</option>
                            <option value="AO">Angola</option>
                            <option value="AI">Anguilla</option>
                            <option value="AG">Antigua and Barbuda</option>
                            <option value="AR">Argentina</option>
                            <option value="AM">Armenia</option>
                            <option value="AW">Aruba</option>
                            <option value="AU">Australia</option>
                            <option value="AT">Austria</option>
                            <option value="AZ">Azerbaijan</option>
                            <option value="BS">Bahamas</option>
                            <option value="BH">Bahrain</option>
                            <option value="BD">Bangladesh</option>
                            <option value="BB">Barbados</option>
                            <option value="BY">Belarus</option>
                            <option value="BE">Belgium</option>
                            <option value="BZ">Belize</option>
                            <option value="BJ">Benin</option>
                            <option value="BM">Bermuda</option>
                            <option value="BT">Bhutan</option>
                            <option value="BO">Bolivia, Plurinational State of</option>
                            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                            <option value="BA">Bosnia and Herzegovina</option>
                            <option value="BW">Botswana</option>
                            <option value="BV">Bouvet Island</option>
                            <option value="BR">Brazil</option>
                            <option value="IO">British Indian Ocean Territory</option>
                            <option value="BN">Brunei Darussalam</option>
                            <option value="BG">Bulgaria</option>
                            <option value="BF">Burkina Faso</option>
                            <option value="BI">Burundi</option>
                            <option value="KH">Cambodia</option>
                            <option value="CM">Cameroon</option>
                            <option value="CA">Canada</option>
                            <option value="CV">Cape Verde</option>
                            <option value="KY">Cayman Islands</option>
                            <option value="CF">Central African Republic</option>
                            <option value="TD">Chad</option>
                            <option value="CL">Chile</option>
                            <option value="CN">China</option>
                            <option value="CX">Christmas Island</option>
                            <option value="CC">Cocos (Keeling) Islands</option>
                            <option value="CO">Colombia</option>
                            <option value="KM">Comoros</option>
                            <option value="CG">Congo</option>
                            <option value="CD">Congo (the Democratic Republic of the)</option>
                            <option value="CK">Cook Islands</option>
                            <option value="CR">Costa Rica</option>
                            <option value="HR">Croatia</option>
                            <option value="CU">Cuba</option>
                            <option value="CW">Curaçao</option>
                            <option value="CY">Cyprus</option>
                            <option value="CZ">Czech Republic</option>
                            <option value="CI">Côte d'Ivoire</option>
                            <option value="DK">Denmark</option>
                            <option value="DJ">Djibouti</option>
                            <option value="DM">Dominica</option>
                            <option value="DO">Dominican Republic</option>
                            <option value="EC">Ecuador</option>
                            <option value="EG">Egypt</option>
                            <option value="SV">El Salvador</option>
                            <option value="GQ">Equatorial Guinea</option>
                            <option value="ER">Eritrea</option>
                            <option value="EE">Estonia</option>
                            <option value="ET">Ethiopia</option>
                            <option value="FK">Falkland Islands [Malvinas]</option>
                            <option value="FO">Faroe Islands</option>
                            <option value="FJ">Fiji</option>
                            <option value="FI">Finland</option>
                            <option value="FR">France</option>
                            <option value="GF">French Guiana</option>
                            <option value="PF">French Polynesia</option>
                            <option value="TF">French Southern Territories</option>
                            <option value="GA">Gabon</option>
                            <option value="GM">Gambia (The)</option>
                            <option value="GE">Georgia</option>
                            <option value="DE">Germany</option>
                            <option value="GH">Ghana</option>
                            <option value="GI">Gibraltar</option>
                            <option value="GR">Greece</option>
                            <option value="GL">Greenland</option>
                            <option value="GD">Grenada</option>
                            <option value="GP">Guadeloupe</option>
                            <option value="GU">Guam</option>
                            <option value="GT">Guatemala</option>
                            <option value="GG">Guernsey</option>
                            <option value="GN">Guinea</option>
                            <option value="GW">Guinea-Bissau</option>
                            <option value="GY">Guyana</option>
                            <option value="HT">Haiti</option>
                            <option value="HM">Heard Island and McDonald Islands</option>
                            <option value="VA">Holy See [Vatican City State]</option>
                            <option value="HN">Honduras</option>
                            <option value="HK">Hong Kong</option>
                            <option value="HU">Hungary</option>
                            <option value="IS">Iceland</option>
                            <option value="IN">India</option>
                            <option value="ID">Indonesia</option>
                            <option value="IR">Iran (the Islamic Republic of)</option>
                            <option value="IQ">Iraq</option>
                            <option value="IE">Ireland</option>
                            <option value="IM">Isle of Man</option>
                            <option value="IL">Israel</option>
                            <option value="IT">Italy</option>
                            <option value="JM">Jamaica</option>
                            <option value="JP">Japan</option>
                            <option value="JE">Jersey</option>
                            <option value="JO">Jordan</option>
                            <option value="KZ">Kazakhstan</option>
                            <option value="KE">Kenya</option>
                            <option value="KI">Kiribati</option>
                            <option value="KP">Korea (the Democratic People's Republic of)</option>
                            <option value="KR">Korea (the Republic of)</option>
                            <option value="KW">Kuwait</option>
                            <option value="KG">Kyrgyzstan</option>
                            <option value="LA">Lao People's Democratic Republic</option>
                            <option value="LV">Latvia</option>
                            <option value="LB">Lebanon</option>
                            <option value="LS">Lesotho</option>
                            <option value="LR">Liberia</option>
                            <option value="LY">Libya</option>
                            <option value="LI">Liechtenstein</option>
                            <option value="LT">Lithuania</option>
                            <option value="LU">Luxembourg</option>
                            <option value="MO">Macao</option>
                            <option value="MK">Macedonia (the former Yugoslav Republic of)</option>
                            <option value="MG">Madagascar</option>
                            <option value="MW">Malawi</option>
                            <option value="MY">Malaysia</option>
                            <option value="MV">Maldives</option>
                            <option value="ML">Mali</option>
                            <option value="MT">Malta</option>
                            <option value="MH">Marshall Islands</option>
                            <option value="MQ">Martinique</option>
                            <option value="MR">Mauritania</option>
                            <option value="MU">Mauritius</option>
                            <option value="YT">Mayotte</option>
                            <option value="MX">Mexico</option>
                            <option value="FM">Micronesia (the Federated States of)</option>
                            <option value="MD">Moldova (the Republic of)</option>
                            <option value="MC">Monaco</option>
                            <option value="MN">Mongolia</option>
                            <option value="ME">Montenegro</option>
                            <option value="MS">Montserrat</option>
                            <option value="MA">Morocco</option>
                            <option value="MZ">Mozambique</option>
                            <option value="MM">Myanmar</option>
                            <option value="NA">Namibia</option>
                            <option value="NR">Nauru</option>
                            <option value="NP">Nepal</option>
                            <option value="NL">Netherlands</option>
                            <option value="NC">New Caledonia</option>
                            <option value="NZ">New Zealand</option>
                            <option value="NI">Nicaragua</option>
                            <option value="NE">Niger</option>
                            <option value="NG">Nigeria</option>
                            <option value="NU">Niue</option>
                            <option value="NF">Norfolk Island</option>
                            <option value="MP">Northern Mariana Islands</option>
                            <option value="NO">Norway</option>
                            <option value="OM">Oman</option>
                            <option value="PK">Pakistan</option>
                            <option value="PW">Palau</option>
                            <option value="PS">Palestine, State of</option>
                            <option value="PA">Panama</option>
                            <option value="PG">Papua New Guinea</option>
                            <option value="PY">Paraguay</option>
                            <option value="PE">Peru</option>
                            <option value="PH">Philippines</option>
                            <option value="PN">Pitcairn</option>
                            <option value="PL">Poland</option>
                            <option value="PT">Portugal</option>
                            <option value="PR">Puerto Rico</option>
                            <option value="QA">Qatar</option>
                            <option value="RO">Romania</option>
                            <option value="RU">Russian Federation</option>
                            <option value="RW">Rwanda</option>
                            <option value="RE">Réunion</option>
                            <option value="BL">Saint Barthélemy</option>
                            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                            <option value="KN">Saint Kitts and Nevis</option>
                            <option value="LC">Saint Lucia</option>
                            <option value="MF">Saint Martin (French part)</option>
                            <option value="PM">Saint Pierre and Miquelon</option>
                            <option value="VC">Saint Vincent and the Grenadines</option>
                            <option value="WS">Samoa</option>
                            <option value="SM">San Marino</option>
                            <option value="ST">Sao Tome and Principe</option>
                            <option value="SA">Saudi Arabia</option>
                            <option value="SN">Senegal</option>
                            <option value="RS">Serbia</option>
                            <option value="SC">Seychelles</option>
                            <option value="SL">Sierra Leone</option>
                            <option value="SG">Singapore</option>
                            <option value="SX">Sint Maarten (Dutch part)</option>
                            <option value="SK">Slovakia</option>
                            <option value="SI">Slovenia</option>
                            <option value="SB">Solomon Islands</option>
                            <option value="SO">Somalia</option>
                            <option value="ZA">South Africa</option>
                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                            <option value="SS">South Sudan</option>
                            <option value="ES">Spain</option>
                            <option value="LK">Sri Lanka</option>
                            <option value="SD">Sudan</option>
                            <option value="SR">Suriname</option>
                            <option value="SJ">Svalbard and Jan Mayen</option>
                            <option value="SZ">Swaziland</option>
                            <option value="SE">Sweden</option>
                            <option value="CH">Switzerland</option>
                            <option value="SY">Syrian Arab Republic</option>
                            <option value="TW">Taiwan</option>
                            <option value="TJ">Tajikistan</option>
                            <option value="TZ">Tanzania, United Republic of</option>
                            <option value="TH">Thailand</option>
                            <option value="TL">Timor-Leste</option>
                            <option value="TG">Togo</option>
                            <option value="TK">Tokelau</option>
                            <option value="TO">Tonga</option>
                            <option value="TT">Trinidad and Tobago</option>
                            <option value="TN">Tunisia</option>
                            <option value="TR">Turkey</option>
                            <option value="TM">Turkmenistan</option>
                            <option value="TC">Turks and Caicos Islands</option>
                            <option value="TV">Tuvalu</option>
                            <option value="UG">Uganda</option>
                            <option value="UA">Ukraine</option>
                            <option value="AE">United Arab Emirates</option>
                            <option value="GB">United Kingdom</option>
                            <option value="US">United States</option>
                            <option value="UM">United States Minor Outlying Islands</option>
                            <option value="UY">Uruguay</option>
                            <option value="UZ">Uzbekistan</option>
                            <option value="VU">Vanuatu</option>
                            <option value="VE">Venezuela, Bolivarian Republic of</option>
                            <option value="VN">Viet Nam</option>
                            <option value="VG">Virgin Islands (British)</option>
                            <option value="VI">Virgin Islands (U.S.)</option>
                            <option value="WF">Wallis and Futuna</option>
                            <option value="EH">Western Sahara</option>
                            <option value="YE">Yemen</option>
                            <option value="ZM">Zambia</option>
                            <option value="ZW">Zimbabwe</option>
                            <option value="AX">Åland Islands</option>
                        </select></div>
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





@endpush
