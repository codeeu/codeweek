<div id="x-review-navigation">
    Pending events: <a href="{{route('review')}}">{{$pendingEventsCount}}</a> -
    @if($nextPendingEvent)
    Next Activity : <a href="{{$nextPendingEvent->path()}}">Next: {{$nextPendingEvent->id}} - {{$nextPendingEvent->title}}</a>
        @endif
</div>