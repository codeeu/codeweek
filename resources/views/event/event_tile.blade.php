<div class="col-md-4">
    <div class="thumbnail">
        <div class="title"><a href="{{$event->path()}}">{{$event->title}}</a> (@lang('myevents.status.'. $event->status))</div>
        <div class="img-link">
            <a href="">

                {{--<img src="{{ event.picture.url }}" alt="{{ event.title }} image">--}}

                <img src="{{$event->picture_path()}}" alt="Code Week event">

            </a>
        </div>

        <div class="caption">
            <p>{{str_limit($event->description,100)}}</p>


            <a href="{{$event->path()}}"
               class="btn btn-primary btn-directional fa-arrow-right btn-sm"
               role="button">@lang('myevents.view')</a>

            <span class="countdown pull-right">

                @component('event.time_to_event', ['event'=>$event])
                @endcomponent

			</span>

        </div>
    </div>
</div>