@extends("layout.app")

@section('content')
    <section>
        <div class="container">
            School page
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