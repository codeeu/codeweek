@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            @can('approve', $event)
                <moderate-event :event="{{$event}}"></moderate-event>
            @endcan

            @can('report', $event)
                <report-event :event="{{$event}}"></report-event>
            @endcan

            <div class="about-event clearfix">
                <div class="col-md-8 event-description first">


                    <h1>{{ $event->title }}</h1>
                    <hr>

                    <strong>@lang('eventdetails.organised_by')</strong>

                    <p> {{ $event->organizer }}</p>
                    @if($event->contact_person)

                        <strong>@lang('eventdetails.contact_email')</strong><br>
                        <p><a href="mailto:{{ $event->owner->email }}">{{ $event->contact_person }}</a></p>
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
                                    <li><span class="label label-info">{{ $audience->name }}</span></li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($event->themes->count())
                        <strong>@lang('eventdetails.themes')</strong>
                        <div class="itens">
                            <ul class="event-list">
                                @foreach($event->themes as $theme)
                                    <li><span class="label label-info">{{ $theme->name }}</span></li>
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
                           href="mailto:?subject=@lang('eventdetails.email.subject')&amp;body=@lang('eventdetails.email.body_1'){{ $event->title }}@lang('eventdetails.email.body_2'){{$event->path()}}"></a>
                    </div>
                </div>
                <div class="col-md-4 event-time-place">

                    <div>


                        @if (Auth::check())
                            @if($event->creator_id === auth()->user()->id)
                                <a href="{{route('edit_event',$event->id)}}" class="btn pull-right edit-event-btn">
                                    <i class="fa fa-pencil-square-o"></i>@lang('eventdetails.edit')</a>

                                @if($event->status === 'PENDING')
                                    <div class="alert alert-warning">
                                        <strong>@lang('eventdetails.note')</strong>@lang('eventdetails.pending_warning') <a
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
                <div id="view-event-map-wrapper" class="col-md-12 first">
                    <div id="map" style="width:100%; height:100%"></div>
                </div>
            </div>
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


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZivlK6i8_JWt15x-BewfW9Vw2mhWPd7o&libraries=places"></script>
    <script>


        var event = {!! json_encode($event) !!};

        var geoposition = event.geoposition;
        var coordinates = geoposition.split(",");


        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
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


    </script>



@endpush



