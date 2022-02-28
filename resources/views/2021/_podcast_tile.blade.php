<div class="bg-gray-200 w-90 shadow-lg rounded p-2">
    <div class="group relative">
        <img alt="Placeholder" class="block h-full rounded"  src="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/art/{{$podcast->image}}">
        <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 duration-700 transition justify-evenly">

            <button  @click="play_single(this.instru)" class="hover:scale-110 text-white outline-none opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
            </button>

        </div>
    </div>
    <div class="p-2">
        <h2 class="text-center orange py-1 text-base justify-center">{{$podcast->title}}</h2>
{{--        <div class="text-gray-400 text-sm">By @ax-production</div>--}}
    </div>
</div>