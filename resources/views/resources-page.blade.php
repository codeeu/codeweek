@extends('layout.base')

@include('components.tailwind-3')

@include('components.livewire')

@section('content')

    <div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32 bg-blend-multiply">
        {{--        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=1&w=2830&h=1500&q=5&blend=343030&sat=100&exp=15&blend-mode=multiply"--}}
        {{--         alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">--}}

        <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-y=1&w=2830&h=1500&q=5&blend=464050&sat=100&exp=15&blend-mode=multiply&flip=h"
             alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">

        <div class="hidden sm:absolute sm:-top-10 sm:right-1/2 sm:-z-10 sm:mr-10 sm:block sm:transform-gpu sm:blur-3xl"
             aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                 style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="absolute -top-52 left-1/2 -z-10 -translate-x-1/2 transform-gpu blur-3xl sm:top-[-28rem] sm:ml-16 sm:translate-x-0 sm:transform-gpu"
             aria-hidden="true">
            <div class="aspect-[1097/845] w-[68.5625rem] bg-gradient-to-tr from-[#ff4694] to-[#776fff] opacity-20"
                 style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">@lang('resources-page.header')</h2>
                <p class="mt-6 text-lg leading-8 text-gray-300">@lang('resources-page.title')</p>
            </div>
        </div>
    </div>

    <div class="md:flex">
        <div class="bg-blue-50/75 shadow sm:rounded-lg m-4">
            <div class="px-4 py-5 sm:p-6 flex flex-col justify-center h-full">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Coding@Home</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500 grow">
                    <p>A collection of short videos, do-it-yourself materials, puzzles, games, and
                        coding challenges for everyday use in the family as well as at school. You do not need any
                        previous knowledge or electronic devices to do the activities.</p>
                </div>
                <div class="mt-5">
                    <button onclick="location.href='{{route("coding@home")}}';" type="button"
                            class="inline-flex items-center rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        View Materials
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-blue-50/75 shadow sm:rounded-lg m-4">
            <div class="px-4 py-5 sm:p-6 flex flex-col justify-center h-full">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Trainings</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500 grow">
                    <p>Here you can find free training materials & resources that will help you get started and plan
                        your next innovative lesson. Short modules to explain computational thinking.</p>
                    <p>Online courses offer professional development opportunities and support teachers with coding and
                        computational thinking in the classroom.</p>
                </div>
                <div class="mt-5">
                    <button onclick="location.href='{{route("training.index")}}';" type="button"
                            class="inline-flex items-center rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        View Materials
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-blue-50/75 shadow sm:rounded-lg m-4">
            <div class="px-4 py-5 sm:p-6 flex flex-col justify-center h-full">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Learn</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500 grow">
                    <p>Browse our repository and find the perfect resource to start or to continue your coding journey.
                        All of these resources are free of charge.</p>
                </div>
                <div class="mt-5">
                    <button onclick="location.href='{{route("resources_all")}}';" type="button"
                            class="inline-flex items-center rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        View Materials
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-blue-50/75 shadow sm:rounded-lg m-4">
            <div class="px-4 py-5 sm:p-6 flex flex-col justify-center h-full">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Teach</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500 grow">
                    <p>Access a repository of resources that will help you teach coding at home, in the classroom or in
                        a code club. Browse free-fof-charge teaching resources to bring coding and programming to your
                        teacher practice.</p>
                </div>
                <div class="mt-5">
                    <button onclick="location.href='{{route("resources_all")}}';" type="button"
                            class="inline-flex items-center rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        View Materials
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div class="bg-white px-6 py-24 sm:pt-24 sm:pb-8 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Presentations and Toolkits</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Materials that help you organise your own Codeweek activity and promote the initiative with your community</p>
        </div>
    </div>

  <x-tailwind.cta-with-image image-position="left" :title="__('snippets.toolkits.1')" :content="__('snippets.toolkits.2')"></x-tailwind.cta-with-image>
  <x-tailwind.cta-with-image image-position="right" :title="__('snippets.toolkits.3')" :content="__('snippets.toolkits.4')"></x-tailwind.cta-with-image>

    <div class="bg-white px-6 py-24 sm:pt-24 sm:pb-8 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Challenges</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Activities that you can do on your own, in the classroom, with colleagues or friends.</p>
        </div>

        <div class="mt-4 text-center">
            <button onclick="location.href='{{route("challenges")}}';" type="button"
                    class="inline-flex items-center rounded-md bg-orange-600 px-3 py-2 text-xl font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                All Challenges
            </button>
        </div>

    </div>

    <div class="md:flex">
        <div class="bg-blue-50/75 shadow sm:rounded-lg m-4">
            <div class="px-4 py-5 sm:p-6 flex flex-col justify-center h-full">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Build your own Calliope mini fitness trainer</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500 grow">
                    <p>Participants will develop a digitally controlled prototype that uses a colorful glowing LED to reproduce a preconceived 10-unit fitness exercise.</p>
                </div>
                <div class="mt-5">
                    <button onclick="location.href='{{route("challenges.build-calliope")}}';" type="button"
                            class="inline-flex items-center rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        View Challenge
                    </button>
                </div>
            </div>
        </div>

        <div class="bg-blue-50/75 shadow sm:rounded-lg m-4">
            <div class="px-4 py-5 sm:p-6 flex flex-col justify-center h-full">
                <h3 class="text-base font-semibold leading-6 text-gray-900">Build your own Calliope mini fitness trainer</h3>
                <div class="mt-2 max-w-xl text-sm text-gray-500 grow">
                    <p>Participants will develop a digitally controlled prototype that uses a colorful glowing LED to reproduce a preconceived 10-unit fitness exercise.</p>
                </div>
                <div class="mt-5">
                    <button onclick="location.href='{{route("challenges.build-calliope")}}';" type="button"
                            class="inline-flex items-center rounded-md bg-orange-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                        View Challenge
                    </button>
                </div>
            </div>
        </div>

    </div>


    <div class="bg-white px-6 py-24 sm:pt-24 sm:pb-8 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">EU Code Week Podcasts</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">Join Eugenia Casariego and Arjana Blazic as they explore a range of topics, from media literacy to robotics.</p>
        </div>

        <div class="mt-4 text-center">
            <button onclick="location.href='{{route("podcasts")}}';" type="button"
                    class="inline-flex items-center rounded-md bg-orange-600 px-3 py-2 text-xl font-semibold text-white shadow-sm hover:bg-orange-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                All Podcasts
            </button>
        </div>

    </div>


    <div class="relative bg-gray-900">
            <div class="relative h-80 overflow-hidden bg-indigo-600 md:absolute md:left-0 md:h-full md:w-1/3 lg:w-1/2">
                        <img class="w-full h-full object-cover" src="https://codeweek-podcasts.s3.eu-west-1.amazonaws.com/art/computational-thinking-in-education.png" alt="">
                    </div>
                    <div class="relative mx-auto max-w-7xl py-12 sm:py-32 lg:px-8 lg:py-14">
                            <div class="pl-6 pr-6 md:ml-auto md:w-2/3 md:pl-16 lg:w-1/2 lg:pl-24 lg:pr-0 xl:pl-32">
                                        <div class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">EU report: Computational thinking in education</div>
                                        <div class="text-xl font-bold tracking-tight text-white sm:text-xl">with guests: Augusto Chioccariello and Katja Engelhardt</div>
                                        <p class="mt-6 text-base leading-7 text-gray-300">Today’s episode will focus on the 2022 study announced by the European Commission: “Reviewing Computational Thinking in Compulsory Education: State of Play and Practices from the Field”.</p>

                                    </div>
                            </div>
                    </div>







    {{--    <section id="codeweek-schools-page" class="codeweek-page">--}}

    {{--        <section class="codeweek-banner schools">--}}
    {{--            <div class="text">--}}
    {{--                <h1>@lang('resources-page.header')</h1>--}}
    {{--                <h2 style="text-transform: uppercase;">@lang('resources-page.title')</h2>--}}
    {{--            </div>--}}
    {{--            <div class="image">--}}
    {{--                <img src="/images/banner_training.svg" class="static-image">--}}
    {{--            </div>--}}
    {{--        </section>--}}

    {{--        <section class="codeweek-content-wrapper">--}}



    {{--        </section>--}}

    {{--    </section>--}}

@endsection