@php
    $languages = explode(",",config("codeweek.LOCALES"));
      $locale = app()->getLocale();
@endphp


    <div class="flex flex-col mb-4"> 
        <span class="mb-2"><strong>@lang('snippets.toolkits.1')</strong>: @lang('snippets.toolkits.2') </span>

{{--        @foreach($languages as $lang)--}}
{{--            @if($lang === $locale)--}}
{{--                <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2023/communications-toolkit-2023-{{strtoupper($lang)}}.zip">@lang('base.languages.' . $lang)</a>--}}
{{--            @endif--}}
{{--        @endforeach--}}

{{--        @if($locale !== 'en')--}}
{{--            - <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2023/communications-toolkit-2023-EN.zip">@lang('base.languages.en')</a>--}}
{{--        @endif--}}

       {{--  <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2025/communications-toolkit-2025-{{strtoupper($lang)}}.zip">@lang('base.languages.en')</a>--}}

        <a class="text-center no-underline w-full lg:w-fit bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300" href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2025/communications-toolkit-2025.zip">
            <span class="text-base font-semibold leading-7 text-black normal-case">
             @lang('snippets.toolkits.1')
            </span>
        </a>
    
    </div>


    <div class="flex flex-col mb-4"><span class="mb-2"><strong>@lang('snippets.toolkits.3')</strong>: @lang('snippets.toolkits.4')</span>

        @foreach($languages as $lang)
            @if($lang === $locale)
                <a class="text-center no-underline w-full lg:w-fit bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300" href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2025/teachers-toolkit-2025-EN.zip">
                  <span class="text-base font-semibold leading-7 text-black normal-case">
                @lang('snippets.toolkits.3')
                    </span>
                </a>
            @endif
        @endforeach

        @if($locale !== 'en')
            -
            <a class="text-center no-underline w-full lg:w-fit bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300" href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2025/teachers-toolkit-2025-EN.zip">
            <span class="text-base font-semibold leading-7 text-black normal-case">
                @lang('base.languages.en')
            </span>
            </a>
        @endif

{{--        <a href="https://codeweek-s3.s3-eu-west-1.amazonaws.com/docs/toolkits/2023/teachers-toolkit-2023-EN.zip">@lang('base.languages.en')</a>--}}

    </div>

    <div class="flex flex-col mb-4"><span class="mb-2"><strong>@lang('snippets.toolkits.5')</strong></span>

        @foreach($languages as $lang)
            @if($lang === $locale)
                <a class="text-center no-underline w-full lg:w-fit bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300" href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/leaflet/2025/codeweek-leaflet-2025-{{strtoupper($lang)}}.pdf">
                  <span class="text-base font-semibold leading-7 text-black normal-case">
                  @lang('snippets.toolkits.5')
                  </span></a>
            @endif
        @endforeach

        @if($locale !== 'en')
            -
            <a class="text-center no-underline w-full lg:w-fit bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300" href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/leaflet/codeweek-leaflet.pdf"><span class="text-base font-semibold leading-7 text-black normal-case">@lang('base.languages.en')</span></a>
        @endif

{{--                    <a href="https://codeweek-s3.s3.eu-west-1.amazonaws.com/docs/leaflet/2024/codeweek-leaflet-2024-EN.pdf">@lang('base.languages.en')</a>--}}

    </div>

