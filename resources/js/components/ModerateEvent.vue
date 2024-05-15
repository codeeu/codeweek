<template>
  <div class="moderate-event">
    <!-- HELLO !!! -->

    <div class="actions" v-if="refresh">
      <strong>Moderation:</strong>
      <button @click="approve" class="codeweek-action-button green">Approve</button>
      <button @click="toggleModal" class="codeweek-action-button">Reject</button>
      <button @click="toggleDeleteModal" class="codeweek-action-button red">Delete</button>
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
            <multiselect v-model="rejectionOption" :options="rejectionOptions" track-by="title" label="title" :close-on-select="true" :preserve-search="false" placeholder="Select a rejection reason" :searchable="false" :allowEmpty="false" @input="prefillRejectionText">
              <template slot="singleLabel" slot-scope="{ option }">{{ option.title }}</template>
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
import { ref } from 'vue';
import Multiselect from 'vue-multiselect';

export default {
  components: { Multiselect },
  props: ['event', 'refresh', 'ambassador', 'pendingCounter', 'nextPending'],
  name: "reject-activity",
  setup(props) {
    const status = ref(props.$t('myevents.status.' + props.event.status));
    const showModal = ref(false);
    const showDeleteModal = ref(false);
    const rejectionText = ref('');
    const rejectionOption = ref(null);
    const rejectionOptions = ref([
      {
        'title': props.$t('moderation.description.title'),
        'text': props.$t('moderation.description.text')
      },
      {
        'title': props.$t('moderation.missing-details.title'),
        'text': props.$t('moderation.missing-details.text')
      },
      {
        'title': props.$t('moderation.duplicate.title'),
        'text': props.$t('moderation.duplicate.text')
      },
      {
        'title': props.$t('moderation.not-related.title'),
        'text': props.$t('moderation.not-related.text')
      }
    ]);

    const reRender = () => {
      if (props.refresh) {
        window.location.reload(false);
      } else {
        window.location.assign(props.nextPending);
      }
    };

    const approve = () => {
      axios.post('/api/event/approve/' + props.event.id)
          .then(() => {
            status.value = "APPROVED";
            flash('Event Approved!');
            reRender();
          });
    };

    const deleteEvent = () => {
      axios.post('/api/event/delete/' + props.event.id)
          .then((res) => {
            status.value = "DELETED";
            flash('Event Deleted and email sent!');
            if (props.refresh) {
              reRender();
            } else {
              window.location.assign(res.data.redirectUrl);
            }
          });
    };

    const toggleModal = () => {
      showModal.value = !showModal.value;
    };

    const toggleDeleteModal = () => {
      showDeleteModal.value = !showDeleteModal.value;
    };

    const reject = () => {
      axios.post('/api/event/reject/' + props.event.id, { rejectionText: rejectionText.value })
          .then(() => {
            toggleModal();
            status.value = "REJECTED";
            flash('Event Rejected!');
            reRender();
          });
    };

    const prefillRejectionText = () => {
      rejectionText.value = rejectionOption.value.text;
    };

    return {
      status,
      showModal,
      showDeleteModal,
      rejectionText,
      rejectionOption,
      rejectionOptions,
      reRender,
      approve,
      deleteEvent,
      toggleModal,
      toggleDeleteModal,
      reject,
      prefillRejectionText
    };
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
