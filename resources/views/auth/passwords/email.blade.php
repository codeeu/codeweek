@extends('layout.base')

@section('content')
    <section id="codeweek-forgotpassword-page" class="codeweek-page" class="codeweek-page" style="background-image: url('/images/header_background.png'); background-size: cover; background-position: center right; max-height: 200vh; display: flex; justify-content: center; align-items: center;">
        <section class="codeweek-content-wrapper">

            <section class="codeweek-content-wrapper-inside" >

                <div class="reset_title">@lang('login.resetpage_title')</div>
                <div class="reset_description">@lang('login.resetpage_description')</div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="email">@lang('login.email')</label>
                            <input id="email" type="email" name="email"
                                   value="{{old('email')}}" required autofocus>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'email'])@endcomponent
                        </div>
                    </div>

                    <div class="codeweek-form-button-container">
                        <div class="codeweek-button">
                            <input type="submit" value="@lang('login.send_password')">
                        </div>
                    </div>

                </form>
            </section>

        </section>

    </section>
@endsection
