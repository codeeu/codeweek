<template>
  <div class="relative v-autocomplete">
    <!-- Input Group -->
    <div class="w-full" :class="{ 'v-autocomplete-selected': value }">
      <input
        type="search"
        v-model="searchText"
        v-bind="inputAttrs"
        class="w-full px-6 py-3 text-form md:max-w-[472px] text-black-light rounded-3xl shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-dark-orange focus-within:placeholder-dark-orange max-md:px-5 max-md:max-w-full"
        :class="{
          'ring-dark-orange ring-2': hasError,
          'ring-gray-300': !hasError
        }"
        :placeholder="inputAttrs.placeholder || placeholder"
        :disabled="inputAttrs.disabled || disabled"
        @blur="blur"
        @focus="focus"
        @input="inputChange"
        @keyup.enter="keyEnter"
        @keydown.tab="keyEnter"
        @keydown.up="keyUp"
        @keydown.down="keyDown"
      />
    </div>

    <!-- Dropdown List -->
    <div
      v-if="show"
      class="absolute z-10 w-full mt-2 bg-white border border-gray-200 rounded-lg shadow-lg v-autocomplete-list"
    >
      <div
        class="px-4 py-2 cursor-pointer v-autocomplete-list-item hover:bg-gray-100"
        v-for="(item, i) in internalItems"
        :key="i"
        @click="onClickItem(item)"
        :class="{ 'v-autocomplete-item-active bg-gray-200': i === cursor }"
        @mouseover="cursor = i"
      >
        <component :is="componentItem" :item="item" :searchText="searchText"></component>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed, watch, onMounted } from "vue";
import Item from "./Item.vue";
import utils from "./utils.js";

export default {
  name: "VAutocomplete",
  props: {
    componentItem: { default: () => Item },
    minLen: { type: Number, default: utils.minLen },
    wait: { type: Number, default: utils.wait },
    value: null,
    getLabel: {
      type: Function,
      default: (item) => item,
    },
    items: Array,
    autoSelectOneItem: { type: Boolean, default: true },
    inputClass: { type: String, default: "v-autocomplete-input" },
    disabled: { type: Boolean, default: false },
    inputAttrs: { type: Object, default: () => ({}) },
    keepOpen: { type: Boolean, default: false },
    placeholder: { type: String, default: "" },
    initialLocation: { type: String, default: "" },
    initialGeoposition: { type: String, default: "" },
    name: { type: String, required: true } // Add name prop for validation
  },
  emits: ["update:modelValue", "input", "change", "item-selected", "item-clicked", "update-items", "focus"],
  setup(props, { emit }) {
    // Existing state variables
    const searchText = ref(props.initialLocation || "");
    const geoposition = ref(props.initialGeoposition || "");
    const showList = ref(false);
    const cursor = ref(-1);
    const internalItems = ref(props.items || []);
    const hasError = ref(false);

    // Computed properties
    const hasItems = computed(() => !!internalItems.value.length);
    const show = computed(() => (showList.value && hasItems.value) || props.keepOpen);

    // Check for validation errors
    const checkForErrors = () => {
      const errorElement = document.querySelector(`.errors [data-field="${props.name}"]`);
      hasError.value = !!(errorElement?.offsetParent);
    };

    // Clear validation error
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
    };

    // Modified input change handler
    const inputChange = () => {
      showList.value = true;
      cursor.value = -1;
      onSelectItem(null);
      utils.callUpdateItems(searchText.value, updateItems);
      clearError(); // Clear error when input changes
      emit("change", searchText.value);
      emit("update:modelValue", searchText.value);
    };

    // Modified select item handler
    const onSelectItem = (item) => {
      if (item) {
        internalItems.value = [item];
        searchText.value = props.getLabel(item);
        geoposition.value = item.geoposition || "";
        clearError(); // Clear error when item is selected
        emit("item-selected", item);
        emit("update:modelValue", searchText.value);
      } else {
        setItems(props.items);
      }
      emit("input", item);
    };

    // Existing methods
    const updateItems = () => emit("update-items", searchText.value);
    const focus = () => {
      emit("focus", searchText.value);
      showList.value = true;
    };
    const blur = () => setTimeout(() => (showList.value = false), 200);
    const onClickItem = (item) => {
      onSelectItem(item);
      emit("item-clicked", item);
    };
    const setItems = (items) => (internalItems.value = items || []);
    const keyUp = () => cursor.value > 0 && cursor.value--;
    const keyDown = () => cursor.value < internalItems.value.length - 1 && cursor.value++;
    const keyEnter = () => {
      if (showList.value && internalItems.value[cursor.value]) {
        onSelectItem(internalItems.value[cursor.value]);
        showList.value = false;
      }
    };

    // Set up validation error observer
    onMounted(() => {
      checkForErrors();

      const observer = new MutationObserver(() => {
        checkForErrors();
      });

      const errorContainer = document.querySelector(`.errors [data-field="${props.name}"]`);
      if (errorContainer) {
        observer.observe(errorContainer.parentNode, { childList: true, subtree: true });
      }

      if (props.initialLocation) searchText.value = props.initialLocation;
      if (props.initialGeoposition) geoposition.value = props.initialGeoposition;
      onSelectItem(props.value);
    });

    // Existing watchers
    watch(() => props.items, (newValue) => setItems(newValue));
    watch(() => props.value, (newValue) => {
      if (!newValue) onSelectItem(null);
      else searchText.value = props.getLabel(newValue);
    });

    return {
      searchText,
      geoposition,
      showList,
      cursor,
      internalItems,
      hasItems,
      show,
      hasError,
      inputChange,
      updateItems,
      focus,
      blur,
      onClickItem,
      onSelectItem,
      setItems,
      keyUp,
      keyDown,
      keyEnter,
    };
  },
};
</script>

<style scoped>
.v-autocomplete .v-autocomplete-item-active {
  background-color: #f3f6fa;
}
</style>