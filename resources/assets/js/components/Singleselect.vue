<template>
  <div class="multiselect-wrapper">
    <multiselect
        v-model="values"
        :options="option"
        :placeholder="placeholder"
        >
    </multiselect>
    <input :name="name" type="hidden" :value="values">
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect'

window.singleselect = this;

export default {
  components: {Multiselect},
  props: {
    name: String,
    options: Array,
    value: String,
    placeholder: String
  },
  data() {
    return {
      values: this.value,
      option: this.options,

      // options: [
      //   { name: 'Vue.js', language: 'JavaScript' },
      //   { name: 'Rails', language: 'Ruby' },
      //   { name: 'Sinatra', language: 'Ruby' },
      //   { name: 'Laravel', language: 'PHP', $isDisabled: true },
      //   { name: 'Phoenix', language: 'Elixir' }
      // ]
    }

  }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>

<style scoped>

</style>