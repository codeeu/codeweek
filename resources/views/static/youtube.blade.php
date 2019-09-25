<div class="codeweek-youtube-container">
        @if(App::getLocale() == 'en')
                <iframe
                src="https://www.youtube.com/embed/{{$video_id}}"></iframe>
        @else
                <iframe
                src="https://www.youtube.com/embed/{{$video_id}}?cc_load_policy=1&cc_lang_pref={{App::getLocale()}}"></iframe>
        @endif
</div>