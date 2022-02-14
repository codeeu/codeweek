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

                            <h1>User Profile</h1>

                        </div>

                        <!-- Content goes here -->
                        <div class="text-xl mt-4">Name: {{$user->fullName}}</div>

                        <div class="text-xl mt-4">Your points for {{$year}}: {{$user->getPoints($year)}}</div>
                        <div class="text-xl mt-4">Reported events for {{$year}}: {{$user->reported($year)}}</div>
                        <div class="text-xl mt-4">Influencer Bits for {{$year}}: {{$user->influence($year)}}</div>
                        <div class="text-xl mt-4">Achievements:<br/>

                                <div class="grid grid-cols-5 gap-2">
                                @foreach($achievements as $achievement)

                                    @if (in_array($achievement->modelKey(), $userAchievements->pluck('id')->all()))
                                        <div class="flex flex-col items-center px-4 py-2 rounded-md text-sm font-medium text-center">

                                            <img src="{{asset('badges/'.$achievement->icon)}}">
                                            <span class="ml-2"><span class="text-lg font-bold">{{$achievement->name}}</span><br/>Success !</span>


                                        </div>
                                    @else
                                        <div class="flex flex-col items-center px-4 py-2 rounded-md text-sm font-medium text-center">

                                            <img class="filter grayscale blur"
                                                 src="{{asset('badges/'.$achievement->icon)}}">
                                            <span class="ml-2"><span class="text-lg">{{$achievement->name}}</span><br/>{{$achievement->description()}}</span>


                                        </div>
                                    @endif
                                @endforeach
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection
