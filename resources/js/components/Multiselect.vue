<template>
  <div class="multiselect-wrapper">
    <multiselect
        v-model="values"
        v-bind:options="options"
        :multiple="true"
        :taggable="true"
        :close-on-select="false"
        :clear-on-select="false"
        :searchable="false"
        :show-labels="false"
        placeholder=""
        :preserve-search="true"
        :label="label"
        track-by="id"
        :preselect-first="false"
        :custom-label="customLabel"
        @select="select"
        @remove="remove"
    ></multiselect>
    <input :name="name" type="hidden" :value="innerValues.toString()">
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect';

export default {
  components: { Multiselect },
  props: {
    name: String,
    value: String,
    options: Array,
    closeOnSelect: Boolean,
    label: String,
    translated: String,
    multiple: Boolean,
    searchable: Boolean
  },
  data() {
    let initialValues = [];
    let innerValues = [];

    if (this.value) {
      const valueArray = this.value.split(',');
      innerValues = valueArray;
      initialValues = valueArray.map(val => {
        return this.options.find(option => option.id == val);
      }).filter(option => option !== undefined);
    }

    return {
      values: initialValues,
      innerValues: innerValues
    };
  },
  methods: {
    select(selectedOption) {
      this.innerValues.push(selectedOption.id);
    },
    remove(removedOption) {
      this.innerValues = this.innerValues.filter(id => id != removedOption.id);
    },
    customLabel(obj, label) {
      return this.$t(`${label}.${obj.name}`);
    }
  }
};
</script>

<style scoped>
</style>
