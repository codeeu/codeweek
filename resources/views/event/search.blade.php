@extends('layout.base')

@section('content')

    <div class="container">
        <div class="search-page">
            <div class="search-options">
                <form id="faceted-search-events" method="get" action="/search/" enctype="multipart/form-data">

                    <div class="row">
                        <div class="form-group col-md-9">
                            <input class="form-control" id="id_q" name="q" placeholder="Search for event name or tag"
                                   type="text" value="{{session('q')}}"/>
                        </div>
                        <div class="col-md-3"><input type="submit" class="btn btn-primary btn-lg" value="Search"/></div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="id_country">Select country</label><br/>
                          @component('components.select-country',['countries'=>$active_countries, 'country_iso'=>session('country_iso')])
                              @endcomponent

                            <div class="search-checkbox">
                                <hr>
                                <label for="id_past_0">Include last years events</label>
                                <ul id="id_past">
                                    <li><label for="id_past_0"><input class="search-form-element" id="id_past_0"
                                                                      name="past" type="radio" value="yes" onchange="this.form.submit()"
                                            {{ session('past')=='yes'?'checked':'' }}
                                            /> yes</label>
                                    </li>
                                    <li><label for="id_past_1"><input class="search-form-element"
                                                                      id="id_past_1" name="past" type="radio"
                                                                      value="no" onchange="this.form.submit()"
                                                    {{ session('past')!='yes'?'checked':'' }}
                                            /> no</label></li>
                                </ul>
                            </div>

                            <div class="search-checkbox">
                                <hr>
                                <label>Theme</label>
                                @component('components.checkbox-theme',['themes'=>$themes, 'selection'=>$selected_themes,'mode'=>'search'])
                                @endcomponent
                            </div>

                            <div class="search-checkbox">
                                <hr>
                                <label>Audience</label>
                                @component('components.checkbox-audience',['audiences'=>$audiences,'selection'=>$selected_audiences,'mode'=>'search'])
                                @endcomponent
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div id="events-container">


                                <div class="search-counter">{{$events->total()}} {{str_plural('event', $events->total())}}
                                    match your search criteria:
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