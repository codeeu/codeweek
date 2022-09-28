<template>
  <div class="moderate-event">
    <!--        <button class="bg-pink-500 text-white active:bg-pink-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"-->
    <!--                type="button" style="transition: all .15s ease" v-on:click="toggleModal()">-->
    <!--            Open regular modal-->
    <!--        </button>-->


    <div class="actions" v-if="refresh">
      <strong>Moderation:</strong>
      <button @click="approve" class="codeweek-action-button green">Approve</button>
      <button @click="toggleModal" class="codeweek-action-button">Reject</button>
      <button @click="toggleDeleteModal" class="codeweek-action-button red">Delete</button>
    </div>


    <div class="h-8 w-full grid grid-cols-3 gap-4 items-center" v-if="!refresh">
      <div class="flex-none">Pending Activities: <a href="/review">{{ pendingCounter }}</a></div>
      <div class="flex justify-center">
        <div>{{ $t('event.current_status') }}: <strong>{{ status }}</strong> <span
            v-if="event.LatestModeration">({{ event.LatestModeration.message }})</span></div>
      </div>
      <div class="actions flex justify-items-end justify-end gap-2">
        <button @click="approve" class="codeweek-action-button green">Approve</button>
        <button @click="toggleModal" class="codeweek-action-button">Reject</button>
        <button @click="toggleDeleteModal" class="codeweek-action-button red">Delete</button>
      </div>
    </div>


    <div v-if="showModal"
         class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
      <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div
            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
          <!--header-->
          <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
            <h3 class="text-2xl font-semibold">
              Please provide a reason for rejection
            </h3>
            <button
                class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
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
            <div class="rejectionOptions" style="padding: 10px;">
              <multiselect v-model="rejectionOption" :options="rejectionOptions" track-by="title" label="title"
                           :close-on-select="true"
                           :preserve-search="false" placeholder="Select a rejection reason" :searchable="false"
                           :allowEmpty="false" @input="prefillRejectionText">
                <template slot="singleLabel" slot-scope="{ option }">{{ option.title }}</template>
                <pre class="language-json"><code>{{ rejectionOption.title }}</code></pre>
              </multiselect>

            </div>
            <textarea id="rejectionText" name="rejectionText" rows="4" cols="40" v-model="rejectionText"
                      class="px-1 py-1 placeholder-gray-400 text-gray-700 relative bg-blue-200 rounded text-sm shadow outline-none focus:outline-none focus:shadow-outline w-full pr-3">

                            </textarea>
            <!--                            <input type="text" placeholder="Placeholder" />-->

            </p>
          </div>
          <!--footer-->
          <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
            <button
                class="text-red-300 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1"
                type="button" style="transition: all .15s ease" v-on:click="toggleModal()">
              Cancel
            </button>

            <button @click="reject"
                    class="bg-red-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                    type="button" style="transition: all 0.15s ease 0s;">Reject
            </button>


          </div>
        </div>
      </div>
    </div>

    <div v-if="showDeleteModal"
         class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex">
      <div class="relative w-auto my-6 mx-auto max-w-3xl">
        <!--content-->
        <div
            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
          <!--header-->
          <div class="flex items-start justify-between p-5 border-b border-solid border-gray-300 rounded-t">
            <h3 class="text-2xl font-semibold">
              Delete Event
            </h3>
            <button
                class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                v-on:click="toggleDeleteModal()">
              <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                ×
              </span>
            </button>
          </div>
          <!--body-->
          <div class="relative p-6 flex-auto">
            This event will be permanently deleted from the website. Are you sure you want to delete this event ?
          </div>
          <!--footer-->
          <div class="flex items-center justify-end p-6 border-t border-solid border-gray-300 rounded-b">
            <button
                class="text-red-300 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1"
                type="button" style="transition: all .15s ease" v-on:click="toggleDeleteModal()">
              Cancel
            </button>

            <button @click="deleteEvent"
                    class="bg-red-500 text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                    type="button" style="transition: all 0.15s ease 0s;">Delete
            </button>


          </div>
        </div>
      </div>
    </div>

    <div v-if="showModal || showDeleteModal" class="opacity-25 fixed inset-0 z-40 bg-black"></div>
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
  components: {Multiselect},
  props: ['event', 'refresh', 'ambassador', 'pendingCounter', 'nextPending'],
  name: "reject-activity",
  data() {
    return {
      status: this.$t('myevents.status.' + this.event.status),
      showModal: false,
      showDeleteModal: false,
      rejectionText: '',
      rejectionOption: '',
      // rejectionOptions: [{'title': "Missing proper descriptions",
      //                      'text': "Please improve the description and describe in more detail what you will do and how your activity relates to coding and computational thinking. Thanks!"},
      //                    {'title': "Missing important details",
      //                      'text': "Provide more details on the activity objectives and goals and how it makes use of technology, coding and critical thinking. Thanks!"},
      //                    {'title': "Duplicate",
      //                      'text': "This seems to be a duplication of another activity taking place at the same time. If it is not please change the description and change the title so that it is clear that the activities are separate. Thanks!"},
      //                    {'title': "Not programming related",
      //                      'text': "Provide more information on the activity objectives and goals and how it makes use of technology, coding and critical thinking. Thanks!"}
      //                   ],
      rejectionOptions: [{
        'title': this.$t('moderation.description.title'),
        'text': this.$t('moderation.description.text')
      },
        {
          'title': this.$t('moderation.missing-details.title'),
          'text': this.$t('moderation.missing-details.text')
        }, {
          'title': this.$t('moderation.duplicate.title'),
          'text': this.$t('moderation.duplicate.text')
        }, {
          'title': this.$t('moderation.not-related.title'),
          'text': this.$t('moderation.not-related.text')
        }
      ]
    }
  },
  methods: {
    reRender() {
      if (this.refresh) {
        window.location.reload(false);
      } else {
        window.location.assign(this.nextPending);
      }
    },
    approve() {


      axios.post('/api/event/approve/' + this.event.id)
          .then(() => {
            this.status = "APPROVED";
            flash('Event Approved!')
            this.reRender();
          });

    },
    deleteEvent() {
      axios.post('/api/event/delete/' + this.event.id)
          .then((res) => {
            this.status = "DELETED";
            flash('Event Deleted!');
            if (this.refresh) {
              this.reRender();
            } else {
              window.location.assign(res.data.redirectUrl);
            }

          });
    },
    toggleModal() {
      this.showModal = !this.showModal;
    },
    toggleDeleteModal() {
      this.showDeleteModal = !this.showDeleteModal;
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
    prefillRejectionText() {
      this.rejectionText = this.rejectionOption.text;
    }
  }
}
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>