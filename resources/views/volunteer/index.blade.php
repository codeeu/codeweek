@extends('layout.base')

@section('content')


    <div class=" mt-6   flex justify-around">
        <div class="w-4/5">
            <h3>Volunteers</h3>
            <header class="flex flex-col justify-between">

                <ul>
                    @foreach($volunteers as $volunteer)

                        <li>
                            ({{$volunteer->status}}) - {{$volunteer->user->fullName()}} - {{$volunteer->user->country->name}} - <a href="{{route('volunteer_approve',$volunteer)}}">APPROVE</a> -
                            <a href="{{route('volunteer_reject',$volunteer)}}">REJECT</a>
                        </li>
                    @endforeach
                </ul>

            </header>
        </div>
    </div>




@endsection