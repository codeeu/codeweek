<template>
    <div class="flex lg:justify-between bg-blue-lighter min-w-full p-4 mb-3">


        <div>Current Status: Reported</div>
        Participants Count: {{participants_count}}

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
