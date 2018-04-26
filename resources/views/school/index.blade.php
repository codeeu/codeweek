@extends('layout.base')

@section('content')
    <section>
        <div class="container">
            <h3>Schools</h3>
            <ul>
                @foreach($schools as $school)
                    <li>
                        {{$school->name}}
                        @foreach($school->users as $users)
                            - {{$users->name}}
                        @endforeach
                    </li>
                @endforeach
                {{ $schools->links() }}
            </ul>
        </div>
    </section>

@endsection