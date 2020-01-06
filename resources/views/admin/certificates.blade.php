@extends('layout.base')

@section('content')
    <section id="codeweek-participation-report-page" class="codeweek-page">

        <section class="codeweek-content-header" style="display: flex; justify-content: space-between;">
            <h1>Multiple Certificates</h1>

        </section>

        <section class="codeweek-content-wrapper">
            <form method="POST" id="certificates" role="form" enctype="multipart/form-data"
                  action="/admin/certificates" class="codeweek-form">

                {{csrf_field()}}

                <div class="codeweek-form-inner-container">

                    <textarea name="names" rows="10">
                    </textarea>

                    <div class="codeweek-form-button-container">
                        <div class="codeweek-button">
                            <input type="submit" value="@lang('participation.submit')">
                        </div>
                    </div>

                </div>

            </form>

            @isset($results)
                <ul>
                    @foreach($results as $line)
                        <li>

                            {{$line["name"]}} - {{$line["path"]}}
                        </li>


                    @endforeach
                </ul>
            @endisset


        </section>


    </section>
@endsection
