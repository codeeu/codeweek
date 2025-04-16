<div class="bg-[#FEEFE9] font-['Montserrat'] text-xs">
    <div class="codeweek-container-lg flex flex-wrap items-center gap-2 py-3">
        <div>
            <a class="text-[#1C4DA1] font-semibold hover:underline" href="/">@lang('menu.home')</a>
        </div>

        @foreach ($list as $index => $item)
            <img src="/images/chevron-right-icon.svg" />
            <div>
                @if ($item->href)
                    <a class="text-[#1C4DA1] font-semibold hover:underline" href="{{ $item->href }}">
                        {{ $item->label }}
                    </a>
                @else
                    <span class="text-[#333E48] font-medium">{{ $item->label }}</span>
                @endif
            </div>
        @endforeach
    </div>
</div>
