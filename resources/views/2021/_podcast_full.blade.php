@section('title', $podcast->title)
@section('description', $podcast->description)

<div class="flex justify-between -mb-4">
    <h1 class="subtitle">EU Code Week Podcast: {{$podcast->title}}</h1>
    @if($podcast->transcript)

        <div class="self-end align-bottom">
            <a href="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/transcripts/{{$podcast->transcript}}">
                <button class="background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button">
                    Download Transcript
                </button>
            </a>
        </div>

    @endif
</div>

<div class="shadow-xl flex flex-col ">
    <div class="flex md:flex-row flex-col">
        <div class="flex-none max-w-fit float-left w-auto max-w-xs">

            <a href="{{$podcast->filename}}">
                <img
                        src="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/art/{{$podcast->image}}">

            </a>
        </div>

        <div class="flex flex-col h-full bg-gray-300 justify-between pl-4">

            {{--                <div><h2 class="subtitle">{{$podcast->title}}</h2></div>--}}
            <div class="text-black pb-2 pr-4 pt-2 text-base leading-5">{{$podcast->description}}</div>


            {{--            <div class="text-black pb-2 pr-4 text-base leading-5">{{$podcast->description}}</div>--}}

            <div class="m-2 mb-4">
                <audio controls="controls" id="podcast">
                    <source src="{{$podcast->filename}}"
                            type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>


        </div>
    </div>
    <div class="pl-4" style="background-color: #e5f1f6">
        @if($podcast->guests->count() == 1)
            <h2 class="subtitle">About our guest</h2>
        @else
            <h2 class="subtitle">About our guests</h2>
        @endif
        @foreach($podcast->guests as $guest)
            <div class="leading-normal">
                <ul class="m-0">
                    <li>
                        <div class="-mb-4 font-bold text-xl">{{$guest->name}}</div>
                        <div class="flex items-center space-x-4 lg:space-x-6">
                            @if($guest->image_path)
                                <img class="w-16 h-16 rounded-full lg:w-20 lg:h-20" src="{{$guest->image_path}}" alt="">
                            @endif
                            <div class="font-medium text-l leading-6 space-y-1">
                                <p class="text-indigo-600">
                                    <x-markdown>{{$guest->description}}</x-markdown>
                                </p>
                            </div>
                        </div>
                    </li>

                    <!-- More people... -->
                </ul>
            </div>
        @endforeach
        <h2 class="subtitle">Useful Resources</h2>
        <div class="leading-normal">
            <strong>Do you want to explore more about the topic? Check out these links:</strong>
            <ul class="checklist mt-1">
                @foreach($podcast->resources as $resource)
                    <li class="text-black pb-2 pr-4 text-base leading-5">
                        <a class="font-bold" href="{{$resource->url}}">{{$resource->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex justify-end p-2 text-xs">This podcast has been released
            on {{$podcast->release_date->format('jS \o\f F Y')}}</div>
    </div>

</div>

@section('extra-css')
    <style>
        audio {
            width: 400px;
            box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.4);
            border-radius: 90px;
            transform: scale(1.05);
        }


        ul.checklist li:before {
            content: '• ';
            color: #ee6a2c;
            font-weight: bold;
        }


    </style>
@endsection

@section('extra-js')

    <script>
        let podcast = document.getElementById("podcast");
        podcast.volume = 0.5;
    </script>

@endsection



