@extends('layout.base')

@section('content')

    <section id="codeweek-certificates-page" class="codeweek-page">

        <section class="codeweek-content-header">
            <h1>@lang('certificates.certificates_for'){{ Auth::user()->fullName }}</h1>
        </section>

        <section class="codeweek-content-wrapper">

            @if($reported_events->isEmpty() && $excellence->isEmpty() && $participation->isEmpty())
                <p>@lang('certificates.no_certificates')</p>
            @endif

            <table class="codeweek-table">
                <thead>
                <tr>
                    <th>Type</th>
                    <th>Activity</th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                @if(!$participation->isEmpty())
                    @foreach($participation as $certificate_of_participation)
                        @if(!is_null($certificate_of_participation->event_name))
                            <tr>
                                <td>Participation</td>
                                <td></td>
                                <td>{{$certificate_of_participation->event_date}}</td>
                                <td>{{$certificate_of_participation->event_name}}</td>
                                <td class="actions">
                                    @if(!empty($certificate_of_participation->participation_url))
                                        <a title="Download your certificate" class="codeweek-svg-button"
                                           href="{{$certificate_of_participation->participation_url}}">
                                            <img src="/images/download.svg">
                                        </a>
                                    @else
                                        @if($certificate_of_participation->status == 'ERROR')
                                            Error with special characters.
                                        @else
                                            Processing ...
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif

                @if(!$excellence->isEmpty())
                    @foreach($excellence as $certificate_of_excellence)
                        @if(!is_null($certificate_of_excellence->name_for_certificate))
                            <tr>
                                <td>Excellence</td>
                                <td></td>
                                <td></td>
                                <td>Certificate of Excellence {{$certificate_of_excellence->edition}}
                                    ({{$certificate_of_excellence->name_for_certificate}})
                                </td>
                                <td class="actions">
                                    <a title="Download your certificate" class="codeweek-svg-button"
                                       href="{{$certificate_of_excellence->certificate_url}}">
                                        <img src="/images/download.svg">
                                    </a>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5">
                                    <a href="{{route('certificate_excellence_report', ['edition'=>$certificate_of_excellence->edition])}}">
                                        Claim your certificate of excellence for {{$certificate_of_excellence->edition}}
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif

                @if(!$superOrganiser->isEmpty())
                    @foreach($superOrganiser as $super_organiser_certificate)
                        @if(!is_null($super_organiser_certificate->name_for_certificate))
                            <tr>
                                <td>Super Organiser</td>
                                <td></td>
                                <td></td>
                                <td>Super Organiser Certificate {{$super_organiser_certificate->edition}}
                                    ({{$super_organiser_certificate->name_for_certificate}})
                                </td>
                                <td class="actions">
                                    <a title="Download your certificate" class="codeweek-svg-button"
                                       href="{{$super_organiser_certificate->certificate_url}}">
                                        <img src="/images/download.svg">
                                    </a>
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td colspan="5">
                                    <a href="{{route('certificate_super_organiser_report', ['edition'=>$super_organiser_certificate->edition])}}">
                                        Claim your Super Organiser certificate
                                        for {{$super_organiser_certificate->edition}}
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                @endif

                @if(!$reported_events->isEmpty())
                    @foreach($reported_events as $event)
                        <tr>
                            <td>Reported</td>
                            <td>{{$event->title}}</td>
                            <td></td>
                            <td>{{$event->name_for_certificate}}</td>
                            <td class="actions">
                                <a title="Edit your certificate" class="codeweek-svg-button"
                                   href="{{route('report_event',$event->id)}}">
                                    <img src="/images/edit.svg">
                                </a>
                                <a title="Download your certificate" class="codeweek-svg-button"
                                   href="{{$event->certificate_url}}">
                                    <img src="/images/download.svg">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </section>

    </section>

    <script>
        setTimeout(function () {
            window.location.reload(1);
        }, 20000);
    </script>

@endsection
