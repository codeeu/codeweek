@extends('layout.new_base')

@section('content')
    <section id="codeweek-forgotpassword-page">
        <section class="py-10 px-5 lg:p-20 bg-secondary-gradient flex justify-center relative overflow-hidden">

            <section class="bg-white pb-10 pt-6 px-6 lg:p-16 rounded-[2rem] w-full md:max-w-[760px] z-10" >

                <div class="reset_title">@lang('login.resetpage_title')</div>
                <div class="reset_description">@lang('login.resetpage_description')</div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="email" class="font-normal text-xl">@lang('login.email')</label>
                            <input class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 mt-3" id="email" type="email" name="email"
                                   value="{{old('email')}}" required autofocus>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'email'])@endcomponent
                        </div>
                    </div>

                    <div class="flex justify-center mt-6">
                        <input style="font-family: Blinker;" class="cursor-pointer bg-primary hover:bg-hover-orange rounded-full py-4 px-20 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300" type="submit" value="@lang('login.send_password')">
                    </div>

                </form>
                </section>
                <img
                    class="absolute top-0 -right-1/4 h-full max-w-[calc(70vw)] object-cover opacity-70 hidden md:block"
                    loading="lazy"
                    src="../images/login_bg.png"
                    style="clip-path: ellipse(70% 140% at 70% 25%);"
                 />

                </section>
            </section>
        @endsection