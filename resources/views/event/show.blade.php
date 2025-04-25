@extends('layout.base')

<x-tailwind></x-tailwind>

@section('title', $event->title)

@section('content')

    <section id="codeweek-show-event-page" class="codeweek-page">

        @can('approve', $event)
            @if($event->certificate_url)
                <reported-event :event="{{$event}}"></reported-event>
            @else
                <moderate-event :event="{{$event}}" :pending-counter="{{auth()->user()->getEventsToReviewCount()}}"
                                :next-pending="'{{optional(auth()->user()->getNextPendingEvent($event))->path()}}'"></moderate-event>
            @endif
        @endcan



        @can('report', $event)
            <report-event :event="{{$event}}"></report-event>
        @endcan

        @if(Auth::check() &&
            $event->creator_id === auth()->user()->id &&
            is_null($event->reported_at) &&
            $event->status === 'PENDING')

            <div class="event-is-pending">
                <strong>@lang('eventdetails.note')</strong>@lang('eventdetails.pending_warning')
                <a href="{{route('ambassadors')}}">@lang('eventdetails.pending_link')</a>.
            </div>

        @endif


        <section class="codeweek-banner show-event">
            <div class="text">
                <div class="edit-button">
                    @can('edit', $event)
                        <a class="mr-2 codeweek-action-link-button"
                           href="{{route('edit_event',$event->id)}}">@lang('eventdetails.edit')</a>
                    @endcan

                    @can('delete', $event)
                        @if(Auth::check() &&
    $event->creator_id === auth()->user()->id)
                            <a class="codeweek-action-link-button red"
                               href="{{route('delete_event',$event->id)}}">@lang('base.delete')</a>
                        @endif
                    @endcan
                </div>
                <div class="title">
                    <h1>{{ $event->title }}</h1>
                </div>
            </div>
            <div class="image">
                <img src="{{$event->picture_detail_path()}}"/>
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            {{--            <div class="codeweek-form-inner-two-columns">--}}

            <div class="codeweek-form-inner-container">

                <div class="codeweek-display-field">
                    <div style="text-transform: capitalize;">
                        <strong>@lang('eventdetails.from')</strong> {{Carbon\Carbon::parse($event->start_date)->isoFormat('LLLL')}}
                        <br>
                        <strong style="text-transform: capitalize">@lang('eventdetails.to')</strong> {{Carbon\Carbon::parse($event->end_date)->isoFormat('LLLL')}}
                    </div>
                </div>

                <div class="codeweek-display-field">

                    <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0" for="inline-full-name">
                        @lang('eventdetails.organised_by')
                    </label>
                    <p>

                        {{ $event->organizer }}
                        @can('approve', $event)
                            <a href="mailto:{{$event->user_email}}">{{$event->user_email}}</a>
                        @endcan
                    </p>
                </div>


                <div class="codeweek-display-field">
                    <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                           for="activity_type">@lang('event.activitytype.label')</label>
                    <p>
                        @if($event->activity_type && $event->activity_type !== 'other')
                            {{__("event.activitytype.{$event->activity_type}")}}
                        @else
                            {{__("event.organizertype.other")}}
                        @endif
                    </p>
                </div>


                @if($event->contact_person)
                    <div class="codeweek-display-field">
                        <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                               for="inline-full-name">@lang('eventdetails.contact_email')</label>
                        <p><a href="mailto:{{ $event->contact_person }}">{{ $event->contact_person }}</a></p>
                    </div>
                @endif

                @if($event->language)
                    <div class="codeweek-display-field">
                        <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                               for="inline-full-name">@lang('resources.Languages')</label>
                        <p>@lang("base.languages.{$event->language}")</p>
                    </div>
                @endif

                <div class="codeweek-display-field">
                    <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                           for="inline-full-name">@lang('eventdetails.happening_at')</label>
                    <p>{!! $event->location !!}</p>
                </div>

                <div class="codeweek-display-field">
                    <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                           for="inline-full-name">@lang('eventdetails.description')</label>
                    <p>{!!   $event->description !!}</p>
                </div>

                @if($event->event_url)
                    <div class="codeweek-display-field">
                        <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                               for="inline-full-name">@lang('eventdetails.more_info')</label>
                        <p><a href="{{ $event->event_url }}" target="_blank">{{ $event->event_url }}</a></p>
                    </div>
                @endif


                @if($event->audiences->count())
                    <div class="codeweek-display-field" style="margin-bottom: 0;">
                        <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                               for="inline-full-name">@lang('eventdetails.audience')</label>
                        <div class="itens">
                            <ul class="event-list">
                                @foreach($event->audiences as $audience)
                                    <x-pill>
                                        @lang('event.audience.'.$audience->name)
                                    </x-pill>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if($event->themes->count())
                    <div class="codeweek-display-field" style="margin-bottom: 0;">
                        <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                               for="inline-full-name">@lang('eventdetails.themes')</label>
                        <div class="itens">
                            <ul class="event-list">
                                @foreach($event->themes as $theme)
                                    <x-pill>
                                        @lang('event.theme.'.$theme->name)
                                    </x-pill>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if($event->tags->count())
                    <div class="codeweek-display-field" style="margin-bottom: 0;">
                        <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                               for="inline-full-name">@lang('eventdetails.tags')</label>
                        <div class="itens">
                            <ul class="event-list">

                                @foreach($event->tags as $tag)

                                    <x-pill-tag type="tag" slug="{{$tag->slug}}">
                                        {{$tag->name}}
                                    </x-pill-tag>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @can('edit', $event)
                    @if($event->codeweek_for_all_participation_code)
                        <div class="codeweek-display-field">
                            <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                                   for="inline-full-name">@lang('event.codeweek_for_all_participation_code.title')</label>
                            <p>{{ $event->codeweek_for_all_participation_code }}</p>
                        </div>
                    @endif

                    <div class="codeweek-display-field">
                        <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                               for="inline-full-name">@lang('event.last_update')</label>
                        <p>
                            {{Carbon\Carbon::parse($event->updated_at)->isoFormat('LLLL')}}
                        </p>
                    </div>
                @endcan


                <div class="codeweek-display-field">
                    <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0"
                           for="inline-full-name">@lang('eventdetails.share')</label>
                    <div class="share-event-wrapper">
                        <div class="fb-like"
                             data-href="{{config('codeweek.app_url')}}{{$event->path()}}" data-layout="button_count"
                             data-action="recommend"
                             data-show-faces="false" data-share="true"></div>

                        <a href="https://twitter.com/share" class="twitter-share-button"
                           data-url="{{config('codeweek.app_url')}}{{$event->path()}}"
                           data-text="Check out {{ $event->title }} at" data-via="CodeWeekEU"
                           data-hashtags="codeEU">Tweet</a>

                        <div class="g-plusone" data-size="medium" data-href="{{config('codeweek.app_url')}}"></div>
                        <a class="fa fa-envelope" title='@lang('eventdetails.email.tooltip')'
                           href="mailto:?subject=@lang('eventdetails.email.subject')&amp;body=@lang('eventdetails.email.body_1'){{ $event->title }}@lang('eventdetails.email.body_2'){{config('codeweek.app_url')}}{{$event->path()}}"></a>
                    </div>
                </div>

                {{--                </div>--}}

                {{--                <div class="codeweek-form-inner-container">--}}
                {{--                    @component('components.calendar',['event'=>$event])--}}
                {{--                    @endcomponent--}}
                {{--                </div>--}}

            </div>

            <div id="events-show-map" style="margin-bottom: 20px;"></div>

            <div class="codeweek-display-field">
                <label class="block pr-4 mb-1 font-bold text-orange-500 md:mb-0">Location Coordinates</label>
                <p>
                    Longitude: {{ $event->longitude }}<br>
                    Latitude: {{ $event->latitude }}<br>
                    Geoposition: {{ $event->geoposition }}
                </p>
            </div>

            <h2 style="margin-top: 40px; margin-bottom: 30px;">@lang('eventdetails.nearby_upcoming_events')</h2>
            <div class="codeweek-grid-layout">
                @foreach($event->getClosest() as $evt)
                    @component('event.event_tile', ['event'=>$evt])
                    @endcomponent
                @endforeach
            </div>

        </section>

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
@endpush


