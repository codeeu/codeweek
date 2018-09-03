@extends('layout.base')

@section('content')
<section>

    <div class="container clearfix">

        <div class="flex flex-col justify-center text-center w-full mb-8 uppercase">
            <h1>@lang('privacy.page_title')</h1>
		    <span>@lang('privacy.page_subtitle')</span>
		    <ol class="breadcrumb">
			    <li><a href="http://codeweek.eu">@lang('privacy.codeweek_link')</a></li>
			    <li class="active">@lang('privacy.page_title')</li>
		    </ol>
	    </div>
    </div>	
</section>
<!-- #page-title end -->
<!-- Content -->

<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<p>@lang('privacy.paragraph_1.body_1') <a href="http://codeweek.eu">http://codeweek.eu</a> @lang('privacy.paragraph_1.body_2')</p>

<p><strong>@lang('privacy.paragraph_2.title')</strong></p>

<p>@lang('privacy.paragraph_2.body')</p>

<p><strong>@lang('privacy.paragraph_3.title')</strong></p>

<p>@lang('privacy.paragraph_3.body')</p>

<p><strong>@lang('privacy.paragraph_4.title')</strong></p>

<p>@lang('privacy.paragraph_4.body')</p>

<p><strong>@lang('privacy.paragraph_5.title')</strong></p>

<p>@lang('privacy.paragraph_5.body')</p>
<ul>
<li><i>@lang('privacy.paragraph_5.italics_item_1')</i>
	@lang('privacy.paragraph_5.list_item_1')</li>
<li><i>@lang('privacy.paragraph_5.italics_item_2')</i>
	@lang('privacy.paragraph_5.list_item_2')</li>
<li><i>@lang('privacy.paragraph_5.italics_item_3')</i>
    @lang('privacy.paragraph_5.list_item_3')</li>
</ul>
<p><strong>@lang('privacy.paragraph_6.title')</strong></p>

<p>@lang('privacy.paragraph_6.body')</p>

<p><strong>@lang('privacy.paragraph_7.title')</strong></p>

<p>@lang('privacy.paragraph_7.body')</p>

<p><strong>@lang('privacy.paragraph_8.title')</strong></p>

<p>@lang('privacy.paragraph_8.body')</p>

<p><strong>@lang('privacy.paragraph_9.title')</strong></p>

<p>@lang('privacy.paragraph_9.body')</p>

<p><strong>@lang('privacy.paragraph_10.title')</strong></p>

<p>@lang('privacy.paragraph_10.body') <a href="mailto:info@codeweek.eu">info@codeweek.eu</a></p>
<p>@lang('privacy.last_updated')</p>

<div style="font-size:10px;color:gray;">@lang('privacy.privacy_generated_by')<a style="font-size:10px;color:gray;text-decoration:none;cursor:default;" href="http://www.privacypolicies.com" target="_blank">@lang('privacy.privacy_generated_link')</a></div>

		</div>
	</div>
</section>
@endsection