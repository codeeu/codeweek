<template>
  <div class="input-tag-wrapper">
    <vue3-tags-input :tags="tags"
                     placeholder="enter some tags"
                     :add-tag-on-keys="[9, 13, 188]"
                     @on-tags-changed="handleChangeTag"/>
    <input type="hidden" name="tags" :value="tags">
  </div>
</template>

<script>
import {defineComponent} from 'vue';
import Vue3TagsInput from 'vue3-tags-input';

export default defineComponent({
  components: {
    Vue3TagsInput
  },
  props: {
    value: {
      type: String,
      default: ''
    }
  },

  data() {
    return {
      tags: this.value ? this.value.split(',') : []
    }
  },
  methods: {
    handleChangeTag(tags) {
      this.tags = tags;
    },
  }
})
</script>
