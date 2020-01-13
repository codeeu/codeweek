@extends('layout.base')

@section('content')

    <section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">@lang('privacy.title')</h1>

            <h3><strong>@lang('privacy.1-intro.title')</strong></h3>
            @lang('privacy.1-intro.items.1')
            @lang('privacy.1-intro.items.2')
            @lang('privacy.1-intro.items.3')

            <h3><strong>@lang('privacy.2-why.title')</strong></h3>
            @lang('privacy.2-why.items.1')
            @lang('privacy.2-why.items.2')

            <h3><strong>@lang('privacy.3-legal_process.title')</strong></h3>
            @lang('privacy.3-legal_process.items.1')

            <h3><strong>@lang('privacy.4-collect_data.title')</strong></h3>
            @lang('privacy.4-collect_data.items.1')
            @lang('privacy.4-collect_data.items.2')
            @lang('privacy.4-collect_data.items.3')
            @lang('privacy.4-collect_data.items.4')

            <h3><strong>@lang('privacy.5-how_long.title')</strong></h3>
            @lang('privacy.5-how_long.items.1')
            @lang('privacy.5-how_long.items.2')

            <h3><strong>@lang('privacy.6-protect_data.title')</strong></h3>
            @lang('privacy.6-protect_data.items.1')
            @lang('privacy.6-protect_data.items.2')
            @lang('privacy.6-protect_data.items.3')

            <h3><strong>@lang('privacy.7-access_data.title')</strong></h3>
            @lang('privacy.7-access_data.items.1')
            @lang('privacy.7-access_data.items.2')
            @lang('privacy.7-access_data.items.3')
            @lang('privacy.7-access_data.items.4')
            @lang('privacy.7-access_data.items.5')

            <h3><strong>@lang('privacy.8-rights.title')</strong></h3>
            @lang('privacy.8-rights.items.1')
            @lang('privacy.8-rights.items.2')
            @lang('privacy.8-rights.items.3')

            <h3 style="margin-bottom: 10px;"><strong>@lang('privacy.9-contact.title')</strong></h3>

            <h4><strong>@lang('privacy.9-contact.data-controller.title')</strong></h4>

            @lang('privacy.9-contact.data-controller.text')

            <address style="margin-bottom: 10px;">
                @lang('privacy.9-contact.data-controller.address')
                @lang('privacy.9-contact.data-controller.email') <a href="mailto:info@codeweek.eu">info@codeweek.eu</a>
            </address>

            <h4><strong>@lang('privacy.9-contact.data-protection-officer.title')</strong></h4>

            @lang('privacy.9-contact.data-protection-officer.text')

            <h4><strong>@lang('privacy.9-contact.european-data-protection.title')</strong></h4>

            @lang('privacy.9-contact.european-data-protection.text')

        </section>

    </section>

@endsection
