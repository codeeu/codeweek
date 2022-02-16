@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-profile-page" class="codeweek-page">

        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
            <div class="max-w-6xl mx-auto">
                <div class="bg-blue-100 overflow-hidden rounded-lg">
                    <div class="px-4 py-5 sm:p-6">


                        <div class="header">

                            <h1>Badges</h1>

                        </div>

                        <!-- Content goes here -->
                        <div class="text-base mt-4"><strong>Name:</strong> {{$user->fullName}}</div>

                        <div class="text-base mt-4"><strong>Bits earned
                                in {{$year}}</strong>: {{$user->getPoints($year)}} - <a href="{{route('badges-leaderboard-year', $year)}}">View scoreboard</a></div>
                        <div class="text-base mt-4"><strong>Reported events
                                for {{$year}}</strong>: {{$user->reported($year)}}</div>
                        <div class="text-base mt-4"><strong>Influencer Bits
                                for {{$year}}</strong>: {{$user->influence($year)}}</div>

                        <h2 class="mt-4">Organiser Badges</h2>

                        <div>
                            <div class="flex">
                                <div class="flex-none">
                                    <img class="w-5/6 shadow-lg rounded-lg pt-2"
                                         src="{{asset('images/placeholder.png')}}">
                                </div>

                                <div class="flex-1">
                                    <div class="text-base italic">
                                        Earn your title, from active to legendary organiser, by organising more and more
                                        Code
                                        Week activities and contributing to the map.
                                    </div>
                                    <div class="pt-6">
                                        <nav aria-label="Progress">
                                            <ol role="list" class="flex items-center">

                                                @foreach($organiserBadges as $achievement)
                                                    @if(!$loop->last)
                                                        <li class="relative pr-8 sm:pr-20">
                                                    @else
                                                        <li class="relative">
                                                        @endif
                                                        @if (in_array($achievement->modelKey(), $userAchievements->pluck('id')->all()))

                                                            <!-- Completed Step -->
                                                                <div class="absolute inset-0 flex items-center"
                                                                     aria-hidden="true">
                                                                    <div class="h-0.5 w-full bg-yellow-600"></div>
                                                                </div>
                                                                <a href="#"
                                                                   class="relative w-24 h-24 flex items-center justify-center bg-yellow-600 rounded-full hover:bg-red-900">
                                                                    <!-- Heroicon name: solid/check -->
                                                                    <img src="{{asset('badges/'.$achievement->icon)}}">

                                                                    <span class="sr-only">Step 1</span>
                                                                </a>


                                                        @else

                                                            <!-- Upcoming Step -->
                                                                <div class="absolute inset-0 flex items-center"
                                                                     aria-hidden="true">
                                                                    <div class="h-0.5 w-full bg-gray-400"></div>
                                                                </div>
                                                                <a href="#"
                                                                   class="group relative w-24 h-24 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full hover:border-blue-400">
                                                                    <img class="filter grayscale blur-sm"
                                                                         src="{{asset('badges/'.$achievement->icon)}}">
                                                                </a>

                                                            @endif
                                                        </li>
                                                        @endforeach
                                            </ol>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <h2 class="mt-4">Influencer Badges</h2>
                        <div>
                            <div class="flex">
                                <div class="flex-none">
                                    <img class="w-5/6 shadow-lg rounded-lg pt-2"
                                         src="{{asset('images/placeholder.png')}}">
                                </div>

                                <div class="flex-1">
                                    <div class="text-base italic">
                                        Become a Code Week Influencer, starting from a simple influencer to a legendary
                                        influencer, who will simply stay in the record books of Code Week legends. To
                                        earn points, simply rise and abuse of the Code Week Tag when organising and
                                        sharing it with others!.
                                    </div>
                                    <div class="pt-6">
                                        <nav aria-label="Progress">
                                            <ol role="list" class="flex items-center">

                                                @foreach($influencerBadges as $achievement)
                                                    @if(!$loop->last)
                                                        <li class="relative pr-8 sm:pr-20">
                                                    @else
                                                        <li class="relative">
                                                        @endif
                                                        @if (in_array($achievement->modelKey(), $userAchievements->pluck('id')->all()))
                                                            {{--                                            <div class="flex flex-col items-center px-4 py-2 rounded-md text-sm font-medium text-center">--}}

                                                            {{--                                                <img src="{{asset('badges/'.$achievement->icon)}}">--}}
                                                            {{--                                                <span class="ml-2"><span class="text-lg font-bold">{{$achievement->name}}</span><br/>Success !</span>--}}


                                                            {{--                                            </div>--}}

                                                            <!-- Completed Step -->
                                                                <div class="absolute inset-0 flex items-center"
                                                                     aria-hidden="true">
                                                                    <div class="h-0.5 w-full bg-red-600"></div>
                                                                </div>
                                                                <a href="#"
                                                                   class="relative w-24 h-24 flex items-center justify-center bg-blue-600 rounded-full hover:bg-blue-900">
                                                                    <!-- Heroicon name: solid/check -->
                                                                    <img src="{{asset('badges/'.$achievement->icon)}}">

                                                                    <span class="sr-only">Step 1</span>
                                                                </a>


                                                        @else

                                                            <!-- Upcoming Step -->
                                                                <div class="absolute inset-0 flex items-center"
                                                                     aria-hidden="true">
                                                                    <div class="h-0.5 w-full bg-gray-400"></div>
                                                                </div>
                                                                <a href="#"
                                                                   class="group relative w-24 h-24 flex items-center justify-center bg-white border-2 border-gray-300 rounded-full hover:border-blue-400">
                                                                    <img class="filter grayscale blur-sm"
                                                                         src="{{asset('badges/'.$achievement->icon)}}">
                                                                </a>

                                                            @endif
                                                        </li>
                                                        @endforeach
                                            </ol>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>

@endsection
