<template>
  <div class="relative inline-block" @mouseenter="show = true" @mouseleave="show = false">
    <slot name="trigger"></slot>
    <div
      v-if="show"
      :class="[
        'absolute z-10 break-words',
        positionClass,
        contentClass,
      ]"
      role="tooltip"
    >
      <div class="w-full px-3 py-2 rounded-lg bg-gray-800 text-white text-sm">
        <slot name="content"></slot>
      </div>
      <div class="tooltip-arrow" :class="arrowClass"></div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from 'vue';

export default {
  props: {
    contentClass: {
      type: String,
    },
    position: {
      type: String,
      default: 'top',
      validator: (value) => ['top', 'right', 'bottom', 'left'].includes(value),
    },
  },
  setup(props) {
    const show = ref(false);

    const positionClass = computed(() => {
      switch (props.position) {
        case 'top':
          return 'bottom-full pb-2 left-1/2 -translate-x-1/2';
        case 'right':
          return 'left-full pl-2 top-1/2 -translate-y-1/2';
        case 'bottom':
          return 'top-full pt-2 left-1/2 -translate-x-1/2';
        case 'left':
          return 'right-full pr-2 top-1/2 -translate-y-1/2';
        default:
          return '';
      }
    });

    const arrowClass = computed(() => {
      switch (props.position) {
        case 'top':
          return 'absolute left-1/2 bottom-0 -translate-x-1/2 translate-y-2 border-8 border-transparent border-t-gray-800';
        case 'right':
          return 'absolute top-1/2 left-0 -translate-y-1/2 -translate-x-2 border-8 border-transparent border-r-gray-800';
        case 'bottom':
          return 'absolute left-1/2 top-0 -translate-x-1/2 -translate-y-2 border-8 border-transparent border-b-gray-800';
        case 'left':
          return 'absolute top-1/2 right-0 -translate-y-1/2 translate-x-2 border-8 border-transparent border-l-gray-800';
        default:
          return '';
      }
    });

    return { show, positionClass, arrowClass };
  },
};
</script>

<style scoped>
.tooltip-arrow {
  width: 0;
  height: 0;
}
.border-t-gray-800 {
  border-top-color: #1f2937; /* Tailwind gray-800 */
}
.border-r-gray-800 {
  border-right-color: #1f2937;
}
.border-b-gray-800 {
  border-bottom-color: #1f2937;
}
.border-l-gray-800 {
  border-left-color: #1f2937;
}
</style>
