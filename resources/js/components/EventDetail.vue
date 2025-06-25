<template>
  <section class="relative z-10">
    <div
      class="relative z-10 py-10 md:py-20 codeweek-container-lg flex justify-center"
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

        <div v-if="event.activity_format" class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            Format of the activity:
          </p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="format in event.activity_format"
              class="w-fit px-4 py-1 bg-light-blue-100 rounded-full flex items-center gap-2"
            >
              <p class="text-slate-500 p-0 text-base font-semibold">
                {{ activityFormatOptionsMap[format] }}
              </p>
            </div>
          </div>
        </div>

        <div class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            {{ $t('event.activitytype.label') }}:
          </p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            <template v-if="event.activity_type">
              {{ $t(`event.activitytype.${event.activity_type}`) }}
            </template>
          </p>
        </div>

        <div v-if="event.language" class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            {{ $t('resources.Languages') }}:
          </p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="language in event.languages"
              class="w-fit px-4 py-1 bg-light-blue-100 rounded-full flex items-center gap-2"
            >
              <p class="text-slate-500 p-0 text-base font-semibold">
                {{ $t(`base.languages.${language}`) }}
              </p>
            </div>
          </div>
        </div>

        <div v-if="event.recurring_event" class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">Recurring event:</p>
          <div class="flex flex-wrap gap-2">
            <div
              class="w-fit px-4 py-1 bg-light-blue-100 rounded-full flex items-center gap-2"
            >
              <p class="text-slate-500 p-0 text-base font-semibold">
                {{ recurringFrequentlyMap[event.recurring_event] }}
              </p>
            </div>
            <div
              v-if="event.duration"
              class="w-fit px-4 py-1 bg-light-blue-100 rounded-full flex items-center gap-2"
            >
              <p class="text-slate-500 p-0 text-base font-semibold">
                {{ durationOptionsMap[event.duration] }}
              </p>
            </div>
            <div
              v-if="event.recurring_type"
              class="w-fit px-4 py-1 bg-light-blue-100 rounded-full flex items-center gap-2"
            >
              <p class="text-slate-500 p-0 text-base font-semibold">
                {{ recurringTypeOptionsMap[event.recurring_type] }}
              </p>
            </div>
          </div>
        </div>

        <div v-if="event.audiences?.length" class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            {{ $t('event.audience_title') }}:
          </p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="audience in event.audiences"
              class="w-fit px-4 py-1 bg-light-blue-100 rounded-full flex items-center gap-2"
            >
              <p class="text-slate-500 p-0 text-base font-semibold">
                {{ $t(`event.audience.${audience.name}`) }}
              </p>
            </div>
          </div>
        </div>

        <div v-if="event.ages?.length" class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">Age range:</p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="ageId in event.ages"
              class="w-fit px-4 py-1 bg-light-blue-100 rounded-full flex items-center gap-2"
            >
              <p class="text-slate-500 p-0 text-base font-semibold">
                {{ ageOptionsMap[ageId] }}
              </p>
            </div>
          </div>
        </div>

        <div v-if="event.themes?.length" class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">Themes:</p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="theme in event.themes"
              class="w-fit px-4 py-1 bg-light-blue-100 rounded-full flex items-center gap-2"
            >
              <p class="text-slate-500 p-0 text-base font-semibold">
                {{ $t(`event.theme.${theme.name}`) }}
              </p>
            </div>
          </div>
        </div>

        <div class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            {{ $t('event.address.label') }}:
          </p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            {{ event.location }}
          </p>
        </div>

        <div class="mb-6 [&_p]:empty:hidden">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            Activity description:
          </p>
          <div
            class="text-[#20262C] font-normal p-0 mb-6 space-y-2 [&_p]:py-0"
            v-html="event.description"
          ></div>
        </div>

        <div class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">Email address:</p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            {{ event.contact_person }}
          </p>
        </div>

        <div
          ref="mapContainerRef"
          class="w-full h-[520px] top-0 left-0 mb-6 rounded-lg overflow-hidden"
        >
          <div id="mapid" class="w-full h-full relative">
            <div
              style="z-index: 999"
              id="map-controls"
              class="absolute z-50 flex flex-col top-4 left-2"
            >
              <!-- Minimize screen -->
              <button
                class="pb-2 group"
                @click="handleToggleMapFullScreen(false)"
              >
                <svg
                  width="40"
                  height="40"
                  viewBox="0 0 40 40"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <rect
                    width="40"
                    height="40"
                    rx="8"
                    class="fill-white transition-colors duration-300 group-hover:fill-[#1C4DA1]"
                  />
                  <path
                    d="M13 20H27"
                    class="stroke-[#414141] group-hover:stroke-[#ffffff]"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </button>

              <!-- Full screen -->
              <button
                class="pb-2 group"
                @click="handleToggleMapFullScreen(true)"
              >
                <svg
                  width="40"
                  height="40"
                  viewBox="0 0 40 40"
                  fill="none"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <rect
                    width="40"
                    height="40"
                    rx="8"
                    class="fill-white transition-colors duration-300 group-hover:fill-[#1C4DA1]"
                  />
                  <path
                    class="stroke-[#414141] group-hover:stroke-[#ffffff]"
                    d="M16 11H13C12.4696 11 11.9609 11.2107 11.5858 11.5858C11.2107 11.9609 11 12.4696 11 13V16M29 16V13C29 12.4696 28.7893 11.9609 28.4142 11.5858C28.0391 11.2107 27.5304 11 27 11H24M24 29H27C27.5304 29 28.0391 28.7893 28.4142 28.4142C28.7893 28.0391 29 27.5304 29 27V24M11 24V27C11 27.5304 11.2107 28.0391 11.5858 28.4142C11.9609 28.7893 12.4696 29 13 29H16"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- from old page -->

        <!-- <div class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            {{ $t('eventdetails.organised_by') }}
          </p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            {{ event.organizer }}
            <span v-if="canApprove">
              (<a :href="`mailto:${event.user_email}`">{{ event.user_email }}</a
              >)
            </span>
          </p>
        </div> -->

        <!-- <div class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            {{ $t('eventdetails.more_info') }}
          </p>
          <a
            :href="event.event_url"
            class="text-dark-blue font-normal p-0 mb-6"
          >
            {{ event.event_url }}
          </a>
        </div> -->

        <!-- <div v-if="event.tags?.length" class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            {{ $t('eventdetails.tags') }}
          </p>
          <div class="flex flex-wrap gap-2">
            <div
              v-for="tag in event.tags"
              class="w-fit px-4 py-1 bg-light-blue-100 rounded-full flex items-center gap-2"
            >
              <p class="text-slate-500 p-0 text-base font-semibold">
                {{ tag.name }}
              </p>
            </div>
          </div>
        </div> -->

        <!-- <div
          v-if="canEdit && event.codeweek_for_all_participation_code"
          class="mb-6"
        >
          <p class="text-slate-500 font-semibold p-0 mb-2">
            {{ $t('event.codeweek_for_all_participation_code.title') }}:
          </p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            {{ event.codeweek_for_all_participation_code }}
          </p>
        </div>

        <div v-if="canEdit" class="mb-6">
          <p class="text-slate-500 font-semibold p-0 mb-2">
            {{ $t('event.last_update') }}:
          </p>
          <p class="text-[#20262C] font-normal p-0 mb-6">
            {{ lastUpdateText }}
          </p>
        </div> -->

        <div>
          <p class="text-slate-500 font-semibold p-0 mb-2">
            Share activity on:
          </p>
          <div class="flex items-center gap-4">
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

    const handleLoadMap = () => {
      const mapInstance = L.map('mapid');
      L.tileLayer(props.mapTileUrl, {
        maxZoom: 18,
        attribution: '© <a href="https://www.mapbox.com/">Mapbox</a>',
        tileSize: 512,
        zoomOffset: -1,
        zoomControl: false,
      }).addTo(mapInstance);
      mapInstance.setView([51, 10], 5);

      let center = [51, 10];
      if (props.event.latitude && props.event.longitude) {
        center = [props.event.latitude, props.event.longitude];
      }

      const icon = L.icon({
        iconUrl: '/images/marker-orange.svg',
        iconSize: [44, 62],
        iconAnchor: [22, 62],
        popupAnchor: [0, -60],
      });
      L.marker(center, { icon }).addTo(mapInstance);
      mapInstance.setView(center, 5);
    };

    onMounted(() => {
      // document.addEventListener('leaflet-ready', () => {
        handleLoadMap();
      // });
    });

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
