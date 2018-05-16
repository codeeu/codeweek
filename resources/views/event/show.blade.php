@extends('layout.app')

@section('content')
    <section>
        <div class="container">
            <div class="about-event clearfix">
                <div class="col-md-8 event-description first">
                    <h1>{{ $event->title }}</h1>
                    <strong>Organized by:</strong>

                    <p> {{ $event->organizer }}</p>
                    @if($event->contact_person)

                        <strong>Contact email:</strong><br>
                        <p><a href="mailto:{{ $event->owner->email }}">{{ $event->contact_person }}</a></p>
                    @endif

                    <address>
                        <strong>Happening at: </strong><br/>
                        {{ $event->location }}
                    </address>
                    <p>
                        <strong>From</strong> {{Carbon\Carbon::parse($event->start_date)->format('l jS \o\f F Y \a\t H:i')}}
                        {{--<strong>From</strong> {{ $event->start_date }} at {{ $event->start_date }}--}}
                        <strong>to</strong> {{Carbon\Carbon::parse($event->end_date)->format('l jS \o\f F Y \a\t H:i')}}
                    </p>
                    <strong>Description:</strong>

                    <p>
                        {{ $event->description }}
                    </p>

                    @if($event->event_url)

                        <strong>More information:</strong>
                        <p><a href="{{ $event->event_url }}" target="_blank">{{ $event->event_url }}</a></p>
                    @endif

                    <strong>This event is for:</strong>

                    @if($event->audiences->count())
                        <p>
                        <ul class="event-list">
                            @foreach($event->audiences as $audience)
                                <li><span class="label label-info">{{ $audience->name }}</span></li>
                            @endforeach
                        </ul>

                        </p>
                    @endif

                    @if($event->themes->count())
                        <strong>Main themes:</strong>

                        <p>
                        <ul class="event-list">
                            @foreach($event->themes as $theme)
                                <li><span class="label label-info">{{ $theme->name }}</span></li>
                            @endforeach
                        </ul>

                        </p>
                    @endif

                    @if($event->tags)
                        <strong>Tags:</strong>
                        <p>
                        <ul class="event-list">
                            @foreach($event->tags as $tag)
                                <li><span class="label label-info">{{ $tag->name }}</span></li>
                            @endforeach
                        </ul>
                        </p>
                    @endif

                    <strong>Share the event:</strong>
                    <div class="share-event-wrapper">

                        <div class="fb-like"
                             data-href="{{$event->path()}}" data-layout="button_count" data-action="recommend"
                             data-show-faces="false" data-share="true"></div>

                        <a href="https://twitter.com/share" class="twitter-share-button"
                           data-url="http://events.codeweek.eu{{$event->path()}}"
                           data-text="Check out {{ $event->title }} at" data-via="CodeWeekEU"
                           data-hashtags="codeEU">Tweet</a>

                        <div class="g-plusone" data-size="medium" data-href="http://events.codeweek.eu"></div>
                        <a class="fa fa-envelope" title="Click to email this to a friend"
                           href="mailto:?subject=Look at this awesome coding event&amp;body=Hi, check out {{ $event->title }} event at {{$event->path()}}"></a>
                    </div>
                </div>
                <div class="col-md-4 event-time-place">


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
                    <div id="view-event-map"></div>
                </div>
            </div>
            <div class="col-md-12">
                <hr>
            </div>

            <div class="col-md-12">
                <h3>Nearby events:</h3>
                <div class="container-fluid ne-wrapper">
                    NEARBY EVENTS
                </div>
            </div>


        </div>
    </section>


@endsection

@section('extra-js')

    <script type="text/javascript">
        window.twttr = (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
            if (d.getElementById(id)) return t;
            js = d.createElement(s);
            js.id = id;
            js.src = "https://platform.twitter.com/widgets.js";
            fjs.parentNode.insertBefore(js, fjs);

            t._e = [];
            t.ready = function (f) {
                t._e.push(f);
            };

            return t;
        }(document, "script", "twitter-wjs"));
    </script>




    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1415375708710844";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>



@endsection



