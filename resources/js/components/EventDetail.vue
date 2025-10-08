<template>
  <section class="relative z-10">
    <div
      class="flex relative z-10 justify-center py-10 md:py-20 codeweek-container-lg"
    >
      <div class="w-full max-w-[880px] gap-2 text-xl">
        <h2
          class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-2"
        >
          {{ event.title }}
        </h2>
        <p class="text-[#20262C] font-normal p-0 mb-6">
          {{ fromText }} - {{ toText }}
        </p>

        <div class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            Organizer:
          </p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            {{ event.organizer || 'Unknown' }}
          </p>
        </div>

        <div v-if="event.activity_format" class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">
            Format of the activity:
          </p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="format in event.activity_format"
              class="flex gap-2 items-center px-4 py-1 bg-light-blue-100 rounded-full w-fit"
            >
              <p class="p-0 text-base font-semibold text-slate-500">
                {{ activityFormatOptionsMap[format] }}
              </p>
            </div>
          </div>
        </div>

        <div class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">
            {{ $t('event.activitytype.label') }}:
          </p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            <template v-if="event.activity_type">
              {{ $t(`event.activitytype.${event.activity_type}`) }}
            </template>
          </p>
        </div>

        <div v-if="event.language" class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">
            {{ $t('resources.Languages') }}:
          </p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="language in event.languages"
              class="flex gap-2 items-center px-4 py-1 bg-light-blue-100 rounded-full w-fit"
            >
              <p class="p-0 text-base font-semibold text-slate-500">
                {{ $t(`base.languages.${language}`) }}
              </p>
            </div>
          </div>
        </div>

        <div v-if="event.recurring_event && recurringFrequentlyMap[event.recurring_event]" class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">Recurring event:</p>
          <div class="flex flex-wrap gap-2">
            <div
              class="flex gap-2 items-center px-4 py-1 bg-light-blue-100 rounded-full w-fit"
            >
              <p class="p-0 text-base font-semibold text-slate-500">
                {{ recurringFrequentlyMap[event.recurring_event] }}
              </p>
            </div>
            <div
              v-if="event.duration"
              class="flex gap-2 items-center px-4 py-1 bg-light-blue-100 rounded-full w-fit"
            >
              <p class="p-0 text-base font-semibold text-slate-500">
                {{ durationOptionsMap[event.duration] }}
              </p>
            </div>
            <div
              v-if="event.recurring_type"
              class="flex gap-2 items-center px-4 py-1 bg-light-blue-100 rounded-full w-fit"
            >
              <p class="p-0 text-base font-semibold text-slate-500">
                {{ recurringTypeOptionsMap[event.recurring_type] }}
              </p>
            </div>
          </div>
        </div>

        <div v-if="event.audiences?.length" class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">
            {{ $t('event.audience_title') }}:
          </p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="audience in event.audiences"
              class="flex gap-2 items-center px-4 py-1 bg-light-blue-100 rounded-full w-fit"
            >
              <p class="p-0 text-base font-semibold text-slate-500">
                {{ $t(`event.audience.${audience.name}`) }}
              </p>
            </div>
          </div>
        </div>

        <div v-if="event.ages?.length" class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">Age range:</p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="ageId in event.ages"
              class="flex gap-2 items-center px-4 py-1 bg-light-blue-100 rounded-full w-fit"
            >
              <p class="p-0 text-base font-semibold text-slate-500">
                {{ ageOptionsMap[ageId] }}
              </p>
            </div>
          </div>
        </div>

        <div v-if="event.themes?.length" class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">Themes:</p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="theme in event.themes"
              class="flex gap-2 items-center px-4 py-1 bg-light-blue-100 rounded-full w-fit"
            >
              <p class="p-0 text-base font-semibold text-slate-500">
                {{ $t(`event.theme.${theme.name}`) }}
              </p>
            </div>
          </div>
        </div>

        <div class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">
            {{ $t('event.address.label') }}:
          </p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            {{ event.location }}
          </p>
        </div>

        <div class="mb-6 [&_p]:empty:hidden">
          <div
            class="text-[#20262C] font-normal p-0 mb-6 space-y-2 [&_p]:py-0"
            v-html="event.description"
          ></div>
        </div>

        <div class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">Email address:</p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            {{ event.contact_person }}
          </p>
        </div>

        <div v-if="event.event_url" class="mb-6">
          <p class="p-0 mb-2 font-semibold text-slate-500">
            {{ $t('eventdetails.more_info') }}
          </p>
          <a
            :href="event.event_url"
            target="_blank"
            class="p-0 mb-6 font-normal text-dark-blue"
          >
            {{ event.event_url }}
          </a>
        </div>

        <div>
          <p class="p-0 mb-2 font-semibold text-slate-500">
            Share activity on:
          </p>
          <div class="flex gap-4 items-center">
            <div
              class="fb-like"
              :data-href="shareUrl"
              data-layout="button_count"
              data-action="recommend"
              data-show-faces="false"
              data-share="true"
            ></div>

            <a
              href="https://twitter.com/share"
              class="twitter-share-button"
              :data-href="shareUrl"
              :data-text="`Check out ${event.title} at`"
              data-via="CodeWeekEU"
              data-hashtags="codeEU"
            >
              <img src="/images/social/twitter.svg" />
            </a>
            <a
              class="block [&_path]:!fill-dark-blue"
              :title="$t('eventdetails.email.tooltip')"
              :href="emailHref"
            >
              <img class="block" src="/images/mail.svg" />
            </a>
            <div class="g-plusone" data-size="medium" :data-href="appUrl"></div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="animation-element move-background duration-[1.5s] absolute z-0 bottom-10 md:bottom-auto md:top-48 -right-14 md:-right-40 w-28 md:w-72 h-28 md:h-72 bg-[#FFEF99] rounded-full hidden lg:block"
      style="transform: translate(-16px, -24px)"
    ></div>
    <div
      class="animation-element move-background duration-[1.5s] absolute z-0 lg:top-96 right-40 w-28 h-28 hidden lg:block bg-[#FFEF99] rounded-full"
      style="transform: translate(-16px, -24px)"
    ></div>
  </section>
