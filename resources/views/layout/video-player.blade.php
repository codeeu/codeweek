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
                            // Use privacy-enhanced YouTube URL
                            $privacyEnhancedUrl = "https://www.youtube-nocookie.com/embed/{$videoId}?rel=0&modestbranding=1";
                        @endphp
                        
                        <div id="youtube-container-{{ $id }}" class="w-full h-full">
                            <!-- This will be replaced when video loads -->
                        </div>

                        <script>
                            (function() {
                                let videoLoaded{{ str_replace('-', '_', $id) }} = false;
                                
                                function checkConsent{{ str_replace('-', '_', $id) }}() {
                                    if (typeof CookieScript !== 'undefined' && CookieScript.instance) {
                                        try {
                                            const state = CookieScript.instance.currentState();
                                            return state && (state.targeting === true || state.marketing === true);
                                        } catch (e) {
                                            return false;
                                        }
                                    }
                                    return false;
                                }
                                
                                function loadVideo{{ str_replace('-', '_', $id) }}() {
                                    if (videoLoaded{{ str_replace('-', '_', $id) }}) return;
                                    
                                    const container = document.getElementById('youtube-container-{{ $id }}');
                                    if (container) {
                                        container.innerHTML = `
                                            <iframe class="w-full h-full" 
                                                    src="{{ $privacyEnhancedUrl }}" 
                                                    frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen></iframe>
                                        `;
                                        videoLoaded{{ str_replace('-', '_', $id) }} = true;
                                    }
                                }
                                
                                function showPlaceholder{{ str_replace('-', '_', $id) }}() {
                                    const container = document.getElementById('youtube-container-{{ $id }}');
                                    if (container && !videoLoaded{{ str_replace('-', '_', $id) }}) {
                                        container.innerHTML = `
                                            <div class="flex flex-col justify-center items-center p-6 w-full h-full bg-gray-100 rounded-lg">
                                                <svg class="mb-4 w-20 h-20" viewBox="0 0 68 48" fill="#FF0000">
                                                    <path d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"/>
                                                    <path fill="#FFFFFF" d="M45,24L27,14v20L45,24z"/>
                                                </svg>
                                                <p class="mb-4 text-center text-gray-700">This video requires consent to load as it will share data with YouTube/Google.</p>
                                                <button onclick="loadVideo{{ str_replace('-', '_', $id) }}()" 
                                                        class="bg-[#f95c22] text-white px-6 py-3 rounded-lg hover:bg-[#e54c12] transition font-semibold">
                                                    Load Video Anyway
                                                </button>
                                            </div>
                                        `;
                                    }
                                }
                                
                                // Check when modal opens
                                const showButton = document.querySelector('[data-targetId="video-modal-{{ $id }}"]');
                                if (showButton) {
                                    showButton.addEventListener('click', function() {
                                        setTimeout(function() {
                                            if (checkConsent{{ str_replace('-', '_', $id) }}()) {
                                                loadVideo{{ str_replace('-', '_', $id) }}();
                                            } else {
                                                showPlaceholder{{ str_replace('-', '_', $id) }}();
                                            }
                                        }, 100);
                                    });
                                }
                                
                                // Make functions globally available
                                window.loadVideo{{ str_replace('-', '_', $id) }} = loadVideo{{ str_replace('-', '_', $id) }};
                            })();
                        </script>
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