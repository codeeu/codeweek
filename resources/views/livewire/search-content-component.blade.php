<div class="w-full">
    <!-- Loading Indicator -->
    <div wire:loading.block wire:loading.delay.longest class="py-6 w-full text-center" style="display:none;">
        <svg class="mx-auto w-8 h-8 text-gray-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
        </svg>
    </div>

    <div wire:loading.remove>
        @if(count($results) > 0)
        <p class="p-0 font-bold">{{ $results->total() }} @lang('search.results')</p>

        @foreach($results as $result)
            <div wire:key="result-{{ $loop->index }}" class="border-b border-[#D6D8DA] py-6 md:py-10 flex flex-col md:flex-row items-start gap-6 md:gap-16">
                <a href="{{ $result->path }}" target="_blank" class="relative flex-shrink-0 w-full md:max-w-60">
                    <img src="{{ $result->thumbnail }}" alt="{{ $result->name }}" class="w-full h-auto rounded-md" />
                </a>
                <div class="flex-grow">
                    <p class="p-0 mb-3 font-bold uppercase">
                        <span>{{ $result->category }}</span>
                        @if(isset($result->created_at))
                            <span class="ml-1.5">|</span>
                            <span class="ml-1.5">{{ $result->created_at }}</span>
                        @endif
                    </p>
                    <a href="{{ $result->path }}" target="_blank" class="mb-3 inline-block text-[#1C4DA1] hover:underline">
                        <h3 class="text-[22px] md:text-[30px] leading-7 md:leading-9 font-medium m-0 font-['Montserrat']">
                            {{ $result->name }}
                        </h3>
                    </a>
                    <p class="p-0 text-lg md:text-xl leading-7 text-[#333E48]">{!! $result->description !!}</p>
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
</div>
