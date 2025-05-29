<template>
  <div class="datepicker-wrapper">
    <!--        <date-picker :input-name="name" width="100%" :placeholder="placeholder" v-model="time1" type="datetime" format="yyyy-MM-dd HH:mm:ss" :time-picker-options="{start: '07:00',step: '00:30',end: '23:30'}" lang="en"></date-picker>-->
    <VueDatePicker class="custom-date-picker" :name="name" v-model="time1" type="datetime" :format="format || 'yyyy-MM-dd HH:mm'" :time-picker-options="{start: '07:00',step: '00:30',end: '23:30'}" lang="en" :placeholder="placeholder" @update:model-value="onChange" :flow="flow"></VueDatePicker>
  </div>
</template>

<script>
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
  components: { VueDatePicker },
  props: ['name','placeholder','value','lang', 'format', 'onClear', 'flow'],
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
  },
  methods: {
    onChange(date) {
      this.$emit('onClear');
      if (!(date instanceof Date) || isNaN(date.getTime())) return '';
      const pad = (n) => n.toString().padStart(2, '0');

      const year = date.getFullYear();
      const month = pad(date.getMonth() + 1);
      const day = pad(date.getDate());
      const hour = pad(date.getHours());
      const minute = pad(date.getMinutes());

      this.$emit('onChange', `${year}-${month}-${day} ${hour}:${minute}`);
    }
  }
}
</script>

<style scoped>
:deep(.dp__input) {
  border: none;
  --tw-ring-color: none;
  color: #20262C;
  font-family: "Blinker";
  font-size: 20px;
  font-style: normal;
  font-weight: 400;
  line-height: 24px;
  background-color: transparent;
}

:deep(.dp__icon) {
  stroke: rgb(0 0 0);
  fill: rgb(0 0 0);
}

:deep(.dp__menu_inner) {
  color: #00000080;
  font-family: "Blinker";
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
