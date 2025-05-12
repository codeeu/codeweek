<template>
  <div
    class="flex items-start flex-col gap-3"
    :class="[horizontalBreakpoint === 'md' && 'md:gap-10 md:flex-row']"
  >
    <label
      :for="`id_${name || names[0]}`"
      class="flex items-center font-normal text-xl flex-1 text-slate-500 'w-full"
      :class="[horizontalBreakpoint === 'md' && 'md:min-h-[48px] md:w-1/3']"
    >
      {{ label }}
    </label>

    <div
      class="h-full w-full"
      :class="[horizontalBreakpoint === 'md' && 'md:w-2/3']"
    >
      <slot />

      <div
        v-if="errors?.[name]?.length"
        class="flex item-start gap-3 text-error-200 font-semibold mt-2.5 empty:hidden"
      >
        <img src="/images/icon_error.svg" />
        <div v-for="message in errors[name]" class="leading-5">
          {{ message }}
        </div>
      </div>

      <template v-for="name in names">
        <div
          v-if="errors?.[name]?.length"
          class="flex item-start gap-3 text-error-200 font-semibold mt-2.5 empty:hidden"
        >
          <img src="/images/icon_error.svg" />
          <div v-for="message in errors[name]" class="leading-5">
            {{ message }}
          </div>
        </div>
      </template>

      <slot name="end" />
    </div>
  </div>
</template>

<script>
export default {
  props: {
    horizontalBreakpoint: String,
    horizontal: Boolean,
    label: String,
    name: String,
    names: Array,
    errors: Object,
  },
};
</script>
