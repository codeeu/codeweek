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
        <h2 class="subtitle">{{$podcast->title}}</h2>
        <div class="text-black pb-2 pr-4 text-base leading-5">{{$podcast->description}}</div>
        <audio controls>
            <source src="{{$podcast->filename}}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    </div>


</div>



