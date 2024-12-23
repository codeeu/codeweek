<div class="w-full">
    @if(count($results) > 0)
    <p class="font-bold p-0 mb-5">{{ count($results) }} Results</p>
    <div class="grid grid-cols-1 gap-5">
        @foreach($results as $result)
        <div class="border border-[#F2F2F2] rounded p-4 md:p-10 flex flex-col md:flex-row gap-10 items-start">
            <a href="{{ $result['path'] }}" target="_blank" class="relative flex-shrink-0 w-full md:max-w-60">
                <img src="{{ $result['thumbnail'] }}" alt="{{ $result['name'] }}" class="w-full h-auto" />
                @if(isset($result['date']))
                <div class="absolute bottom-0 left-0 right-0 p-3 bg-black bg-opacity-50 text-white text-xs">
                    {{ $result['date'] }}
                </div>
                @endif
              </a>
            <div class="flex-grow">
                <p class="font-bold uppercase p-0 mb-3">{{ $result['category'] }}</p>
                <a href="{{ $result['path'] }}" target="_blank" class="mb-3 inline-block text-[#F95C22] hover:underline">
                    <h3 class="text-2xl font-bold m-0">{{ $result['name'] }}</h3>
                </a>
                <p class="p-0 leading-6">{{ $result['description'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mb-5">
        {{-- {{ $results->links('vendor.livewire.pagination') }} --}}
    </div>

    @else
    <p>No results found.</p>
    @endif
</div>
