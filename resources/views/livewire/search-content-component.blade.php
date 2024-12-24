<div class="w-full">
    @if(count($results) > 0)
    <p class="font-bold p-0">{{ count($results) }} @lang('search.results')</p>

    @foreach($results as $result)
    <div class="border-b border-[#D6D8DA] py-6 md:py-10 flex flex-col md:flex-row items-start gap-6 md:gap-16">
        <a href="{{ $result['path'] }}" target="_blank" class="relative flex-shrink-0 w-full md:max-w-60">
            <img src="{{ $result['thumbnail'] }}" alt="{{ $result['name'] }}" class="w-full h-auto rounded-md" />
        </a>
        <div class="flex-grow">
            <p class="font-bold uppercase p-0 mb-3">
              <span>{{ $result['category'] }}</span>
              @if(isset($result['date']))
                <span class="ml-1.5">|</span>
                <span class="ml-1.5">{{ $result['date'] }}</span>
              @endif
            </p>
            <a href="{{ $result['path'] }}" target="_blank" class="mb-3 inline-block text-[#1C4DA1] hover:underline">
                <h3 class="text-[22px] md:text-[30px] leading-7 md:leading-9 font-medium m-0 font-['Montserrat']">
                    {{ $result['name'] }}
                </h3>
            </a>
            <p class="p-0 text-lg md:text-xl leading-7 text-[#333E48]">{{ $result['description'] }}</p>
        </div>
    </div>
    @endforeach

    <!-- Pagination Links -->
    <div class="py-12">
        {{ $results->links('vendor.livewire.pagination') }}
    </div>
    @else
    <p>@lang('search.no_results')</p>
    @endif
</div>
