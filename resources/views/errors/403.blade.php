@extends('layout.base')

@section('content')
    <section>
        <div class="container">

            @if($exception->getMessage())
                <h1>{{$exception->getMessage()}}</h1>
            @else
                <h1>You are not authorized to perform this action !</h1>
            @endif

        </div>
    </section>

@endsection