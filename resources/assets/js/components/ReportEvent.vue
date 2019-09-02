<template>
    <div v-if="status === 'APPROVED'">
        <div v-if="reported_at == null || certificate_url== null">
            <div class="report-event">
                <div>Submit a report for this event and claim your Code Week certificate.</div>
                <div class="actions">
                    <button @click="report" class="codeweek-action-button">Report event and claim certificate</button>
                </div>
            </div>
        </div>
    <div v-else>
        <div class="event-already-reported">
            <div>Your Code Week certificate is ready. Feel free to download it or share it directly.</div>
            <div class="actions">
                <button @click="download" class="codeweek-action-button">View your certificate here</button>
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