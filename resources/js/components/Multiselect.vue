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
      :placeholder="placeholder"
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
import { ref, onMounted, watch } from 'vue';

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
    placeholder: String,
  },
  setup(props) {
    const hasError = ref(false);
    const multiselectComponent = ref(null);

    const checkForErrors = () => {
      const errorElement = document.querySelector(`.errors [data-field="${props.name}"]`);
      hasError.value = !!(errorElement?.offsetParent);
      updateMultiselectStyles();
    };

    const clearError = () => {
      const errorElement = document.querySelector(`.errors [data-field="${props.name}"]`);
      if (errorElement) {
        errorElement.style.display = 'none';
      }

      // Notify Alpine.js about the cleared error
      const alpineComponent = document.querySelector('[x-data="multiStepForm"]')?.__x?.data;
      if (alpineComponent) {
        alpineComponent.clearFieldError(props.name);
      }

      hasError.value = false;
      updateMultiselectStyles();
    };

    const updateMultiselectStyles = () => {
      const tagsElement = multiselectComponent.value?.$el.querySelector('.multiselect__tags');
      if (tagsElement) {
        if (hasError.value) {
          tagsElement.classList.add('ring-2', 'ring-dark-orange');
          tagsElement.classList.remove('ring-gray-300');
        } else {
          tagsElement.classList.remove('ring-2', 'ring-dark-orange');
          tagsElement.classList.add('ring-gray-300');
        }
      }
    };

    // Watch for changes in error state
    watch(hasError, () => {
      updateMultiselectStyles();
    });

    onMounted(() => {
      // Initial error check
      checkForErrors();

      // Set up observer for error changes
      const observer = new MutationObserver(() => {
        checkForErrors();
      });

      const errorContainer = document.querySelector(`.errors [data-field="${props.name}"]`);
      if (errorContainer) {
        observer.observe(errorContainer.parentNode, { childList: true, subtree: true });
      }
    });

    return {
      hasError,
      multiselectComponent,
      clearError,
    };
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
      this.clearError();
    },
    remove(removedOption) {
      this.innerValues = this.innerValues.filter((id) => id != removedOption.id);
      // Only clear error if there are still selected items (for required fields)
      if (this.innerValues.length > 0) {
        this.clearError();
      }
    },
    customLabel(obj, label) {
      return this.$t(`${label}.${obj.name}`);
    },
    addClassesToMultiselectTags() {
      const multiselectElement = this.$refs.multiselectComponent.$el.querySelector('.multiselect__tags');
      if (multiselectElement) {
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
          'max-md:px-5',
          'max-md:max-w-full'
        );
        
        // Add error state classes if needed
        if (this.hasError) {
          multiselectElement.classList.add('ring-2', 'ring-dark-orange');
        } else {
          multiselectElement.classList.add('ring-gray-300');
        }
      }
    },
  },
};
</script>

<style scoped>
/* Existing styles remain the same */
:deep(.multiselect__tag) {
    background: #F95C22;
}

:deep(.multiselect__tags) {
    min-height: 48px !important;
    display: flex !important;
    border-radius: 1.5rem !important;
    border: unset !important;
    background: unset !important;
    font-size: unset !important;
    align-items: center;
    line-height: 0px;
    padding-left: 1.5rem;
    padding-right: 1.5rem;
}

:deep(.multiselect__select::before) {
    all: unset;
}

:deep(.multiselect__select::before) {
    content: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M6 9L12 15L18 9" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');
    display: inline-block;
    width: 24px;
    height: 24px;
}

:deep(.multiselect__select) {
    display: flex;
    align-items: center;
    height: 100%;
}

:deep(.multiselect__option--highlight) {
    background: #f97316;
    color: black;
}
</style>