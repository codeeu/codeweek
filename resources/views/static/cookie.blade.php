@extends('layout.new_base')

@section('title', 'EU Code Week Cookie Policy – Manage Your Preferences')
@section('description', 'Learn how EU Code Week uses cookies to enhance your browsing experience and how you can manage your preferences.')

<style>
  .cookie-content {
    a {
      color: #1C4DA1 !important;
      font-weight: 600 !important;
      text-decoration: underline;
    }
    p {
      padding: 0 !important;
      margin-bottom: 1rem;
    }
    
    strong {
      font-weight: 700;
    }
    
    table {
      border-radius: 16px;
      border-collapse: separate;
      margin: 2rem 0;
      
      thead tr th {
        background-color: #f95c22;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        padding: 16px 24px;
        
        &:first-child {
          border-top-left-radius: 16px;
        }
        &:last-child {
          border-top-right-radius: 16px;
        }
      }
      
      tbody tr {
        td {
          font-size: 16px;
          padding: 16px 24px;
          border: 2px solid #f95c22;
          border-top: 0;
          opacity: 0.8;
          
          &:not(:last-child) {
            border-right: 0;
          }
          &:not(:first-child) {
            border-left: 0;
          }
        }
        
        &:first-child td {
          border-top: 2px solid #f95c22;
          opacity: 0.8;
        }
        
        &:nth-child(even) td {
          background-color: #FFF5F2;
        }
        
        &:last-child td {
          &:first-child {
            border-bottom-left-radius: 16px;
          }
          &:last-child {
            border-bottom-right-radius: 16px;
          }
        }
      }
    }
    
    h3 {
      color: #000;
      font-weight: 700;
      font-size: 1.5rem;
      margin: 2rem 0 1rem 0;
    }
    
    h4 {
      color: #000;
      font-weight: 600;
      font-size: 1.25rem;
      margin: 1.5rem 0 1rem 0;
    }
    
    ul {
      list-style: disc;
      margin-left: 2rem;
      margin-bottom: 1rem;
      
      li {
        margin-bottom: 0.5rem;
      }
    }
  }
</style>

