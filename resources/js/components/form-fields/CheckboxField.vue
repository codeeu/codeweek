<template>
  <label class="flex items-center gap-2 cursor-pointer">
    <input
      class="peer hidden"
      type="checkbox"
      :id="name"
      :name="name"
      :checked="modelValue"
      @change="onChange"
    />

    <div
      class="flex-shrink-0 h-8 w-8 border-2 bg-white flex items-center justify-center cursor-pointer border-dark-blue-200 rounded-lg"
      :for="id"
    >
      <svg
        v-if="modelValue"
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

    <span class="cursor-pointer text-xl text-slate-500">
      {{ label }}
      <slot />
    </span>
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
      emit('update:modelValue', event.target.checked);
    };

    return { onChange };
  },
};
</script>
