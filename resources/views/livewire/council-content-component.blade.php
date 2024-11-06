<div>
    <section class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2">
        @foreach ($councilMembers as $member)
            <article class="group flex flex-col justify-center items-center bg-white rounded-md border border-solid border-neutral-200 max-h-[600px] min-h-[600px] overflow-hidden transition-all duration-300 ">
                <div class="relative flex flex-col items-start justify-end h-full m-4">
                    <!-- Background Image -->
                    <img loading="lazy" src="{{ $member->image }}" alt="Background" class="relative inset-0 object-cover size-full" />
                    
                    <!-- Shape Image -->
                    <img loading="lazy" src="/images/partners/bg.png" alt="Portrait" class="absolute bottom-0 right-0 z-0 object-contain w-full overflow-hidden" />

                    <!-- Container that expands on hover -->
                    <div class="absolute z-0 flex flex-col justify-end w-full h-full group-hover:h-full group-hover:w-full group-hover:max-w-[90%] transition-all duration-300">
                        <div class="px-5 py-2.5 bg-white m-4 w-full max-w-[191px] group-hover:max-w-full group-hover:h-full">
                            <h3 class="mb-4 text-2xl font-bold leading-none text-orange-500">{{ $member->name }}</h3>
                            <p class="p-0 text-base font-bold text-black">{{ $member->title }}</p>
                            
                            <!-- Hidden content that appears on hover -->
                            <p class="hidden group-hover:block transition-opacity duration-300 ease-in-out gap-2.5 py-5 mt-1 w-full leading-6 min-h-[244px] opacity-0 group-hover:opacity-100">
                                {{ $member->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </section>
</div>