@section('content')
    <section id="codeweek-privacy-page" class="bg-white">
        <section class="flex overflow-hidden relative">
            <div class="flex relative py-10 w-full transition-all bg-blue-gradient tablet:py-20">
                <div class="flex overflow-hidden flex-col flex-shrink-0 justify-end w-full md:flex-row md:items-center">
                    <div class="flex flex-col codeweek-container-lg">
                        <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat']">
                            @lang('cookie_policy.title')
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white codeweek-container-lg py-10 tablet:py-20 font-[Blinker]">
            <div class="cookie-content text-[16px] md:text-xl">
                
                <!-- What are cookies section -->
                <div class="mb-10">
                    <h3>@lang('cookie_policy.what.title')</h3>
                    {!! __('cookie_policy.what.text') !!}
                    <p>{!! __('cookie_policy.what.first_party') !!}</p>
                    <p>{{ __('cookie_policy.what.persistent_cookies') }}</p>
                    {!! __('cookie_policy.what.items') !!}
                </div>

                <!-- How do we use cookies section -->
                <div class="mb-10">
                    <h3>@lang('cookie_policy.how.title')</h3>
                    {!! __('cookie_policy.how.text1') !!}
                    {!! __('cookie_policy.how.text2') !!}
                    
                    <h4>@lang('cookie_policy.how.3types.title')</h4>
                    <ul>
                        <li>@lang('cookie_policy.how.3types.1')</li>
                        <li>@lang('cookie_policy.how.3types.2')</li>
                        <li>@lang('cookie_policy.how.3types.3')</li>
                    </ul>
                </div>

                <!-- Dynamic Cookie Tables -->
                <div id="cookie-tables">
                    <!-- Visitor Preferences -->
                    <div class="mb-10">
                        <h4>@lang('cookie_policy.how.visitor_preferences.title')</h4>
                        {!! __('cookie_policy.how.visitor_preferences.text') !!}
                        <ul>
                            <li>@lang('cookie_policy.how.visitor_preferences.item')</li>
                        </ul>
                        
                        <table class="w-full">
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
                                    <td>CookieScriptConsent</td>
                                    <td>@lang('cookie_policy.how.visitor_preferences.table.1.service')</td>
                                    <td>@lang('cookie_policy.how.visitor_preferences.table.1.purpose')</td>
                                    <td>@lang('cookie_policy.how.visitor_preferences.table.1.type_duration')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Operational/Technical Cookies -->
                    <div class="mb-10">
                        <h4>@lang('cookie_policy.how.operational_cookies.title')</h4>
                        {!! __('cookie_policy.how.operational_cookies.text') !!}
                        <ul>
                            <li>@lang('cookie_policy.how.operational_cookies.item')</li>
                        </ul>

                        <h4>@lang('cookie_policy.how.technical_cookies.title')</h4>
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>@lang('cookie_policy.how.table.name')</th>
                                    <th>@lang('cookie_policy.how.table.purpose')</th>
                                    <th>@lang('cookie_policy.how.table.type_duration')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>XSRF-TOKEN</td>
                                    <td>@lang('cookie_policy.how.technical_cookies.table.1.purpose')</td>
                                    <td>@lang('cookie_policy.how.technical_cookies.table.1.type_duration')</td>
                                </tr>
                                <tr>
                                    <td>laravel_session</td>
                                    <td>@lang('cookie_policy.how.technical_cookies.table.2.purpose')</td>
                                    <td>@lang('cookie_policy.how.technical_cookies.table.2.type_duration')</td>
                                </tr>
                                <tr>
                                    <td>locale</td>
                                    <td>@lang('cookie_policy.how.technical_cookies.table.3.purpose')</td>
                                    <td>@lang('cookie_policy.how.technical_cookies.table.3.type_duration')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Analytics Cookies -->
                    <div class="mb-10">
                        <h4>@lang('cookie_policy.how.analytics_cookies.title')</h4>
                        {!! __('cookie_policy.how.analytics_cookies.items') !!}
                        
                        <table class="w-full">
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
                                    <td>_pk_id</td>
                                    <td>@lang('cookie_policy.how.analytics_cookies.table.1.service')</td>
                                    <td>@lang('cookie_policy.how.analytics_cookies.table.1.purpose')</td>
                                    <td>@lang('cookie_policy.how.analytics_cookies.table.1.type_duration')</td>
                                </tr>
                                <tr>
                                    <td>_pk_ses</td>
                                    <td>@lang('cookie_policy.how.analytics_cookies.table.2.service')</td>
                                    <td>@lang('cookie_policy.how.analytics_cookies.table.2.purpose')</td>
                                    <td>@lang('cookie_policy.how.analytics_cookies.table.2.type_duration')</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Third Party Cookies -->
                    <div class="mb-10">
                        <h3>@lang('cookie_policy.third-party.title')</h3>
                        {!! __('cookie_policy.third-party.items.1') !!}
                        <p>{{ __('cookie_policy.third-party.items.2') }}</p>
                        
                        <table class="w-full">
                            <thead>
                                <tr>
                                    <th>Provider</th>
                                    <th>@lang('cookie_policy.how.table.purpose')</th>
                                    <th>Privacy Policy</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Facebook</td>
                                    <td>Social media integration and advertising</td>
                                    <td><a href="https://www.facebook.com/policies/cookies/" target="_blank" rel="noopener">View Policy</a></td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td>Social media integration</td>
                                    <td><a href="https://help.twitter.com/en/rules-and-policies/twitter-cookies" target="_blank" rel="noopener">View Policy</a></td>
                                </tr>
                                <tr>
                                    <td>YouTube</td>
                                    <td>Video content delivery</td>
                                    <td><a href="https://policies.google.com/privacy" target="_blank" rel="noopener">View Policy</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- How to manage cookies -->
                <div class="mb-10">
                    <h3>@lang('cookie_policy.how-manage.title')</h3>
                    {!! __('cookie_policy.how-manage.items') !!}
                </div>

                <!-- Current Consent Status (Dynamic) -->
                <div class="p-6 mb-10 bg-gray-50 rounded-lg border-2 border-gray-200">
                    <h3>Your Current Cookie Preferences</h3>
                    <div id="consent-status">
                        <p class="text-gray-600">Loading your preferences...</p>
                    </div>
                </div>

                <!-- Manage Preferences Button -->
                <div class="mt-8 text-center">
                    <button onclick="if(typeof CookieScript !== 'undefined') { CookieScript.instance.show(); } return false;" 
                            class="bg-[#f95c22] text-white px-8 py-4 rounded-lg hover:bg-[#e54c12] transition font-semibold text-lg">
                        Manage Cookie Preferences
                    </button>
                </div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check for CookieScript and display current consent status
    function checkConsent() {
        const statusDiv = document.getElementById('consent-status');
        
        if (typeof CookieScript !== 'undefined' && CookieScript.instance) {
            try {
                const categories = CookieScript.instance.currentState();
                let html = '<div class="grid grid-cols-1 gap-4 md:grid-cols-2">';
                
                const categoryNames = {
                    'strict': 'Strictly Necessary',
                    'necessary': 'Strictly Necessary',
                    'performance': 'Performance/Statistics',
                    'statistics': 'Performance/Statistics',
                    'targeting': 'Marketing/Targeting',
                    'marketing': 'Marketing/Targeting',
                    'functionality': 'Functionality',
                    'preferences': 'Preferences'
                };
                
                for (const [key, value] of Object.entries(categories)) {
                    if (categoryNames[key]) {
                        const status = value ? '✅ Accepted' : '❌ Rejected';
                        html += `<div class="flex justify-between items-center p-3 bg-white rounded border">`;
                        html += `<span>${categoryNames[key]}:</span>`;
                        html += `<span class="font-semibold">${status}</span>`;
                        html += `</div>`;
                    }
                }
                
                html += '</div>';
                statusDiv.innerHTML = html;
            } catch (error) {
                statusDiv.innerHTML = '<p>Click "Manage Cookie Preferences" below to view and change your settings.</p>';
            }
        } else {
            setTimeout(checkConsent, 500);
        }
    }
    
    checkConsent();
});
</script>
@endpush