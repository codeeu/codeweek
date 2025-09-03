@extends('layout.new_base')

@section('title', 'EU Code Week Cookie Policy – Manage Your Preferences')
@section('description', 'Learn how EU Code Week uses cookies to enhance your browsing experience and how you can manage your preferences.')

<style>
  .cookie-content {
    a {
      color: #1C4DA1 !important;
      font-weight: 600 !important;
    }
    p {
      padding: 0 !important;
    }
    
    table {
      border-radius: 16px;
      border-collapse: separate;
      
      thead tr th {
        background-color: #410098;
        color: #fff;
        font-size: 20px;
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
          font-size: 18px;
          padding: 16px 24px;
          border-bottom: 2px solid #B399D6;
          border-left: 2px solid #B399D6;
          border-right: 2px solid #B399D6;
          
          &:first-child {
            border-left: 2px solid #B399D6;
          }
          &:last-child {
            border-right: 2px solid #B399D6;
          }
        }
        
        &:nth-child(even) td {
          background-color: #F5F2FA;
        }
        
        &:first-child td {
          border-top: 2px solid #B399D6;
        }
        
        &:last-child td {
          border-bottom: 2px solid #B399D6;
          &:first-child {
            border-bottom-left-radius: 16px;
          }
          &:last-child {
            border-bottom-right-radius: 16px;
          }
        }
      }
    }
  }
</style>

