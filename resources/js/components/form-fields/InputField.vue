<template>
  <input
    class="w-full border-2 border-solid border-dark-blue-200 rounded-full h-12 px-4 text-xl text-slate-600"
    :id="`id_${name}`"
    :type="type"
    :min="min"
    :max="max"
    :name="name"
    v-model="localValue"
    @input="onChange"
    @blur="onBlur"
  />
</template>

<script>
import { ref, watch, nextTick } from 'vue';

export default {
  props: {
    modelValue: [String, Number],
    name: String,
    min: Number,
    max: Number,
    type: {
      type: String,
      default: 'text',
    },
  },
  emits: ['update:modelValue', 'onChange'],
  setup(props, { emit }) {
    const localValue = ref(props.modelValue);

    watch(
      () => props.modelValue,
      () => {
        localValue.value = props.modelValue;
      }
    );

    const onChange = (event) => {
      let value = event.target.value;
      if (props.type === 'number') {
        value = value ? Number(value) : value;
        if (props.min !== undefined && props.min !== null) {
          value = Math.max(value, props.min);
        }
        if (props.max !== undefined && props.max !== null) {
          value = Math.min(value, props.max);
        }
      }

      nextTick(() => {
        emit('update:modelValue', value);
        emit('onChange', value);
      });
    };

    const onBlur = () => {
      localValue.value = props.modelValue;
    };

    return { localValue, onChange, onBlur };
  },
};
</script>
