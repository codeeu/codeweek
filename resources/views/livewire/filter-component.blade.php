<div>
    <nav class="flex flex-wrap gap-2.5 justify-center items-start text-base text-black rounded-[32px] max-md:max-w-full">
        @foreach($filters as $filter)
            <a href="#" wire:click.prevent="selectFilter('{{ $filter }}')" class="gap-2.5 self-stretch text-[16px] leading-5 hover:bg-secondary hover:text-white px-6 py-2.5 {{ $selectedFilter === $filter ? 'bg-[#1C4DA1] text-white' : 'bg-[#CCF0F9]  text-black' }} rounded-3xl max-md:px-5">
                {{ $filter }}
            </a>
        @endforeach
    </nav>
</div>
