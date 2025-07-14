<div class="flex flex-col rounded-lg bg-white overflow-hidden">
    <div class="relative">
        <img src="{{$event->picture_path()}}" class="w-full object-cover h-[200px]" alt="{{$event->title}}" />
    </div>
    <div class="flex-grow px-6 py-4 flex flex-col justify-between">
        <div>
            <div class="flex gap-2 flex-wrap mb-4">
                <span class="bg-dark-blue py-1 px-4 text-sm font-semibold text-white rounded-full whitespace-nowrap flex items-center gap-2">
                    <img
                        class="inline-block w-4 h-4 text-white"
                        src="/images/star.svg"
                    />
                    {{Carbon\Carbon::parse($event->start_date)->format('d/m/Y')}}
                </span>
                <span class="bg-light-blue-100 py-1 px-4 text-sm font-semibold text-slate-500 rounded-full whitespace-nowrap">Time: {{Carbon\Carbon::parse($event->start_date)->format('h:i A')}} GMT</span>
            </div>
            @can('approve', $event)
                @isset($moderation)
                    @if($event->owner)
                        <div class="text-xs text-slate-500 mb-2">Organizer: <span class="p-1 bg-[#fe85351a]">{{$event->owner->email ?? $event->owner->email_display }}</span></div>
                    @else
                        <div class="text-xs text-slate-500 mb-2">Organizer: <span class="p-1 bg-[#fe85351a]">Unknown</span></div>
                    @endif
                @endisset
            @endcan
            <p class="text-dark-blue text-lg p-0 font-semibold mb-2 font-['Montserrat']">
                {{ $event->title }}
            </p>
            <p class="text-slate-500 text-default p-0 font-semibold mb-2">
                {{ $event->location }}
            </p>
            <div class="[&_p]:p-0 [&_p]:empty:hidden mb-4 space-y-1 text-slate-500 font-normal text-default">
              {!! $event->description !!}
            </div>
        </div>
        @can('approve', $event)
            @isset($moderation)
                <moderate-event :event="{{$event}}" :refresh="true"></moderate-event>
            @endisset
        @endcan
        <a
                class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
                href="{{$event->path()}}"
        >
            <span>View profile/contact</span>
            <div class="flex gap-2 w-4 overflow-hidden">
                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
            </div>
        </a>
    </div>
</div>