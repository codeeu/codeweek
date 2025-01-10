<div>
    <nav class="flex flex-wrap gap-2.5 justify-center items-start px-2.5 py-2  text-base text-black rounded-[32px] max-md:max-w-full">
        @foreach($filters as $filter)
            <a href="#" wire:click.prevent="selectFilter('{{ $filter }}')" class="gap-2.5 self-stretch text-[16px] hover:bg-secondary hover:text-white px-6 py-3 {{ $selectedFilter === $filter ? 'bg-secondary text-white' : 'bg-[#DBECF0]  text-black' }} rounded-3xl max-md:px-5">
                {{ $filter }}
            </a>
        @endforeach
    </nav>
</div>
