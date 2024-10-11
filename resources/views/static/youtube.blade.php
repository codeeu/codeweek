<div class="codeweek-youtube-container">
    @if(App::getLocale() == 'en')
        <iframe
        src="https://www.youtube.com/embed/{{$video_id}}" style="display:none;"></iframe>
    @else
        <iframe
        src="https://www.youtube.com/embed/{{$video_id}}?cc_load_policy=1&cc_lang_pref={{App::getLocale()}}" style="display:none;"></iframe>
    @endif

    <!-- Custom Banner to Display Over the Video -->
    <div class="background" data-nosnippet="">
        <div class="container">
            <div class="content">
                <div class="info">
                    <p>This content is hosted by a third party. By showing the external content you accept the 
                    <a href="https://www.youtube.com/t/terms" title="Terms and conditions" target="_blank">terms and conditions</a> of youtube.com.</p>
                    
                    <p class="remember">
                        <input type="checkbox" id="remember" name="rememberMe">
                        <label for="remember">Remember my choice.
                            <span>Your choice will be saved in a cookie managed by europa.eu until you've closed your browser.</span>
                        </label>
                    </p>
                    
                    <p class="button">
                        <button type="button" title="Show external content" class="show-content">
                            <svg fill="currentColor" aria-hidden="true" focusable="false" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-3 17v-10l9 5.146-9 4.854z"></path>
                            </svg>
                            <span>Show external content</span>
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Keep the same JavaScript code as provided
document.addEventListener("DOMContentLoaded", function() {
    // Check if cookies are already consented for third-party content
    if (!getCookie('third_party_content_accepted')) {
        showBanner(); // Show the banner if consent has not been given
    } else {
        showYoutubeVideos(); // Show the videos immediately if consent has been given
    }

    // Function to show the YouTube video and hide the banner
    function showYoutubeVideos() {
        var videoContainers = document.querySelectorAll('.codeweek-youtube-container');
        videoContainers.forEach(function(container) {
            container.querySelector('iframe').style.display = 'block'; // Show the iframe
            container.querySelector('.background').style.display = 'none'; // Hide the banner
        });
    }

    // Function to show the banner
    function showBanner() {
        var banners = document.querySelectorAll('.codeweek-youtube-container .background');
        banners.forEach(function(banner) {
            banner.style.display = 'flex'; // Display the banner
        });
    }

    // Event listener for the "Show external content" button
    document.querySelectorAll('.show-content').forEach(function(button) {
        button.addEventListener('click', function() {
            if (document.getElementById('remember').checked) {
                // If "Remember my choice" is checked, save in a cookie
                setCookie('third_party_content_accepted', 'true', 365);
            }
            showYoutubeVideos(); // Show video and hide banner
        });
    });

    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
});
</script>
