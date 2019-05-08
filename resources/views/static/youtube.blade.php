<div class="flex youtube-container">
    @if(App::getLocale() == 'en')
        <iframe class="flex-1 youtube-iframe"
                src="https://www.youtube.com/embed/{{$video_id}}"></iframe>
        @else
        <iframe class="flex-1 youtube-iframe"
                src="https://www.youtube.com/embed/{{$video_id}}?cc_load_policy=1&cc_lang_pref={{App::getLocale()}}"></iframe>
        @endif

</div>