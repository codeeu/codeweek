<div class="codeweek-card">
    <img src="{{$event->picture_path()}}" class="card-image">
    <div class="card-content">
        <div class="card-title">{{ $event->title }}</div>
        <div class="card-subtitle">{{ $event->start_date }}
            @if($event->language)
                -
                <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium leading-5 bg-purple-100 text-purple-800">
  {{__("base.languages.{$event->language}")}}
</span>
            @endif
        </div>


        <div class="card-description">{{ str_limit($event->description,400) }}</div>

    </div>
    <div class="card-actions">
        <a class="codeweek-action-link-button"
           href="{{$event->path()}}">{{ __('myevents.view') }}</a>
    </div>
</div>







