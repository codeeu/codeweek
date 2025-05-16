<template>
  <multiselect
    class="multi-select new-theme"
    :class="[multiple && 'multiple']"
    v-model="selectedFormats"
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
    <template v-if="multiple" #option="{ option }">
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
  },
  components: {
    Multiselect,
  },
  emits: ['update:modelValue'],
  setup(props, { emit }) {
    const selectedFormats = ref();

    const onUpdateModalValue = (value) => {
      if (props.multiple) {
        emit(
          'update:modelValue',
          value.map((item) => item[props.idName])
        );
      } else {
        emit('update:modelValue', value[props.idName]);
      }
    };

    const isSelectedOption = (option) => {
      if (props.multiple) {
        return selectedFormats.value?.some(
          (item) => String(item[props.idName]) === String(option[props.idName])
        );
      }

      return (
        String(selectedFormats.value?.[props.idName]) ===
        String(option[props.idName])
      );
    };

    watch(
      [() => props.multiple, () => props.options, () => props.modelValue],
      () => {
        if (props.multiple) {
          if (Array.isArray(props.modelValue)) {
            selectedFormats.value = props.modelValue?.map((id) => {
              return props.options.find(
                (option) => option[props.idName] === id
              );
            });
          }
        } else {
          selectedFormats.value = props.options?.find(
            (option) => option[props.idName] === props.modelValue
          );
        }
      },
      { immediate: true }
    );

    return {
      selectedFormats,
      isSelectedOption,
      onUpdateModalValue,
    };
  },
};
</script>
