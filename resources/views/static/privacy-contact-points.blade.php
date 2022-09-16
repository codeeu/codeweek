@extends('layout.base')

@section('content')

    <section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">@lang('privacy-statement.title')</h1>
            <h3 style="margin-bottom:10px;">@lang('privacy-statement-contact.subtitle')</h3>

            <div style="margin-bottom: 6px"><span style="font-weight: bold;">@lang('privacy-statement-contact.processing-operation.0'):</span> @lang('privacy-statement-contact.processing-operation.1')
            </div>
            <div style="margin-bottom: 6px"><span style="font-weight: bold;">@lang('privacy-statement.data-controller.0'):</span> @lang('privacy-statement.data-controller.1')
            </div>
            <div style="margin-bottom: 6px"><span style="font-weight: bold;">@lang('privacy-statement-contact.data-processors.0'):</span> @lang('privacy-statement-contact.data-processors.1')
            </div>
            <div style="margin-bottom: 6px"><span style="font-weight: bold;"> @lang('privacy-statement.record-reference'):</span>
                DPR-EC-02631
            </div>

            <x-privacy-toc></x-privacy-toc>


            <h3 id="header-1"><strong>1. @lang('privacy-statement.1-intro.title')</strong></h3>

            <p>@lang('privacy-statement.1-intro.items.1')</p>
            <p>@lang('privacy-statement.1-intro.items.2')</p>
            <p>@lang('privacy-statement-contact.1-intro.0')</p>


            <h3 id="header-2"><strong>2. @lang('privacy-statement.2-why.title')</strong></h3>
            <p>
                <span style="text-decoration: underline">@lang('privacy-statement.2-why.items.0')</span>: @lang('privacy-statement.2-why.items.1')
            </p>
            <p>@lang('privacy-statement.2-why.items.2')</p>

            <h3 id="header-3"><strong>3. @lang('privacy-statement.3-legal_process.title')</strong></h3>
            <p>@lang('privacy-statement-contact.3-legal_process.0')</p>


            <h3 id="header-4"><strong>4. @lang('privacy-statement.4-collect_data.title')</strong></h3>


            <div style="margin-top: 10px;">@lang('privacy-statement-contact.4-collect_data.0')
            </div>
            <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                <li>@lang('privacy-statement-contact.4-collect_data.1');</li>
                <li>@lang('privacy-statement-contact.4-collect_data.2');</li>
                <li>@lang('privacy-statement-contact.4-collect_data.3');</li>
                <li>@lang('privacy-statement-contact.4-collect_data.4');</li>
                <li>@lang('privacy-statement-contact.4-collect_data.5');</li>
                <li>@lang('privacy-statement-contact.4-collect_data.6');</li>
                <li>@lang('privacy-statement-contact.4-collect_data.7');</li>

            </ul>

            <div>@lang('privacy-statement-contact.4-collect_data.8')</div>
            <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                <li>@lang('privacy-statement-contact.4-collect_data.9');</li>
                <li>@lang('privacy-statement-contact.4-collect_data.10');</li>
                <li>@lang('privacy-statement-contact.4-collect_data.11').</li>
            </ul>

            @lang('privacy-statement-contact.4-collect_data.12')


            <div>
                <div style="margin-top:10px;">@lang('privacy-statement-contact.4-collect_data.13')
                </div>
                <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                    <li>@lang('privacy-statement-contact.4-collect_data.14').</li>
                </ul>
            </div>
            <div>
                @lang('privacy-statement-contact.4-collect_data.15')
                <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                    <li>@lang('privacy-statement-contact.4-collect_data.16');</li>
                    <li>@lang('privacy-statement-contact.4-collect_data.17');</li>
                    <li>@lang('privacy-statement-contact.4-collect_data.18').</li>
                </ul>

            </div>

            <div style="margin-bottom: 10px">
                @lang('privacy-statement-contact.4-collect_data.19')
            </div>


            <div style="margin-bottom: 20px">
                @lang('privacy-statement-contact.4-collect_data.20') <a
                        href="https://codeweek.eu/login ">@lang('privacy-statement-contact.4-collect_data.21')</a> @lang('privacy-statement-contact.4-collect_data.22')
                <a href="https://codeweek.eu/add">@lang('privacy-statement-contact.4-collect_data.23')</a>
            </div>

            <h3 id="header-5">5. <strong>@lang('privacy-statement.5-how_long.title')</strong></h3>
            <p>
                @lang('privacy-statement-contact.5-how_long.0')
            </p>


            <h3 id="header-6"><strong>6. @lang('privacy-statement.6-protect_data.title')</strong></h3>
            <p>
                @lang('privacy-statement-contact.6-protect_data.items.0')
            </p>

            <p>
                @lang('privacy-statement-contact.6-protect_data.items.1')
            </p>

            <p>
                @lang('privacy-statement-contact.6-protect_data.items.2')
            </p>


            <h3 id="header-7"><strong>7. @lang('privacy-statement.7-access_data.title')</strong></h3>
            <p>
                @lang('privacy-statement-contact.7-access_data.items.0')
            </p>
            <p>@lang('privacy-statement-contact.7-access_data.items.1')</p>
            <p>@lang('privacy-statement-contact.7-access_data.items.2')</p>

            <h3 id="header-8"><strong>8. @lang('privacy-statement.8-rights.title')</strong></h3>
            <p>
                @lang('privacy-statement.8-rights.items.0')
            </p>
            <p>
                @lang('privacy-statement-contact.8-rights.0')
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
                @lang('privacy-statement-contact.10-detailed-info.0')
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
