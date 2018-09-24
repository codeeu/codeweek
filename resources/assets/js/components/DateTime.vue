<template>
    <div>

        <date-picker :input-name="name" width="100%" :placeholder="placeholder" v-model="time1" type="datetime" format="yyyy-MM-dd HH:mm:ss" :time-picker-options="{start: '07:00',step: '00:30',end: '23:30'}" lang="en"></date-picker>
    </div>
</template>

<script>
    import DatePicker from '../vue-datepicker'

    export default {
        components: { DatePicker },
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
