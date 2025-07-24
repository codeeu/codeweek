<div class="flex flex-col rounded-lg bg-white overflow-hidden">
    <div class="relative">
        <img src="{{$event->picture_path()}}" class="w-full object-cover h-[200px]" alt="{{$event->title}}" />
    </div>
    <div class="flex-grow px-6 py-4 flex flex-col justify-between">
        @can('approve', $event)
            @isset($moderation)
                @if($event->owner)
                    <div class="text-default text-slate-500 mb-2 flex items-center font-semibold">Organizer: <span class="font-normal ml-3 w-fit px-4 py-1.5 bg-[#CCF0F9] rounded-full flex items-center">{{$event->owner->email ?? $event->owner->email_display }}</span></div>
                @else
                    <div class="text-default text-slate-500 mb-2 flex items-center font-semibold">Organizer: <span class="font-normal ml-3 w-fit px-4 py-1.5 bg-[#CCF0F9] rounded-full flex items-center">Unknown</span></div>
                @endif
            @endisset
        @endcan
        <p class="text-dark-blue text-lg p-0 font-semibold mb-2 font-['Montserrat']">
            {{ $event->title }}
        </p>
        <div class="text-slate-500 text-default p-0 font-semibold mb-2">
            Updated at: {{Carbon\Carbon::parse($event->updated_at)->isoFormat('llll')}}
        </div>
        <div class="text-slate-500 text-default p-0 font-semibold mb-2">
            Activity Date: {{Carbon\Carbon::parse($event->start_date)->isoFormat('llll')}}
        </div>
        <div class="[&_p]:p-0 [&_p]:empty:hidden space-y-1 text-slate-500 font-normal text-default">
            {!! $event->description !!}
        </div>
    </div>
    @can('approve', $event)
        @isset($moderation)
            <moderate-event :event="{{$event}}" :refresh="true"></moderate-event>
        @endisset
    @endcan
    <div class="px-6 py-4">
        <a
            class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
            href="{{$event->path()}}"
        >
            <span>@lang('myevents.view')</span>
            <div class="flex gap-2 w-4 overflow-hidden">
                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
            </div>
        </a>
    </div>
</div>
