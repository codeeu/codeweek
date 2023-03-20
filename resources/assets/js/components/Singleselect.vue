<template>
  <div class="multiselect-wrapper">
    <multiselect
        v-model="values"
        :options="options"
        searchable="true"
        close-on-select="true"
        show-labels="false"
        placeholder="Choose a Leading Teacher Tag"
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
    value: String
  },
  data() {
    return {
      values: this.value,
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

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>

</style>