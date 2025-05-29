<template>
  <multiselect
    class="multi-select"
    :class="[
      multiple && 'multiple',
      theme === 'new' && 'new-theme large-text',
      largeText && 'large-text',
    ]"
    v-model="selectedValues"
    :track-by="idName"
    :label="labelField"
    :multiple="multiple"
    :preselect-first="false"
    :close-on-select="!multiple"
    :clear-on-select="!multiple"
    :preserve-search="true"
    :searchable="searchable"
    :allow-empty="allowEmpty"
    :deselect-label="deselectLabel"
    :options="options"
    @update:modelValue="onUpdateModalValue"
  >
    <template v-if="multiple && theme === 'new'" #option="{ option }">
      <div class="flex justify-between items-center cursor-pointer">
        <span class="whitespace-normal leading-6">{{
          option[labelField]
        }}</span>
        <div
          class="flex-shrink-0 h-6 w-6 border-2 bg-white flex items-center justify-center cursor-pointer rounded"
          :class="[
            isSelectedOption(option)
              ? 'border-[#05603A]'
              : 'border-dark-blue-200',
          ]"
          :for="id"
        >
          <svg
            v-if="isSelectedOption(option)"
            class="h-4 w-4 text-[#05603A]"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M5 13l4 4L19 7" />
          </svg>
        </div>
      </div>
    </template>

    <template #tag="{ option, remove }">
      <span
        class="flex gap-2.5 items-center rounded-full bg-dark-blue text-white px-4 py-2"
      >
        <span class="font-semibold leading-4">{{ option.name }}</span>
        <span @click="remove(option)">
          <img src="/images/close-white.svg" />
        </span>
      </span>
    </template>

    <template v-if="!multiple" #option="{ option }">
      <div class="flex gap-4 items-center cursor-pointer">
        <span class="whitespace-normal leading-6">{{
          option[labelField]
        }}</span>

        <div>
          <svg
            v-if="isSelectedOption(option)"
            class="h-5 w-5 text-slate-600"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="3"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M5 13l4 4L19 7" />
          </svg>
        </div>
      </div>
    </template>

    <template #caret>
      <div
        class="absolute top-1/2 right-4 -translate-y-1/2 pointer-events-none"
      >
        <img src="/images/select-arrow.svg" />
      </div>
    </template>
  </multiselect>
</template>

<script>
import { ref, watch } from 'vue';
import Multiselect from 'vue-multiselect';

export default {
  props: {
    multiple: Boolean,
    returnObject: Boolean,
    allowEmpty: {
      type: Boolean,
      default: true,
    },
    modelValue: [Array, String],
    deselectLabel: String,
    options: Array,
    idName: {
      type: String,
      default: 'id',
    },
    labelField: {
      type: String,
      default: 'name',
    },
    theme: {
      type: String,
      default: 'new',
    },
    largeText: {
      type: Boolean,
      default: false,
    },
    searchable: {
      type: Boolean,
      fefault: false,
    },
  },
  components: {
    Multiselect,
  },
  emits: ['update:modelValue', 'onChange'],
  setup(props, { emit }) {
    const selectedValues = ref();

    const onUpdateModalValue = (value) => {
      if (props.multiple) {
        const newVal = props.returnObject
          ? value
          : value.map((item) => item[props.idName]);
        emit('update:modelValue', newVal);
        emit('onChange', newVal);
      } else {
        const newVal = props.returnObject ? value : value[props.idName];
        emit('update:modelValue', newVal);
        emit('onChange', newVal);
      }
    };

    const isSelectedOption = (option) => {
      if (props.multiple) {
        return selectedValues.value?.some(
          (item) => String(item[props.idName]) === String(option[props.idName])
        );
      }

      return (
        String(selectedValues.value?.[props.idName]) ===
        String(option[props.idName])
      );
    };

    watch(
      [
        () => props.multiple,
        () => props.returnObject,
        () => props.options,
        () => props.modelValue,
      ],
      () => {
        if (props.returnObject) {
          selectedValues.value = props.modelValue;
        } else {
          if (props.multiple) {
            if (Array.isArray(props.modelValue)) {
              selectedValues.value = props.modelValue?.map((id) => {
                return props.options.find(
                  (option) => option[props.idName] === id
                );
              });
            }
          } else {
            selectedValues.value = props.options?.find(
              (option) => option[props.idName] === props.modelValue
            );
          }
        }
      },
      { immediate: true }
    );

    return {
      selectedValues,
      isSelectedOption,
      onUpdateModalValue,
    };
  },
};
</script>
