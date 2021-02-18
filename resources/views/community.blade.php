@extends('layout.base')

@section('content')

    <section id="codeweek-ambassadors-page" class="codeweek-page">

        <section class="codeweek-banner ambassadors">
            <div class="text">
                <h2>#CodeWeek</h2>
                <h1>@lang('ambassador.community')</h1>
            </div>
            <div class="image">
                <img src="images/banner_ambassadors.svg" class="static-image">
            </div>
        </section>

        <section class="codeweek-content-wrapper">
            <p style="line-height: 30px;">EU Code Week thrives thanks to a vast, international community of volunteers. In this page you can meet the members that are active in your country.
                EU Code Week’s backbone is the Ambassadors, the Leading teachers and representatives of ministries of education in the EU and Western Balkans countries – the “Edu coordinators”.
            <h3>Find out more about your local community by selecting your country:</h3>

            <section class="codeweek-searchbox">
                <form method="get" action="/ambassadors" enctype="multipart/form-data">
                    <select id="id_country" name="country_iso" onchange="this.form.submit()" class="codeweek-input-select">
                        @foreach ($countries as $country)
                            <option value="{{$country->iso}}" {{app('request')->input('country_iso') == $country->iso ? 'selected' : ''}}>{{$country->translation}}</option>
                        @endforeach
                    </select>
                </form>
            </section>
            @if(app('request')->input('country_iso'))
                @foreach ($countries as $country)
                    @if($country->iso === app('request')->input('country_iso'))
                        {{--<h1>
                            @lang('countries.'.$country->name)
                        </h1>--}}

                        <div class="codeweek-tools">

                            @if($country->facebook)
                                <a href="{{$country->facebook}}" class="codeweek-blank-button" target="_blank">
                                    @lang('ambassador.visit_the') <span>@lang('ambassador.local_facebook_page')</span>
                                </a>
                            @endif

                            @if($country->website)
                                <a href="{{$country->website}}" class="codeweek-blank-button" target="_blank">
                                    @lang('ambassador.visit_the') <span>@lang('ambassador.local_website')</span>
                                </a>
                            @endif

                        </div>
                    @endif
                @endforeach
            @endif

            <section class="codeweek-blue-box" >
                <section class="community_type_section">
                    <h2 class="subtitle">Ambassadors</h2>
                    <div class="community_type">
                        <div class="text">
                            <p>
                                EU Code Week Ambassadors are the main point of contact for Code Week in each
                                country and help spread the vision of Code Week locally. The Ambassadors connect
                                people, companies and communities interested in supporting EU Code Week. They
                                encourage organisers to register coding activities on the Code Week map, and
                                promote the overall participation in EU Code Week. Ambassadors also review and
                                approve activities in their country. Ambassadors also work with their peers in other
                                countries and meet regularly to discuss how to further develop the initiative.
                            </p>
                        </div>
                        <div class="image">
                            <img src="/images/ambassadors.png">
                        </div>
                    </div>
                </section>

                <div class="codeweek-grid-layout">
                    @forelse ($ambassadors as $ambassador)
                        <div class="codeweek-card">
                            <div class="card-avatar">
                                <img src="{{$ambassador->avatar}}" class="card-image-avatar">
                            </div>
                            <div class="card-content">
                                <h5 class="card-title">{{ $ambassador->fullName() }}</h5>
                                <p class="card-description">{{ $ambassador->bio }}</p>
                            </div>
                            <div class="card-actions">
                                {{--Ambassador email--}}
                                @if($ambassador->email_display)
                                    <a href="mailto:{{ $ambassador->email_display }}"
                                       class="codeweek-svg-button">
                                        <img src="/images/mail.svg" alt="Twitter">
                                    </a>
                                @elseif($ambassador->email)
                                    <a href="mailto:{{ $ambassador->email }}"
                                       class="codeweek-svg-button">
                                        <img src="/images/mail.svg" alt="Twitter">
                                    </a>
                                @endif
                                {{--Ambassador twitter--}}
                                @if($ambassador->twitter)
                                    <a href="http://twitter.com/{{ $ambassador->twitter }}"
                                       target="_blank" class="codeweek-svg-button">
                                        <img src="/images/twitter.svg" alt="Twitter">
                                    </a>
                                @endif
                                {{--Ambassador website--}}
                                @if($ambassador->website)
                                    <a href="{{ $ambassador->website }}"
                                       target="_blank" class="codeweek-svg-button">
                                        <img src="/images/globe.svg" alt="Twitter">
                                    </a>
                                @endif
                            </div>
                        </div>
                    @empty
                        @lang('ambassador.no_ambassadors') :(<br/>
                    @endforelse
                </div>

                <section class="community_type_section">
                    <h2 class="subtitle">Leading teachers</h2>
                    <div class="community_type">
                        <div class="text">
                            <p>
                                Leading teachers is an active community of more than 450 educators from across
                                Europe. They help connect schools, teachers and students interested in
                                participating to Code Week and encourage them to organise activities and register
                                them on the Code Week map. The Leading teachers hold professional development
                                webinars in their language and are a reference point for other teachers in the
                                country but also in Europe. They also promote the initiative locally.
                            </p>
                        </div>
                        <div class="image">
                            <img src="/images/leading_teachers.png">
                        </div>
                    </div>
                </section>
                <section class="community_type_section">
                    <h2 class="subtitle">Edu coordinators</h2>
                    <div class="community_type">
                        <div class="text">
                            <p>
                                EU Code Week Edu coordinators are correspondents in Ministries of Education or
                                other educational authorities and organisations participating in EU Code Week. Edu
                                coordinators strengthen the foundations of the initiative by supporting teachers
                                and schools nation-wide. This includes communication with schools who already
                                participate in EU Code Week to learn about their best practices and share
                                experience. Edu coordinators also support schools that want to participate in the
                                initiative, by providing available resources, learning material and opportunities
                                within the community.
                            </p>
                        </div>
                        <div class="image">
                            <img src="/images/edu_coordinators.png">
                        </div>
                    </div>
                </section>
                <section class="community_type_section">
                    <h2 class="subtitle">Volunteer for EU Code Week</h2>
                    <div class="community_type">
                        <div class="text">
                            <p>
                                You do not need to take on an official role in the EU Code Week community to be
                                part of the movement. Everyone can organise activities to teach and inspire people
                                to code, do robotics, tinker with hardware, 3D-print etc. and pin their activity
                                on the map. However, if you want to volunteer your time to promote coding and believe in
                                the vision and values of EU Code Week, you could potentially become a leading
                                teacher or an ambassador.
                            <p>
                                If you are an educator passionate about teaching and learning how to code as much
                                as we are, you can ﬁnd out more about the role and benefits of Leading teachers here.
                                Then you can apply to become a Leading Teacher by filling this online application form.
                                Please note that the number of Leading Teachers per country is fixed which means that applications are open only for some specific countries at a time.
                            </p>
                            <p>
                                If you want to promote coding in your country, check out the
                                responsibilities of Ambassadors and take a quick look at the list of EU Code Week Ambassadors.
                                If there are Ambassadors in your country, please get in touch directly with them and
                                see how you can best support the initiative. If there is no one in your country, you
                                can reach out at <a target="_blank" href="mailto:info@codeweek.eu">info@codeweek.eu</a>.
                            </p>
                        </div>
                        <div class="image">
                            <img src="/images/volunteers.png">
                        </div>
                    </div>
                </section>
            </section>
        </section>






    </section>

@endsection