<template>
  <div class="datepicker-wrapper">
    <!--        <date-picker :input-name="name" width="100%" :placeholder="placeholder" v-model="time1" type="datetime" format="yyyy-MM-dd HH:mm:ss" :time-picker-options="{start: '07:00',step: '00:30',end: '23:30'}" lang="en"></date-picker>-->
    <VueDatePicker :name="name" v-model="time1" type="datetime" format="yyyy-MM-dd HH:mm" :time-picker-options="{start: '07:00',step: '00:30',end: '23:30'}" lang="en"></VueDatePicker>
  </div>
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
  components: { VueDatePicker },
  props: ['name','placeholder','value','lang'],
  data() {
    return {
      time1: this.value ? this.value : '',
      time2: '',
      shortcuts: [
        {
          text: 'Today',
          start: new Date(),
          end: new Date()
        }
      ]
    }
  }
}
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
