<div>
    <nav class="flex flex-wrap gap-2.5 justify-center items-start px-2.5 py-2 mt-5 text-base text-black rounded-[32px] max-md:max-w-full">
        @foreach($filters as $filter)
            <a href="#" wire:click.prevent="selectFilter('{{ $filter }}')" class="gap-2.5 self-stretch px-6 py-3 {{ $selectedFilter === $filter ? 'bg-blue-900 text-white' : 'bg-slate-200' }} rounded-3xl max-md:px-5">
                {{ $filter }}
            </a>
        @endforeach
    </nav>
</div>
