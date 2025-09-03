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
                            <!-- Placeholder until consent - will be replaced if cookies accepted -->
                            <div id="youtube-placeholder-{{ $id }}" class="flex flex-col justify-center items-center w-full h-full bg-gray-100 rounded-lg youtube-consent-placeholder">
                                <!-- YouTube Play Button SVG -->
                                <svg class="mb-4 w-20 h-20 opacity-50" viewBox="0 0 68 48" fill="#FF0000">
                                    <path d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"/>
                                    <path fill="#FFFFFF" d="M45,24L27,14v20L45,24z"/>
                                </svg>
                                <p class="px-4 mb-4 text-center">This video is hosted on YouTube. Loading it will share data with Google.</p>
                                <button onclick="loadYouTubeVideo_{{ $id }}()" 
                                        class="bg-[#f95c22] text-white px-6 py-3 rounded-lg hover:bg-[#e54c12] transition">
                                    Load Video
                                </button>
                                <p class="mt-2 text-sm text-gray-600">or <a href="#" onclick="acceptMarketingAndLoad_{{ $id }}(); return false;" class="underline">accept marketing cookies</a></p>
                            </div>
                        </div>
                    @else
                        <video id="video" class="max-w-full max-h-full" controls src="{{ $src }}">
                            <source src="{{ $src }}" type="video/mp4">
                        </video>
                    @endif
                </div>
            </div>

            <script>
                // Check on modal open if cookies are already accepted
                document.getElementById('video-modal-trigger-show').addEventListener('click', function() {
                    setTimeout(function() {
                        checkAndLoadYouTube_{{ $id }}();
                    }, 100);
                });

                function checkAndLoadYouTube_{{ $id }}() {
                    if (typeof CookieScript !== 'undefined' && CookieScript.instance) {
                        try {
                            const state = CookieScript.instance.currentState();
                            // Check if marketing/targeting cookies are accepted
                            if (state && (state.targeting === true || state.marketing === true)) {
                                loadYouTubeVideo_{{ $id }}();
                            }
                        } catch (e) {
                            console.log('Could not check cookie state:', e);
                        }
                    }
                }

                function loadYouTubeVideo_{{ $id }}() {
                    const container = document.getElementById('youtube-container-{{ $id }}');
                    if (container) {
                        container.innerHTML = `
                            <iframe class="w-full h-full" 
                                    src="{{ $privacyEnhancedUrl }}?rel=0&modestbranding=1" 
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                        `;
                    }
                }

                function acceptMarketingAndLoad_{{ $id }}() {
                    if (typeof CookieScript !== 'undefined' && CookieScript.instance) {
                        // Show the cookie banner for the user to accept marketing
                        CookieScript.instance.show();
                        
                        // Listen for changes in consent
                        let checkInterval = setInterval(function() {
                            const state = CookieScript.instance.currentState();
                            if (state && (state.targeting === true || state.marketing === true)) {
                                clearInterval(checkInterval);
                                loadYouTubeVideo_{{ $id }}();
                            }
                        }, 500);
                        
                        // Stop checking after 30 seconds
                        setTimeout(function() {
                            clearInterval(checkInterval);
                        }, 30000);
                    } else {
                        // Fallback: just load the video if CookieScript isn't available
                        loadYouTubeVideo_{{ $id }}();
                    }
                }
            </script>
        @endpush
    @endif
</div>