@extends('layout.base')

@include('components.tailwind')
@include('components.livewire')

@section('content')

    <section class="mx-6">
        <h1>{{__('locations.title')}}</h1>
        <span class="text-xl">{{__('locations.description.0')}} <a href="{{route('create_event', ['skip' => 1])}}">{{__('locations.description.1')}}</a> {{__('locations.description.2')}}</span>

        <table class="codeweek-table mt-2">
            <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>


            @foreach($locations as $location)
                <tr>
                    <td>
                        <a href="{{route('create_event', ['location'=> $location->id])}}">{{ucfirst($location->location)}}</a>
                    </td>
                    <td>{{$location->name}}</td>
                    <td class="actions">
                        <a href="{{route('create_event', ['location'=> $location->id])}}">
                            GO</a>
                    </td>
                </tr>


            @endforeach
            </tbody>
        </table>


    </section>

@endsection

@section('extra-css')
    <style>
        ul.checklist li:before {
            content: '✓ ';
            color: #ee6a2c;
            font-weight: bold;
        }
    </style>
@endsection
