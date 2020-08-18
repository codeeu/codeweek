<template>
    <div class="moderate-event">
        <!--        <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"-->
        <!--                type="button" style="transition: all .15s ease" v-on:click="toggleModal()">-->
        <!--            Open regular modal-->
        <!--        </button>-->
        <div v-if="!refresh">{{$t('event.current_status')}}: <strong>{{status}}</strong> <span v-if="event.LatestModeration">({{event.LatestModeration.message}})</span></div>
        <div v-if="refresh"><strong>Moderation:</strong></div>
        <div class="actions">
            <button @click="approve" class="codeweek-action-button green">Approve</button>
            <button @click="toggleModal" class="codeweek-action-button orange">Reject</button>
            <button @click="deleteEvent" class="codeweek-action-button red">Delete</button>
        </div>

        <div v-if="showModal"
             class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
            <div class="relative w-auto my-6 mx-auto max-w-3xl">
                <!--content-->
                <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                    <!--header-->
                    <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
                        <h3 class="text-2xl font-semibold">
                            Please provide a reason for rejection
                        </h3>
                        <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                v-on:click="toggleModal()">
              <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                ×
              </span>
                        </button>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <p class="text-gray-800 text-lg leading-relaxed">
                            This will help the activity organizer to improve his/her submission.
                            <textarea id="rejectionText" name="rejectionText" rows="4" cols="40" v-model="rejectionText"
                                      class="px-1 py-1 placeholder-gray-400 text-gray-700 relative bg-orange-200 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pr-3">

                            </textarea>
                            <!--                            <input type="text" placeholder="Placeholder" />-->

                        </p>
                    </div>
                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
                        <button class="text-red-300 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1"
                                type="button" style="transition: all .15s ease" v-on:click="toggleModal()">
                            Cancel
                        </button>

                        <button @click="reject"
                                class="bg-orange-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                type="button" style="transition: all 0.15s ease 0s;">Reject
                        </button>




                    </div>
                </div>
            </div>
        </div>
        <div v-if="showModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    </div>
</template>

<script>


    export default {

        props: ['event', 'refresh'],
        name: "reject-activity",
        data() {
            return {
                status: this.$t('myevents.status.' + this.event.status),
                showModal: false,
                rejectionText: ''
            }
        },
        methods: {
            reRender() {
                // if (this.refresh) {
                    window.location.reload(false);
                // }
            },
            approve() {
                axios.post('/api/event/approve/' + this.event.id)
                    .then(() => {
                        this.status = "APPROVED";
                        flash('Event Approved!')

                        this.reRender();

                    });

            },
            deleteEvent(){
                console.log("Delete incoming");
            },
            toggleModal() {
                this.showModal = !this.showModal;
            },
            reject() {

                axios.post('/api/event/reject/' + this.event.id, {rejectionText: this.rejectionText})
                    .then(() => {
                        this.toggleModal();
                        this.status = "REJECTED";
                        flash('Event Rejected!');

                        this.reRender();


                    });

            },
        }
    }
</script>