@foreach($closeEvents as $closeEvent)


    <div class="sm:w-full md:w-1/4 m-6 text-center shadow border border-grey-lighter p-4 bg-grey-lightest flex-row justify-between">
        <div style="height:150px">

            @if($closeEvent->picture)
                <img src="{{$closeEvent->picture_path()}}" style="height: 150px">
            @else
                <img style="height: 150px"
                     src="https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/event_default_picture.png">
            @endif
        </div>
        <div class="flex flex-col justify-between">

            <div class="flex flex-col flex-auto">
                <div>
                    <a href="/view/{{$closeEvent->id}}/{{$closeEvent->slug}}">{{$closeEvent->title}}</a>
                </div>
                <div>
                    {{$closeEvent->description}}</div>

            </div>


            <div class="mt-6 text-grey-dark">
                Start: {{Carbon\Carbon::parse($closeEvent->start_date)->toFormattedDateString()}}

            </div>

        </div>
    </div>
@endforeach