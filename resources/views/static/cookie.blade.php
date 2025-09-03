
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
    .CookieDeclarationType {
      border: 0;
      padding: 0;
    }

    .CookieDeclarationTypeHeader {
      font-weight: 600;
      font-size: 24px;
      font-family: Montserrat;
      margin: 40px 0 16px 0;
      color: #1C4DA1;
    }

    table {
      border-radius: 16px;
      border-collapse: separate;

      tr {
        th {
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
        td {
          font-size: 20px;
          padding: 16px 24px;
          border-bottom: 0;

          &:first-child {
            border-left: 2px solid #B399D6;
          }
          &:last-child {
            border-right: 2px solid #B399D6;
          }
        }
      }

      tr:nth-child(even) {
        td {
          background-color: #F5F2FA;
        }
      }

      tr:last-child {
        border-bottom-left-radius: 16px !important;
        td {
          border-bottom: 2px solid #B399D6;
          &:first-child {
            border-bottom-left-radius: 16px !important;
          }
          &:last-child {
            border-bottom-right-radius: 16px !important;
          }
        }
      }
    }

    .CookieDeclaration > p {
      margin-bottom: 32px;
    }
    
    .CookieDeclarationIntro {
      br {
        line-height: 0.5;
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
            <!-- Cookie Declaration Container -->
            <div class="cookie-content text-[16px] md:text-xl">
                <!-- CookieScript Declaration Embed -->
                <div id="cookiescript_declaration"></div>
            </div>
        </section>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Method 1: Direct iframe embed
            const container = document.getElementById('cookiescript_declaration');
            if (container) {
                container.innerHTML = '<iframe src="https://cookie-script.com/s/{{ env("COOKIESCRIPT_ID") }}/declaration" style="width:100%; height:800px; border:none;"></iframe>';
            }
        });
    </script>
@endpush