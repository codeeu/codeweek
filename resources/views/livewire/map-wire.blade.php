<div>
    @push('scripts')
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
        <script type="text/javascript" src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


        <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet"/>
        <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet"/>

        <script src="{{asset('js/leaflet.markercluster.js')}}" type="text/javascript"/>


    @endpush

    <x-map></x-map>

{{--        <div class="my-6 py-2 px-4 bg-blue-200 h-auto">--}}
Total: {{$events->total()}}


        <x-search.fields :years="$years"></x-search.fields>


{{--        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="$dispatch('testEvent')">--}}
{{--            Zoom--}}
{{--        </button>--}}


    <div>

        <div class="my-4 grid grid-cols-3 gap-6">

        @foreach($events as $event)


            @include('online-calendar._oc-event-simple')



        @endforeach
        </div>

    </div>

    <div class="codeweek-pagination">
        {{$events->links()}}
    </div>

</div>

