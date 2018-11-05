@extends('layout.base')

@section('content')
    <section>

        <div class="container">
            <h1 style="display: inline-block;">Reportable events for {{ Auth::user()->fullName }}</h1>
            <hr>

            @if(!$events || (count($events) == 0))
                <div class="row">
                    <p>@lang('myevents.no_events.first_call_to_action') <a
                                href="{{route('create_event')}}">@lang('myevents.no_events.first_link')</a> @lang('myevents.no_events.second_call_to_action')
                        <a href="{{route('guide')}}">@lang('myevents.no_events.second_link')</a>?</p>
                </div>
            @else


                <div class="row">
                    @foreach($events as $event)


                        <div class="col-md-4">
                            <div class="thumbnail">
                                <div class="title"><a href="{{$event->path()}}">{{$event->title}}</a>
                                    (@lang('myevents.status.'. $event->status))
                                </div>
                                <div class="img-link">
                                    <a href="">

                                        {{--<img src="{{ event.picture.url }}" alt="{{ event.title }} image">--}}

                                        <img src="{{$event->picture_path()}}" alt="Code Week event">

                                    </a>
                                </div>

                                <div class="caption">
                                    <p>{{str_limit($event->description,100)}}</p>


                                    <a href="{{route('report_event',['event'=>$event])}}"
                                       class="btn btn-primary btn-directional fa-arrow-right btn-sm"
                                       role="button">Report</a>

                                    <span class="countdown pull-right">

                @component('event.time_to_event', ['event'=>$event])
                                        @endcomponent

			</span>

                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
                {{ $events->links() }}
            @endif

        </div>

    </section>


@endsection



