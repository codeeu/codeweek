@component('mail::message')

<h1>@lang('email.registered.title')</h1>

<h2>@lang('email.registered.subtitle')</h2>

<p>@lang('email.registered.paragraphs.1')</p>
<p>@lang('email.registered.paragraphs.2')</p>
<ul>
    <li>
        <p>
            @lang('email.registered.paragraphs.3')
            <a href="http://codeweek.eu/resources/">http://codeweek.eu/resources/</a>
        </p>
    </li>
</ul>

<p>@lang('email.registered.paragraphs.4')</p>

<ul>
    <li>
        <p>
            <strong><a href="http://codeweek.eu/codewee4all/">@lang('email.click_here')</a></strong>
            @lang('email.registered.paragraphs.5')
        </p>
    </li>
</ul>

@endcomponent
