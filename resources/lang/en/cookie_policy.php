<?php

return [

    'title' => 'Cookie Policy',
    'what' => [
        'title' => 'What are cookies?',
        'text' => '<p>A cookie is a small text file that a website stores on your computer or mobile device when you visit the site.</p>',
        'first_party' => '<strong>First party cookies</strong> are cookies set by the website you’re visiting. Only that
                        website can read
                        them. In addition, a website might potentially use external services, which also set their own
                        cookies, known as <strong>third-party cookies</strong>.',
        'persistent_cookies' => 'Persistent cookies are cookies saved on your computer and that are not deleted automatically
                        when you quit your browser, unlike a session cookie, which is deleted when you quit your
                        browser.',
        'items' => '<p>
                First time you visit the Codeweek website, you will be prompted to <strong>accept or refuse
                    cookies</strong>.</p>
            <p>The purpose is to enable the site to remember your preferences (such as user name, language, etc.) for a
                certain period of time.</p>
            <p>That way, you don’t have to re-enter them when browsing around the site during the same visit.</p>
            <p>Cookies can also be used to establish anonymised statistics about the browsing experience on our
                sites.</p>',
    ],
    'how' => [
        'title' => 'How do we use cookies?',
        'text1' => '<p>Codeweek mostly use “first-party cookies”. These are cookies set and controlled by
                us, not by any external organisation.</p>',
        'text2' => '<p>However, to view some of our pages, you will have to accept cookies from external organisations.</p>',
        '3types' => [
            'title' => 'The <strong>3 types of first-party cookie</strong> we use are to:',
            '1' => 'store visitor preferences',
            '2' => 'make our websites operational',
            '3' => 'gather analytics data (about user behaviour)',
        ],
        'table' => [
            'name' => 'Name',
            'service' => 'Service',
            'purpose' => 'Purpose',
            'type_duration' => 'Cookie type and duration',
        ],
        'visitor_preferences' => [
            'title' => 'Visitor preferences',
            'text' => '<p>These are set by us and only we can read them. They remember:</p>',
            'item' => 'if you have agreed to (or refused) this site’s cookie policy',
            'table' => [
                '1' => [
                    'service' => 'Cookie consent kit',
                    'purpose' => 'Stores your cookie preferences (so you won’t be asked again)',
                    'type_duration' => 'First-party session cookie deleted after you quit your browser',
                ],
            ],
        ],
        'operational_cookies' => [
            'title' => 'Operational cookies',
            'text' => '<p>There are some cookies that we have to include in order for certain web pages to function. For this
                reason,they do not require your consent. In particular:</p>',
            'item' => 'technical cookies required by certain IT systems',
        ],
        'technical_cookies' => [
            'title' => 'Technical cookies',
            'table' => [
                '1' => [
                    'purpose' => 'Maintain a secure session for you, during your visit.',
                    'type_duration' => 'First-party session cookie, deleted after you quit your browser',
                ],
                '2' => [
                    'purpose' => 'Maintain a secure session for you for a longer time preventing to lose the session on browser close.',
                    'type_duration' => 'First-party persistent cookie, 60 months',
                ],
                '3' => [
                    'purpose' => 'Stores user\'s preferred language',
                    'type_duration' => 'First-party session cookie, deleted after you quit your browser',
                ],
            ],
        ],
        'analytics_cookies' => [
            'title' => 'Analytics cookies',
            'items' => '<p>
                We use these purely for internal research on how we can improve the service we provide for all our
                users.
            </p>
            <p>
                The cookies simply assess how you interact with our website – as an anonymous user (they data gathered
                does
                not identify you personally).
            </p>
            <p>
                Also, this data is not shared with any third parties or used for any other purpose. The anonymised
                statistics could be shared with contractors working on communication projects under contractual
                agreement
                with the Commission.
            </p>
            <p>
                However, you are free to refuse these types of cookies – either via the cookie banner you’ll see on the
                first page you visit or by visiting this <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">dedicated page.</a>.
            </p>',
            'table' => [
                '1' => [
                    'service' => 'Web analytics service, based on Matomo open source software',
                    'purpose' => 'Recognises website visitors (anonymously – no personal information is collected on the user).',
                    'type_duration' => 'First-party persistent cookie, 20 days',
                ],
                '2' => [
                    'service' => 'Web analytics service, based on Matomo open source software',
                    'purpose' => 'Identifies the pages viewed by the same user during the same visit. (anonymously – no personal information is collected on the user).',
                    'type_duration' => 'First-party persistent cookie, 30 minutes',
                ],
            ],
        ],

    ],
    'third-party' => [
        'title' => 'Third-party cookies',
        'items' => [
            '1' => '<p>Some of our pages display content from external providers, e.g. YouTube, Facebook and Twitter.</p>
                    <p>To view this third-party content, you first have to accept their specific terms and conditions. This
                    includes their cookie policies, which we have no control over.</p>
                    <p>But if you do not view this content, no third-party cookies are installed on your device.</p>
                    Third-party providers on Codeweek',
            '2' => 'These third-party services are outside of the control of the Codeweek Website. Providers may, at any time,
                change their terms of service, purpose and use of cookies, etc.',
        ],
    ],
    'how-manage' => [
        'title' => 'How can you manage cookies?',
        'items' => '<p>You can <strong>manage/delete</strong> cookies as you wish - for details, see <a
                        href="https://aboutcookies.org">aboutcookies.org</a>.</p>
                    <p><strong>Removing cookies from your device</strong></p>
                    <p>You can delete all cookies that are already on your device by clearing the browsing history of your
                browser. This will remove all cookies from all websites you have visited.</p>
                <p>Be aware though that you may also lose some saved information (e.g. saved login details, site
                preferences).</p>
                <strong>Managing site-specific cookies</strong>
                <p>For more detailed control over site-specific cookies, check the privacy and cookie settings in your
                preferred browser</p>
                <strong>Blocking cookies</strong>
                <p>You can set most modern browsers to prevent any cookies being placed on your device, but you may then
                have to manually adjust some preferences every time you visit a site/page. And some services and
                functionalities may not work properly at all (e.g. profile logging-in).</p>
                <strong>Managing our analytics cookies</strong>
                <p>You can manage your preferences concerning cookies from our Analytics on the <a href="https://www.cnect-stats.com/index.php?module=CoreAdminHome&action=optOut&language=en&backgroundColor=&fontColor=&fontSize=&fontFamily=">dedicated page.</a></p>',
    ],
];
