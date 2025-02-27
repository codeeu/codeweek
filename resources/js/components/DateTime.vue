<template>
  <div class="datepicker-wrapper">
    <div class="flex items-center h-[48px] flex-row w-full px-6 py-3 text-form md:max-w-[472px] text-black-light rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
         :class="{'ring-dark-orange ring-2': hasError, 'ring-gray-300': !hasError}">
      <VueDatePicker
        :name="'start_date'"
        v-model="startDate"
        :placeholder="placeholderStart"
        type="datetime"
        format="yyyy-MM-dd HH:mm"
        :time-picker-options="{start: '07:00', step: '00:30', end: '23:30'}"
        :lang="lang"
        class="flex-1"
        @update:modelValue="handleStartDateChange"
      />
      <div class="mx-2">-</div>
      <VueDatePicker
        :name="'end_date'"
        v-model="endDate"
        :placeholder="placeholderEnd"
        type="datetime"
        format="yyyy-MM-dd HH:mm"
        :time-picker-options="{start: '07:00', step: '00:30', end: '23:30'}"
        :lang="lang"
        class="flex-1"
        @update:modelValue="handleEndDateChange"
      />
    </div>
  </div>
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css';

export default {
  components: { VueDatePicker },
  props: {
    startDateValue: {
      type: String,
      default: '',
    },
    endDateValue: {
      type: String,
      default: '',
    },
    placeholderStart: {
      type: String,
      default: '',
    },
    placeholderEnd: {
      type: String,
      default: '',
    },
    lang: {
      type: String,
      default: 'en',
    },
  },
  data() {
    return {
      startDate: this.startDateValue || '',
      endDate: this.endDateValue || '',
      hasError: false
    };
  },
  mounted() {
    // Check for initial validation errors
    this.checkForErrors();

    // Create MutationObserver to watch for validation errors
    const observer = new MutationObserver(() => {
      this.checkForErrors();
    });

    // Start observing the error containers
    const startDateError = document.querySelector('.errors [data-field="start_date"]');
    const endDateError = document.querySelector('.errors [data-field="end_date"]');
    
    if (startDateError) {
      observer.observe(startDateError, { childList: true, subtree: true });
    }
    if (endDateError) {
      observer.observe(endDateError, { childList: true, subtree: true });
    }
  },
  methods: {
    checkForErrors() {
      const startDateError = document.querySelector('.errors [data-field="start_date"]');
      const endDateError = document.querySelector('.errors [data-field="end_date"]');
      
      this.hasError = !!(startDateError?.offsetParent || endDateError?.offsetParent);
    },
    handleStartDateChange(value) {
      this.startDate = value;
      this.clearError('start_date');
      this.$emit('update:startDateValue', value);
    },
    handleEndDateChange(value) {
      this.endDate = value;
      this.clearError('end_date');
      this.$emit('update:endDateValue', value);
    },
    clearError(fieldName) {
      // Clear the specific error
      const errorElement = document.querySelector(`.errors [data-field="${fieldName}"]`);
      if (errorElement) {
        errorElement.style.display = 'none';
      }

      // Notify Alpine.js about the cleared error
      const alpineComponent = document.querySelector('[x-data="multiStepForm"]')?.__x?.data;
      if (alpineComponent) {
        alpineComponent.clearFieldError(fieldName);
      }

      this.checkForErrors();
    }
  }
};
</script>

<style scoped>
:deep(.dp__input) {
  border: none;
  --tw-ring-color: none;
  color: #00000080;
  font-family: "PT Sans";
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: 24px;
}

:deep(.dp__icon) {
  stroke: rgb(0 0 0);
  fill: rgb(0 0 0);
}

:deep(.dp__menu_inner) {
  color: #00000080;
  font-family: "PT Sans";
  font-size: 16px;
  font-style: normal;
  font-weight: 400;
  line-height: 24px;
}

:deep(.dp__active_date) {
  background: #164194;
}

:deep(.dp__action_buttons .dp__action_select) {
  background: #164194;
}
</style>