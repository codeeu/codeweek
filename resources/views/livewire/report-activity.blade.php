<div>
    @if($event->status === 'APPROVED')
        @if($event->reported_at == null || $event->certificate_url == null)

            <div class="report-event">
                <div style="text-align: right; padding-top:10px">{{__('event.submit_event_and_report')}}</div>
                <div class="actions">
                    <a href="/event/report/{{$event->id}}" class="codeweek-action-link-button">{{__('event.report_and_claim')}}</a>
                </div>
            </div>

        @else

            <div class="event-already-reported">
                <div class="pt-2">{{__('event.certificate_ready')}}</div>
                <div class="actions">
                    <a href="{{$event->certificate_url}}" class="codeweek-action-link-button">{{__('event.view_your_certificate')}}</a>
                </div>
            </div>
        @endif
    @endif

</div>
