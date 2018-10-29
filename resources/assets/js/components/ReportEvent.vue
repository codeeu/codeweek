<template>
    <div v-if="status === 'APPROVED'">
        <div v-if="reported_at == null || certificate_url== null">

            <div class="flex lg:justify-between bg-orange text-white min-w-full p-4 mb-3">
                <div>
                    Submit a report for this event and claim your Code Week certificate.
                </div>
                <div>
                    <button @click="report"
                            class="bg-blue leading-none hover:bg-blue-dark hover:text-white text-white font-bold py-2 px-4 rounded">
                        Report
                        event and claim certificate
                    </button>
                </div>
            </div>
        </div>

        <div v-else>
            <div class="flex lg:justify-between bg-orange text-white min-w-full p-4 mb-3">
                <div>
                    Your Code Week certificate is ready.
                    Feel free to download it or share it directly.
                </div>
                <div>
                    <button @click="download"
                            class="bg-blue leading-none hover:bg-blue-dark hover:text-white text-white font-bold py-2 px-4 rounded">
                        View your certificate here
                    </button>

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
                //Show modal with data
                /*axios.post(`/api/event/report/${event.id}`)
                    .then((res) => {
                        //this.event = res.data;
                        this.reported_at = res.data.reported_at.date;
                        flash('Event Reported!')
                    });*/
            },
            download() {
                window.location.href = this.event.certificate_url;
            }

        }
    }
</script>

<style scoped>

</style>