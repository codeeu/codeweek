<template>
    <div v-if="status === 'APPROVED'">
        <div v-if="reported_at == null || certificate_url== null">
            <div class="report-event p-8">
                <div style="text-align: right;">{{$t('event.submit_event_and_report')}}</div>
                <div class="actions">
                    <button @click="report" class="codeweek-action-button">{{$t('event.report_and_claim')}}</button>
                </div>
            </div>
        </div>
    <div v-else>
        <div class="event-already-reported">
            <div>{{$t('event.certificate_ready')}}</div>
            <div class="actions">
                <button @click="download" class="codeweek-action-button">{{$t('event.view_your_certificate')}}</button>
            </div>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        props: ['event'],
        data() {
            return {
                reported_at: this.event.reported_at,
                certificate_url: this.event.certificate_url,
                status: this.event.status
            }
        },
        methods: {
            report() {
                window.location.href = '/event/report/' + this.event.id;
            },
            download() {
                window.location.href = this.event.certificate_url;
            }
        }
    }
</script>