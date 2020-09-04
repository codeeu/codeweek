<div>

    <div class="bg-gray-200 overflow-hidden rounded-lg mx-6">
        <div class="px-2 py-2 sm:p-2">

            <div class="mt-2 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-6">

                <div class="sm:col-span-3 flex">
                    <label for="country" class="inline-block text-lg font-medium leading-5 text-gray-700 mr-2 align-middle mt-2">
                        Language
                    </label>

                    <div class="inline-block relative w-128" style="box-sizing: border-box;">
{{--                        <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">--}}
{{--                            <option>Really long option that will likely overlap the chevron</option>--}}
{{--                            <option>Option 2</option>--}}
{{--                            <option>Option 3</option>--}}
{{--                        </select>--}}
                                                <select wire:model="selectedLanguage" id="language"
                                                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                                                        >
                                                    <option value="">All Languages</option>
                                                    @foreach($languages as $language)
                                                        @if($language !== "")
                                                            <option value="{{$language}}">{{__("base.languages.{$language}")}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>

                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                        </div>
                    </div>

{{--                    <div class="inline-block relative w-64">--}}
{{--                        <select wire:model="selectedLanguage" id="language"--}}
{{--                                class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"--}}
{{--                                >--}}
{{--                            <option value="">All Languages</option>--}}
{{--                            @foreach($languages as $language)--}}
{{--                                @if($language !== "")--}}
{{--                                    <option value="{{$language}}">{{__("base.languages.{$language}")}}</option>--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">--}}
{{--                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>--}}
{{--                        </div>--}}
{{--                    </div>--}}
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
                                    Country / Language
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>

                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($filteredEvents as $event)

                                @include('online-calendar._oc-event-simple')

                            @endforeach



                            <!-- More rows... -->
                            </tbody>
                        </table>

                        <div class="codeweek-pagination">
                            {{ $filteredEvents->links() }}
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>



</div>
