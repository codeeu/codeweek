@extends('layout.base')

@section('content')

    <div class="container">
        <div class="search-page">
            <div class="search-options">
                <form id="faceted-search-events" method="get" action="/search/" enctype="multipart/form-data">

                    <div class="row">
                        <div class="form-group col-md-9">
                            <input class="form-control h-12" id="id_q" name="q" placeholder=@lang('search.placeholder')
                                    type="text" value="{{session('q')}}"/>
                        </div>
                        <div class="col-md-3"><input type="submit" class="btn btn-primary btn-sm w-full h-12"
                                                     value=@lang('search.submit')></div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="id_country">@lang('search.label_country')</label><br/>

                            @component('components.select-country',['countries'=>$active_countries, 'country_iso'=>session('country_iso')])
                            @endcomponent


                            <div class="search-checkbox">
                                <hr>
                                <label for="id_past_0">@lang('search.year')</label>

                                <select class="search-form-element" id="year" name="year" onchange="this.form.submit()">


                                    @foreach($years as $year_label)
                                        <option value="{{$year_label}}"
                                                {{ ($year_label == $selected_year)?'selected':'' }}
                                        >{{$year_label}}</option>
                                    @endforeach


                                </select>

                            <!--<ul id="id_past">
                                    <li><label for="id_past_0"><input class="search-form-element" id="id_past_0"
                                                                      name="past" type="radio" value="yes" onchange="this.form.submit()"
                                            {{ session('past')=='yes'?'checked':'' }}
                                    /> @lang('search.last_year_events.yes')</label>
                                    </li>
                                    <li><label for="id_past_1"><input class="search-form-element"
                                                                      id="id_past_1" name="past" type="radio"
                                                                      value="no" onchange="this.form.submit()"
                                                    {{ session('past')!='yes'?'checked':'' }}
                                    /> @lang('search.last_year_events.no')</label></li>
                                </ul>-->
                            </div>

                            <div class="search-checkbox">
                                <hr>
                                <label>@lang('search.theme_title')</label>
                                @component('components.checkbox-theme',['themes'=>$themes, 'selection'=>$selected_themes,'mode'=>'search'])
                                @endcomponent
                            </div>

                            <div class="search-checkbox">
                                <hr>
                                <label>@lang('search.audience_title')</label>
                                @component('components.checkbox-audience',['audiences'=>$audiences,'selection'=>$selected_audiences,'mode'=>'search'])
                                @endcomponent
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="events-container">


                                <div class="search-counter">{{$events->total()}} @lang('search.' . str_plural('event', $events->total()))
                                    @lang('search.search_counter')



                                    @if(isset($country) && $country->website)
                                        <a href="{{$country->website}}">
                                            <i class="icon-globe float-right pl-2"></i>
                                        </a>
                                    @endif

                                    @if(isset($country) && $country->facebook)
                                        <a href="{{$country->facebook}}">
                                            <i class="icon-facebook float-right pl-2"></i>
                                        </a>
                                    @endif
                                </div>


                                @foreach($events as $event)
                                    @component('event.event_tile_long', ['event'=>$event])
                                    @endcomponent
                                @endforeach

                                {{$events->appends(request()->input())->links()}}


                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection