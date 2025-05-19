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
    :options="options"
    @update:modelValue="onUpdateModalValue"
  >
    <template v-if="multiple && theme === 'new'" #option="{ option }">
      <div class="flex justify-between items-center cursor-pointer">
        <span>{{ option[labelField] }}</span>
        <div
          class="h-6 w-6 border-2 bg-white flex items-center justify-center cursor-pointer rounded"
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

    <template v-else #option="{ option }">
      <div class="flex gap-4 items-center cursor-pointer">
        <span>{{ option[labelField] }}</span>

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
        <!-- <input
          type="checkbox"
          class="form-checkbox text-blue-600"
          :checked="isSelectedOption(option)"
          @change.prevent
        /> -->
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
    modelValue: [Array, String],
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
