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

        <section id="challenge">
            Challenge
        </section>

    </section>

@endsection
