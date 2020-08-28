@extends('layout.base')

@include('components.tailwind')

@section('content')

    <div class="bg-gray-200 overflow-hidden rounded-lg mx-6">
        <div class="px-4 py-5 sm:p-6">

            <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">

                <div class="sm:col-span-3">
                    <label for="country" class="block text-sm font-medium leading-5 text-gray-700">
                        Country / Region
                    </label>
                    <div class="mt-1 rounded-md shadow-sm">
                        <select id="country" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @foreach($countries as $key => $country)
                            <option>{{$country}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <div class="bg-gray-50 overflow-hidden rounded-lg">
        <div class="px-4 py-5 sm:p-6">

            <div class="flex flex-col">
                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Country
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>

                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($events as $event)
                                @include('online-calendar._oc-event')
                            @endforeach

                            <!-- More rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


