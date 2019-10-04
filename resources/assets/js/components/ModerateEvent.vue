<template>
    <div class="moderate-event">
        <div v-if="!refresh">{{$t('event.current_status')}}: <strong>{{status}}</strong></div>
        <div v-if="refresh"><strong>Moderation:</strong></div>
        <div class="actions">
            <button @click="approve" class="codeweek-action-button green">Approve</button>
            <button @click="reject" class="codeweek-action-button red">Reject</button>
        </div>
    </div>
</template>

<script>


    export default {

        props: ['event','refresh'],
        data() {
            return {
                status: this.$t('myevents.status.' + this.event.status)
            }
        },
        methods: {
            approve() {
               axios.post('/api/event/approve/' + this.event.id)
                    .then(() => {
                        this.status = "APPROVED";
                        flash('Event Approved!')
                    });
               if (this.refresh){
                   location.reload();
               }
            },
            reject() {
                axios.post('/api/event/reject/' + this.event.id)
                    .then(() => {
                        this.status = "REJECTED";
                        flash('Event Rejected!');
                    });
                if (this.refresh){
                    location.reload();
                }
            },
        }
    }
</script>
