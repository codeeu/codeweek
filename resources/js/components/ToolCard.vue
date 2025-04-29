<template>
  <div class="flex flex-col bg-white rounded-lg overflow-hidden">
    <div class="flex-shrink-0">
      <img :src="thumbnail" class="w-full" />
    </div>

    <div class="flex-grow flex flex-col gap-2 px-6 py-4">
      <div class="flex gap-2 flex-wrap mb-2">
        <template v-for="{ title, highlight } in tool.types">
          <span
            class="flex items-center gap-2 py-1 px-3 text-sm font-semibold rounded-full whitespace-nowrap leading-4"
            :class="[highlight ? 'bg-dark-blue text-white' : 'bg-light-blue-100 text-slate-500']"
          >
            <img v-if="highlight" class="inline-block w-4 h-4" src="/images/star.svg" />
            <span>
              <template v-for="text in title.split(' ')">
                <span v-if="text" class="mr-[2px]" :class="{ 'font-sans': text === '&' }">
                  {{ text }}
                </span>
              </template>
            </span>
        </span>
        </template>
      </div>

      <div class="text-dark-blue font-semibold font-['Montserrat'] text-base leading-6">
        {{ tool.name }}
      </div>

      <div
        v-if="tool.locations?.[0]?.name"
        class="text-slate-500 text-[16px] leading-[22px] font-semibold"
      >
        {{ tool.locations?.[0]?.name || '' }}
      </div>

      <div class="flex-grow text-slate-500 text-[16px] leading-[22px] mb-2">
        {{ tool.description }}
      </div>

      <div class="">
        <a
          class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
          :href="`/matchmaking-tool/${tool.source}`"
        >
          <span>View profile/contact</span>
          <div class="flex gap-2 w-4 overflow-hidden">
            <img
              src="/images/arrow-right-icon.svg"
              class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0 text-[#1C4DA1]"
            />
            <img
              src="/images/arrow-right-icon.svg"
              class="min-w-4 duration-500 transform -translate-x-6 group-hover:translate-x-0 text-[#1C4DA1]"
            />
          </div>
        </a>
      </div>
    </div>
  </div>
</template>

<script>

var RESOURCES_URL = import.meta.env.VITE_RESOURCES_URL;

export default {
  props: {
    tool: Object,
  },
  computed: {
    thumbnail: function () {
      if (
        this.tool.thumbnail &&
        this.tool.thumbnail.toLowerCase().startsWith('http')
      ) {
        return this.tool.thumbnail;
      } else {
        return RESOURCES_URL + this.tool.thumbnail;
      }
    },
  },
  mounted: function () {},
};
</script>
