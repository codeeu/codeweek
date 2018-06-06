<template>
    <div class="flex lg:justify-between bg-blue-lighter min-w-full p-4 mb-3">


        <div>Current Status: {{status}}</div>
        <div>Actions:
            <button @click="approve" class="bg-blue hover:bg-blue-dark text-white font-bold py-2 px-4 rounded">Approve
            </button>
            -
            <button @click="reject" class="bg-red hover:bg-red-dark text-white font-bold py-2 px-4 rounded">Reject
            </button>


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
