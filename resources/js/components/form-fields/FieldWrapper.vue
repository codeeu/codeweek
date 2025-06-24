<template>
  <div
    class="flex items-start flex-col gap-x-3 gap-y-2"
    :class="[horizontalBreakpoint === 'md' && 'md:gap-10 md:flex-row']"
  >
    <label
      :for="`id_${name || names?.[0] || ''}`"
      class="flex items-center font-normal text-xl flex-1 text-slate-500 'w-full"
      :class="[horizontalBreakpoint === 'md' && 'md:min-h-[48px] md:w-1/3']"
    >
      <span>
        {{ label }}

        <Tooltip v-if="slots.tooltip" class="ml-1 translate-y-1" contentClass="w-64">
          <template #trigger>
            <img class="text-dark-blue w-6 h-6" src="/images/icon_question.svg" />
          </template>
          <template #content>
            <slot name="tooltip" />
          </template>
        </Tooltip>
      </span>
    </label>

    <div
      class="h-full w-full"
      :class="[horizontalBreakpoint === 'md' && 'md:w-2/3']"
    >
      <slot />

      <div
        v-if="errorList.length"
        class="flex item-start gap-3 text-error-200 font-semibold mt-2.5 empty:hidden"
      >
        <img src="/images/icon_error.svg" />
        <div v-for="message in errorList" class="leading-5">
          {{ message }}
        </div>
      </div>

      <slot name="end" />
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';
import _ from 'lodash';
import Tooltip from '../Tooltip.vue';

export default {
  props: {
    horizontalBreakpoint: String,
    horizontal: Boolean,
    label: String,
    name: String,
    names: Array,
    errors: Object,
  },
  components: {
    Tooltip,
  },
  setup(props, { slots }) {
    const errorList = computed(() => {
      const result = [];
      const nameList = [];
      if (props.name) nameList.push(props.name);
      if (props.names) nameList.push(...props.names);

      nameList.forEach((name) => {
        if (props.errors?.[name]) {
          result.push(...props.errors?.[name]);
        }
      });

      return _.uniq(result);
    });

    return {
      slots,
      errorList,
    };
  },
};
</script>
