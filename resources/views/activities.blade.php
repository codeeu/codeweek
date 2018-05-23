@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            <h3>Activities</h3>

            @foreach($activities as $activity)
                <a href="{{$activity->subject->path()}}"> {{$activity->description}} </a>
                @if($activity->causer)
                by {{$activity->causer->fullName()}}
                @else
                 by system
                @endif

                <br/>
            @endforeach

            {{ $activities->links() }}

        </div>
    </section>
@endsection