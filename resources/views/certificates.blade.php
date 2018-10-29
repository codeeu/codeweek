@extends('layout.base')

@section('content')


    <section>

        <div class="container">
            <h1 style="display: inline-block;">@lang('certificates.certificates_for'){{ Auth::user()->fullName }}</h1>
            <hr>

            @if($reported_events->isEmpty())
                <div class="row">
                    <p>@lang('certificates.no_certificates')</p>
                </div>
            @else

                <table class="table table-striped table-hover">
                    <thead class="bg-orange text-white">
                    <tr>
                        <th scope="col">{{ucfirst(__('search.event'))}}</th>
                        <th scope="col">@lang('report.name_for_certificate.label')</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reported_events as $event)
                    <tr>
                        <td scope="row"><a href="{{$event->certificate_url}}">{{$event->title}}</a></td>
                        <td width="*" scope="row">{{$event->name_for_certificate}}</td>
                        <td><a title="Edit your certificate" href="{{route('report_event',$event->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td><a title="Download your certificate" href="{{$event->certificate_url}}"><i class="fa fa-download" aria-hidden="true"></i></a></td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

                {{ $reported_events->links() }}
            @endif

        </div>

    </section>


@endsection