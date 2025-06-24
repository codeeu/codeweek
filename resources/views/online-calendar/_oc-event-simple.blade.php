<div class="codeweek-card">
    <img src="{{$event->picture_path()}}" class="card-image">
    <div>
        <div class="bg-indigo-800 text-white text-lg text-center font-bold py-4 px-4 rounded-full mt-4 ml-2 mr-2">
            {{$event->get_start_date_simple()}}
        </div>
    </div>
    <div class="card-content">
        <div class="card-title">{{ $event->title }}</div>
        <div class="card-subtitle">
            @if($event->language)
                @foreach($event->languages as $language)
                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium leading-5 bg-purple-100 text-purple-800">
                        {{__("base.languages.{$language}")}}
                    </span>
                @endforeach
            @endif
        </div>


        <div class="card-description">{!! $event->description !!}</div>

    </div>
    <div class="card-actions">
        <a class="codeweek-action-link-button"
           href="{{$event->path()}}">{{ __('myevents.view') }}</a>
    </div>
</div>







