<template>
    <div class="input-tag-wrapper">
        <input-tag :tags.sync="tagsArray" :addTagOnBlur="addTagOnBlur"></input-tag>
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
                tagsArray: this.value ? this.value.split(',') : [],
                addTagOnBlur: true
            }
        }
    }
</script>

<style scoped>
/* Updated to use :deep() instead of ::v-deep */
:deep(.v3ti .v3ti-content) {
  justify-content: flex-end;
}
:deep(.v3ti .v3ti-new-tag) {
    height: 48px;
}
</style>