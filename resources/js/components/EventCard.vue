<template>
  <div class="flex flex-col bg-white rounded-lg overflow-hidden">
    <div class="flex-shrink-0">
      <img :src="event.picture_path" class="w-full object-cover aspect-[1.5]" />
    </div>

    <div class="flex-grow flex flex-col gap-2 px-6 py-4">
      <div class="text-default text-slate-500 mb-2 flex items-center font-semibold">
        Organizer: <span class="text-sm font-semibold ml-1 w-fit px-4 py-1.5 bg-[#CCF0F9] rounded-full flex items-center">{{ event.organizer || 'Unknown' }}</span>
      </div>

      <div v-if="eventTags.length" class="flex gap-2 flex-wrap mb-2">
        <template v-for="{ title, highlight } in eventTags">
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
              class="inline-block w-4 h-4 text-white"
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
        {{ event.title }}
      </div>

      <div class="text-slate-500 text-[16px] leading-[22px] font-semibold">
        {{ eventStartDateText }}
      </div>

      <div
        class="flex-grow text-slate-500 text-[16px] leading-[22px] mb-2 [&_p]:p-0"
        v-html="limit(event.description)"
      ></div>

      <div class="">
        <a
          class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-3 px-8 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] group"
          :href="'/view/' + event.id + '/' + event.slug"
        >
          <span>View activity</span>
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
import { computed } from 'vue';
import { useDataOptions } from './activity-form/mixins.js';

export default {
  props: {
    event: {
      type: Object,
      default: () => ({}),
    },
  },
  setup(props) {
    const { recurringFrequentlyMap } = useDataOptions();

    const eventTags = computed(() => {
      const tags = [];

      if (props.event.highlighted_status === 'FEATURED') {
        tags.push({ title: 'Featured', highlight: true });
      }

      if (
        ['daily', 'weekly', 'monthly'].includes(props.event?.recurring_event)
      ) {
        tags.push({
          title: recurringFrequentlyMap.value[props.event?.recurring_event],
        });
      }

      return tags;
    });

    const eventStartDateText = computed(() => {
      const formatDate = (dateStr) => {
        if (!dateStr) return '';

        const date = new Date(dateStr);
        const day = date.getDate();
        const month = date.toLocaleString('en-US', { month: 'short' });
        const year = date.getFullYear();
        const hour = date.toLocaleString('en-US', {
          hour: 'numeric',
          hour12: true,
        });

        return `${day}, ${month} ${year}`;
      };
      const start_date = props.event.start_date;
      if (!start_date) return '';

      const date = new Date(start_date);
      const day = date.getDate();
      const month = date.toLocaleString('en-US', { month: 'short' });
      const year = date.getFullYear();
      const hour = date.toLocaleString('en-US', {
        hour: 'numeric',
        hour12: true,
      });

      return `${formatDate(props.event.start_date)} - ${formatDate(
        props.event.end_date
      )}`;
    });

    const limit = (text) => {
      if (text.length > 400) {
        return text.substring(0, 400) + '...';
      }
      return text;
    };

    return {
      eventTags,
      eventStartDateText,
      limit,
    };
  },
};
</script>
