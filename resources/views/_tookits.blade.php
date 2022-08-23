@php
    $languages = explode(",",config("codeweek.LOCALES"));
      $locale = app()->getLocale();
@endphp


    <li> <strong>@lang('snippets.toolkits.1')</strong>: @lang('snippets.toolkits.2') (

        @foreach($languages as $lang)
            @if($lang === $locale)
                <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2022/communications-toolkit-{{strtoupper($lang)}}.zip">@lang('base.languages.' . $lang)</a>

            @endif
        @endforeach

        @if($locale !== 'en')
            - <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2022/communications-toolkit-EN.zip">@lang('base.languages.en')</a>
        @endif
    )
    </li>


    <li> <strong>@lang('snippets.toolkits.3')</strong>: @lang('snippets.toolkits.4') (

        @foreach($languages as $lang)
            @if($lang === $locale)
                <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2022/teachers-toolkit-{{strtoupper($lang)}}.zip">@lang('base.languages.' . $lang)</a>
            @endif
        @endforeach

        @if($locale !== 'en')
            -
            <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2022/teachers-toolkit-EN.zip">@lang('base.languages.en')</a>
        @endif
    )
    </li>

    <li><strong>@lang('snippets.toolkits.5')</strong> (

        @foreach($languages as $lang)
            @if($lang === $locale)
                <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2022/Codeweek_2022_{{strtoupper($lang)}}.pdf">@lang('base.languages.' . $lang)</a>
            @endif
        @endforeach

        @if($locale !== 'en')
            -
            <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/leaflet/2022/Codeweek_2022_EN.pdf">@lang('base.languages.en')</a>
        @endif
    )
    </li>

