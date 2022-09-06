<template>
    <div class="reported-event">

      <div>
        Current Status: <strong>Reported </strong></div>
        &nbsp;-&nbsp;Participants Count:&nbsp;<strong>{{participants_count}}</strong>
    </div>
</template>

<script>


    export default {

        props: ['event'],
        data() {
            return {
                participants_count: this.event.participants_count
            }
        },
        methods: {


        }
    }
</script>
