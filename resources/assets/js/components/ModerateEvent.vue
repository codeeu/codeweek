<template>
    <div class="moderate-event">
        <div>Current Status: <strong>{{status}}</strong></div>
        <div class="actions">
            <button @click="approve" class="codeweek-action-button">Approve</button>
            <button @click="reject" class="codeweek-action-button">Reject</button>
        </div>
    </div>
</template>

<script>


    export default {

        props: ['event'],
        data() {
            return {
                status: this.event.status
            }
        },
        methods: {
            approve() {
                axios.post('/api/event/approve/' + this.event.id)
                    .then(() => {
                        this.status = "APPROVED";
                        flash('Event Approved!')
                    });
            },
            reject() {
                axios.post('/api/event/reject/' + this.event.id)
                    .then(() => {
                        this.status = "REJECTED";
                        flash('Event Rejected!');
                    });
            },
        }
    }
</script>
