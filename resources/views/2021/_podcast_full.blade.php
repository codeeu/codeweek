<div class="shadow-xl flex flex-col">
    <div>
        <div class="flex-none max-h-fit float-left w-auto max-w-xs pr-4">

            <a href="{{$podcast->filename}}">
                <img
                        src="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/art/{{$podcast->image}}">

            </a>
        </div>

        <div class="flex-1 align-items-stretch h-full align-content-stretch bg-gray-300">
            <div class="flex justify-between">
                <div><h2 class="subtitle">{{$podcast->title}}</h2></div>
                @if($podcast->transcript)
                    <div class="self-end">
                        <a href="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/transcripts/{{$podcast->transcript}}">
                            <button class="background-transparent font-bold uppercase px-3 py-1 text-xs outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                    type="button">
                                Download Transcript
                            </button>
                        </a>
                    </div>
                @endif
            </div>


            <div class="text-black pb-2 pr-4 text-base leading-5">{{$podcast->description}}</div>
            <div class="flex flex-row">
                <div class="m-2 mb-4">
                    <audio controls="controls" autoplay=true muted>
                        <source src="{{$podcast->filename}}"
                                type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>


            </div>


        </div>
    </div>
    <div class="bg-gray-200 pl-4">
        <h2>About the guest</h2>
        @foreach($podcast->guests as $guest)
            <div class="leading-normal">
                <ul class="m-0">
                    <li>
                        <div class="-mb-8 font-bold text-xl">{{$guest->name}}</div>
                        <div class="flex items-center space-x-4 lg:space-x-6">
                            <img class="w-16 h-16 rounded-full lg:w-20 lg:h-20" src="{{$guest->image_path}}" alt="">
                            <div class="font-medium text-l leading-6 space-y-1">
                                <p class="text-indigo-600"><x-markdown>{{$guest->description}}</x-markdown></p>
                            </div>
                        </div>
                    </li>

                    <!-- More people... -->
                </ul>
            </div>
        @endforeach
        <h2>Useful Resources</h2>
        <div class="leading-normal">
            <strong>Do you want to explore more about the topic?</strong>
            <div class="text-primary">Check out these links:</div>
            <ul class="checklist mt-1">
                @foreach($podcast->resources as $resource)
                    <li class="text-black pb-2 pr-4 text-base leading-5">
                        <a class="font-bold" href="{{$resource->url}}">{{$resource->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>





    </div>

</div>

@section('extra-css')
    <style>
        audio {
            width: 600px;
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



