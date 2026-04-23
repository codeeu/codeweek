<template>
  <div class="flex h-[430px] flex-col bg-white rounded-lg overflow-hidden">
    <div
      class="flex-shrink-0 flex justify-center items-center w-full h-[178px] bg-white"
    >
      <img
        :src="tool.avatar || '/images/matchmaking-tool/tool-placeholder.png'"
        :class="[
          'w-full h-full',
          tool.avatar ? 'object-contain' : 'object-cover',
        ]"
      />
    </div>

    <div class="flex-grow flex flex-col gap-2 px-5 py-4">
      <div v-if="tool.types?.length" class="flex gap-2 flex-wrap mb-2">
        <template v-for="{ title, highlight } in tool.types">
          <span
            class="flex items-center gap-2 py-1 px-3 text-sm font-semibold rounded-full whitespace-nowrap leading-4"
            :class="[
              highlight
                ? 'bg-dark-blue text-white'
                : 'bg-light-blue-100 text-slate-500',
            ]"
          >
            <img
              v-if="highlight"
              class="inline-block w-4 h-4"
              src="/images/star-white.svg"
            />
            <span>
              <template v-for="text in title.split(' ')">
                <span
                  v-if="text"
                  class="mr-[2px]"
                  :class="{ 'font-sans': text === '&' }"
                >
                  {{ text }}
                </span>
              </template>
            </span>
          </span>
        </template>
      </div>

      <div
        class="text-dark-blue font-semibold font-['Montserrat'] text-base leading-6"
      >
        {{ tool.name }}
      </div>

      <div
        v-if="tool.location"
        class="text-slate-500 text-[16px] leading-[22px] font-semibold"
      >
        {{ tool.location }}
      </div>

      <div
        v-if="tool.description"
        class="flex-grow min-h-0"
      >
        <div
          class="relative flex-grow text-slate-500 text-[16px] leading-[22px] mb-2"
        >
          <div v-html="formatMultiline(showMore ? tool.description : getCollapsedText(tool.description))" />

          <div
            v-if="isCollapsible(tool.description)"
            class="flex justify-end bottom-0 right-0 bg-white pl-0.5 text-dark-blue"
            :class="{ absolute: !showMore }"
          >
            <button @click="onToggleShowMore">
              {{ showMore ? 'Show less' : '... Show more' }}
            </button>
          </div>
        </div>
      </div>

      <div class="mt-auto flex-shrink-0 h-[56px]">
        <a
          class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
          :href="`/matchmaking-tool/${tool.slug}`"
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

export default {
  props: {
    tool: Object,
  },
  data() {
    return {
      showMore: false,
      previewMaxChars: 190,
    };
  },
  methods: {
    escapeHtml(value = '') {
      return String(value)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
    },
    formatMultiline(value) {
      if (!value) return '';
      const normalized = String(value).replace(/\r\n?/g, '\n');
      return this.escapeHtml(normalized).replace(/\n/g, '<br>');
    },
    getCollapsedText(value = '') {
      const normalized = String(value).replace(/\s+/g, ' ').trim();
      if (normalized.length <= this.previewMaxChars) {
        return normalized;
      }

      return `${normalized.slice(0, this.previewMaxChars).trimEnd()}...`;
    },
    isCollapsible(value = '') {
      const normalized = String(value).replace(/\s+/g, ' ').trim();
      return normalized.length > this.previewMaxChars;
    },
    onToggleShowMore() {
      this.showMore = !this.showMore;
    }
  },
};
</script>
