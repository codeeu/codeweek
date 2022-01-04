@php
    //$author = $author ?? __('challenges-content.'.$slug.'.author')
@endphp
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
            @if($podcast->transcript)
                <div class="self-end">
                    <a href="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/transcripts/{{$podcast->transcript}}">
                        <button class="background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button">
                            Download Transcript</button>
                    </a>
                </div>
            @endif
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


        </div>


    </div>
</div>



