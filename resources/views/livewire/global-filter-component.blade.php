<div class="codeweek-container-lg mx-auto">
    <h2 class="pb-6 md:pb-8 text-2xl md:text-4xl text-[#1C4DA1] font-normal font-['Montserrat']">
        @lang('search.search_results_title')
    </h2>

    <div class="mb-6 md:mb-10">
        <p class="p-0 mb-3 font-bold text-lg md:text-xl text-[#333E48]">
            @lang('search.search_input_label')
        </p>

        <div class="flex">
            <div class="relative w-full max-w-lg">
                <input 
                    wire:model.defer="searchQuery"
                    wire:keydown.enter="search"
                    class="pl-6 pr-14 py-3 w-full rounded-full border-solid border-2 border-[#A4B8D9] text-[#333E48]" 
                    placeholder="@lang('search.search_input_placeholder')" 
                />
                <button
                    class="absolute right-3 top-1/2 -translate-y-1/2 p-2 duration-300 hover:bg-[#E8EDF6] rounded-full"
                     wire:click="search"
                >
                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.717 15.46L21 19.742L19.585 21.157L15.303 16.874C13.7098 18.1512 11.728 18.8459 9.68604 18.843C4.71804 18.843 0.686035 14.811 0.686035 9.84302C0.686035 4.87502 4.71804 0.843018 9.68604 0.843018C14.654 0.843018 18.686 4.87502 18.686 9.84302C18.6889 11.885 17.9943 13.8668 16.717 15.46ZM14.711 14.718C15.9801 13.4129 16.6889 11.6634 16.686 9.84302C16.686 5.97502 13.553 2.84302 9.68604 2.84302C5.81804 2.84302 2.68604 5.97502 2.68604 9.84302C2.68604 13.71 5.81804 16.843 9.68604 16.843C11.5065 16.8459 13.2559 16.1371 14.561 14.868L14.711 14.718Z" fill="#1C4DA1" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div>
        <nav class="flex flex-wrap gap-2.5 justify-start items-start text-base text-black rounded-[32px] max-md:max-w-full">
            @foreach($filters as $filter)
            <a href="#" wire:click.prevent="selectFilter('{{ $filter['key'] }}')" class="gap-2.5 self-stretch text-[16px] leading-5 px-6 py-2.5 {{ $selectedFilter === $filter['label'] ? 'bg-[#1C4DA1] text-white' : 'bg-[#CCF0F9] hover:bg-[#98E1F5] text-black' }} duration-300 rounded-3xl max-md:px-5">
                {{ $filter['label'] }}
            </a>
            @endforeach
        </nav>
    </div>
</div>
