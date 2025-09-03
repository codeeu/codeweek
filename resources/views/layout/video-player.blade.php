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
                            // Extract video ID and convert to privacy-enhanced URL
                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $src, $matches);
                            $videoId = $matches[1] ?? '';
                            $privacyEnhancedUrl = "https://www.youtube-nocookie.com/embed/{$videoId}";
                        @endphp
                        
                        <div id="youtube-container-{{ $id }}" class="w-full h-full">
                            <!-- Placeholder until consent -->
                            <div class="flex flex-col justify-center items-center w-full h-full bg-gray-100 rounded-lg youtube-consent-placeholder">
                                <img src="/images/youtube-logo.svg" class="mb-4 w-20 h-20 opacity-50" alt="YouTube">
                                <p class="px-4 mb-4 text-center">This video is hosted on YouTube. Loading it will share data with Google.</p>
                                <button onclick="loadYouTubeVideo('{{ $id }}', '{{ $privacyEnhancedUrl }}')" 
                                        class="bg-[#f95c22] text-white px-6 py-3 rounded-lg hover:bg-[#e54c12] transition">
                                    Load Video
                                </button>
                                <p class="mt-2 text-sm text-gray-600">or <a href="#" onclick="acceptMarketingAndLoad('{{ $id }}', '{{ $privacyEnhancedUrl }}'); return false;" class="underline">accept marketing cookies</a></p>
                            </div>
                            <!-- Iframe will be inserted here after consent -->
                        </div>
                    @else
                        <video id="video" class="max-w-full max-h-full" controls src="{{ $src }}">
                            <source src="{{ $src }}" type="video/mp4">
                        </video>
                    @endif
                </div>
            </div>

            <script>
                function loadYouTubeVideo(id, url) {
                    const container = document.getElementById('youtube-container-' + id);
                    container.innerHTML = `
                        <iframe class="w-full h-full" 
                                src="${url}?rel=0&modestbranding=1" 
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                    `;
                }

                function acceptMarketingAndLoad(id, url) {
                    // Request marketing consent first
                    if (typeof CookieScript !== 'undefined') {
                        CookieScript.instance.acceptCategory('targeting');
                        loadYouTubeVideo(id, url);
                    } else {
                        loadYouTubeVideo(id, url);
                    }
                }

                // Auto-load if marketing cookies already accepted
                document.addEventListener('DOMContentLoaded', function() {
                    @if ($src && Str::contains($src, ['youtube.com', 'youtu.be']))
                        if (typeof CookieScript !== 'undefined') {
                            const state = CookieScript.instance.currentState();
                            if (state.targeting || state.marketing) {
                                loadYouTubeVideo('{{ $id }}', '{{ $privacyEnhancedUrl }}');
                            }
                        }
                    @endif
                });
            </script>
        @endpush
    @endif
</div>