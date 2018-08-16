@extends('layout.base')

@section('content')

    <section>


        <div class="container">


            <div class="content-wrap nopadding">


                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>@lang('about.title')</h1>
                        <span></span>
                    </div>


                    <p>
                        @lang('about.paragraphs.1-1')
                        <strong>@lang('about.paragraphs.1-2')</strong>.
                    </p>

                    <p>
                        @lang('about.paragraphs.2')
                    </p>

                    <p>
                        @lang('about.paragraphs.3-1')
                        <a href="/ambassadors">@lang('about.paragraphs.3-2')</a>
                        @lang('about.paragraphs.3-3')
                        <a href="http://codeweek.eu">codeweek.eu</a>
                        @lang('about.map').
                    </p>

                    <p>
                        @lang('about.paragraphs.4-1')
                        <a href="/events">@lang('about.map')</a>
                        @lang('about.or')
                        <a href="mailto:info@codeweek.eu">@lang('about.volunteer')</a>
                        @lang('about.paragraphs.4-2')
                    </p>

                    <p>
                        @lang('about.paragraphs.5-1')
                        <a href="http://ec.europa.eu/priorities/digital-single-market/">@lang('about.paragraphs.5-2')</a>
                        @lang('about.paragraphs.5-3')
                        <a href="http://europa.eu/rapid/press-release_IP-16-2039_en.htm">@lang('about.paragraphs.5-4')</a>
                        @lang('about.paragraphs.5-5')
                        <a href="https://ec.europa.eu/digital-single-market/en/digital-skills-jobs-coalition">@lang('about.paragraphs.5-6')</a>
                        @lang('about.paragraphs.5-7')
                        <a href="https://ec.europa.eu/digital-single-market/en/national-local-coalitions">@lang('about.paragraphs.5-8')</a>
                        @lang('about.paragraphs.5-9')
                    </p>

                    <p>
                        @lang('about.paragraphs.6')
                    </p>

                    <blockquote>
                        <p>
                            @lang('about.paragraphs.7')
                        </p>
                    </blockquote>


                    <h2>@lang('about.why_coding.title')</h2>

                    <p>@lang('about.why_coding.paragraphs.1')</p>
                    <p>@lang('about.why_coding.paragraphs.2')</p>
                    <p>@lang('about.why_coding.paragraphs.3')</p>
                    <p>@lang('about.why_coding.paragraphs.4')</p>
                    <p>
                        @lang('about.why_coding.paragraphs.5-1')
                        <strong>@lang('about.why_coding.paragraphs.5-2')</strong>
                        ?
                    </p>

                    <p>
                        @lang('about.why_coding.paragraphs.6-1')
                        <a href="/guide">@lang('about.why_coding.paragraphs.6-2')</a>
                        @lang('about.why_coding.paragraphs.6-3')
                        <a href="/ambassadors">@lang('about.why_coding.paragraphs.6-4')</a>
                        @lang('about.why_coding.paragraphs.6-5')
                    </p>


                    <h2>@lang('about.code_week_in_numbers.title')</h2>

                    <div class="content-wrap">
                        <div class="container clearfix">
                            <div class="col_half" id="PeopleChart" style="opacity: 0;">
                                <h3 class="center">@lang('about.code_week_in_numbers.people')</h3>
                                <canvas id="PeopleChartCanvas" width="547" height="300"></canvas>
                            </div>
                            <div class="col_half col_last" id="EventsChart" style="opacity: 0;">
                                <h3 class="center">@lang('about.code_week_in_numbers.coding_events')</h3>
                                <canvas id="EventsChartCanvas" width="547" height="300"></canvas>
                            </div>
                        </div>
                        <div class="container clearfix">
                            <h3 class="center">@lang('about.code_week_in_numbers.countries')</h3>
                            <ul class="list-group col_half">
                                <li class="list-group-item">
                                    <span class="badge">50</span>
                                    <strong>2016 - </strong>@lang('about.code_week_in_numbers.2015-2016')
                                </li>
                                <li class="list-group-item">
                                    <span class="badge">46</span>
                                    <strong>2015 - </strong>@lang('about.code_week_in_numbers.2015-2016')
                                </li>
                                <li class="list-group-item">
                                    <span class="badge">36</span>
                                    <strong>2014 - </strong>@lang('about.code_week_in_numbers.2014')
                                </li>
                                <li class="list-group-item">
                                    <span class="badge">26</span>
                                    <strong>2013 - </strong>@lang('about.code_week_in_numbers.2013')
                                </li>
                            </ul>

                        </div>
                    </div>

                    <h2>@lang('about.in_the_last_edition.title')</h2>

                    <div class="container clearfix">

                        <p>
                            <span>
                                @lang('about.in_the_last_edition.paragraphs.1')
                                <br>
                                @lang('about.in_the_last_edition.paragraphs.2')
                            </span>
                        </p>

                        <div class="container clearfix">
                            <div class="col_one_fourth nobottommargin center-content" data-animate="bounceIn">
                                <i class="i-plain i-xlarge divcenter nobottommargin icon-line-flag"></i>
                                <div class="counter counter-lined"><span data-from="1" data-to="52"
                                                                         data-refresh-interval="5" data-speed="2000"></span>
                                </div>
                                <h5>@lang('about.in_the_last_edition.countries')</h5>
                            </div>

                            <div class="col_one_fourth nobottommargin center-content" data-animate="bounceIn" data-delay="200">
                                <i class="i-plain i-xlarge divcenter nobottommargin icon-location"></i>
                                <div class="counter counter-lined"><span data-from="692" data-to="788"
                                                                         data-refresh-interval="10"
                                                                         data-speed="2500"></span></div>
                                <h5>@lang('about.in_the_last_edition.codeweek4all')</h5>
                            </div>

                            <div class="col_one_fourth nobottommargin center-content" data-animate="bounceIn" data-delay="400">
                                <i class="i-plain i-xlarge divcenter nobottommargin icon-calendar2"></i>
                                <div class="counter counter-lined"><span data-from="23043" data-to="25089"
                                                                         data-refresh-interval="100"
                                                                         data-speed="2500"></span></div>
                                <h5>@lang('about.in_the_last_edition.events')</h5>
                            </div>

                            <div class="col_one_fourth nobottommargin col_last center-content" data-animate="bounceIn"
                                 data-delay="600">
                                <i class="i-plain i-xlarge divcenter nobottommargin icon-group"></i>
                                <div class="counter counter-lined"><span data-from="968537" data-to="1099394"
                                                                         data-refresh-interval="100"
                                                                         data-speed="3000"></span>+
                                </div>
                                <h5>@lang('about.in_the_last_edition.participants')</h5>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


