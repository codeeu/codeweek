<template>
  <div class="relative">
    <input
      class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4"
      v-model="localValue"
      :id="id"
      :name="name"
      :type="type"
      :defaultValue="value"
      :required="required"
    />
    <div
      class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer"
      :class="[type !== 'password' && 'hidden']"
      @click="type = 'text'"
    >
      <img src="/images/eye.svg" />
    </div>
    <div
      class="absolute right-4 top-1/2 -translate-y-1/2 cursor-pointer"
      :class="[type !== 'text' && 'hidden']"
      @click="type = 'password'"
    >
      <img src="/images/eye-slash.svg" />
    </div>
  </div>
</template>

<script>
import { ref } from 'vue';

export default {
  props: {
    required: Boolean,
    id: String,
    name: String,
    value: String,
  },
  setup(props, { emit }) {
    const type = ref('password');
    const localValue = ref(props.value || '');

    return { type, localValue };
  },
};
</script>
