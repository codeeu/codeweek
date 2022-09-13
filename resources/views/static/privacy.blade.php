@extends('layout.base')

@section('content')

    <section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">@lang('privacy-statement.title')</h1>

            <div style="margin-bottom: 6px"><span style="font-weight: bold;">@lang('privacy-statement.processing-operation.0'):</span>@lang('privacy-statement.processing-operation.1')
            </div>
            <div style="margin-bottom: 6px"><span style="font-weight: bold;">@lang('privacy-statement.data-controller.0'):</span>@lang('privacy-statement.data-controller.1')
            </div>
            <div style="margin-bottom: 6px"><span style="font-weight: bold;">@lang('privacy-statement.record-reference'):</span>
                DPR-EC-09706.1
            </div>

            <h3 style="margin-top:10px">@lang('privacy-statement.table-of-contents')</h3>
            <ol style="margin-bottom:20px">
                <li><a href="#header-1">@lang('privacy-statement.1-intro.title')</a></li>
                <li style="margin-top:4px"><a href="#header-2">@lang('privacy-statement.2-why.title')</a></li>
                <li style="margin-top:4px"><a href="#header-3">On what legal ground(s) do we process your personal
                        data?</a></li>
                <li style="margin-top:4px"><a href="#header-4">Which personal data do we collect and further
                        process?</a></li>
                <li style="margin-top:4px"><a href="#header-5">How long do we keep your personal data?</a></li>
                <li style="margin-top:4px"><a href="#header-6">How do we protect and safeguard your personal data?</a>
                </li>
                <li style="margin-top:4px"><a href="#header-7">Who has access to your personal data and to whom is it
                        disclosed?</a></li>
                <li style="margin-top:4px"><a href="#header-8">What are your rights and how can you exercise them?</a>
                </li>
                <li style="margin-top:4px"><a href="#header-9">Contact information</a></li>
                <li style="margin-top:4px"><a href="#header-10">Where to find more detailed information?</a></li>
            </ol>


            <h3 id="header-1"><strong>1. @lang('privacy-statement.1-intro.title')</strong></h3>
            <p>@lang('privacy-statement.1-intro.items.1')</p>
            <p>@lang('privacy-statement.1-intro.items.2')</p>
            <p>@lang('privacy-statement.1-intro.items.3.0') <span style="font-style: italic">“@lang('privacy-statement.1-intro.items.3.1')”</span> @lang('privacy-statement.1-intro.items.3.2')</p>


            <h3 id="header-2"><strong>2. @lang('privacy-statement.2-why.title')</strong></h3>
            <p><span style="text-decoration: underline">@lang('privacy-statement.2-why.items.0')</span>: @lang('privacy-statement.2-why.items.1')</p>
            <p>@lang('privacy-statement.2-why.items.2')</p>

            <h3 id="header-3"><strong>3. On what legal ground(s) do we process your personal data?</strong></h3>
            <p>We process your personal data on several grounds:</p>
            <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                <li><strong>Article 5(1)(a) of Regulation (EU) 2018/1725</strong>: this processing is <span
                            style="text-decoration: underline">necessary for the performance of a task</span> carried
                    out in the public interest or in the exercise of official authority vested in the Union institution
                    or body.<br/>
                    Indeed, informing the broad public is a task resulting from the European Commission's own
                    prerogatives at institutional level, as provided for in Article 58(2) (d) of Council Regulation (EC,
                    Euratom) No 2018/1046 of 18 July 2018 on the Financial Regulation applicable to the general budget
                    of the European Communities (OJ L 193, 30.7.2018, p. 1). We ensure that adequate and specific
                    safeguards are implemented for the processing of personal data, in line with the applicable data
                    protection legislation.
                </li>
                <li><strong>Article 5(1)(d) of Regulation (EU) 2018/1725:</strong> for the processing activities
                    consisting in cookies and authentication, your <span
                            style="text-decoration: underline">consent</span> is necessary. In compliance with Article
                    3(15) and Article 7 of Regulation (EU) 2018/1725, the consent must be freely given, specific,
                    informed and unambiguous.
                </li>
            </ul>
            <p>We have obtained your consent directly from you. You may have expressed it by an email, submitted via
                e-registration form, or in any other written form.</p>

            <h3 id="header-4"><strong>4. Which personal data do we collect and further process?</strong></h3>


            <div style="margin-top: 10px;">
                In order to <strong>carry out this processing operation</strong>, Unit F.4 collects the following
                categories of personal data:
            </div>
            <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                <li>Internet Protocol address (IP address) or the device ID of the device used to access the website.
                </li>
            </ul>
            <div>Without this processing you will not be able to establish a technical connection between your devices
                and the server infrastructure and therefore will not be able to access our website.
            </div>
            <div>In order for you to <strong>authenticate on this website</strong>, Unit F.4 collects the following
                categories of personal data:
            </div>
            <ul style="list-style-type: circle;margin-left:40px; margin-top:4px;">
                <li>E-mail address;</li>
                <li>Password; or</li>
                <li>Social media authentication.</li>
            </ul>


            <h3 id="header-5"><strong>5. How long do we keep your personal data?</strong></h3>
            <p>Unit F.4 only keeps your personal data for the time necessary to fulfill the purpose of collection or
                further processing, namely for the duration of the browsing session. In addition, IP addresses might be
                saved for one year in the log files of the services for security reasons. As to the analytics tool, the
                IP address and the device ID (e.g. IMEI number and WIFI MAC address) are deleted immediately at
                disconnection.</p>

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
            <p>
                Access to your personal data is provided to the Commission staff responsible for carrying out this
                processing operation and to authorised staff according to the “need to know” principle. Such staff abide
                by statutory, and when required, additional confidentiality agreements.
            </p>
            <p>
                The information we collect will not be given to any third party, except to the extent and for the
                purpose we may be required to do so by law.
            </p>

            <h3 id="header-8"><strong>8. What are your rights and how can you exercise them? </strong></h3>
            <p>
                You have specific rights as a ‘data subject’ under Chapter III (Articles 14-25) of Regulation (EU)
                2018/1725, in particular the right to access, rectify or erase your personal data and the right to
                restrict the processing of your personal data. Where applicable, you also have the right to object to
                the processing or the right to data portability.
            </p>
            <p>
                You have the right to object to the processing of your personal data, which is lawfully carried out
                pursuant to Article 5(1)(a).
            </p>
            <p>
                You have consented to provide your personal data for the present processing operation. You can withdraw
                your consent at any time by notifying Unit F.4. The withdrawal will not affect the lawfulness of the
                processing carried out before you withdrew your consent.
            </p>
            <p>
                You can exercise your rights by contacting the Data Controller, or in case of conflict the Data
                Protection Officer. If necessary, you can also address the European Data Protection Supervisor. Their
                contact information is given under Heading 9 below.
            </p>
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
                Record reference: <strong>DPR-EC-09706.1</strong>.
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
