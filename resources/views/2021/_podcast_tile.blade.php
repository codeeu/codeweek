<div class="rounded-lg bg-white overflow-hidden cursor-pointer group" onclick="window.location.href='{{ route('podcast', $podcast) }}'">
    <div class="relative">
        <img alt="Placeholder" class="block w-full rounded" src="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/art/{{$podcast->image}}" />
        <span class="bg-white group-hover:bg-primary duration-300 rounded-full w-12 h-12 flex justify-center items-center absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
            <img class="w-6 ml-1" src="/images/fi_play.svg" />
        </span>
        @if($podcast->time)
            <div class="absolute bg-[#1C4DA1CC] px-2 py-1 rounded-md bottom-2.5 right-2.5 text-white font-semibold text-sm">
                {{ $podcast->time }}
            </div>
        @endif
    </div>
    <div class="px-6 py-8">
        <span class="text-dark-blue text-center text-lg p-0 font-semibold mb-2 font-['Montserrat'] block">{{$podcast->title}}</span>
    </div>
</div>