@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => __('login.register'), 'href' => ''],
    ];
@endphp
@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-register-page">
        <section class="py-10 px-5 lg:p-20 bg-secondary-gradient flex justify-center relative overflow-hidden">
            <div class="bg-white pb-10 pt-6 px-6 lg:p-16 rounded-[2rem] w-full md:max-w-[760px] z-10">
                <div class="flex">
                    <a class="flex-1 flex justify-center p-4 border-b-4 border-dark-blue-300 font-['Montserrat'] font-medium text-xl text-dark-blue-400 cursor-pointer" href="/login">
                        @lang('login.login')
                    </a>
                    <a class="flex-1 flex justify-center p-4 border-b-4 border-dark-blue font-['Montserrat'] font-bold text-xl text-dark-blue cursor-pointer">
                        @lang('login.register')
                    </a>
                </div>
                <div class="flex justify-center p-6 lg:p-10">
                    <div class="flex gap-4">
                        <a href="/login/twitter" class="flex justify-center items-center bg-dark-blue-50 w-10 h-10 rounded-full">
                            <img src="/images/social/prime_twitter.svg">
                        </a>
                        <a href="/login/github" class="flex justify-center items-center bg-dark-blue-50 w-10 h-10 rounded-full">
                            <img src="/images/social/fe_github.svg">
                        </a>
                        <a href="/login/facebook" class="flex justify-center items-center bg-dark-blue-50 w-10 h-10 rounded-full">
                            <img src="/images/social/logos_facebook.svg">
                        </a>
                        <a href="/login/google" class="flex justify-center items-center bg-dark-blue-50 w-10 h-10 rounded-full">
                            <img src="/images/social/devicon_google.svg">
                        </a>
                    </div>
                </div>
                <div class="h-[1px] w-full bg-black relative">
                    <div class="uppercase px-4 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white font-['Blinker'] font-bold text-xl">@lang('base.or')</div>
                </div>
                <form class="pt-10 font-['Blinker']" method="POST" action="{{ route('register') }}">
                    @csrf
                    @honeypot

                    <div class="mb-6">
                        <div>
                            <label for="email" class="font-normal text-xl">@lang('login.email')*</label>
                            <input id="email" type="email" name="email"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 mt-3"
                                   value="{{old('email')}}" required autofocus>
                        </div>
                        <div class="text-error-200 font-semibold mt-2">
                            @component('components.validation-errors', ['field'=>'email'])@endcomponent
                        </div>
                    </div>
                    <div class="mb-6">
                        <div>
                            <label for="name" class="font-normal text-xl">@lang('login.name')</label>
                            <input id="name" type="text" name="name"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 mt-3"
                                   value="{{old('name')}}" required autofocus>
                        </div>
                        <div class="text-error-200 font-semibold mt-2">
                            @component('components.validation-errors', ['field'=>'name'])@endcomponent
                        </div>
                    </div>
                    <div class="mb-6">
                        <div>
                            <label for="password" class="font-normal text-xl">@lang('login.password')*</label>
                            <div class="relative mt-3">
                                <input id="password" type="password" name="password"
                                       class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4"
                                       value="{{old('password')}}" required>
                                <img src="/images/eye.svg" id="password-eye" class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer">
                                <img src="/images/eye-slash.svg" id="password-eye-slash" class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer hidden">
                            </div>
                        </div>
                        <div class="text-error-200 font-semibold mt-2">
                            @component('components.validation-errors', ['field'=>'password'])@endcomponent
                        </div>
                    </div>
                    <div class="mb-5">
                        <div>
                            <label for="password_confirmation" class="font-normal text-xl">@lang('login.confirm_password')*</label>
                            <div class="relative mt-3">
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                       class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4"
                                       required>
                                <img src="/images/eye.svg" id="confirm-password-eye" class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer">
                                <img src="/images/eye-slash.svg" id="confirm-password-eye-slash" class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer hidden">
                            </div>
                        </div>
                        <div class="text-error-200 font-semibold mt-2">
                            @component('components.validation-errors', ['field'=>'password'])@endcomponent
                        </div>
                    </div>
                    <div>
                        <div class="relative flex md:items-center gap-3">
                            <input id="checkPrivacy" name="privacy" type="checkbox"
                                   class="peer relative min-w-8 w-8 h-8 border-2 border-solid border-dark-blue-200 rounded-md appearance-none cursor-pointer checked:bg-dark-blue checked:border-0">
                            <label for="checkPrivacy" class="font-normal text-[16px] cursor-pointer">
                                I agree with the handling of my data in accordance with the company <a href="{{route('privacy')}}" class="text-dark-blue underline font-semibold">privacy policy</a>.
                            </label>
                            <svg
                                    class="absolute top-1 w-6 h-6 hidden peer-checked:block ml-1"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="white"
                                    stroke-width="4"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                            >
                                <polyline points="20 6 9 17 4 12"></polyline>
                            </svg>
                        </div>
                        <div class="text-error-200 font-semibold mt-2">
                            @component('components.validation-errors', ['field'=>'privacy'])@endcomponent
                        </div>
                    </div>

                    <div class="flex justify-center mt-6">
                        <input class="cursor-pointer bg-primary hover:bg-hover-orange rounded-full py-4 px-20 font-semibold text-base w-full md:w-auto text-center text-[#20262C] transition-all duration-300" type="submit" value="@lang('login.register')">
                    </div>
                </form>
            </div>

            <img
                class="absolute top-0 -right-1/4 h-full max-w-[calc(70vw)] object-cover opacity-70 hidden md:block"
                loading="lazy"
                src="../images/login_bg.png"
                style="clip-path: ellipse(70% 140% at 70% 25%);"
            />
        </section>

        @livewire('still-have-question-section')
    </section>
@endsection

@push('scripts')
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('password_confirmation');
    const eyeIcon = document.getElementById('password-eye');
    const eyeSlashIcon = document.getElementById('password-eye-slash');
    const confirmEyeIcon = document.getElementById('confirm-password-eye');
    const confirmEyeSlashIcon = document.getElementById('confirm-password-eye-slash');

    const togglePasswordVisibility = () => {
      const isPassword = passwordInput.type === 'password';
      passwordInput.type = isPassword ? 'text' : 'password';
      eyeIcon.style.display = isPassword ? 'none' : 'block';
      eyeSlashIcon.style.display = isPassword ? 'block' : 'none';
    };

    eyeIcon.addEventListener('click', togglePasswordVisibility);
    eyeSlashIcon.addEventListener('click', togglePasswordVisibility);

    const toggleConfirmPasswordVisibility = () => {
      const isConfirmPassword = confirmPasswordInput.type === 'password';
      confirmPasswordInput.type = isConfirmPassword ? 'text' : 'password';
      confirmEyeIcon.style.display = isConfirmPassword ? 'none' : 'block';
      confirmEyeSlashIcon.style.display = isConfirmPassword ? 'block' : 'none';
    };

    confirmEyeIcon.addEventListener('click', toggleConfirmPasswordVisibility);
    confirmEyeSlashIcon.addEventListener('click', toggleConfirmPasswordVisibility);
  });
</script>
@endpush