@extends('layout.app')

@section('content')
    <section>
        <div class="container">
            Profile page -
            @role('super admin')
            Super admin detected!
            @else
                I am not an admin...
                @endrole




                <avatar-form :user="{{ $profileUser }}"></avatar-form>
a


                <form method="POST" action="{{ route('user.update') }}">


                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input type="text" class="form-control" id="firstname" placeholder="Name" name="firstname"
                               value="{{auth()->user()->firstname}}">

                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Name" name="lastname"
                               value="{{auth()->user()->lastname}}">

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Email"
                               value="{{auth()->user()->email}}">
                    </div>

                    <div class="form-group">
                        <label for="twitter">Twitter Handle</label>
                        <input type="text" class="form-control" id="twitter" placeholder="Twitter" name="twitter"
                               value="{{auth()->user()->twitter}}">
                    </div>

                    <div class="form-group">
                        <label for="twitter">Your Website</label>
                        <input type="text" class="form-control" id="website" placeholder="Website" name="website"
                               value="{{auth()->user()->website}}">
                    </div>

                    <div class="form-group">
                        <label for="twitter">Bio</label>
                        <input type="text" class="form-control" id="bio" placeholder="Bio" name="bio"
                               value="{{auth()->user()->bio}}">
                    </div>

                    <label for="id_country">Select country</label><br/>
                    @component('components.select-country',['countries'=>$EUcountries, 'country_iso'=>auth()->user()->country->iso])
                    @endcomponent
                    <br/>
                    <br/>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Update</button>
                    </div>

                </form>


                <br/>

        </div>
    </section>

@endsection