<template>
        <span v-text="count"></span>
</template>

<script>
    import inView from 'in-viewport';

    export default {
        props: ['to'],

        data() {
            return {
                count: 0,
                interval: null
            };
        },

        computed: {
            increment() {
                return Math.ceil(this.to / 30);
            }
        },

        mounted() {
            inView(this.$el, () => {
                console.log(this.interval);
                this.interval = setInterval(this.tick, 40);
            });
        },

        methods: {
            tick() {
                console.log(this.interval);
                if (this.count + this.increment >= this.to) {
                    this.count = this.to;

                    return clearInterval(this.interval);
                }

                this.count += this.increment;
            }
        }
    };
</script>