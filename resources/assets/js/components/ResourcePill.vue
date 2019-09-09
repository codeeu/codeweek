<template>
    <div class="card-chip">{{ label }}</div>
</template>

<script>


    export default {

        props: {
            property: Object,
            type: String
        },
        data() {
            return {
                label: this.type ?
                    this.$t('resources.resources.' + this.type + '.' + this.property.name) :
                    this.property.name,
            };
        }

    };
</script>



