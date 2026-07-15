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
    </section>
@endsection

@section('non-vue-content')
    <section class="py-10 tablet:py-20 bg-yellow-50 font-['Blinker']">
        <div class="codeweek-container">
            <h2 class="text-dark-blue text-2xl font-medium tablet:text-4xl font-['Montserrat'] mb-6 tablet:mb-10">
                Your details
            </h2>

            <div class="bg-white px-5 py-8 rounded-xl tablet:px-24 tablet:py-10 tablet:rounded-3xl text-xl mb-6">
                <div class="mb-1">
                    <label class="block text-xl text-slate-500 mb-2" for="id_email">Login email *</label>
                    <input id="id_email" type="email"
                           class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3"
                           placeholder="@lang('base.email')"
                           value="{{ $profileUser->email }}" readonly>
                    <p class="text-base text-slate-500 mb-3">
                        Used to sign in and receive certificates and activity notifications.
                    </p>
                </div>
                @if (session('email_change_status'))
                    <div class="mb-4 text-dark-blue border-[#b8e6f2] bg-[#e8f8fc] px-4 py-3 rounded-lg text-base">
                        {{ session('email_change_status') }}
                    </div>
                @endif
                @if ($profileUser->pending_email)
                    <div class="mb-4 border-2 border-solid border-dark-blue-200 rounded-xl px-5 py-4 text-base text-slate-600">
                        <p class="mb-3">
                            Almost done. We sent a confirmation link to
                            <strong>{{ $profileUser->pending_email }}</strong>.
                            Open that inbox and click <strong>Confirm new login email</strong> (check spam too).
                            The link is valid for 48 hours.
                        </p>
                        <p class="mb-4 text-base text-slate-500">
                            A separate notice was sent to {{ $profileUser->email }} — that email does not contain the confirmation link.
                        </p>
                        <div class="flex flex-col tablet:flex-row gap-4 mb-6">
                            <form method="POST" action="{{ route('user.email-change.resend') }}">
                                {{ csrf_field() }}
                                <button type="submit" class="bg-dark-blue text-white rounded-full py-2.5 px-6 font-semibold text-base">
                                    Resend confirmation email
                                </button>
                            </form>
                            <form method="POST" action="{{ route('user.email-change.cancel') }}">
                                {{ csrf_field() }}
                                <button type="submit" class="text-dark-blue underline font-medium py-2.5">
                                    Cancel pending change
                                </button>
                            </form>
                        </div>
                        <div class="border-t border-dark-blue-200 pt-4">
                            <p class="mb-3 font-medium text-dark-blue">Can't find the email at {{ $profileUser->pending_email }}?</p>
                            <p class="mb-4 text-base text-slate-500">
                                If you can access that inbox elsewhere (for example a shared team mailbox), check there first.
                                Otherwise, while you are signed in here, you can confirm the change on this page.
                            </p>
                            <form method="POST" action="{{ route('user.email-change.confirm-here') }}">
                                {{ csrf_field() }}
                                @if (empty($profileUser->provider))
                                    <div class="mb-3">
                                        <label class="block text-lg text-slate-500 mb-2" for="confirm_password">Current password *</label>
                                        <input id="confirm_password" type="password" name="confirm_password"
                                               class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600"
                                               required autocomplete="current-password">
                                        @component('components.validation-errors', ['field'=>'confirm_password'])@endcomponent
                                    </div>
                                @endif
                                <button type="submit"
                                        class="bg-primary hover:bg-hover-orange duration-300 text-[#20262C] rounded-full py-2.5 px-6 font-semibold text-base">
                                    Confirm change to {{ $profileUser->pending_email }}
                                </button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="border-2 border-solid border-dark-blue-200 rounded-xl px-5 py-4">
                        <h3 class="text-dark-blue font-medium text-lg mb-4">Change login email</h3>
                        <form method="POST" action="{{ route('user.email-change.request') }}">
                            {{ csrf_field() }}
                            <div class="mb-3">
                                <label class="block text-lg text-slate-500 mb-2" for="new_email">New login email *</label>
                                <input id="new_email" type="email" name="new_email"
                                       class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600"
                                       value="{{ old('new_email') }}" required>
                                @component('components.validation-errors', ['field'=>'new_email'])@endcomponent
                            </div>
                            @if (empty($profileUser->provider))
                                <div class="mb-3">
                                    <label class="block text-lg text-slate-500 mb-2" for="current_password">Current password *</label>
                                    <input id="current_password" type="password" name="current_password"
                                           class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600"
                                           required autocomplete="current-password">
                                    @component('components.validation-errors', ['field'=>'current_password'])@endcomponent
                                </div>
                            @else
                                <p class="mb-3 text-base text-slate-500">
                                    We will send the confirmation link to your new address, and a security notice to {{ $profileUser->email }}.
                                    You can keep signing in with {{ ucfirst($profileUser->provider) }} after the update.
                                </p>
                            @endif
                            <button type="submit"
                                    class="bg-dark-blue text-white rounded-full py-2.5 px-6 font-semibold text-base">
                                Send confirmation email
                            </button>
                        </form>
                    </div>
                @endif
            </div>

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
                        <label class="block text-xl text-slate-500 mb-2" for="id_city">City</label>
                        <select id="id_city"
                                name="city_id"
                                class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none text-slate-600 mb-3">
                            <option value=""></option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}"
                                        data-country="{{ $city->country_iso }}"
                                        {{ optional($profileUser->city)->id === $city->id ? 'selected' : '' }}>
                                    {{ $city->city }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="errors">
                        @component('components.validation-errors', ['field'=>'city_id'])@endcomponent
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
                            {{ $profileUser->privacy ? 'checked' : '' }}
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
@endsection
