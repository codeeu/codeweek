@extends('layout.base')

@include('components.tailwind')

@include('components.livewire')

@section('content')

    <section class="codeweek-content-header">

        <div class="header">
            <div>
                <h1>@lang('menu.online_events')</h1>
                <p>Total of Online Activities: {{$events->total()}}</p>
            </div>
        </div>
        @role('super admin')
        <country-select :target="'online/list'" :code="'{{$country_iso}}'" :countries="{{$countries}}"></country-select>
        @endrole

    </section>

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
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-center text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider align-center">
                                    Actions
                                </th>

                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">

{{--                            @livewire('test-me')--}}
{{--                            @livewire('test-me')--}}
{{--                            <livewire:online-event-card></livewire:online-event-card>--}}
                            @foreach($events as $event)

{{--                                @livewire('test-me')--}}
{{--                                <div wire:key="{{ $loop->index }}">--}}
                                @livewire('online-event-card', ['event' => $event, 'countryName' => $countryNames[$event->country_iso]])
{{--                                    <livewire:online-event-card :event="$event" :countryName="$countryNames[$event->country_iso]" :key="$loop->index">--}}

{{--                                </div>--}}
{{--                                @include('online-calendar._oc-event')--}}
                            @endforeach

                            <!-- More rows... -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="codeweek-pagination">
        {{ $events->links() }}
    </div>
@endsection


