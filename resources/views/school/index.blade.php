@extends("layout.app")

@section('content')
    <section>
        <div class="container">
            School page
            <ul>
                @foreach($schools as $school)
                    <li>
                        {{$school->name}}
                    </li>
                @endforeach
                    {{ $schools->links() }}
            </ul>
        </div>
    </section>

@endsection