@extends("layout.app")

@section('content')
    <section>
        <div class="container">
            Profile page
            <br/>
            @role('super admin')
            I am a super admin!
            @else
                I am not an admin...
                @endrole
        </div>
    </section>

@endsection