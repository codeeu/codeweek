@push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
@endpush
<div>
    <x-map></x-map>

{{--        <div class="my-6 py-2 px-4 bg-blue-200 h-auto">--}}

        <x-search.fields></x-search.fields>


{{--        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:click="$emit('testEvent')">--}}
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

