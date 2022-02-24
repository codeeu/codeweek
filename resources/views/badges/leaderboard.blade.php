@extends('layout.base')

<x-tailwind></x-tailwind>

@section('content')

    <section id="codeweek-profile-page" class="codeweek-page">


        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex">


                <div>
                    <h1 class="mr-2">Badges Leaderboard for </h1>
                </div>
                <div>
                    <form style="border:0px" id="faceted-search-events" method="get" action="/badges/leaderboard"
                          enctype="multipart/form-data">
                        <select id="year" name="year" onchange="this.form.submit()" class="codeweek-input-select">
                            @foreach($years as $year_label)
                                <option value="{{$year_label}}" {{ ($year_label == $year)?'selected':'' }} >
                                    {{$year_label}}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>


            <!-- We've used 3xl here, but feel free to try other max-widths based on your needs -->
            <div class="max-w-6xl mx-auto">
                <div class="bg-blue-100 overflow-hidden rounded-lg">

                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Rank
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Points
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Odd row -->
                                        @foreach($users as $user)
                                            @if($loop->odd)
                                                <tr class="bg-gray-100">
                                            @else
                                                <tr class="bg-blue-100">
                                                    @endif
                                                    <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">{{ $rank++}}</td>
                                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500"><a
                                                                href="/badges/user/{{$user->id}}/{{$year}}">{{$user->fullName}}</a>
                                                    </td>
                                                    <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">{{$user->getPoints($year)}}</td>
                                                </tr>

                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="w-5/6">
                                    {{$users->links()}}
                                </div>
                            </div>
                        </div>
                    </div>


                    {{--        <div class="px-4 py-5 sm:p-6">



                                <div class="header">

                                    <h1>Scoreboard {{$year}}</h1>



                                    <ul>
                                        @foreach($users as $user)

                                            <li>{{ $rank++}}: <a href="/badges/user/{{$user->id}}/{{$year}}">{{$user->fullName}}</a>
                                                - {{$user->getPoints($year)}}</li>
                                        @endforeach
                                    </ul>


                                </div>




                            </div>--}}

                </div>
            </div>
        </div>


    </section>

@endsection
