<template>
  <div class="relative inline-block w-full text-gray-700 multiselect-wrapper">
    <multiselect
      ref="multiselectComponent"
      v-model="values"
      :options="option"
      :placeholder="placeholder"
      @select="handleSelect"
    >
    </multiselect>
    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="24"
        height="24"
        viewBox="0 0 24 24"
        fill="none"
      >
        <path
          d="M6 9L12 15L18 9"
          stroke="black"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </div>
    <input :name="name" type="hidden" :value="values">
  </div>
</template>

<script>
import Multiselect from 'vue-multiselect';
import { ref, onMounted, watch } from 'vue';

export default {
  components: { Multiselect },
  props: {
    name: String,
    options: Array,
    value: String,
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
    return {
      values: this.value,
      option: this.options,
    };
  },
  mounted() {
    this.addClassesToMultiselectTags();
  },
  updated() {
    this.addClassesToMultiselectTags();
  },
  methods: {
    handleSelect() {
      this.clearError();
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
        
        // Add error state classes
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