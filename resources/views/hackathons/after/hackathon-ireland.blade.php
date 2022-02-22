@extends('layout.base')

<x-tailwind></x-tailwind>

@section('hackathons.header')
    @include('hackathons.after.header', ["enabled_language" => "en"])
@endsection

@section('content')

    <section id="codeweek-hackathons-before-page" class="codeweek-page ireland">


        <section class="codeweek-banner hackathon h-auto">
            <div class="image">
                <div class="text">
                    <div class="text-inside">
                        <h1 style="font-weight: bold;">@lang('hackathons.title')</h1>
                        <h2>@lang('hackathon-ireland.subtitle')</h2>
                    </div>
                </div>
                <div class="paragraph">
                    <p>@lang('hackathon-ireland.sections.1.content.0')<br/>
                </div>
                <img src="/images/hackathons/banner_hackathon_before.svg" class="static-image desktop">
            </div>
        </section>

        <section class="codeweek-content-wrapper">

            <div>
                @lang('hackathon-ireland.sections.1.content.1')
                @lang('hackathon-ireland.sections.1.content.2')<br/><br/>
                @lang('hackathon-ireland.sections.1.content.3')
            </div>

        </section>


        <section id="programme" style="line-height: 1.7em;" class="mt-10">


            <h1>@lang('hackathon-ireland.sections.9.title')</h1>

            @lang('hackathon-ireland.sections.9.content.0')<br/>
            @lang('hackathon-ireland.sections.9.content.1')


            <br/><br/>
            <h1>@lang('hackathon-ireland.sections.8.title')</h1>
            @lang('hackathon-ireland.sections.8.content.0.0')
            <strong>@lang('hackathon-ireland.sections.8.content.0.1')</strong>
            <ol style="list-style-type: decimal;margin-left:40px; margin-bottom:10px">
                <li>@lang('hackathon-ireland.sections.8.content.1')</li>
                <li>@lang('hackathon-ireland.sections.8.content.2')</li>
                <li>@lang('hackathon-ireland.sections.8.content.3')</li>
            </ol>
            <div>
                @lang('hackathon-ireland.sections.8.content.4')<br/><br/>

                @lang('hackathon-ireland.sections.8.content.5')<br/><br/>
                @lang('hackathon-ireland.sections.8.content.6')<br/><br/>
                @lang('hackathon-ireland.sections.8.content.7')<br/><br/>

            </div>

            <div class="p-8 leading-6 bg-yellow-200 bg-opacity-25 mt-6">

                @lang('hackathon-ireland.sections.winners.0')<br/><br/>
                @lang('hackathon-ireland.sections.winners.1')

                <ul style="list-style-type: circle;margin-left:40px; margin-bottom:10px; font-weight: bolder;">

                    <li>Chain Gang</li>
                    <li>Dream Team</li>
                    <li>EOINIES</li>
                    <li>MICRO CHAT</li>
                    <li>SC-Babbage</li>


                </ul>

                @lang('hackathon-ireland.sections.winners.2')<br/><br/>
                @lang('hackathon-ireland.sections.winners.3')<br/><br/>


            </div>


        </section>


        <section id="jury-mentors">

            <h1>@lang('hackathon-ireland.sections.10.title')</h1>
            <p>
                @lang('hackathon-ireland.sections.10.content.0')
            </p>
            <div class="jury-grid">

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/_blank2.png')}}">
                    </div>
                    <h2 class="text-center">Anluan Dunne</h2>
                    <div class="text-sm">Anluan is a Client Success Specialist for Red Hat Ireland. He has a background
                        in Linux engineering but started his journey in technology on a Commodore 64.<br/>
                        With over 20 years of experience designing and supporting solutions, Anluan is a
                        results-focussed person who seeks out the best possible result for his clients.

                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/roisin-faherty.png')}}">
                    </div>
                    <h2 class="text-center">Roisin Faherty</h2>
                    <div class="text-sm">Róisín is a lecturer of computing in the Technological University Dublin,
                        Tallaght Campus. Róisín has over twenty years teaching experience at third level in Computing
                        across many different modules including Database, Analysis and Design and Software Development.
                        <br/>
                        Róisín worked as a Software Engineer and Team Lead in a Computer Based Training company for a
                        number of years before joining the teaching team at TU Dublin. <br/>
                        Róisín has a keen interest in Computer Science Education, delivering computing camps in primary
                        and secondary schools around Ireland, as well as being involved in the delivery of teacher
                        training programmes to promoting computer science to school teachers.
                    </div>
                </div>


                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/iseult-mangan.png')}}">
                    </div>
                    <h2 class="text-center">Iseult Mangan</h2>
                    <div class="text-sm">Iseult Mangan, primary school teaching principal in Co Mayo. I'm a Raspberry Pi
                        certified educator, Youth zone Wrangler for Mozfest and mentor with Teen Turn and Coder Dojo.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/florian-moss.png')}}">
                    </div>
                    <h2 class="text-center">Florian Moss</h2>
                    <div class="text-sm">Florian is a Solution Architect for Red Hat and has previously worked in
                        Ireland, Australia and Germany. He is working with businesses in Ireland to implement solutions
                        that will drive the next generation, all built by Open Source technology.<br/>
                        As a recent Computer Science graduate from Letterkenny Institue of Technology. Florian also has
                        a good understanding of what it takes to be successful in IT and what options are available in
                        Ireland.
                    </div>
                </div>




                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/_blank4.png')}}">
                    </div>
                    <h2 class="text-center">Murph</h2>
                    <div class="text-sm">Murph is Chief Architect for Red Hat Ireland; A tinkerer from a young age, he
                        has over 30 years of experience taking things apart and putting them back together in
                        interesting ways. <br/>
                        A full-stack enthusiast, he has interest and experience ranging from 8-bit breadboard computers
                        to open source game engines to JavaScript-based business apps for the web - with stops at every
                        tech along the way.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/amanda-jolliffe.png')}}">
                    </div>
                    <h2 class="text-center">Amanda Jolliffe</h2>
                    <div class="text-sm">Amanda Jolliffe leads Microsoft Ireland DreamSpace, a STEM Education venue for
                        school communities across Ireland. Amanda is a post-primary teacher by background and is
                        encouraged and inspired by her work with young people throughout her career.<br/>
                        She is excited about how this EU Code Week Hackathon will continue to showcase the incredible
                        potential of our young people to make a real difference.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/kevin-o-flannagain.png')}}">
                    </div>
                    <h2 class="text-center">Kevin O'Flannagain</h2>
                    <div class="text-sm">Kevin O'Flannagain graduated from UCD engineering in 2017 and has over three
                        years experience working with cutting edge hardware and software solutions in optical
                        engineering and robotics.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/matt-hanlon.png')}}">
                    </div>
                    <h2 class="text-center">Matt Hanlon</h2>
                    <div class="text-sm">I'm Matt Hanlon, a longtime software developer, coach, author, and dad. I was a
                        software engineer at Apple on various products and software you probably have in your home or in
                        your pocket.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/kieran-collins.png')}}">
                    </div>
                    <h2 class="text-center">Kieran Collins</h2>
                    <div class="text-sm">Dr Kieran Collins is an educator, researcher and applied performance scientist.
                        Kieran's education philosophy is based on the development of critical thinking, problem solving
                        and the application of logic with the aim of producing STEM leaders.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/nathan.png')}}">
                    </div>
                    <h2 class="text-center">Nathan Cahill</h2>
                    <div class="text-sm">Nathan is a software developer with a background in visual art, design and
                        photography. He holds a BA and MA from the National College of Art and Design and a Higher
                        Diploma in Computing from TU Dublin.
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/profiles/ireland/triona.png')}}">
                    </div>
                    <h2 class="text-center">Triona Reid</h2>
                    <div class="text-sm">Triona is a Social Worker, Community Worker and long-time Social Justice
                        Campaigner. She has spent much of her life working for NGOs and charities and campaigning for a
                        variety of causes including women’s rights, environmental conservation and housing. She is an
                        experienced community organiser specialising in work that aims to empower and amplify the voices
                        of underrepresented youth. Currently, Triona coordinates the ‘Inspiring the Future Ireland’
                        project. She is passionate about creating equality of opportunity for all young people, so that
                        they can achieve their full potential.
                    </div>
                </div>


            </div>
        </section>


        <section id="partners">
            <div>
                <h1>@lang('hackathon-ireland.misc.2')</h1>
            </div>

            <div class="partners-grid">


                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/google.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/imagilabs.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/microsoft.png')}}">
                    </div>
                </div>
            </div>
            <div class="partners-grid">
                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/redhat.png')}}">
                    </div>
                </div>

                <div class="item">
                    <div class="flex justify-center">
                        <img src="{{asset('/images/hackathons/partners/makeblock-makex.png')}}">
                    </div>
                </div>


            </div>
        </section>

        <section id="about-codeweek">
            <div class="text">
                <h1>@lang('hackathon-ireland.sections.12.title')</h1>
                <p>@lang('hackathon-ireland.sections.12.content.0') @lang('hackathon-ireland.sections.12.content.1') @lang('hackathon-ireland.sections.12.content.2')</p>
                <br/><br/>
                <p>@lang('hackathon-ireland.sections.12.content.3')
                    <b>@lang('hackathon-ireland.sections.12.content.4')</b> @lang('hackathon-ireland.sections.12.content.5')
                    <b>@lang('hackathon-ireland.sections.12.content.6')</b>
                    @lang('hackathon-ireland.sections.12.content.7')
                    <b>@lang('hackathon-ireland.sections.12.content.8')</b>
                </p><br/><br/>
            </div>
            <img src="/images/hackathons/about_codeweek.svg" class="static-image">
            <a target="_blank" href="https://codeweek.eu/about" rel="noreferer noopener"
               class="codeweek-action-link-button">@lang('hackathon-ireland.sections.12.content.9')</a>
        </section>

    </section>

@endsection

