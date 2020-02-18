@extends('layout.base')

@section('hackathons.header')
    @include('hackathons.before.header')
@endsection

@section('content')

    <section id="codeweek-hackathons-before-page" class="codeweek-page ireland">

        <section class="codeweek-banner hackathons">
            <div class="image">
                <div class="title">
                    <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                    <h2>@lang('hackathons.subtitle')</h2>
                </div>
                <div class="paragraph">
                    <p>Do you dream of creating the next big app or inventing a cool IT solution to a problem in your school, town, or region? Maybe you want to be an entrepreneur or you have a killer idea to pitch to the world, but you don’t know where to start. The EU Code Week Hackathon is designed for passionate young people like you. This European journey will fuel your curiosity, inspire your creativity, encourage your entrepreneurial spirit, and most importantly, help to bring your ideas to life.</p>
                </div>
            </div>
        </section>

        <section class="questions">
            <div class="expect">
                <h1>What to expect?</h1>
                <ul>
                    <li>Two-day hacking marathon</li>
                    <li>Expert coaching</li>
                    <li>Skills workshops</li>
                    <li>Fun activities</li>
                    <li>Prizes and glory</li>
                </ul>
            </div>
            <div class="bring">
                <h1>What to bring?</h1>
                <ul>
                    <li>Laptops, connectors, chargers… the stuff you need to code</li>
                    <li>Sleeping bags, mats, drinking bottles, toiletries… teddy bears</li>
                    <li>Enthusiasm, curiosity and go-getting attitude</li>
                </ul>
            </div>
            <div class="provide">
                <h1>...We provide the rest!</h1>
            </div>
        </section>

        <section class="registration">
            <div class="register-wrapper">
                <div class="register">
                    <div class="title">EU Code Week Hackathon</div>
                    <div class="city">IRELAND, DUBLIN</div>
                    <div class="date">17-18 April 2020</div>
                    <a href="#" class="codeweek-action-link-button">REGISTER</a>
                </div>
            </div>
        </section>

        <section id="challenge">
            <img src="/images/hackathons/challenge.png">
            <div class="text">
                <div class="challenge-text">
                    <h1>The challenges</h1>
                    <p>The idea of the EU Code Week Hackathon is to show how concrete solutions come to life with the help of young people’s creativity, enthusiasm, fresh ideas and coding skills. ‘Concrete’ means solving real problems – things that affect you, your school, community, city or specific challenges in your area.</p>
                    <a href="#" class="codeweek-action-link-button">VOTE</a>
                </div>
            </div>
        </section>

        <section id="programme">
            <h1>Programme</h1>
            <p>Secondary students aged 16-19 compete in teams to solve a ‘city challenge’ selected from proposals submitted ahead of the event. After two days of ‘non-stop’ hacking, each team then pitches their solution to an Expert Jury. The successful team in each local hackathon wins a trip to Brussels including a short and intense entrepreneurial coaching session and the honour of pitching their work to tech experts, business leaders and EU policymakers on 12 October 2020.</p>
            <p>Hackers are going to need a break from the ‘coding’, so we provide plenty of refreshments to keep energy levels up. Mentors are also on hand to coach teams through the tough stages. We also organise fun activities and workshops to keep spirits high while teaching new skills like robotics and app building.</p>
        </section>

        <section id="pratical-info">
            <div id="map"></div>
            <div class="info">
                <h1>Practical Info</h1>
                <div class="info-details">
                    <h3>Date</h3>
                    <p>April 25-26, 2020</p>
                </div>
                <div class="info-details">
                    <h3>Address</h3>
                    <p>Name of the venue</p>
                    <p>Avenue de Beaulieu 25</p>
                    <p>Auderghem - Bruxelles, Belgique</p>
                </div>
                <div class="get-directions">
                    <img src="/images/tick.svg" class="static-image">
                    <a href="#">GET DIRECTIONS</a>
                </div>
            </div>
        </section>

        <section id="jury-mentors">
            <h1>Jury & Mentors</h1>
            <p>
                Imagine being in a room full of designers, developers, creators, coders and business mentors, all with the same curiosity and drive as you. EU Code Week Hackathon [City] brings together leading figures from the worlds of business, IT, venture capital, education, as well as local, national and EU leaders, influencers and coaches to guide and support you and your team during this intensive marathon. A select number of Jury members is also chosen to decide the final winning team, according to relevant guidelines and competition rules.
            </p>
            <div class="jury-grid">
                <div class="item">
                    <img src="https://codeweek-s3.s3.amazonaws.com/avatars/34/bruno ferreira.jpg">
                    <h2>First Lastname</h2>
                    <h3>Function,</h3>
                    <h3>INSTITUTION</h3>
                </div>
                <div class="item">
                    <img src="https://codeweek-s3.s3.amazonaws.com/avatars/156389/aż.jpg">
                    <h2>First Lastname</h2>
                    <h3>Function,</h3>
                    <h3>INSTITUTION</h3>
                </div>
                <div class="item">
                    <img src="https://codeweek-s3.s3.amazonaws.com/avatars/JankoRadigovic/janko-radigovic.jpg">
                    <h2>First Lastname</h2>
                    <h3>Function,</h3>
                    <h3>INSTITUTION</h3>
                </div>
                <div class="item">
                    <img src="https://codeweek-s3.s3.amazonaws.com/avatars/turtlestitch/cam_bearb2_07_2016sm.jpg">
                    <h2>First Lastname</h2>
                    <h3>Function,</h3>
                    <h3>INSTITUTION</h3>
                </div>
            </div>
        </section>

        <section id="side-events">
            <div class="left">
                <h1>Side events</h1>
                <p>Are you a young person, a teacher or parent who doesn’t know anything about coding? Sign up to our side events and discover the thrill of coding, innovation, entrepreneurship and other skills vital to empowering people in a digital world. Our Side events will include several different workshops. They are free of charge you just have to sign up here. Come and learn more</p>
                <a href="" class="codeweek-action-link-button">REGISTER TO ONE OF WORKSHOPS HERE</a>
            </div>
            <img src="/images/hackathons/side_events.png">
        </section>

        <section id="about-codeweek">
            <div class="text">
                <h1>About CODEWEEK.EU</h1>
                <p>EU Code Week (#CodeWeek) is a grassroots movement run by volunteers to promote digital literacy through activities linked to coding and computer science. It inspires and engages people to explore new ideas and innovate for the future. Activities for EU Code Week take place all over Europe between 10 and 25 October 2020. To raise its profile throughout the community, broaden its appeal and provide tangible outcomes, the EU Code Week Hackathon series has been created and co-organised by the European Commission and local EU Code Week Ambassadors. The initiative is financed by the European Parliament.</p>
            </div>
            <img src="/images/hackathons/about_codeweek.svg" class="static-image">
            <a href="https://codeweek.eu/about" class="codeweek-action-link-button">DISCOVER MORE</a>
        </section>

        <input type="hidden" name="geoposition" id="geoposition" value="50.8141898,4.4099089">
        <input type="hidden" name="geoposition_marker" id="geoposition_marker" value="true">

    </section>

@endsection

@push('scripts')

    <script defer src="https://europa.eu/webtools/load.js" type="text/javascript"></script>
    <link href="{{asset('css/MarkerCluster.css')}}" media="screen" rel="stylesheet"/>
    <link href="{{asset('css/MarkerCluster.Default.css')}}" media="screen" rel="stylesheet"/>
    <script type="application/json">
        {
            "service" : "map",
            "version" : "2.0",
            "renderTo" : "map",
            "custom": ["/js/hideMenuMap.js","/js/leaflet.markercluster.js"]
        }

    </script>
@endpush