@endsection

@push('scripts')
    <script type="text/javascript">
        $(function($){



            var peopleChartData = {
                labels: ["2013", "2014", "2015", "2016"],
                datasets: [
                    {
                        fillColor: "rgba(60, 161, 206, 0.61)",
                        strokeColor: "rgba(220,220,220,1)",
                        data: [10000, 150000, 570000, 968000]
                    }
                ]

            };

            var EventsChartData = {
                labels: ["2013", "2014", "2015", "2016"],
                datasets: [
                    {
                        fillColor: "rgba(214, 141, 24, 0.71)",
                        strokeColor: "rgba(220,220,220,1)",
                        data: [3000, 4200, 7600, 23000]
                    }
                ]

            };

            var globalGraphSettings = {animation: Modernizr.canvas};


            function showBarChart() {
                var ctx = document.getElementById("PeopleChartCanvas").getContext("2d");
                new Chart(ctx).Bar(peopleChartData, globalGraphSettings);
                var ctx2 = document.getElementById("EventsChartCanvas").getContext("2d");
                new Chart(ctx2).Bar(EventsChartData, globalGraphSettings);
            }


            $('#PeopleChart').appear(function () {
                $(this).css({opacity: 1});
                setTimeout(showBarChart, 300);
            }, {accX: 0, accY: -155}, 'easeInCubic');
            $('#EventsChart').appear(function () {
                $(this).css({opacity: 1});
                setTimeout(showBarChart, 300);
            }, {accX: 0, accY: -155}, 'easeInCubic');


        });

    </script>
@endpush