@extends('layout.new_base')

@section('title', 'EU Code Week Privacy Policy – Your Data, Your Rights')
@section('description', 'Learn how EU Code Week collects, stores, and protects your data. Read our privacy policy to understand your rights and data security measures.')

@php
    $list = [
        (object) ['label' => 'Privacy', 'href' => ''],
    ];
@endphp

@section('layout.breadcrumb')
    @include('layout.breadcrumb', ['list' => $list])
@endsection

@section('content')
    <section id="codeweek-privacy-page" class="font-['Blinker'] overflow-hidden">
        <section class="relative z-10 py-10 md:py-20 codeweek-container-lg">
            <p class="text-dark-blue font-['Montserrat'] font-semibold text-[22px] leading-7 md:text-4xl p-0 mb-6">PROTECTION OF YOUR PERSONAL DATA</p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Processing operation:</span> Processing of personal data on the EU Code Week website at codeweek.eu by its visitors and the users of its contact form
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Data Controller:</span> JA Europe, coordinator for the Code4Europe consortium[^1] (hereafter referred to as ‘Code4Europe’).
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Data processors:</span> Amazon Web Services EMEA SARL (AWS) (38 avenue John F. Kennedy, L-1855 Luxembourg, Luxembourg).
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                European Commission, Directorate General for Communications Networks, Content and Technology, Unit G.2
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Record reference:</span> DPR-EC-09706.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">Table of Contents:</span>
            </p>
            <ol class="list-decimal m-0 ml-4 pl-2 mb-3">
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-1">Introduction</a>
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-2">Why and how do we process your personal data?</a>
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-3">On what legal ground(s) do we process your personal data?</a>
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-4">Which personal data do we collect and further process?</a>
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-5">How long do we keep your personal data?</a>
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-6">How do we protect and safeguard your personal data?</a>
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-7">Who has access to your personal data and to whom is it disclosed?</a>
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-8">What are your rights and how can you exercise them?</a>
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-9">Contact information</a>
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <a class="text-dark-blue" href="/privacy#header-10">Where to find more detailed information?</a>
                </li>
            </ol>
            <p id="header-1" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                1. Introduction
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                Code4Europe is committed to protecting your personal data and to respecting your privacy. Te Consortium collects and further processes personal data pursuant
                <a class="text-dark-blue" href="https://eur-lex.europa.eu/legal-content/EN/TXT/?uri=CELEX%3A32016R0679&amp;qid=1716801254470">Regulation (EU) 2016/679</a> of the European Parliament and of the Council, of 27 April 2016, on the protection of
                natural persons with regard to the processing of personal data and on the free movement of such data, and repealing Directive 95/46/EC.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                This privacy statement explains the reason for the processing of your personal data, the way we collect,
                handle and ensure protection of all personal data provided, how that information is used and what rights you
                have in relation to your personal data. It also specifies the contact details of the responsible joint
                controllers with whom you may exercise your rights, the relevant Data Protection Officers and the Data
                Protection Authorities.
            </p>

            <p id="header-2" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                2. Why and how do we process your personal data?
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                Purpose of the processing operation: The-controller employs an external infrastructure to host the website.
                The technical setup collects and uses your personal information to be able to provide for the website’s
                proper operation.
            </p>
            <p class="text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] font-semibold mb-3">
                The purposes of the processing are the following:
            </p>
            <p class="font-normal text-default md:text-xl p-0 pl-3 text-slate-500 leading-[22px] md:leading-[30px] mb-3">1) To process personal data of visitors in order to operate and administer the EU Code Week website;<br>2) To
                process data subjects’ e-mail addresses, passwords or social media authentication to grant them access to
                their personal accounts on the website. This access allows them to authenticate themselves, access and
                update their profiles and to access certificates and register activities;<br>3) To process data subject’s
                email addresses and other information provided when they use the contact form via the ”Getting in Touch“
                button.</p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                Personal data will not be used for an automated decision-making, including profiling.
            </p>

            <p id="header-3" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                3. On what legal ground(s) do we process your personal data?
            </p>
            <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <span class="font-semibold">Article 6(1)(f) of Regulation (EU) (2016/679)</span>, for the operation and administration of
                    the website, the processing is necessary for the performance of a task carried out in the Legitimate
                    Interest of the Code 4 Europe Consortium. We ensure that adequate and specific safeguards are
                    implemented for the processing of personal data, in line with the applicable data protection
                    legislation.
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    <span class="font-semibold">Article 6(1)(a) of Regulation (EU) (2016/679):</span> for the processing activities consisting
                    in cookies, authentication and getting in touch with us, consent is necessary. In compliance with
                    Article 3(11) of Regulation (EU) (2016/679), Article 7 of Regulation (EU) (2016/679), consent must be
                    freely given, specific, informed and unambiguous.
                </li>
            </ul>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                Where we rely on consent, we obtain it directly from the data subject, and it can be expressed by an email,
                submitted via e-registration form, or in any other electronic or written form.
            </p>

            <p id="header-4" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                4. Which personal data do we collect and further process?
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                In order to <span class="font-semibold">operate and administer the website</span>, the controller collects the following
                categories of personal data:
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                Internet Protocol address (IP address) or device ID of the device used to access the website.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">Without this processing you will not be able to establish a technical connection between your device and the
                website server infrastructure and therefore will not be able to access the codeweek.eu.</p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">In order for you to <span class="font-semibold">authenticate on the website</span>, the controller collect the following
                categories of personal data:</p>
            <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">Either e-mail address and password, or </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">Social media authentication[^2].</li>
            </ul>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">In order for you to <strong>use the contact form,</strong> the controller collects the following categories
                of personal data:</p>
            <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">E-mail address </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">Any personal data included in the body of the e-mail you sent.</li>
            </ul>

            <p id="header-5" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                5. How long do we keep your personal data?
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                The controller only keeps your personal data for the time necessary to fulfil the purpose of collection or
                further processing:
            </p>
            <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    When you navigate the website, your personal data are only processed for the duration of the browsing
                    session. In addition, IP addresses might be saved for one year in the log files of the services for
                    security reasons. As to the analytics tool, the IP address and the device ID (e.g. IMEI number and WIFI
                    MAC address) are deleted immediately at disconnection;
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    When you authenticate, all personal data will be deleted from the database in December 2029, or until
                    you withdraw from the EU Code Week initiative.
                </li>
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">
                    When you get in touch with us, your e-mails are deleted two years after the last exchange.
                </li>
            </ul>

            <p id="header-6" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                6. How do we protect and safeguard your personal data?
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                All personal data in electronic format (e-mails, documents, databases, uploaded batches of data, etc.) are
                stored on servers administered by the Commission. All processing operations are carried out pursuant to the
                <a class="text-dark-blue" href="https://eur-lex.europa.eu/legal-content/EN/TXT/?qid=1548093747090&amp;uri=CELEX:32017D0046">Commission
                    Decision (EU, Euratom) 2017/46</a>, of 10 January 2017, on the security of communication and information
                systems in the European Commission.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                In order to protect your personal data, the controller has put in place a number of technical and
                organisational measures. Technical measures include appropriate actions to address online security, risk of
                data loss, alteration of data or unauthorised access, taking into consideration the risk presented by the
                processing and the nature of the personal data being processed. Organisational measures include restricting
                access to the personal data solely to authorised persons with a legitimate need to know for the purposes of
                this processing operation.
            </p>

            <p id="header-7" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                7. Who has access to your personal data and to whom is it disclosed?
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                Access to your personal data for the purposes of administering, monitoring and operating the IT system is
                only provided to the Commission staff responsible for carrying out this processing operation and to
                authorised Commission staff according to the “need to know” principle. Such staff abide by statutory, and
                when required, additional confidentiality agreements. This includes your personal data required for
                authentication purposes.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                Access to personal data provided when using the contact form is provided to joint controllers’ staff
                responsible for carrying out this processing operation according to the “need to know” principle.
            </p>

            <p id="header-8" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                8. What are your rights and how can you exercise them?
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                You have specific rights as a ‘data subject’ under Chapter III of Regulation (EU) 2016/679, in particular the
                right to access, rectify or erase your personal data and the right to restrict the processing of your
                personal data. Where applicable, you also have the right to object to the processing or the right to data
                portability.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                You have the <span class="font-semibold">right to object to the processing of your personal data</span>, which is lawfully
                carried out pursuant to Article 5(1)(a) of Regulation (EU) 2016/679.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                For those processing activities which require your consent, you have the <span class="font-semibold">right to withdraw your
                    consent at any time</span> by notifying the joint controllers. The withdrawal will not affect the
                lawfulness of the processing carried out before you withdrew your consent.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">You can exercise your rights by contacting the Data Controller, or in case of conflict the Data Protection
                Officer. If necessary, you can also address the Data Protection Authority of Belgium. The contact
                information is given under section 9 below.</p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">Where you wish to exercise your rights in the context of one or several specific processing operations,
                please provide their description (i.e. their Record reference(s) as specified under section 10 below) in
                your request.</p>

            <p id="header-9" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                9. Contact information
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">The controller</span>
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                If you would like to exercise your rights under Regulation (EU) 2018/1725 or Regulation (EU) 2016/679, or if
                you have comments, questions or concerns, or if you would like to submit a complaint regarding the
                collection and use of your personal data, please feel free to contact the controller:
            </p>
            <ul class="list-[circle] m-0 ml-4 pl-2 mb-3">
                <li class="font-normal text-default md:text-xl p-0 text-slate-500">JA Europe at privacy@jaeurope.org.</li>
            </ul>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">The Data Protection Officer (DPO) of JA Europe</span>
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                You may contact the Data Protection Officer of JA Europe (dpo@jaeurope.org) with regard to issues related to
                the processing of your personal data under Regulation (EU) 2016/679.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                <span class="font-semibold">The Data Protection Authorities</span>
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                You have the right to have recourse (i.e. you can lodge a complaint) to the national Data Protection
                Authority in Belgium - GBA (<a class="text-dark-blue" href="https://www.autoriteprotectiondonnees.be/citoyen/agir/introduire-une-plainte">https://www.autoriteprotectiondonnees.be/citoyen/agir/introduire-une-plainte</a>)
                in French or Dutch, if you consider that your rights under Regulation (EU) 2016/679 have been infringed as a
                result of the processing of your personal data by JA Europe.
            </p>

            <p id="header-10" class="font-semibold p-0 mb-2 text-lg md:text-[1.35rem]">
                10. Where to find more detailed information?
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                This specific processing operation has been included in the Commission Data Protection Officer <a class="text-dark-blue"
                        href="https://ec.europa.eu/dpo-register">public register</a> with the following Record reference:
                <span class="font-semibold">DPR-EC-09706.</span>
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                [^1]: The Code4Europe consortium is implementing the Code4Europe project funded via a Digital Europe
                Programme grant 101158834.
            </p>
            <p class="font-normal text-default md:text-xl p-0 text-slate-500 leading-[22px] md:leading-[30px] mb-3">
                [^2]: The personal data includes the name, profile picture and email address for signing in with a Facebook
                account; the name, email address, language preference and profile picture for signing in with a Google
                account; the user name and email address for signing in with a X account; the user name or email address for
                signing in with a GitHub account.
            </p>
    </section>
@endsection
