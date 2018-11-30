@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            @can('approve', $event)
                @if($event->certificate_url)
                    <reported-event :event="{{$event}}"></reported-event>
                @else
                    <moderate-event :event="{{$event}}"></moderate-event>
                @endif
            @endcan



            @can('report', $event)
                <report-event :event="{{$event}}"></report-event>
            @endcan

            <div class="clearfix">
                <div class="col-md-8 event-description first">


                    <h1>{{ $event->title }}</h1>
                    <hr>

                    <strong>@lang('eventdetails.organised_by')</strong>

                    <p> {{ $event->organizer }}
                        @can('approve', $event)
                            <br/><a href="mailto:{{$event->user_email}}">{{$event->user_email}}</a>
                        @endcan
                    </p>

                    @if($event->contact_person)

                        <strong>@lang('eventdetails.contact_email')</strong><br>
                        <p><a href="mailto:{{ $event->contact_person }}">{{ $event->contact_person }}</a>
                        </p>
                    @endif

                    <address>
                        <strong>@lang('eventdetails.happening_at')</strong><br/>
                        {{ $event->location }}
                    </address>
                    <p>
                        <strong>@lang('eventdetails.from')</strong> {{Carbon\Carbon::parse($event->start_date)->format('l jS \o\f F Y \a\t H:i')}}
                        {{--<strong>From</strong> {{ $event->start_date }} at {{ $event->start_date }}--}}
                        <strong>@lang('eventdetails.to')</strong> {{Carbon\Carbon::parse($event->end_date)->format('l jS \o\f F Y \a\t H:i')}}
                    </p>
                    <strong>@lang('eventdetails.description')</strong>

                    <p>
                        {{ $event->description }}
                    </p>

                    @if($event->event_url)

                        <strong>@lang('eventdetails.more_info')</strong>
                        <p><a href="{{ $event->event_url }}" target="_blank">{{ $event->event_url }}</a></p>
                    @endif

                    <strong>@lang('eventdetails.audience')</strong>

                    @if($event->audiences->count())
                        <div class="itens">
                            <ul class="event-list">
                                @foreach($event->audiences as $audience)
                                    <li><span class="label label-info">@lang('event.audience.'.$audience->name)</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($event->themes->count())
                        <strong>@lang('eventdetails.themes')</strong>
                        <div class="itens">
                            <ul class="event-list">
                                @foreach($event->themes as $theme)
                                    <li><span class="label label-info">@lang('event.theme.'.$theme->name)</span></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($event->tags)
                        <strong>@lang('eventdetails.tags')</strong>
                        <div class="itens">
                            <ul class="event-list">
                                @foreach($event->tags as $tag)
                                    <li><span class="label label-info">{{ $tag->name }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @can('edit', $event)

                        @if($event->codeweek_for_all_participation_code)

                            <strong>@lang('event.codeweek_for_all_participation_code.title')</strong>
                            <p>
                                {{ $event->codeweek_for_all_participation_code }}
                            </p>

                        @endif
                    @endcan

                    <strong>@lang('eventdetails.share')</strong>
                    <div class="share-event-wrapper">

                        <div class="fb-like"
                             data-href="{{$event->path()}}" data-layout="button_count" data-action="recommend"
                             data-show-faces="false" data-share="true"></div>

                        <a href="https://twitter.com/share" class="twitter-share-button"
                           data-url="http://events.codeweek.eu{{$event->path()}}"
                           data-text="Check out {{ $event->title }} at" data-via="CodeWeekEU"
                           data-hashtags="codeEU">Tweet</a>

                        <div class="g-plusone" data-size="medium" data-href="http://events.codeweek.eu"></div>
                        <a class="fa fa-envelope" title='@lang('eventdetails.email.tooltip')'
                           href="mailto:?subject=@lang('eventdetails.email.subject')&amp;body=@lang('eventdetails.email.body_1'){{ $event->title }}@lang('eventdetails.email.body_2'){{env('APP_URL')}}{{$event->path()}}"></a>
                    </div>
                </div>
                <div class="col-md-4 event-time-place">

                    <div>


                        @if (Auth::check())
                            @if($event->creator_id === auth()->user()->id && is_null($event->reported_at))
                                <a href="{{route('edit_event',$event->id)}}" class="btn pull-right edit-event-btn">
                                    <i class="fa fa-pencil-square-o"></i>@lang('eventdetails.edit')</a>

                                @if($event->status === 'PENDING')
                                    <div class="alert alert-warning">
                                        <strong>@lang('eventdetails.note')</strong>@lang('eventdetails.pending_warning')
                                        <a
                                                href="{{route('ambassadors')}}">@lang('eventdetails.pending_link')</a>.
                                    </div>
                                @endif

                            @endif
                        @endif
                    </div>

                    <div class="event-jumbotron">

                        <img src="{{$event->picture_path()}}"/>


                    </div>


                    <div id="calendar">
                        @component('components.calendar',['event'=>$event])
                        @endcomponent
                    </div>
                </div>
                <div class="col-md-12 first">
                    <hr>
                </div>
            </div>

            <div id="events-show-map"></div>

            <div class="col-md-12">
                <hr>
            </div>

            <div class="col-md-12">
                <h3>@lang('eventdetails.nearby_upcoming_events')</h3>


                <div class="justify-between md:flex sm:flex-row">
                    @component('components.close-events',['closeEvents'=>$event->getClosest()])
                    @endcomponent

                </div>
            </div>
        </div>


    </section>


@endsection

@push('scripts')

    <script>
        window.event_details = {!! json_encode($event->getJavascriptData()) !!};
        window.event_coordinates = event_details.geoposition.split(",");
    </script>

    <script defer src="//europa.eu/webtools/load.js" type="text/javascript"></script>
    <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet"/>
    <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet"/>
    <script type="application/json">
        {
            "service" : "map",
            "version" : "2.0",
            "renderTo" : "events-show-map",
            "custom": ["/js/hideMenuMap.js","/js/leaflet.markercluster.js"]
        }

    </script>



    {{--<script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_KEY')}}&libraries=places"></script>
    <script>


        var event = {!! json_encode($event->getJavascriptData()) !!};

        var geoposition = event.geoposition;
        var coordinates = geoposition.split(",");


        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            streetViewControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: {
                lat: parseFloat(coordinates[0]),
                lng: parseFloat(coordinates[1])
            }

        });

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(coordinates[0], coordinates[1]),
            map: map,
            animation: google.maps.Animation.DROP,

        });


        var contentString = '<div id="content">' +
            '<h1 id="firstHeading" class="firstHeading">' + event.title + '</h1>' +
            '<div id="bodyContent">' +
            '<p>' + event.description + '</p>' +
            '</div>' +
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        marker.addListener('click', function () {
            infowindow.open(map, marker);
        });


    </script>--}}



@endpush


<script>
    import ReportedEvent from "../../assets/js/components/ReportedEvent";

    export default {
        components: {ReportedEvent}
    }
</script>