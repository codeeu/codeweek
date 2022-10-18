<div class="codeweek-card">
    <img src="{{$event->picture_path()}}" class="card-image">
    <div class="card-content">
        <div style="font-size: 11px; margin-bottom: 5px; ">Organizer: <span style="background-color: #fe85351a; padding: 4px">{{$event->owner->email}}</span></div>
        <h5 class="card-title">{{ $event->title }}</h5>
        <div class="card-subtitle" style="text-transform: capitalize;">{{Carbon\Carbon::parse($event->start_date)->isoFormat('llll')}}</div>
        <div class="card-description">{!!   $event->description !!}</div>

    </div>
    @can('approve', $event)
        @isset($moderation)
            <moderate-event :event="{{$event}}" :refresh="true"></moderate-event>
        @endisset
    @endcan
    <div class="card-actions">
        <a class="codeweek-action-link-button"
           href="{{$event->path()}}" >@lang('myevents.view')</a>
    </div>
</div>
