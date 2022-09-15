@extends('layout.base')

@section('content')

    <section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">@lang('privacy-statement.title')</h1>

            <div style="margin-bottom: 6px"><span style="font-weight: bold;">@lang('privacy-statement.processing-operation.0'):</span> @lang('privacy-statement.processing-operation.1')
            </div>
            <div style="margin-bottom: 6px"><span style="font-weight: bold;">@lang('privacy-statement.data-controller.0'):</span> @lang('privacy-statement.data-controller.1')
            </div>
            <div style="margin-bottom: 6px"><span style="font-weight: bold;"> @lang('privacy-statement.record-reference'):</span>
                DPR-EC-09706.1
            </div>

            <h3 style="margin-top:10px">@lang('privacy-statement.table-of-contents')</h3>
            <ol style="margin-bottom:20px">
                <li><a href="#header-1">@lang('privacy-statement.1-intro.title')</a></li>
                <li style="margin-top:4px"><a href="#header-2">@lang('privacy-statement.2-why.title')</a></li>
                <li style="margin-top:4px"><a href="#header-3">@lang('privacy-statement.3-legal_process.title')</a></li>
                <li style="margin-top:4px"><a href="#header-4">@lang('privacy-statement.4-collect_data.title')</a></li>
                <li style="margin-top:4px"><a href="#header-5">@lang('privacy-statement.5-how_long.title')</a></li>
                <li style="margin-top:4px"><a href="#header-6">@lang('privacy-statement.6-protect_data.title')</a>
                </li>
                <li style="margin-top:4px"><a href="#header-7">@lang('privacy-statement.7-access_data.title')</a></li>
                <li style="margin-top:4px"><a href="#header-8">@lang('privacy-statement.8-rights.title')</a>
                </li>
                <li style="margin-top:4px"><a href="#header-9">@lang('privacy-statement.9-contact.title')</a></li>
                <li style="margin-top:4px"><a href="#header-10">@lang('privacy-statement.10-detailed-info.title')</a></li>
            </ol>


            <h3 id="header-1"><strong>1. @lang('privacy-statement.1-intro.title')</strong></h3>
            <p>@lang('privacy-statement.1-intro.items.1')</p>
            <p>@lang('privacy-statement.1-intro.items.2')</p>
            <p>@lang('privacy-statement.1-intro.items.3.0') <span style="font-style: italic">“@lang('privacy-statement.1-intro.items.3.1')”</span> @lang('privacy-statement.1-intro.items.3.2')</p>


            <h3 id="header-2"><strong>2. @lang('privacy-statement.2-why.title')</strong></h3>
            <p><span style="text-decoration: underline">@lang('privacy-statement.2-why.items.0')</span>: @lang('privacy-statement.2-why.items.1')</p>
            <p>@lang('privacy-statement.2-why.items.2')</p>

            <h3 id="header-3"><strong>3. @lang('privacy-statement.3-legal_process.title')</strong></h3>
            <p>@lang('privacy-statement.3-legal_process.items.0')</p>
            <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                <li>@lang('privacy-statement.3-legal_process.items.1')<br/>
                    @lang('privacy-statement.3-legal_process.items.2')

                </li>
                <li>
                    @lang('privacy-statement.3-legal_process.items.3')
                </li>
            </ul>
            <p>@lang('privacy-statement.3-legal_process.items.4')</p>

            <h3 id="header-4"><strong>4. @lang('privacy-statement.4-collect_data.title')</strong></h3>


            <div style="margin-top: 10px;">
                @lang('privacy-statement.4-collect_data.items.0')
            </div>
            <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                <li>
                    @lang('privacy-statement.4-collect_data.items.1')
                </li>
            </ul>
            <div>
                @lang('privacy-statement.4-collect_data.items.2')
            </div>
            <div>@lang('privacy-statement.4-collect_data.items.3')
            </div>
            <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                <li>@lang('privacy-statement.4-collect_data.items.4');</li>
                <li>@lang('privacy-statement.4-collect_data.items.5')</li>
                <li>@lang('privacy-statement.4-collect_data.items.6')</li>
            </ul>


            <h3 id="header-5">5. <strong>@lang('privacy-statement.5-how_long.title')</strong></h3>
            <p>
                @lang('privacy-statement.5-how_long.items.0')
                </p>

            <h3 id="header-6"><strong>6. @lang('privacy-statement.6-protect_data.title')</strong></h3>
            <p>@lang('privacy-statement.6-protect_data.items.0') <a
                        href="https://eur-lex.europa.eu/legal-content/EN/TXT/?qid=1548093747090&uri=CELEX:32017D0046">@lang('privacy-statement.6-protect_data.items.1')</a>@lang('privacy-statement.6-protect_data.items.2')</p>
            <p>@lang('privacy-statement.6-protect_data.items.3')</p>

            <h3 id="header-7"><strong>7. @lang('privacy-statement.7-access_data.title')</strong></h3>
            <p>
                @lang('privacy-statement.7-access_data.items.0')
            </p>
            <p>
                @lang('privacy-statement.7-access_data.items.1')
            </p>

            <h3 id="header-8"><strong>8. @lang('privacy-statement.8-rights.title')</strong></h3>
            <p>
                @lang('privacy-statement.8-rights.items.0')
            </p>
            <p>
                @lang('privacy-statement.8-rights.items.1')
            </p>
            <p>
                @lang('privacy-statement.8-rights.items.2')
            </p>
            <p>
                @lang('privacy-statement.8-rights.items.3')
            </p>
            <p>
                @lang('privacy-statement.8-rights.items.4')
            </p>

            <h3 id="header-9" style="margin-bottom: 10px;">9. <strong>@lang('privacy-statement.9-contact.title')</strong></h3>

            <h4>@lang('privacy-statement.9-contact.data-controller.title')</h4>
            <p>@lang('privacy-statement.9-contact.data-controller.text') <a
                        href="mailto:CNECT-F4@ec.europa.eu">CNECT-F4@ec.europa.eu</a>.</p>

            <h4>@lang('privacy-statement.9-contact.data-protection-officer.title')</h4>
            <p>
                @lang('privacy-statement.9-contact.data-protection-officer.text')
            </p>
            <h4>@lang('privacy-statement.9-contact.european-data-protection.title')</h4>
            <p>
                @lang('privacy-statement.9-contact.european-data-protection.text')
            </p>

            <h3 id="header-10" style="margin-bottom: 10px;">10. <strong>@lang('privacy-statement.10-detailed-info.title')</strong></h3>
            <p>
                @lang('privacy-statement.10-detailed-info.items.0')
            </p>
            <p>
                @lang('privacy-statement.10-detailed-info.items.1')
            </p>

        </section>

    </section>

@endsection

@section('extra-css')
    <style>
        /* unvisited link */
        #codeweek-privacy-page a:link {
            color: #FE6924;
        }

        /* visited link */
        #codeweek-privacy-page a:visited {
            color: #FE6924;
        }

        /* mouse over link */
        #codeweek-privacy-page a:hover {
            color: cornflowerblue;
        }

        /* selected link */
        #codeweek-privacy-page a:active {
            color: #FE6924;
        }
    </style>
@endsection