</template>

<script>
import { computed, onMounted, ref } from 'vue';
import { useDataOptions } from './activity-form/mixins';

export default {
  props: {
    event: {
      type: Object,
      default: () => ({}),
    },
    mapTileUrl: String,
    canApprove: Boolean,
    canEdit: Boolean,

    fromText: String,
    toText: String,
    lastUpdateText: String,
    eventPath: String,
    appUrl: String,
    shareUrl: String,
    emailHref: String,
  },
  setup(props) {
    console.log(props.event);
    const {
      activityFormatOptionsMap,
      durationOptionsMap,
      ageOptions,
      ageOptionsMap,
      recurringFrequentlyMap,
      recurringTypeOptionsMap,
    } = useDataOptions();

    const mapContainerRef = ref(null);

    const eventAges = computed(() => {
      return props.event.ages
        ?.split(',')
        .map((age) => ageOptions.value?.find(({ id }) => id === age)?.name);
    });

    const handleToggleMapFullScreen = (isFullScreen) => {
      const el = mapContainerRef.value;
      if (!el) return;

      const className =
        'fixed left-0 top-[139px] md:top-[123px] z-[110] h-[calc(100dvh-139px)] md:h-[calc(100dvh-123px)]';

      if (isFullScreen) {
        el.classList.add(...className.split(' '));
      } else {
        el.classList.remove(...className.split(' '));
      }
    };

    return {
      activityFormatOptionsMap,
      eventAges,

      durationOptionsMap,
      ageOptionsMap,
      recurringFrequentlyMap,
      recurringTypeOptionsMap,

      mapContainerRef,
      handleToggleMapFullScreen,
    };
  },
};
</script>
