<div class="partner-content-container"
    x-data="{
        gridColumns: 4,
        setGridColumns() {
            if (window.innerWidth >= 1024) {
                this.gridColumns = 4;
            } else if (window.innerWidth >= 768) {
                this.gridColumns = 4;
            } else if (window.innerWidth >= 640) {
                this.gridColumns = 2;
            } else {
                this.gridColumns = 1;
            }
            @this.set('gridColumns', this.gridColumns);
        }
    }"
    x-init="
        setGridColumns();
        window.addEventListener('resize', () => {
            setGridColumns();
        });
    "
>
    @php
        // Initially chunk based on default gridColumns
        $chunkSize = $gridColumns ?? 4;
        $chunks = $partners->chunk($chunkSize);
    @endphp

    <!-- Parent container with vertical spacing -->
    <div class="mt-5 space-y-5">
        @foreach($chunks as $chunkIndex => $chunk)
            <!-- Grid Row -->
            <div class="grid grid-cols-1 gap-5 mb-4 sm:grid-cols-2 md:grid-cols-4">
                @foreach($chunk as $partner)
                    @php
                        $isSelected = $selectedPartner && $selectedPartner->id === $partner->id;
                    @endphp

                    <div 
                        class="relative flex flex-col items-center justify-center border {{ $isSelected ? 'border-blue-500' : 'border-[#DEDEDE]' }} w-full h-[160px] rounded-[5px] cursor-pointer transition duration-300 ease-in-out transform hover:scale-105"
                        wire:click="showPartnerContent({{ $partner->id }})"
                        wire:key="partner-{{ $partner->id }}" 
                        tabindex="0"
                        role="button"
                        @keydown.enter.prevent="showPartnerContent({{ $partner->id }})"
                    >
                        <img 
                            loading="lazy" 
                            src="{{ $partner->logo_url }}" 
                            alt="{{ $partner->name }}" 
                            class="object-contain w-full max-w-[140px] h-auto" 
                        />
                        
                        <!-- Triangle/Caret (shown if this is the selected partner) -->
                        @if($isSelected)
                            <div class="absolute transform -translate-x-1/2 -bottom-6 left-1/2">
                                <div class="w-0 h-0 border-l-[20px] border-l-transparent border-r-[20px] border-r-transparent border-b-[20px] border-b-aqua mt-[13px]"></div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Check if the selected partner is in this chunk -->
            @if($selectedPartner && $chunk->contains('id', $selectedPartner->id))
                <!-- Display selected partner's content below the grid row -->
                <section class="flex flex-col">
                    <article class="relative flex flex-col w-full p-10 mb-4 bg-aqua max-md:px-5 max-md:max-w-full">
                        <h3 class="text-2xl font-bold leading-none text-primary">{{ $selectedPartner->name }}</h3>
                        <div class="flex flex-col w-full pt-5 mt-1 text-base text-black">
                            <p class="leading-6">
                                {!! $selectedPartner->description !!}
                            </p>
                            <a href="{{ $selectedPartner->link_url }}" class="mt-5 underline text-secondary hover:text-primary">Visit Partner</a>
                        </div>
                    </article>
                </section>
            @endif
        @endforeach
    </div>

    <!-- Pagination Links -->
    <div class="mt-5">
        {{ $partners->links('vendor.livewire.pagination') }}
    </div>
</div>
