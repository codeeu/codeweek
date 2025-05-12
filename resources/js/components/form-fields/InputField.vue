<template>
  <input
    class="w-full border-2 border-solid border-dark-blue-200 rounded-full h-12 px-4 text-xl text-slate-600"
    :id="`id_${name}`"
    maxlength="255"
    :name="name"
    :value="modelValue"
    @input="onChange"
  />
</template>

<script>
export default {
  props: {
    modelValue: String,
    name: String,
  },
  emits: ['update:modelValue'],
  setup(props, { emit }) {
    const onChange = (event) => {
      emit('update:modelValue', event.target.value);
    };

    return { onChange };
  },
};
</script>
