<div class="shadow-xl flex">
    <div class="flex-none">

        <a href="{{$podcast->filename}}">
            <img style="width: 300px; max-height: auto; float: left;"
                 src="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/art/{{$podcast->image}}">

        </a>
    </div>

    <div class="flex-1 align-items-stretch h-full align-content-stretch {{$bg}} pl-4">

        <div class="flex justify-between">
            <div><h2 class="subtitle">{{$podcast->title}}</h2></div>
            <div class="self-center mr-4 mt-4 italic">

                {{Carbon\Carbon::parse($podcast->release_date)->format('d-m-Y')}}
            </div>
        </div>

        <div class="text-black pb-2 pr-4 text-base leading-5">{{$podcast->description}}</div>
        <div class="flex flex-row">
            <div>
                <audio controls>
                    <source src="{{$podcast->filename}}"
                            type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>

            @if($podcast->transcript)
                <div class="self-center text-sm ml-4"><a href="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/transcript/{{$podcast->transcript}}">Download Transcript</a></div>
            @endif
        </div>
    </div>


</div>