@section('content')
    <section id="codeweek-privacy-page" class="bg-white">
        <!-- Header -->
        <section class="flex overflow-hidden relative">
            <div class="flex relative py-10 w-full transition-all bg-blue-gradient tablet:py-20">
                <div class="flex overflow-hidden flex-col flex-shrink-0 justify-end w-full md:flex-row md:items-center">
                    <div class="flex flex-col codeweek-container-lg">
                        <h2 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat']">
                            @lang('cookie_policy.title', 'Cookie Policy')
                        </h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white codeweek-container-lg py-10 tablet:py-20 font-[Blinker]">
            <div class="cookie-content text-[16px] md:text-xl">
                <!-- Dynamic Cookie Report -->
                <div id="cookie-report">
                    <div class="py-8 text-center">
                        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-[#410098]"></div>
                        <p class="mt-4 text-gray-600">Loading cookie information...</p>
                    </div>
                </div>
                
                <!-- Manage Preferences Button -->
                <div class="mt-8 text-center">
                    <button onclick="if(typeof CookieScript !== 'undefined') { CookieScript.instance.show(); } return false;" 
                            class="bg-[#410098] text-white px-8 py-4 rounded-lg hover:bg-[#5A00D6] transition font-semibold text-lg">
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
    let attempts = 0;
    const maxAttempts = 50;
    
    function checkCookieScript() {
        attempts++;
        if (typeof CookieScript !== 'undefined' && CookieScript.instance) {
            generateCookieReport();
        } else if (attempts < maxAttempts) {
            setTimeout(checkCookieScript, 200);
        } else {
            // Fallback if CookieScript doesn't load
            generateStaticReport();
        }
    }
    
    function generateCookieReport() {
        const reportContainer = document.getElementById('cookie-report');
        
        try {
            // Get cookie categories from CookieScript
            const categories = CookieScript.instance.currentState();
            
            let html = '<div class="cookie-declaration">';
            html += '<p class="mb-6 text-lg">This website uses cookies to enhance your browsing experience. Below you can see what cookies we use and manage your preferences.</p>';
            
            // Current consent status
            html += '<div class="p-6 mb-8 bg-gray-50 rounded-lg border-2 border-gray-200">';
            html += '<h3 class="font-bold text-2xl mb-4 text-[#410098]">Your Current Preferences:</h3>';
            html += '<div class="grid grid-cols-1 gap-4 md:grid-cols-2">';
            
            const categoryNames = {
                'strict': 'Strictly Necessary',
                'performance': 'Performance/Statistics', 
                'targeting': 'Marketing/Targeting',
                'functionality': 'Functionality'
            };
            
            // CookieScript might use different category names
            const possibleCategoryNames = ['strict', 'necessary', 'performance', 'statistics', 'targeting', 'marketing', 'functionality', 'preferences'];
            
            possibleCategoryNames.forEach(key => {
                if (categories && categories.hasOwnProperty(key)) {
                    const displayName = categoryNames[key] || key.charAt(0).toUpperCase() + key.slice(1);
                    const status = categories[key] ? '✅ Accepted' : '❌ Rejected';
                    html += `<div class="flex justify-between items-center p-3 bg-white rounded border">`;
                    html += `<span>${displayName}:</span>`;
                    html += `<span class="font-semibold">${status}</span>`;
                    html += `</div>`;
                }
            });
            
            html += '</div></div>';
            
            // Display cookie tables
            html += generateCookieTables();
            
            html += '</div>';
            reportContainer.innerHTML = html;
        } catch (error) {
            console.error('Error generating cookie report:', error);
            generateStaticReport();
        }
    }
    
    function generateStaticReport() {
        const reportContainer = document.getElementById('cookie-report');
        let html = '<div class="cookie-declaration">';
        html += '<p class="mb-6 text-lg">This website uses cookies to enhance your browsing experience. Below you can see what cookies we use.</p>';
        html += generateCookieTables();
        html += '</div>';
        reportContainer.innerHTML = html;
    }
    
    function generateCookieTables() {
        let html = '';
        
        // Cookie details by category
        const cookieData = {
            'Strictly Necessary Cookies': [
                { name: 'CookieScriptConsent', purpose: 'Stores your cookie preferences', duration: '1 year' },
                { name: 'XSRF-TOKEN', purpose: 'Security token to prevent cross-site attacks', duration: 'Session' },
                { name: 'laravel_session', purpose: 'Website functionality and session management', duration: 'Session' }
            ],
            'Performance/Statistics Cookies': [
                { name: '_pk_id.*', purpose: 'Matomo - Distinguishes website visitors', duration: '13 months' },
                { name: '_pk_ses.*', purpose: 'Matomo - Tracks page requests from the same visit', duration: '30 minutes' },
                { name: '_pk_ref.*', purpose: 'Matomo - Stores referrer information', duration: '6 months' },
                { name: 'mtm_consent', purpose: 'Matomo - Remembers consent for Matomo analytics', duration: '30 years' }
            ],
            'Marketing/Targeting Cookies': [
                { name: '_fbp', purpose: 'Facebook - Tracks visits across websites to deliver advertising', duration: '3 months' },
                { name: 'fr', purpose: 'Facebook - Enables ad delivery or retargeting', duration: '3 months' },
                { name: '_fbc', purpose: 'Facebook - Tracks visits from Facebook ads', duration: '2 years' }
            ]
        };
        
        // Display cookies by category
        for (const [category, cookies] of Object.entries(cookieData)) {
            html += `<div class="mb-10">`;
            html += `<h3 class="font-bold text-2xl mb-4 text-[#410098]">${category}</h3>`;
            html += '<div class="overflow-x-auto">';
            html += '<table class="w-full min-w-[600px]">';
            html += '<thead><tr>';
            html += '<th class="text-left">Cookie Name</th>';
            html += '<th class="text-left">Purpose</th>';
            html += '<th class="text-left">Duration</th>';
            html += '</tr></thead><tbody>';
            
            cookies.forEach((cookie, index) => {
                html += `<tr>`;
                html += `<td>${cookie.name}</td>`;
                html += `<td>${cookie.purpose}</td>`;
                html += `<td>${cookie.duration}</td>`;
                html += '</tr>';
            });
            
            html += '</tbody></table></div></div>';
        }
        
        return html;
    }
    
    checkCookieScript();
});
</script>
@endpush