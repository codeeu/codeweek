<template>
  <span
    class="bg-light-blue-100 py-1 px-4 text-sm font-semibold text-slate-500 rounded-full whitespace-nowrap"
    >{{ label }}</span
  >
</template>

<script>
export default {
  props: {
    property: Object,
    type: String,
  },
  data() {
    return {
      label: this.type
        ? this.$t('resources.resources.' + this.type + '.' + this.property.name)
        : this.property.name,
    };
  },
};
</script>
