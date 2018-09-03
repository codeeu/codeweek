@extends('layout.base')

@section('content')

    <section>


        <div class="container">


            <div class="content-wrap breathe">


                <div class="container clearfix">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>@lang('guide.title')</h1>
                        <div>
                            <a href="/add" target="_blank" class="btn btn-xl mt-8">@lang('guide.register_button')</a>
                        </div>
                    </div>


                </div>


                <h4>
                    <a href="https://s3-eu-west-1.amazonaws.com/codeweek-s3/docs/codeeu_toolkit.pdf" alt="#codeEU Toolkit">
                        <i class="fa fa-download"></i>
                        @lang('guide.download_guide_button')
                    </a>
                </h4>
                <h2>@lang('guide.code_eu_toolkit')</h2>

                <h2>@lang('guide.what.title')</h2>
                <p>
                    @lang('guide.what.paragraphs.1-1')
                    <a href="/ambassadors">@lang('guide.what.paragraphs.1-2')</a>.
                    @lang('guide.what.paragraphs.1-3')
                    <a href="/">codeweek.eu</a>
                    @lang('guide.what.paragraphs.1-4')
                </p>

                <h2>@lang('guide.who.title')</h2>
                <p>@lang('guide.who.content')</p>
                <ul>
                    <li><strong>@lang('guide.who.points.1-1')</strong> @lang('guide.who.points.1-2')</li>
                    <li><strong>@lang('guide.who.points.2-1')</strong> @lang('guide.who.points.2-2')</li>
                    <li><strong>@lang('guide.who.points.3-1')</strong> @lang('guide.who.points.3-2')</li>
                    <li><strong>@lang('guide.who.points.4-1')</strong> @lang('guide.who.points.4-2')</li>
                    <li><strong>@lang('guide.who.points.5-1')</strong> @lang('guide.who.points.5-2')</li>
                    <li><strong>@lang('guide.who.points.6-1')</strong> @lang('guide.who.points.6-2')</li>
                    <li><strong>@lang('guide.who.points.7-1')</strong> @lang('guide.who.points.7-2')</li>
                </ul>

                <h2>@lang('guide.what_do_you_need.title')</h2>
                <ul>
                    <li>
                        <strong>@lang('guide.what_do_you_need.points.1-1')</strong>
                        @lang('guide.what_do_you_need.points.1-2')
                    </li>
                    <li>
                        <strong>@lang('guide.what_do_you_need.points.2-1')</strong>
                        @lang('guide.what_do_you_need.points.2-2')
                    </li>
                    <li>
                        <strong>@lang('guide.what_do_you_need.points.3-1')</strong>
                        @lang('guide.what_do_you_need.points.3-2')
                    </li>
                    <li>
                        <strong>@lang('guide.what_do_you_need.points.4-1')</strong>
                        @lang('guide.what_do_you_need.points.4-2')
                    </li>
                    <li>
                        <strong>@lang('guide.what_do_you_need.points.5-1')</strong>
                        @lang('guide.what_do_you_need.points.5-2')
                    </li>
                    <li>
                        <strong>@lang('guide.what_do_you_need.points.6-1')</strong>
                        @lang('guide.what_do_you_need.points.6-2')
                        <a href="http://codeweek.it/codyroby/">Cody-Roby</a>
                        @lang('guide.what_do_you_need.points.6-3')
                    </li>
                    <li>
                        <strong>@lang('guide.what_do_you_need.points.7-1')</strong>
                        @lang('guide.what_do_you_need.points.7-2')
                        <a href="http://codeweek.eu/resources/">@lang('guide.what_do_you_need.points.7-3')</a>
                        @lang('guide.what_do_you_need.points.7-4')
                    </li>
                    <li>
                        <strong>@lang('guide.what_do_you_need.points.8-1')</strong>
                        @lang('guide.what_do_you_need.points.8-2')
                    </li>
                    <li>
                        <a href="/add">@lang('guide.what_do_you_need.points.9')</a>!
                    </li>
                </ul>


                <h2>@lang('guide.how.title')</h2>
                <ul>
                    <li>
                        @lang('guide.how.points.1-1')
                        <strong>@lang('guide.how.points.1-2')</strong>
                        @lang('guide.how.points.1-3')
                    </li>
                    <li>
                        @lang('guide.how.points.2-1')
                        <strong>@lang('guide.how.points.2-2')</strong>
                        @lang('guide.how.points.2-3')
                        <a href="http://codeweek.eu/resources/">@lang('guide.how.points.2-4')</a>.
                    </li>
                    <li>
                        <strong>@lang('guide.how.points.3-1')</strong>
                        @lang('guide.how.points.3-2')
                    </li>
                    <li>
                        <strong>@lang('guide.how.points.4-1')</strong>
                        @lang('guide.how.points.4-2')
                    </li>
                    <li>
                        @lang('guide.how.points.5-1')
                        <strong>@lang('guide.how.points.5-2')</strong>
                        @lang('guide.how.points.5-3')
                    </li>
                    <li>
                        <strong>@lang('guide.how.points.6-1')</strong>
                        @lang('guide.how.points.6-2')
                    </li>
                    <li>
                        @lang('guide.how.points.7-1')
                        <a href="/add">@lang('guide.how.points.7-2')</a>!
                    </li>
                </ul>


                <h2>@lang('guide.promotion_material.title')</h2>
                <p>@lang('guide.promotion_material.content1')</p>
                <ul>
                    <li>
                        <a href="https://ec.europa.eu/digital-single-market/en/news/eu-code-week-celebrating-its-5th-birthday-7-22-october-get-ready-join-and-learn-how-create-code">
                            @lang('guide.promotion_material.points.1')
                        </a>
                    </li>
                    <li>
                        <a href="https://ec.europa.eu/digital-single-market/en/news/million-coded-in-record-2016-EU-code-week">
                            @lang('guide.promotion_material.points.2')
                        </a>
                    </li>
                    <li>
                        <a href="https://ec.europa.eu/digital-single-market/en/news/save-date-eu-code-week-10-18-october-2015-bringing-ideas-life-codeeu">
                            @lang('guide.promotion_material.points.3')
                        </a>
                    </li>
                </ul>
                <p>
                    @lang('guide.promotion_material.content2')
                    <a href="https://github.com/codeeu/codeeu-resources/tree/master/Logo - generic">@lang('guide.promotion_material.content3')</a>
                    @lang('guide.promotion_material.content4')
                </p>


                <h2>@lang('guide.questions.title')</h2>
                <p>
                    @lang('guide.questions.part1')
                    <a href="/ambassadors">@lang('guide.questions.part2')</a>
                    @lang('guide.questions.part3')
                </p>


            </div>
        </div>
    </section>

@endsection