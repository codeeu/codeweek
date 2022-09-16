@extends('layout.base')

@section('content')

    <section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">@lang('privacy-statement-contact.title')</h1>
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


            <div style="margin-top: 10px;">@lang('privacy-statement.4-collect_data.0')
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
                @lang('privacy-statement-contact.4-collect_data.20') <a href="https://codeweek.eu/login ">@lang('privacy-statement-contact.4-collect_data.21')</a> @lang('privacy-statement-contact.4-collect_data.22') <a href="https://codeweek.eu/add">@lang('privacy-statement-contact.4-collect_data.23')</a>
            </div>


            <h3 id="header-5"><strong>5. How long do we keep your personal data?</strong></h3>
            <p>All personal data will be deleted from databases if you withdraw from the initiative or 5 years after the
                end of the initiative.</p>

            <h3 id="header-6"><strong>6. How do we protect and safeguard your personal data?</strong></h3>
            <p>All personal data in electronic format (e-mails, documents, databases, uploaded batches of data, etc.)
                are stored either on the servers of the European Commission. All processing operations are carried out
                pursuant to the <a
                        href="https://eur-lex.europa.eu/legal-content/EN/TXT/?qid=1548093747090&uri=CELEX:32017D0046">Commission
                    Decision (EU, Euratom) 2017/46</a>, of 10 January 2017, on the security of
                communication and information systems in the European Commission.</p>
            <p>In order to protect your personal data, the Commission has put in place a number of technical and
                organisational measures in place. Technical measures include appropriate actions to address online
                security, risk of data loss, alteration of data or unauthorised access, taking into consideration the
                risk presented by the processing and the nature of the personal data being processed. Organisational
                measures include restricting access to the personal data solely to authorised persons with a legitimate
                need to know for the purposes of this processing operation.</p>
            <h3 id="header-7"><strong>7. Who has access to your personal data and to whom is it disclosed?</strong></h3>
            <p>All personal data provided by you can be accessed by Commission staff on a “need to know” basis.</p>
            <p>For the purpose of increasing the Code Week Ambassador, Leading Teacher’s or the registered activities’
                visibility, all your personal data are published on the following <a
                        href="https://codeweek.eu/">website</a>.</p>
            <p>In addition, Unit F.4 might share your share your contact details with any member of the public or
                stakeholder that would need to contact you with regard to Code Week. For activity organisers, please
                note that the relevant Ambassador for your country or Unit F.4 can use the personal data you provided to
                register an activity to contact you with regard to said activity.</p>

            <h3 id="header-8"><strong>8. What are your rights and how can you exercise them? </strong></h3>
            <p>You have specific rights as a ‘data subject’ under Chapter III (Articles 14-25) of Regulation (EU)
                2018/1725, in particular the right to access, rectify or erase your personal data and the right to
                restrict the processing of your personal data. Where applicable, you also have the right to object to
                the processing or the right to data portability.</p>
            <p>You have consented to providing your personal data to Unit F.4 for the present processing operation. You
                can withdraw your consent at any time by notifying Unit F.4 at <a href="mailto:CNECT-F4@ec.europa.eu">CNECT-F4@ec.europa.eu</a>.
                The withdrawal will not affect the lawfulness of the processing carried out before you have withdrawn
                the consent.</p>
            <p>You can exercise your rights by contacting the Data Controller, or in case of conflict the Data
                Protection Officer. If necessary, you can also address the European Data Protection Supervisor. Their
                contact information is given under Heading 9 below.</p>
            <p>Where you wish to exercise your rights in the context of one or several specific processing operations,
                please provide their description (i.e. their Record reference(s) as specified under Heading 10 below) in
                your request.</p>

            <h3 id="header-9" style="margin-bottom: 10px;"><strong>9. Contact information</strong></h3>

            <h4>The Data Controller</h4>
            <p>If you would like to exercise your rights under Regulation (EU) 2018/1725, or if you have comments,
                questions or concerns, or if you would like to submit a complaint regarding the collection and use of
                your personal data, please feel free to contact the Data Controller, Unit F.4, at <a
                        href="mailto:CNECT-F4@ec.europa.eu">CNECT-F4@ec.europa.eu</a>.</p>
            <h4>The Data Protection Officer (DPO) of the Commission</h4>
            <p>You may contact the Data Protection Officer (<a href="mailto:DATA-PROTECTION-OFFICER@ec.europa.eu">DATA-PROTECTION-OFFICER@ec.europa.eu</a>)
                with regard to issues related to the processing of your personal data under Regulation (EU) 2018/1725.
            </p>
            <h4>The European Data Protection Supervisor (EDPS)</h4>
            <p>You have the right to have recourse (i.e. you can lodge a complaint) to the European Data Protection
                Supervisor (<a href="mailto:edps@edps.europa.eu">edps@edps.europa.eu</a>) if you consider that your
                rights under Regulation (EU) 2018/1725 have been infringed as a result of the processing of your
                personal data by the Data Controller.</p>

            <h3 id="header-10" style="margin-bottom: 10px;"><strong>10. Where to find more detailed
                    information?</strong></h3>
            <p>
                The Commission Data Protection Officer (DPO) publishes the register of all processing operations on
                personal data by the Commission, which have been documented and notified to him. You may access the
                register via the following link: <a href="https://ec.europa.eu/dpo-register">https://ec.europa.eu/dpo-register</a>.
            </p>
            <p>
                This specific processing operation has been included in the DPO’s public register with the following
                legacy notification reference: <strong>DPR-EC-02631</strong> Management of contact points for DG CONNECT
                policies, programmes and projects..
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
