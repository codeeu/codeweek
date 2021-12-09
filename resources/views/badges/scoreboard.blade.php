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

                            <h1>Scoreboard {{$year}}</h1>

                            <ul>
                                @foreach($users as $user)

                                    <li>{{ $rank++}}: <a href="/badges/user/{{$user->id}}">{{$user->fullName}}</a>
                                        - {{$user->getPoints($year)}}</li>
                                @endforeach
                            </ul>


                        </div>

                        {{ $users->links() }}


                    </div>
                </div>
            </div>
        </div>


    </section>

@endsection
