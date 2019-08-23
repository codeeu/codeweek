<div class="codeweek-card">
    <img src="{{$event->picture_path()}}" class="card-image">
    <div class="card-content">
        <h5 class="card-title">{{ $event->title }}</h5>
        <p class="card-subtitle">{{ $event->get_start_date() }}</p>
        <p class="card-description">{{ $event->description }}</p>
    </div>
    <div class="card-actions">
        <a class="codeweek-action-link-button"
           href="{{$event->path()}}" >@lang('myevents.view')</a>
    </div>
</div>

{{--
<div class="col-md-4">
    <div class="thumbnail">
        <div class="title"><a href="{{$event->path()}}">{{$event->title}}</a> (@lang('myevents.status.'. $event->status))</div>
        <div class="img-link">
            <a href="">

                --}}
{{--<img src="{{ event.picture.url }}" alt="{{ event.title }} image">--}}{{--


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
</div>--}}
