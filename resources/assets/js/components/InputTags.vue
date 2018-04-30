<template>
    <div>
        <input-tag :tags.sync="tagsArray"></input-tag>
        <input type="hidden" name="tags" :value="tagsArray">
    </div>
</template>

<script>
    import InputTag from 'vue-input-tag'

    export default {
        components: {InputTag},
        props: ['value'],
        data() {
            return {
                tagsArray: this.value ? this.value.split(',') : []
            }
        }
    }
</script>
