@extends('layout.base')

@section('content')

    <section id="codeweek-privacy-page" class="codeweek-page">

        <section class="codeweek-content-wrapper" style="margin-top: 0;">

            <h1 style="margin-bottom:10px;">@lang('cookie_policy.title')</h1>

            <h3><strong>@lang('cookie_policy.what.title')</strong></h3>

            @lang('cookie_policy.what.text')

            <div>
                <ul>
                    <li>@lang('cookie_policy.what.first_party')</li>
                    <li>@lang('cookie_policy.what.persistent_cookies')</li>
                </ul>
            </div>

            @lang('cookie_policy.what.items')

            <h3><strong>@lang('cookie_policy.how.title')</strong></h3>

            @lang('cookie_policy.how.text1')
            @lang('cookie_policy.how.text2')

            <div>@lang('cookie_policy.how.3types.title')
                <ul>
                    <li>@lang('cookie_policy.how.3types.1')</li>
                    <li>@lang('cookie_policy.how.3types.2')</li>
                    <li>@lang('cookie_policy.how.3types.3')</li>
                </ul>
            </div>

            <h4>@lang('cookie_policy.how.visitor_preferences.title')</h4>
            @lang('cookie_policy.how.visitor_preferences.text')
            <ul>
                <li>@lang('cookie_policy.how.visitor_preferences.item')</li>
            </ul>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>@lang('cookie_policy.how.table.name')</th>
                    <th>@lang('cookie_policy.how.table.service')</th>
                    <th>@lang('cookie_policy.how.table.purpose')</th>
                    <th>@lang('cookie_policy.how.table.type_duration')</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_cookie_consent</td>
                    <td>@lang('cookie_policy.how.visitor_preferences.table.1.service')</td>
                    <td>@lang('cookie_policy.how.visitor_preferences.table.1.purpose')</td>
                    <td>@lang('cookie_policy.how.visitor_preferences.table.1.type_duration')</td>
                </tr>

                </tbody>
            </table>
            <br/>

            <h4>@lang('cookie_policy.how.operational_cookies.title')</h4>
            @lang('cookie_policy.how.operational_cookies.text')
            <ul>
                <li>@lang('cookie_policy.how.operational_cookies.item')</li>
            </ul>
            <br/>

            <h4>@lang('cookie_policy.how.technical_cookies.title')</h4>

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>@lang('cookie_policy.how.table.name')</th>
                    <th>@lang('cookie_policy.how.table.service')</th>
                    <th>@lang('cookie_policy.how.table.purpose')</th>
                    <th>@lang('cookie_policy.how.table.type_duration')</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>codeweek_session</td>
                    <td>PHP</td>
                    <td>@lang('cookie_policy.how.technical_cookies.table.1.purpose')</td>
                    <td>@lang('cookie_policy.how.technical_cookies.table.1.type_duration')</td>
                </tr>

                <tr>
                    <td>remember_web</td>
                    <td>PHP</td>
                    <td>@lang('cookie_policy.how.technical_cookies.table.2.purpose')</td>
                    <td>@lang('cookie_policy.how.technical_cookies.table.2.type_duration')</td>
                </tr>

                <tr>
                    <td>lang</td>
                    <td>PHP</td>
                    <td>@lang('cookie_policy.how.technical_cookies.table.3.purpose')</td>
                    <td>@lang('cookie_policy.how.technical_cookies.table.3.type_duration')</td>
                </tr>

                </tbody>
            </table>

            <br/>
            <h4>@lang('cookie_policy.how.analytics_cookies.title')</h4>

            @lang('cookie_policy.how.analytics_cookies.items')

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>@lang('cookie_policy.how.table.name')</th>
                    <th>@lang('cookie_policy.how.table.service')</th>
                    <th>@lang('cookie_policy.how.table.purpose')</th>
                    <th>@lang('cookie_policy.how.table.type_duration')</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>_pk_id#</td>
                    <td>@lang('cookie_policy.how.analytics_cookies.table.1.service')</td>
                    <td>@lang('cookie_policy.how.analytics_cookies.table.1.purpose')</td>
                    <td>@lang('cookie_policy.how.analytics_cookies.table.1.type_duration')</td>
                </tr>

                <tr>
                    <td>_pk_ses#</td>
                    <td>@lang('cookie_policy.how.analytics_cookies.table.2.service')</td>
                    <td>@lang('cookie_policy.how.analytics_cookies.table.2.purpose')</td>
                    <td>@lang('cookie_policy.how.analytics_cookies.table.2.type_duration')</td>
                </tr>

                </tbody>
            </table>

            <br/>
            <h3><strong>@lang('cookie_policy.third-party.title')</strong></h3>

            <div>
                @lang('cookie_policy.third-party.items.1')
                <ul>
                    <li><a href="https://www.facebook.com/legal/terms">Facebook</a></li>
                    <li><a href="https://twitter.com/en/tos?wcmmode=disabled#intlTerms">Twitter</a></li>
                    <li><a href="https://www.tumblr.com/policy/en/terms-of-service">Tumblr</a></li>
                    <li><a href="https://www.youtube.com/t/terms">YouTube</a></li>
                </ul>
                @lang('cookie_policy.third-party.items.2')
            </div>
            <br/>

            <h3><strong>@lang('cookie_policy.how-manage.title')</strong></h3>
            @lang('cookie_policy.how-manage.items')


        </section>

    </section>

@endsection

