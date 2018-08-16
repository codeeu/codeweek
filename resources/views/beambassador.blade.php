@extends('layout.base')

@section('content')
    <section>

        <div class="container">

            <div class="content-wrap nopadding">

                <div class="container clearfix ">


                    <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
                        <h1>@lang('beambassador.title')</h1>
                        <span></span>
                    </div>


                    <p>
                        <a href="/ambassadors">@lang('beambassador.paragraphs.1-1')</a>
                        @lang('beambassador.paragraphs.1-2')
                        <a href="/about">@lang('beambassador.paragraphs.1-3')</a>
                        @lang('beambassador.paragraphs.1-4')
                    </p>

                    <p><strong>@lang('beambassador.ambassadors_should_do.title')</strong></p>
                    <ul>
                        <li>@lang('beambassador.ambassadors_should_do.1')</li>
                        <li>@lang('beambassador.ambassadors_should_do.2')</li>
                        <li>@lang('beambassador.ambassadors_should_do.3')</li>
                        <li>@lang('beambassador.ambassadors_should_do.4')</li>
                        <li>@lang('beambassador.ambassadors_should_do.5')</li>
                        <li>@lang('beambassador.ambassadors_should_do.6')</li>
                        <li>@lang('beambassador.ambassadors_should_do.7')</li>
                        <li>@lang('beambassador.ambassadors_should_do.8')</li>
                        <li>@lang('beambassador.ambassadors_should_do.9')</li>
                    </ul>

                    <p><strong>@lang('beambassador.ambassadors_return.title')</strong></p>
                    <ul>
                        <li>@lang('beambassador.ambassadors_return.1')</li>
                        <li>@lang('beambassador.ambassadors_return.2')</li>
                        <li>@lang('beambassador.ambassadors_return.3')</li>
                        <li>@lang('beambassador.ambassadors_return.4')</li>
                        <li>@lang('beambassador.ambassadors_return.5')</li>
                    </ul>
                    <hr/>
                    <p><strong>@lang('beambassador.details.title')</strong></p>
                    <ul>
                        <li>
                            @lang('beambassador.details.points.1-1')
                            <strong>@lang('beambassador.details.points.1-2')</strong>
                            @lang('beambassador.details.points.1-3')
                        </li>
                        <li>
                            @lang('beambassador.details.points.2-1')
                            <strong>@lang('beambassador.details.points.2-2')</strong>
                            @lang('beambassador.details.points.2-3')
                            <a href="/guide">@lang('beambassador.details.points.2-4')</a>
                            @lang('beambassador.details.points.2-5')
                            <a href="https://github.com/codeeu/codeeu-resources">@lang('beambassador.details.points.2-6')</a>
                        </li>
                        <li>
                            @lang('beambassador.details.points.3-1')
                            <strong>@lang('beambassador.details.points.3-2')</strong>
                            @lang('beambassador.details.points.3-3')
                            <strong>@lang('beambassador.details.points.3-4')</strong>
                            @lang('beambassador.details.points.3-5')
                        </li>
                        <li>
                            @lang('beambassador.details.points.4-1')
                            <a href="http://events.codeweek.eu">http://events.codeweek.eu</a>
                            @lang('beambassador.details.points.4-2')
                            <strong>@lang('beambassador.details.points.4-3')</strong>
                        </li>
                        <li>
                            @lang('beambassador.details.points.5-1')
                            <strong>@lang('beambassador.details.points.5-2')</strong>
                        </li>
                        <li>
                            <strong>@lang('beambassador.details.points.6-1')</strong>
                            @lang('beambassador.details.points.6-2')
                            <a href="http://blog.codeweek.eu">@lang('beambassador.details.points.6-3')</a>
                            @lang('beambassador.details.points.6-4')
                        </li>
                        <li>
                            @lang('beambassador.details.points.7-1')
                            <strong>@lang('beambassador.details.points.7-2')</strong>.
                        </li>
                        <li>
                            @lang('beambassador.details.points.8-1')
                            <strong>@lang('beambassador.details.points.8-2')</strong>
                        </li>
                    </ul>

                    <p>
                        @lang('beambassador.details.points.9-1')
                        <a href="/ambassadors">@lang('beambassador.details.points.9-2')</a>.
                        @lang('beambassador.details.points.9-3')
                        <a href='mailto:info@codeweek.eu?subject=EU Code Week Ambassador'/>info@codeweek.eu</a>.
                    </p>



                </div>

            </div>

        </div>

    </section>

@endsection