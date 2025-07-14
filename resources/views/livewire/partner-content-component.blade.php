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
                        class="relative flex flex-col items-center bg-white justify-center border-2 {{ $isSelected ? 'border-[#F95C22]' : 'border-[#A4B8D9]' }} w-full h-[160px] rounded-[16px] cursor-pointer transition duration-300 ease-in-out transform hover:scale-105"
                        @if($filter === 'Partners')
                            wire:click="showPartnerContent({{ $partner->id }})"
                            tabindex="0"
                            role="button"
                            @keydown.enter.prevent="showPartnerContent({{ $partner->id }})"
                        @endif
                        wire:key="partner-{{ $partner->id }}" 
                    >
                        <img 
                            loading="lazy" 
                            src="{{ $partner->logo_url }}" 
                            alt="{{ $partner->name ?? 'Sponsor Logo' }}" 
                            class="object-contain w-full h-auto max-w-[140px]" 
                        />
                        
                        @if($isSelected && $filter === 'Partners')
                            <!-- Triangle/Caret (shown if this is the selected partner) -->
                            <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2">
                                <div class="w-0 h-0 border-l-[20px] border-l-transparent border-r-[20px] border-r-transparent border-b-[20px] border-b-[#ffffff] mt-[13px]"></div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            @if($selectedPartner && $chunk->contains('id', $selectedPartner->id) && $filter === 'Partners')
                <!-- Display selected partner's content below the grid row -->
                <section class="flex flex-col">
                    <article class="flex relative flex-col p-10 mb-4 w-full bg-[#ffffff] max-md:px-5 max-md:max-w-full">
                        <h3 class="text-[#1C4DA1] text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat']">{{ $selectedPartner->name }}</h3>
                        <div class="flex flex-col pt-5 mt-1 w-full text-base text-black">
                            <p class="leading-6">
                                {!! $selectedPartner->description !!}
                            </p>
                            <a target="_blank" href="{{ $selectedPartner->link_url }}" class="mt-5 cookweek-link hover-underline !text-[#1C4DA1] !text-[16px] max-w-fit">Visit Partner</a>
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
