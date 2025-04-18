<template>
  <div class="relative flex flex-col bg-white rounded-lg overflow-hidden">
    <div class="flex-shrink-0">
      <img :src="thumbnail" />
    </div>

    <div
      class="flex-grow flex flex-col gap-2 px-6 py-4 h-fit"
      :class="{ 'max-h-[450px]': needShowMore && !showMore }"
    >
      <div class="flex gap-2 flex-wrap mb-2">
        <template v-for="type in resource.types">
          <resource-pill :property="type" type="types"></resource-pill>
        </template>
      </div>

      <div class="text-dark-blue font-semibold font-['Montserrat'] leading-6">
        {{ resource.name }}
      </div>

      <div
        v-if="resource.languages?.[0]?.name"
        class="text-slate-500 text-[16px] leading-[22px]"
      >
        Language: {{ resource.languages?.[0]?.name || '' }}
      </div>

      <div
        ref="descriptionContainerRef"
        class="flex-grow text-[16px] leading-[22px] h-full"
        :class="{ 'overflow-hidden': needShowMore && !showMore }"
      >
        <div
          ref="descriptionRef"
          class="relative flex-grow text-slate-500 overflow-hidden"
          style="height: auto"
        >
          {{ resource.description }}

          <div
            v-if="needShowMore"
            class="flex justify-end bottom-0 right-0 bg-white pl-0.5 text-dark-blue"
            :class="{ absolute: !showMore, 'w-full': showMore }"
          >
            <button @click="onToggleShowMore">
              {{ showMore ? 'Show less' : '... Show more' }}
            </button>
          </div>
        </div>
      </div>

      <div class="flex-shrink-0">
        <div class="h-[56px]" />
        <a
          class="absolute left-6 right-6 bottom-4 flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
          :href="resource.source"
          target="_blank"
        >
          <span>{{ $t('myevents.view_lesson') }}</span>
          <div class="flex gap-2 w-4 overflow-hidden">
            <img
              src="/images/arrow-right-icon.svg"
              class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0"
            />
            <img
              src="/images/arrow-right-icon.svg"
              class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0"
            />
          </div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>
import ResourcePill from './ResourcePill.vue';

var RESOURCES_URL = import.meta.env.VITE_RESOURCES_URL;

export default {
  components: { ResourcePill },
  props: {
    resource: Object,
  },
  data() {
    return {
      descriptionHeight: 'auto',
      needShowMore: true,
      showMore: false,
    };
  },
  computed: {
    thumbnail: function () {
      if (
        this.resource.thumbnail &&
        this.resource.thumbnail.toLowerCase().startsWith('http')
      ) {
        return this.resource.thumbnail;
      } else {
        return RESOURCES_URL + this.resource.thumbnail;
      }
    },
  },
  methods: {
    computeDescriptionHeight() {
      const containerEl = this.$refs.descriptionContainerRef;
      const descriptionEl = this.$refs.descriptionRef;

      const maxHeight = containerEl.clientHeight;
      const rows = Math.floor(maxHeight / 22);
      descriptionEl.style.height = 'auto';
      this.descriptionHeight = 'auto';

      this.needShowMore = descriptionEl.offsetHeight > maxHeight;
      if (descriptionEl.offsetHeight > maxHeight) {
        descriptionEl.style.height = `${rows * 22}px`;
        this.descriptionHeight = `${rows * 22}px`;
      } else {
        this.showMore = false;
      }
    },
    onToggleShowMore() {
      const descriptionEl = this.$refs.descriptionRef;

      this.showMore = !this.showMore;
      if (!this.showMore) {
        descriptionEl.style.height = this.descriptionHeight;
      } else {
        descriptionEl.style.height = 'auto';
      }
    },
  },
  mounted: function () {
    this.computeDescriptionHeight();
  },
};
</script>
