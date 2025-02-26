<div>
    <button id="video-modal-trigger-show" data-targetId="video-modal-{{ $id }}"
        class="bg-yellow hover:bg-primary rounded-full w-20 h-20 duration-300 flex justify-center items-center">
        <img class="duration-300 ml-2" src="/images/fi_play.svg" />
    </button>

    @if ($src)
        @push('video-layer-stack')
            <div id="video-modal-{{ $id }}"
                class="fixed left-0 top-[139px] md:top-[123px] z-[110] flex flex-col gap-6 items-center justify-center w-full p-6 h-[calc(100dvh-139px)] md:h-[calc(100dvh-123px)] bg-white duration-300 overflow-hidden"
                style="display: none;">
                <div class="flex-shrink-0 flex justify-end w-full">
                    <button id="video-modal-trigger-hide" data-targetId="video-modal-{{ $id }}"
                        class="block bg-[#FFD700] hover:bg-[#F95C22] rounded-full p-4 duration-300">
                        <img class="w-6 h-6" src="/images/close_menu_icon.svg">
                    </button>
                </div>
                <div class="flex-grow flex-shrink flex flex-col justify-center max-h-full w-full overflow-hidden">
                    @if ($src && Str::contains($src, ['youtube.com', 'youtu.be']))
                        <iframe id="youtube-video" class="w-full h-full" src="" data-src="{{ $src }}"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    @else
                        <video id="video" class="max-h-full max-w-full" controls src="{{ $src }}">
                            <source src="{{ $src }}" type="video/mp4">
                        </video>
                    @endif
                </div>
            </div>
        @endpush
    @endif
</div>
