@extends('layout.base')

@include('components.tailwind')

@include('components.livewire')

@section('content')
    <div>
        <section class="codeweek-content-header">

            <div class="header">
                <div>
                    <h1>@lang('menu.online_events')</h1>
                    <p>Total of Online Activities: {{$events->total()}}</p>
                </div>
            </div>
            @role('super admin')

            <div class="mb-4">

                    <div class="border-b border-gray-200">
                        <nav class="-mb-px flex">
                            @include('online-calendar.admin._tab', [
    'targetParam'=>'online/list',
    'route'=>'admin.online-events',
'title'=>'All Online Activities'
])
                            @include('online-calendar.admin._tab', [
    'targetParam'=>'online/promoted',
    'route'=>'promoted_events',
    'title'=>'Promoted Activities'
])
                            @include('online-calendar.admin._tab', [
    'targetParam'=>'online/featured',
    'route'=>'featured_events',
    'title'=>'Activities in Calendar'
])


                        </nav>
                    </div>

            </div>


            <div class="relative flex flex-col">

                <country-select :target="'{{$target}}'" :code="'{{$country_iso}}'"
                                :countries="{{$countries}}"></country-select>

            </div>

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
                                        Language
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

                                @foreach($events as $event)

                                    @livewire('online-event-card', ['event' => $event, 'countryName' =>
                                    $countryNames[$event->country_iso]])

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

        <span>
@endsection


