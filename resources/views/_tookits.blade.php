@php
    $languages = explode(",",config("codeweek.LOCALES"));
      $locale = app()->getLocale();
@endphp


    <li> <strong>@lang('snippets.toolkits.1')</strong>: @lang('snippets.toolkits.2') (

{{--        @foreach($languages as $lang)--}}
{{--            @if($lang === $locale)--}}
{{--                <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2023/communications-toolkit-2023-{{strtoupper($lang)}}.zip">@lang('base.languages.' . $lang)</a>--}}
{{--            @endif--}}
{{--        @endforeach--}}

{{--        @if($locale !== 'en')--}}
{{--            - <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2023/communications-toolkit-2023-EN.zip">@lang('base.languages.en')</a>--}}
{{--        @endif--}}

       {{--  <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2025/communications-toolkit-2025-{{strtoupper($lang)}}.zip">@lang('base.languages.en')</a>--}}

        <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2025/communications-toolkit-2025.zip">@lang('base.languages.en')</a>
    )
    </li>


    <li> <strong>@lang('snippets.toolkits.3')</strong>: @lang('snippets.toolkits.4') (

        @foreach($languages as $lang)
            @if($lang === $locale)
                <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2025/teachers-toolkit-2025-EN.zip">@lang('base.languages.' . $lang)</a>
            @endif
        @endforeach

        @if($locale !== 'en')
            -
            <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2025/teachers-toolkit-2025-EN.zip">@lang('base.languages.en')</a>
        @endif

{{--        <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2023/teachers-toolkit-2023-EN.zip">@lang('base.languages.en')</a>--}}
    )
    </li>

    <li><strong>@lang('snippets.toolkits.5')</strong> (

        @foreach($languages as $lang)
            @if($lang === $locale)
                <a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/leaflet/2025/codeweek-leaflet-2025-{{strtoupper($lang)}}.pdf">@lang('base.languages.' . $lang)</a>
            @endif
        @endforeach

        @if($locale !== 'en')
            -
            <a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/leaflet/2025/codeweek-leaflet-2025-EN.pdf">@lang('base.languages.en')</a>
        @endif

{{--                    <a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/leaflet/2024/codeweek-leaflet-2024-EN.pdf">@lang('base.languages.en')</a>--}}
    )
    </li>

