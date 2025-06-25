<template>
  <label class="flex items-center gap-2 cursor-pointer">
    <input
      class="peer hidden"
      type="radio"
      :id="`${name}-${value}`"
      :name="name"
      :value="value"
      :checked="modelValue === value"
      @change="onChange"
    />
    <div
      class="h-8 w-8 rounded-full border-2 bg-white border-dark-blue-200 flex items-center justify-center cursor-pointer peer-checked:before:content-[''] peer-checked:before:block peer-checked:before:w-3 peer-checked:before:h-3 peer-checked:before:rounded-full peer-checked:before:bg-slate-600"
      :for="`${name}-${value}`"
    ></div>
    <span class="cursor-pointer text-xl text-slate-500">{{ label }}</span>
  </label>
</template>

<script>
export default {
  props: {
    modelValue: String,
    name: String,
    label: String,
    value: String,
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
