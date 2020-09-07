{{--<tr>--}}
{{--    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">--}}
{{--        <div class="flex items-center">--}}
{{--            <div class="flex-shrink-0 h-10 w-10">--}}
{{--                <img class="h-10 w-10 rounded"--}}
{{--                     src="{{$event->picture_path()}}"--}}
{{--                     alt="">--}}
{{--            </div>--}}
{{--            <div class="ml-4">--}}
{{--                <div class="text-sm leading-5 font-medium text-gray-900">--}}
{{--                    <a href="{{$event->path()}}">{{$event->title}}</a>--}}
{{--                </div>--}}
{{--                <div class="text-sm leading-5 text-gray-500">--}}
{{--                    {{$event->start_date}}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </td>--}}
{{--    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">--}}

{{--        <div class="text-sm leading-5 text-gray-900">{{$countryNames[$event->country_iso]}}</div>--}}

{{--        <div class="text-sm leading-5 text-gray-500">{{$event->language ?  __("base.languages.{$event->language}") : "N/A"}}</div>--}}
{{--    </td>--}}
{{--    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">--}}
{{--              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">--}}

{{--                {{$event->highlighted_status}}--}}

{{--              </span>--}}
{{--    </td>--}}

{{--</tr>--}}

        <div class="codeweek-card">
            <img src="{{$event->picture_path()}}" class="card-image">
            <div class="card-content">
                <div class="card-title">{{ $event->title }}</div>
                <div class="card-subtitle">{{ $event->start_date }}</div>

                <div class="card-description">{{ str_limit($event->description,400) }}</div>

            </div>
            <div class="card-actions">
                <a class="codeweek-action-link-button"
                   href="{{$event->path()}}">{{ __('myevents.view') }}</a>
            </div>
        </div>



{{--<body class="antialiased bg-gray-200 font-sans">--}}

{{--    <div class="w-full sm:w-1/2 bg-gray-500">--}}
{{--        <div class="bg-white shadow-xl rounded-lg overflow-hidden md:flex p-4">--}}
{{--            <div class="bg-cover bg-bottom h-48 md:h-auto md:w-64" style="background-image: url({{$event->picture_path()}})">--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <div class="p-4 md:p-5">--}}
{{--                    <p class="font-bold text-lg md:text-lg">{{ $event->title }}</p>--}}
{{--                    <p class="text-gray-700 md:text-base"></p>--}}
{{--  --}}

{{--                </div>--}}
{{--                <div class="p-4 md:p-5 bg-gray-100">--}}
{{--                    <div class="sm:flex sm:justify-between sm:items-center">--}}
{{--                        <div>--}}
{{--                            <div class="text-lg text-gray-700"><span class="text-gray-900 font-bold">17</span> per person*</div>--}}
{{--                            <div class="flex items-center">--}}
{{--                                <div class="flex inline-flex -mx-px">--}}
{{--                                    <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">--}}
{{--                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>--}}
{{--                                    <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">--}}
{{--                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>--}}
{{--                                    <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">--}}
{{--                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>--}}
{{--                                    <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">--}}
{{--                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>--}}
{{--                                    <svg class="w-4 h-4 mx-px fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">--}}
{{--                                        <path d="M6.43 12l-2.36 1.64a1 1 0 0 1-1.53-1.11l.83-2.75a1 1 0 0 0-.35-1.09L.73 6.96a1 1 0 0 1 .59-1.8l2.87-.06a1 1 0 0 0 .92-.67l.95-2.71a1 1 0 0 1 1.88 0l.95 2.71c.13.4.5.66.92.67l2.87.06a1 1 0 0 1 .59 1.8l-2.3 1.73a1 1 0 0 0-.34 1.09l.83 2.75a1 1 0 0 1-1.53 1.1L7.57 12a1 1 0 0 0-1.14 0z" /></svg>--}}
{{--                                </div>--}}
{{--                                <div class="text-gray-600 ml-2 text-sm md:text-base mt-1">28 reviews</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <button class="mt-3 sm:mt-0 py-2 px-5 md:py-3 md:px-6 bg-indigo-700 hover:bg-indigo-600 font-bold text-white md:text-lg rounded-lg shadow-md">Book now</button>--}}
{{--                    </div>--}}
{{--                    <div class="mt-3 text-gray-600 text-sm md:text-base">*Prices may vary depending on selected date.</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--</body>--}}



