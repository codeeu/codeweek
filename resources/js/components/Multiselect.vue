<template>
  <div>
    <multiselect
      ref="multiselectComponent"
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
    >
    </multiselect>
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
    searchable: Boolean,
  },
  data() {
    let initialValues = [];
    let innerValues = [];

    if (this.value) {
      const valueArray = this.value.split(',');
      innerValues = valueArray;
      initialValues = valueArray
        .map((val) => {
          return this.options.find((option) => option.id == val);
        })
        .filter((option) => option !== undefined);
    }

    return {
      values: initialValues,
      innerValues: innerValues,
    };
  },
  mounted() {
    this.addClassesToMultiselectTags();
  },
  updated() {
    this.addClassesToMultiselectTags();
  },
  methods: {
    select(selectedOption) {
      this.innerValues.push(selectedOption.id);
    },
    remove(removedOption) {
      this.innerValues = this.innerValues.filter((id) => id != removedOption.id);
    },
    customLabel(obj, label) {
      return this.$t(`${label}.${obj.name}`);
    },
    addClassesToMultiselectTags() {
      // Find the multiselect tags element
      const multiselectElement = this.$refs.multiselectComponent.$el.querySelector('.multiselect__tags');
      if (multiselectElement) {
        // Add the necessary classes
        multiselectElement.classList.add(
          'codeweek-input-select',
          'border-0',
          'w-full',
          'px-6',
          'py-3',
          'text-form',
          'md:max-w-[472px]',
          'rounded-3xl',
          'shadow-sm',
          'ring-1',
          'ring-inset',
          'ring-gray-300',
          'focus-within:ring-2',
          'focus-within:ring-inset',
          'focus-within:ring-dark-orange',
          'max-md:px-5',
          'max-md:max-w-full'
        );
      }
    },
  },
};
</script>

<style scoped>
/* Updated to use :deep() instead of ::v-deep */
:deep(.multiselect__tags) {
  min-height: 48px !important;
  display: block !important;
  padding: unset !important;
  border-radius: 1.5rem !important;
  border: unset !important;
  background: unset !important;
  font-size: unset !important;
  border: 1px solid #e8e8e8 !important;
}
</style>
