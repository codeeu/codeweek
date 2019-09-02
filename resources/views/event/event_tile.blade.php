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
