@extends('layout.new_base')

@php
    $list = [
      (object) ['label' => 'My profile', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-profile-page" class="bg-light-blue font-['Blinker']">
        <section class="relative flex overflow-hidden">
            <div class="flex relative transition-all w-full bg-blue-gradient py-10 tablet:py-20">
                <div class="w-full overflow-hidden flex flex-col md:flex-row justify-end md:items-center flex-shrink-0">
                    <div class="codeweek-container-lg flex flex-col tablet:flex-row justify-between items-end">
                        @role('ambassador|super admin')
                        <avatar-form :user="{{ $profileUser }}"></avatar-form>
                        @else
                        <h1>{{ $profileUser->fullName }}</h1>
                        @endrole

                        <a
                            onclick="return confirm('Are you actually intending to delete your account?')"
                            class="w-full md:w-fit flex justify-center items-center gap-2 text-white border-solid border-2 border-white rounded-full py-2.5 px-6 font-semibold text-base transition-all duration-300 group mt-8 tablet:mt-0"
                            href="{{route('delete_user')}}"
                        >
                            <span>Delete my profile</span>
                            <div class="flex gap-2 w-4 overflow-hidden">
                                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                                <img src="/images/arrow-right-icon.svg" class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0" />
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10 tablet:py-20 bg-yellow-50">
            <div class="codeweek-container">
                <h2 class="text-dark-blue text-2xl font-medium tablet:text-4xl font-['Montserrat'] mb-6 tablet:mb-10">
                    Your details
                </h2>
                <form method="POST" action="{{ route('user.update') }}" class="bg-white px-5 py-8 rounded-xl tablet:px-24 tablet:py-16 tablet:rounded-3xl text-xl">
                    @if ($errors->any())
                        <div class="mb-4 text-[ff526c] border-[#ffa7b4] bg-[#ffe5e9] px-3 py-2 rounded-lg">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li class="font-normal py-1.5">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <div class="mb-1">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_firstname">First name *</label>
                            <input id="id_firstname" type="text"
                                   name="firstname"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                                   placeholder="@lang('base.first_name')"
                                   value="{{$profileUser->firstname}}">
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'firstname'])@endcomponent
                        </div>
                    </div>

                    <div class="mb-1">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_lastname">Last name *</label>
                            <input id="id_lastname" type="text"
                                   name="lastname"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                                   placeholder="@lang('base.last_name')"
                                   value="{{$profileUser->lastname}}">
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'lastname'])@endcomponent
                        </div>
                    </div>

                    <div class="mb-1">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_email">Email address *</label>
                            <input id="id_email" type="email"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                                   placeholder="@lang('base.email')"
                                   value="{{$profileUser->email}}" readonly>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'title'])@endcomponent
                        </div>
                    </div>

                    <div class="mb-1">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_email_display">Display email</label>
                            <input id="id_email_display" type="email"
                                   name="email_display"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                                   placeholder="@lang('base.display_email')"
                                   value="{{$profileUser->email_display}}">
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'email_display'])@endcomponent
                        </div>
                    </div>

                    @role('ambassador|super admin|leading teacher')
                    <div class="mb-1">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_tag">Leading Teacher Tag</label>
                            <input id="id_tag" type="text"
                                   name="tag"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                                   placeholder="(country code-last name-three random digits) for example BE-Joe-005"
                                   value="{{$profileUser->tag}}">
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'tag'])@endcomponent
                        </div>
                    </div>

                    <div class="mb-1">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_twitter">Twitter (optional)</label>
                            <input id="id_twitter" type="text"
                                   name="twitter"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                                   placeholder="(country code-last name-three random digits) for example BE-Joe-005"
                                   value="{{$profileUser->twitter}}">
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'twitter'])@endcomponent
                        </div>
                    </div>
                    @endrole

                    @role('ambassador|super admin')
                    <div class="mb-1">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_your_website">@lang('base.your_website')</label>
                            <input id="id_your_website" type="text"
                                   name="website"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                                   placeholder="@lang('base.your_website')"
                                   value="{{$profileUser->website}}">
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'website'])@endcomponent
                        </div>
                    </div>
                    @endrole

                    <div class="mb-1">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_country">Country*</label>
                            <select id="id_country"
                                   name="country_iso"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                            >
                                <option value=""></option>
                                @foreach ($active_countries as $country)
                                    <option value="{{$country->iso}}" {{$profileUser->country?->iso == $country->iso ? 'selected' : ''}}>@lang('countries.'. $country->name)</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'country'])@endcomponent
                        </div>
                    </div>

                    <div class="mb-1">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_bio">@lang('base.biography')</label>
                            <textarea id="id_bio"
                                   name="bio"
                                   cols="40" rows="10"
                                   class="border-2 border-solid border-dark-blue-200 w-full rounded-[24px] px-4 py-3 resize-none appearance-none text-slate-600 mb-3"
                                   placeholder="@lang('base.biography')">{{$profileUser->bio}}</textarea>
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'biography'])@endcomponent
                        </div>
                    </div>

                    <div class="mb-4">
                        <div>
                            <label class="block text-xl text-slate-500 mb-2" for="id_bio">@lang('base.receive emails')*</label>
                            <div class="flex gap-8">
                                <div class="flex items-center space-x-3">
                                    <input
                                        type="radio"
                                        id="yes"
                                        name="receive_emails"
                                        value="1"
                                        {{$profileUser->receive_emails === 1 ? 'checked' : ''}}
                                        class="w-8 h-8 text-slate-600 border-2 border-dark-blue-200"
                                    >
                                    <label for="yes" class="text-base font-normal text-gray-700 cursor-pointer">
                                        Yes
                                    </label>
                                </div>

                                <div class="flex items-center space-x-3">
                                    <input
                                        type="radio"
                                        id="no"
                                        name="receive_emails"
                                        value="0"
                                        {{$profileUser->receive_emails === 0 ? 'checked' : ''}}
                                        class="w-8 h-8 text-slate-600 border-2 border-dark-blue-200"
                                    >
                                    <label for="no" class="text-base font-normal text-gray-700 cursor-pointer">
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-8">
                        <div class="flex items-center space-x-3">
                            <input
                                type="checkbox"
                                id="privacy-agreement"
                                name="privacy"
                                value="agreed"
                                class="w-8 h-8 text-slate-600 border-2 border-dark-blue-200 rounded"
                            >
                            <label for="privacy-agreement" class="text-base font-normal text-gray-700 cursor-pointer">
                                Agree to <a href="{{route('privacy-contact-points')}}" target="_blank" rel="noreferer noopener" class="text-dark-blue underline font-semibold">Privacy Policy</a>.
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <input
                            type="submit"
                            class="text-nowrap w-full md:w-fit flex justify-center items-center bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-4 px-20 font-semibold text-base"
                            value="Update personal details"
                        >
                    </div>
                </form>
            </div>
        </section>
    </section>
@endsection
