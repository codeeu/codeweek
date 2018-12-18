<template>

    <div class="mb-0 flex">

        Resource Form is coming here !!

        <multiselect :close-on-select="true" :options="levels" name="level"></multiselect>

    </div>

</template>

<script>
    export default {
        props: {
            name: String,
            levels: Array
        },
        data() {
            return {
                isOpen: false
            };
        },
        computed:{
            chevron: function () {
                return {
                    'fa-chevron-up': this.isOpen,
                    'fa-chevron-down': !this.isOpen
                }
            }
        }
    };
</script>