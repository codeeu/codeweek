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
                        <div class="text-xl mt-4">Achievements:<br/>
                            @foreach($achievements as $achievement)

                                @if (in_array($achievement->modelKey(), $userAchievements->pluck('id')->all()))
                                <div class="flex items-center px-4 py-2 rounded-md text-sm font-medium">

                                    <img src="{{asset('badges/'.$achievement->icon)}}">
                                    <span class="ml-2">{{$achievement->description()}}<br/>Success !</span>



                                </div>
                                @else
                                    <div class="flex items-center px-4 py-2 rounded-md text-sm font-medium">

                                        <img src="{{asset('badges/'.$achievement->icon)}}">
                                        <span class="ml-2">{{$achievement->description()}}<br/>To Unlock !</span>



                                    </div>
                                @endif
                            @endforeach

                        </div>


                    </div>
                </div>
            </div>
        </div>




    </section>

@endsection
