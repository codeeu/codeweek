@extends('layout.base')

@section('content')
<section class="codeweek-page">
    <section class="codeweek-content-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h1>Certificate errors – {{ $type }} ({{ $edition }})</h1>
        <a href="{{ route('certificate_backend.index', ['edition' => $edition, 'type' => $typeSlug]) }}" class="bg-primary cursor-pointer px-6 py-3 rounded-full font-semibold text-white hover:opacity-90 duration-300 inline-block">Back to list</a>
    </section>

    <ul class="cert-backend-tabs" style="display: flex; gap: 0.5rem; list-style: none; padding: 0; margin: 0 0 1.5rem 0;">
        <li><a href="{{ route('certificate_backend.errors', ['edition' => $edition, 'type' => 'excellence']) }}">Excellence</a></li>
        <li><a href="{{ route('certificate_backend.errors', ['edition' => $edition, 'type' => 'super-organiser']) }}">Super Organiser</a></li>
    </ul>

    <div class="codeweek-content-wrapper">
        @if($rows->isEmpty())
            <p>No errors recorded.</p>
        @else
            <table class="codeweek-table" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="text-align: left; padding: 0.5rem;">ID</th>
                        <th style="text-align: left; padding: 0.5rem;">Name</th>
                        <th style="text-align: left; padding: 0.5rem;">Email</th>
                        <th style="text-align: left; padding: 0.5rem;">Generation error</th>
                        <th style="text-align: left; padding: 0.5rem;">Send error</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $r)
                        <tr>
                            <td style="padding: 0.5rem;">{{ $r->id }}</td>
                            <td style="padding: 0.5rem;">{{ $r->name_for_certificate ?? ($r->user ? trim($r->user->firstname . ' ' . $r->user->lastname) : '') }}</td>
                            <td style="padding: 0.5rem;">{{ $r->user->email ?? '' }}</td>
                            <td style="padding: 0.5rem; max-width: 320px; word-break: break-word;">{{ $r->certificate_generation_error ?? '–' }}</td>
                            <td style="padding: 0.5rem; max-width: 320px; word-break: break-word;">{{ $r->certificate_sent_error ?? '–' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</section>
@endsection
