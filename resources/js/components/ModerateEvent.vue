<template>
  <div class="moderate-event">
    <!-- HELLO !!! -->

    <div class="px-5 flex items-center w-full gap-1" v-if="refresh">
      <p class="text-default text-slate-500 flex items-center font-semibold p-0">Moderation:</p>
      <div class="flex justify-end flex-1 items-center gap-1">
        <button @click="approve" class="font-normal w-fit px-2.5 py-1 bg-dark-blue text-white rounded-full flex items-center">Approve</button>
        <button @click="toggleModal" class="font-normal w-fit px-2.5 py-1 bg-primary text-white rounded-full flex items-center">Reject</button>
        <button @click="toggleDeleteModal" class="font-normal w-fit px-2.5 py-1 bg-dark-orange text-white rounded-full flex items-center">Delete</button>
      </div>
    </div>

    <div class="h-8 w-full grid grid-cols-3 gap-4 items-center" v-if="!refresh">
      <div class="flex-none">Pending Activities: <a href="/pending">{{ pendingCounter }}</a></div>
      <div class="flex justify-center">
        <div>{{ $t('event.current_status') }}: <strong>{{ status }}</strong> <span v-if="event.LatestModeration">({{ event.LatestModeration.message }})</span></div>
      </div>
      <div class="actions flex justify-items-end justify-end gap-2">
        <button @click="approve" class="codeweek-action-button green">Approve</button>
        <button @click="toggleModal" class="codeweek-action-button">Reject</button>
        <button @click="toggleDeleteModal" class="codeweek-action-button red">Delete</button>
      </div>
    </div>

    <!-- Modal for rejection -->
    <transition name="modal">
      <div v-if="showModal" class="modal-overlay">
        <div class="modal-container">
          <div class="modal-header">
            <h3 class="text-2xl font-semibold">Please provide a reason for rejection</h3>
            <button @click="toggleModal" class="close-button">×</button>
          </div>
          <div class="modal-body">
            <p class="text-gray-800 text-lg leading-relaxed">This will help the activity organizer to improve their submission.</p>
            <multiselect v-model="rejectionOption" :options="displayRejectionOptions" track-by="title" label="title" :close-on-select="true" :preserve-search="false" placeholder="Select a rejection reason" :searchable="false" :allow-empty="false" @input="prefillRejectionText">
              <template #singleLabel="{ option }">{{ option.title }}</template>
            </multiselect>
            <textarea v-model="rejectionText" class="reason-textarea" rows="4" cols="40" placeholder="Reason for rejection"></textarea>
          </div>
          <div class="modal-footer">
            <button @click="toggleModal" class="cancel-button">Cancel</button>
            <button @click="reject" class="reject-button">Reject</button>
          </div>
        </div>
      </div>
    </transition>

    <!-- Modal for delete confirmation -->
    <transition name="modal">
      <div v-if="showDeleteModal" class="modal-overlay">
        <div class="modal-container">
          <div class="modal-header">
            <h3 class="text-2xl font-semibold">Delete Event</h3>
            <button @click="toggleDeleteModal" class="close-button">×</button>
          </div>
          <div class="modal-body">
            <p>This event will be permanently deleted from the website. Are you sure you want to delete this event?</p>
          </div>
          <div class="modal-footer">
            <button @click="toggleDeleteModal" class="cancel-button">Cancel</button>
            <button @click="deleteEvent" class="delete-button">Delete</button>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import axios from 'axios';

export default {
  components: { Multiselect },
  props: ['event', 'refresh', 'ambassador', 'pendingCounter', 'nextPending'],
  name: "moderate-activity",
  data() {
    return {
      status: this.event.status,
      showModal: false,
      showDeleteModal: false,
      rejectionText: '',
      rejectionOption: null,
      rejectionOptions: [
        {
          'title': this.$t('moderation.description.title'),
          'text': this.$t('moderation.description.text')
        },
        {
          'title': this.$t('moderation.missing-details.title'),
          'text': this.$t('moderation.missing-details.text')
        },
        {
          'title': this.$t('moderation.duplicate.title'),
          'text': this.$t('moderation.duplicate.text')
        },
        {
          'title': this.$t('moderation.not-related.title'),
          'text': this.$t('moderation.not-related.text')
        }
      ]
    };
  },
  computed: {
    displayRejectionOptions() {
      return this.rejectionOptions.map(option => {
        switch (option.title) {
          case 'moderation.description.title':
            return {
              title: "Missing proper descriptions",
              text: "Please improve the description and describe in more detail what you will do and how your activity relates to coding and computational thinking. Thanks!"
            };
          case 'moderation.missing-details.title':
            return {
              title: "Missing important details",
              text: "Provide more details on the activity objectives and goals and how it makes use of technology, coding and critical thinking. Thanks!"
            };
          case 'moderation.duplicate.title':
            return {
              title: "Duplicate",
              text: "This seems to be a duplication of another activity taking place at the same time. If it is not please change the description and change the title so that it is clear that the activities are separate. Thanks!"
            };
          case 'moderation.not-related.title':
            return {
              title: "Not programming related",
              text: "Provide more information on the activity objectives and goals and how it makes use of technology, coding and critical thinking. Thanks!"
            };
          default:
            return option; // Fallback to the original if no match
        }
      });
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
            this.reRender();
          });
    },
    deleteEvent() {
      axios.post('/api/event/delete/' + this.event.id)
          .then((res) => {
            this.status = "DELETED";
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
      axios.post('/api/event/reject/' + this.event.id, { rejectionText: this.rejectionText })
          .then(() => {
            this.toggleModal();
            this.status = "REJECTED";
            this.reRender();
          });
    },
    prefillRejectionText() {
      this.rejectionText = this.rejectionOption.text;
    }
  }
}
</script>

<style>
/* Add your modal styles here */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-container {
  background-color: white;
  border-radius: 8px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  padding: 20px;
  max-width: 80%;
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 20px;
}

.modal-header h3 {
  margin: 0;
}

.close-button {
  border: none;
  background: none;
  font-size: 24px;
  cursor: pointer;
}

.modal-body {
  margin-bottom: 20px;
}

.modal-footer {
  display: flex;
  justify-content: flex-end;
}

.cancel-button {
  border: none;
  background: none;
  color: #333;
  cursor: pointer;
  margin-right: 10px;
}

.reject-button {
  border: none;
  background-color: #ff0000;
  color: white;
  padding: 8px 16px;
  border-radius: 4px;
  cursor: pointer;
}

.delete-button {
  border: none;
  background-color: #ff0000;
  color: white;
  padding: 8px 16px;
  border-radius: 4px;
  cursor: pointer;
}
</style>
