<a href="{{$event->path()}}" class="thumbnail clearfix">
    <a href="{{$event->path()}}">

        {{--<img src="{{ event.picture.url }}" alt="{{ event.title }} image">--}}

        <img width="240px" src="{{$event->picture_path()}}" alt="Code Week event" class="col-md-2 first">

    </a>
    <h4>{{ $event->title }}</h4>

    <div class="caption">
        <p>{{str_limit($event->description,100)}}</p>

        <span class="countdown pull-right">
            @component('event.time_to_event', ['event'=>$event])
            @endcomponent
		</span>

    </div>
</a>