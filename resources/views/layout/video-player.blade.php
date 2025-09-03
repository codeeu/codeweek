<div>
    <button id="video-modal-trigger-show" data-targetId="video-modal-{{ $id }}"
        class="flex justify-center items-center w-20 h-20 rounded-full duration-300 bg-yellow hover:bg-primary">
        <img class="ml-2 duration-300" src="/images/fi_play.svg" />
    </button>

    @if ($src)
        @push('video-layer-stack')
            <div id="video-modal-{{ $id }}"
                class="fixed left-0 top-[139px] md:top-[123px] z-[110] flex flex-col gap-6 items-center justify-center w-full p-6 h-[calc(100dvh-139px)] md:h-[calc(100dvh-123px)] bg-white duration-300 overflow-hidden"
                style="display: none;">
                <div class="flex flex-shrink-0 justify-end w-full">
                    <button id="video-modal-trigger-hide" data-targetId="video-modal-{{ $id }}"
                        class="block bg-[#FFD700] hover:bg-[#F95C22] rounded-full p-4 duration-300">
                        <img class="w-6 h-6" src="/images/close_menu_icon.svg">
                    </button>
                </div>
                <div class="flex overflow-hidden flex-col flex-grow flex-shrink justify-center w-full max-h-full">
                    @if ($src && Str::contains($src, ['youtube.com', 'youtu.be']))
                        @php
                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $src, $matches);
                            $videoId = $matches[1] ?? '';
                            $privacyEnhancedUrl = "https://www.youtube-nocookie.com/embed/{$videoId}?rel=0&modestbranding=1";
                        @endphp
                        
                        <!-- Always load the iframe directly for simplicity -->
                        <iframe class="w-full h-full" 
                                src="{{ $privacyEnhancedUrl }}" 
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                    @else
                        <video id="video" class="max-w-full max-h-full" controls src="{{ $src }}">
                            <source src="{{ $src }}" type="video/mp4">
                        </video>
                    @endif
                </div>
            </div>
        @endpush
    @endif
</div>