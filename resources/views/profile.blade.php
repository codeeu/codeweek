@extends('layout.base')

@section('content')

    <section id="codeweek-profile-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top:0;">
                <div style="display: flex">
                
                    <div style="display: flex; justify-content: center; align-items: center;">
                      @role('ambassador|super admin')
                      <avatar-form :user="{{ $profileUser }}"></avatar-form>
                      @else
                      <h1>{{ $profileUser->fullName }}</h1>
                      @endrole

                      @role('leading teacher')
                      <h3><a href="{{route('LT.signup')}}">Click here to Edit your Leading Teacher Profile</a></h3>
                      @endrole
                    </div>
                    <div class="codeweek-form-button-container right" style="justify-content: right;  align-items: center;">
                    <a class="codeweek-action-link-button red"
                           onclick="return confirm('Are you actually intending to delete your account?')"
                           href="{{route('delete_user')}}" style="font-size: 12px;  padding: 7px 10px;">DELETE USER</a>       
            
                    </div>
                    
                </div>   
                <form method="POST" action="{{ route('user.update') }}" class="codeweek-form">

                    <div class="codeweek-form-inner-container">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">@lang('base.email')</label>
                                <input id="email" placeholder="@lang('base.email')" type="email"
                                       value="{{$profileUser->email}}" readonly>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'title'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">@lang('base.display_email')</label>
                                <input id="email_display" placeholder="@lang('base.display_email')" name="email_display"
                                       type="email"
                                       value="{{$profileUser->email_display}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'title'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">@lang('base.first_name')</label>
                                <input id="firstname" placeholder="@lang('base.first_name')" name="firstname"
                                       type="text"
                                       value="{{$profileUser->firstname}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'title'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">@lang('base.last_name')</label>
                                <input id="lastname" placeholder="@lang('base.last_name')" name="lastname" type="text"
                                       value="{{$profileUser->lastname}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'title'])@endcomponent
                            </div>
                        </div>

                        @role('ambassador|super admin|leading teacher')
                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">Leading Teacher Tag</label>
                                <input id="tag"
                                       placeholder="your Leading Teacher Tag or create a new one [Country Code-Last Name-Three random digits] for example: BE-Andronikidis-005"
                                       name="tag" type="text"
                                       value="{{$profileUser->tag}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'twitter'])@endcomponent
                            </div>
                        </div>


                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">Twitter</label>
                                <input id="twitter" placeholder="Twitter" name="twitter" type="text"
                                       value="{{$profileUser->twitter}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'twitter'])@endcomponent
                            </div>
                        </div>

                        @endrole


                        @role('ambassador|super admin')
                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">@lang('base.your_website')</label>
                                <input id="website" placeholder="@lang('base.your_website')" name="website" type="text"
                                       value="{{$profileUser->website}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'website'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field align-flex-start">
                                <label for="id_description">@lang('base.biography')</label>
                                <textarea cols="40" id="bio" name="bio"
                                          placeholder="@lang('base.biography')"
                                          rows="10">{{$profileUser->bio}}</textarea>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'bio'])@endcomponent
                            </div>
                        </div>
                        @endrole

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_country">* @lang('event.country')</label>
                                <select id="id_country" name="country_iso" class="codeweek-input-select">
                                    <option value=""></option>
                                    @foreach ($active_countries as $country)
                                        <option value="{{$country->iso}}" {{optional($profileUser->country)->iso == $country->iso ? 'selected' : ''}}>@lang('countries.'. $country->name)</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'country'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="receive_emails">* @lang('base.receive emails')</label>

                                <select id="receive_emails" name="receive_emails" class="codeweek-input-select">
                                    <option value=1 {{$profileUser->receive_emails === 1 ? 'selected' : ''}}>@lang('search.last_year_events.yes')</option>
                                    <option value=0 {{$profileUser->receive_emails !== 1 ? 'selected' : ''}}>@lang('search.last_year_events.no')</option>

                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'country'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-privacy">
                            <label>
                                <input id="checkPrivacy" name="privacy"
                                       type="checkbox" {{ $profileUser->privacy === 1 ? 'checked="checked"' : '' }}>
                                @lang('event.privacy')
                                <a href="/privacy" target="_blank" rel="noreferer noopener">
                                    <img src="/images/external-link.svg" width="16" class="static-image">
                                </a>
                            </label>
                            @component('components.validation-errors', ['field'=>'privacy'])
                            @endcomponent
                        </div>


                        <div class="codeweek-form-button-container">
                            <div class="codeweek-button">
                                <input type="submit" value="@lang('base.update')">
                            </div>
                            
                        </div>

                    </div>

                </form>

                

        </section>

    </section>

@endsection
