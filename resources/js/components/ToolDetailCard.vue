<template>
  <section
    id="codeweek-matchmaking-tool"
    class="font-['Blinker'] overflow-hidden"
  >
    <section class="relative flex overflow-hidden">
      <div class="flex codeweek-container-lg py-10 tablet:py-20">
        <div
          class="flex flex-col lg:flex-row gap-12 tablet:gap-20 xl:gap-32 2xl:gap-[260px]"
        >
          <div>
            <h2
              class="text-dark-blue text-[30px] md:text-4xl leading-[44px] font-normal md:font-medium font-['Montserrat'] mb-6"
            >
              {{ data.name }}
            </h2>
            <p class="text-[#20262C] font-normal text-2xl p-0 mb-10">
              {{ data.description }}
            </p>

            <h3
              class="text-dark-blue text-[22px] md:text-3xl leading-[36px] font-medium font-['Montserrat'] mb-6"
            >
              {{ isOrganisation ? 'About' : 'About me' }}
            </h3>
            <div class="accordion">
              <div
                v-for="(item, index) in data.abouts"
                class="bg-transparent border-b-2 border-solid border-[#A4B8D9]"
              >
                <div
                  class="py-4 cursor-pointer flex items-center justify-between duration-300"
                  @click="handleToggleAbout(index)"
                >
                  <p
                    class="text-[#20262C] font-semibold text-lg font-['Montserrat']"
                  >
                    {{ item.title }}
                  </p>
                  <div
                    class="rounded-full min-w-12 min-h-12 duration-300 flex justify-center items-center ml-8"
                    :class="[
                      showAboutIndexes.includes(index)
                        ? 'bg-primary hover:bg-hover-orange'
                        : 'bg-yellow hover:bg-primary',
                    ]"
                  >
                    <div
                      class="duration-300"
                      :class="[
                        showAboutIndexes.includes(index) && 'rotate-180',
                      ]"
                    >
                      <img src="/images/digital-girls/arrow.svg" />
                    </div>
                  </div>
                </div>
                <div
                  class="flex overflow-hidden transition-all duration-300 min-h-[1px] h-full"
                  :ref="(el) => setDescriptionRef(el, index)"
                  :style="{
                    height: showAboutIndexes.includes(index)
                      ? `${descriptionRefs[index]?.scrollHeight}px`
                      : 0,
                  }"
                >
                  <div
                    class="flex flex-col gap-0 text-slate-500 text-xl font-normal w-full"
                  >
                    <p v-for="detail in item.list" class="p-0 pb-4 w-full">
                      {{ detail }}
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="flex-shrink-0 lg:max-w-[460px] w-full">
            <div class="rounded-xl border-2 border-[#ADB2B6] mb-4">
              <img class="rounded-xl" :src="data.avatar" />
            </div>
            <p class="text-[#20262C] font-semibold text-lg p-0 mb-10">
              {{ data.name }}
              <span v-if="data.job_title">, {{ data.job_title }}</span>
            </p>
            <p
              class="text-[#20262C] text-xl leading-[36px] font-medium font-['Montserrat'] mb-4 italic"
            >
              {{ data.short_intro }}
            </p>
            <div class="border-l-[4px] border-[#F95C22] pl-4">
              <p class="p-0 text-slate-500 text-xl font-normal">
                "{{ data.description }}"
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="relative overflow-hidden">
      <div
        class="absolute w-full h-full bg-yellow-50 md:hidden"
        style="clip-path: ellipse(270% 90% at 38% 90%)"
      ></div>
      <div
        class="absolute w-full h-full bg-yellow-50 hidden md:block lg:hidden"
        style="clip-path: ellipse(188% 90% at 50% 90%)"
      ></div>
      <div
        class="absolute w-full h-full bg-yellow-50 hidden lg:block xl:hidden"
        style="clip-path: ellipse(128% 90% at 50% 90%)"
      ></div>
      <div
        class="absolute w-full h-full bg-yellow-50 hidden xl:block"
        style="clip-path: ellipse(93% 90% at 50% 90%)"
      ></div>
      <div class="codeweek-container-lg relative pt-20 pb-16 md:pt-40 md:pb-28">
        <h2
          class="text-dark-blue tablet:text-center text-[30px] md:text-4xl leading-7 md:leading-[44px] font-normal md:font-medium font-['Montserrat'] mb-10 tablet:mb-8"
        >
          Contact details
        </h2>
        <div
          class="bg-white px-5 py-10 lg:p-16 rounded-[32px] flex flex-col tablet:flex-row w-full gap-10 lg:gap-0"
        >
          <div class="flex-1">
            <h3
              class="text-dark-blue text-[22px] md:text-4xl leading-7 md:leading-[44px] font-medium font-['Montserrat'] mb-4"
            >
              Location
            </h3>
            <span
              class="bg-dark-blue text-white py-1 px-4 text-sm font-semibold rounded-full whitespace-nowrap flex items-center gap-2 w-fit mb-6"
            >
              <img src="/images/star.svg" class="w-4 h-4" />
              <span>
                Can teach Online <span class="font-sans">&</span> In-person
              </span>
            </span>
            <div class="flex gap-4 mb-6">
              <img src="/images/map.svg" class="w-6 h-6" />
              <div>
                <p class="p-0 text-slate-500 text-xl font-normal capitalize">
                  {{ data.location }}
                </p>
              </div>
            </div>
            <div class="flex gap-4 mb-6">
              <img src="/images/phone.svg" class="w-6 h-6" />
              <a
                class="text-dark-blue underline cursor-pointer text-xl font-semibold"
                :href="data.phone"
              >
                {{ data.phone }}
              </a>
            </div>
            <div class="flex gap-4 mb-6">
              <img src="/images/message.svg" class="w-6 h-6" />
              <a
                v-if="data.email !== 'anonymous'"
                class="text-dark-blue underline cursor-pointer text-xl font-semibold"
                href="mailto:sara.dawson@company.ie"
              >
                {{ data.email }}
              </a>
              <p
                v-else
                class="p-0 text-slate-500 text-xl font-normal capitalize"
              >
                {{ data.email }}
              </p>
            </div>
            <div v-if="data.link" class="flex gap-4 mb-6">
              <img src="/images/profile.svg" class="w-6 h-6" />
              <a
                class="text-dark-blue underline cursor-pointer text-xl font-semibold"
                :href="data.link"
              >
                Personal site or LinkedIn
              </a>
            </div>
            <div class="text-xl font-semibold text-[#20262C] mb-2">
              My availability
            </div>
            <div class="flex gap-4">
              <img src="/images/map.svg" class="w-6 h-6" />
              <div class="flex flex-col gap-2">
                <div
                  v-for="{ dateText, timeText } in data.availabilities"
                  class="grid grid-cols-2 gap-8"
                >
                  <p class="p-0 text-slate-500 text-xl font-normal">
                    {{ dateText }}
                  </p>

                  <p class="p-0 text-slate-500 text-xl font-normal">
                    {{ timeText }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="flex-1">
            <div
              id="map-id"
              class="relative z-50 w-full h-64 md:h-full rounded-2xl"
            ></div>
          </div>
        </div>
      </div>
    </section>
  </section>
</template>

<script>
import { computed, onMounted, ref, watch } from 'vue';
import axios from 'axios';

import { individuals, organisations } from './match-makingtool-mock-data.js';

export default {
  props: {
    id: String,
    mapTileUrl: String,
  },
  setup(props) {
    const descriptionRefs = ref([]);
    const showAboutIndexes = ref([]);
    const mapInstance = ref();
    const mapCenter = ref([51, 10]);

    const isOrganisation = computed(() => props.id?.includes('organisation-'));

    const orgData = computed(() => {
      const org = organisations.find(
        ({ id }) => `organisation-${id}` === props.id
      );
      if (!org) return null;

      const abouts = [];
      if (org.organisation_mission) {
        abouts.push({
          title: 'Introduction',
          list: [org.organisation_mission],
        });
      }
      if (org.support_activities?.length) {
        abouts.push({
          title:
            'What kind of activities or support can you offer to schools and educators?',
          list: org.support_activities,
        });
      }
      if (org.target_school_types?.length) {
        abouts.push({
          title:
            'What types of schools are you most interested in working with?',
          list: org.target_school_types,
        });
      }

      if (org.digital_expertise_areas?.length) {
        abouts.push({
          title:
            'What areas of digital expertise does your organisation or you specialise in?',
          list: org.digital_expertise_areas,
        });
      }

      if (org.description) {
        abouts.push({
          title:
            'Do you have any additional information or comments that could help us better match you with schools and educators?',
          list: [org.description],
        });
      }

      return {
        name: org.organisation_name,
        description: org.description,
        location: org.country,
        email: org.email,
        link: org.organisation_website,
        abouts,

        short_intro:
          '“Quote/ short intro Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do”',
        availabilities: [
          { dateText: 'Mon - Fri', timeText: '09:00 - 20:00' },
          { dateText: 'Sat - Sun', timeText: '10:00 - 17:00' },
          { dateText: 'Bank Holidays', timeText: '10:00 - 16:00' },
        ],
        phone: '+353 83 045 87 46',
        avatar: '/images/matchmaking-tool/tool-organisation.png',
      };
    });

    const personData = computed(() => {
      const person = individuals.find(
        ({ id }) => `individual-${id}` === props.id
      );
      if (!person) return null;

      const abouts = [];
      if (person.description) {
        abouts.push({
          title: 'Introduction',
          list: [person.description],
        });
      }
      if (person.organisation_name && person.organisation_type) {
        abouts.push({
          title: 'Organisation',
          list: [
            `Organisation name: ${person.organisation_name}`,
            `Organisation type: ${person.organisation_type}`,
          ],
        });
      }
      if (person.why_volunteering) {
        abouts.push({
          title: 'Why am I volunteering?',
          list: [person.why_volunteering],
        });
      }
      if (person.support_activities?.length) {
        abouts.push({
          title:
            'What kind of activities or support can you offer to schools and educators?',
          list: person.support_activities,
        });
      }
      if (person.languages?.length) {
        abouts.push({
          title: 'Languages spoken',
          list: person.languages,
        });
      }

      return {
        name: `${person.first_name || ''} ${person.last_name}`.trim(),
        description: person.description,
        location: person.location,
        email: person.email,
        link: person.linkedin || person.website,
        job_title: person.job_title,
        abouts,

        short_intro:
          '“Quote/ short intro Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do”',
        availabilities: [
          { dateText: 'Mon - Fri', timeText: '09:00 - 20:00' },
          { dateText: 'Sat - Sun', timeText: '10:00 - 17:00' },
          { dateText: 'Bank Holidays', timeText: '10:00 – 16:00' },
        ],
        phone: '+353 83 045 87 46',
        avatar: '/images/matchmaking-tool/tool-individual.png',
      };
    });

    const data = computed(() => {
      const result = orgData.value || personData.value || {};
      if (result.link && !result.link.startsWith('http')) {
        result.link = `https://${result.link}`;
      }
      return result;
    });

    const handleToggleAbout = (index) => {
      const filteredList = showAboutIndexes.value.filter((i) => i !== index);
      if (showAboutIndexes.value.includes(index)) {
        showAboutIndexes.value = filteredList;
      } else {
        showAboutIndexes.value = [...showAboutIndexes.value, index];
      }
    };

    const setDescriptionRef = (el, index) => {
      if (el) descriptionRefs.value[index] = el;
    };

    const handleLoadLocationCoords = async () => {
      try {
        const response = await axios(
          'https://nominatim.openstreetmap.org/search',
          { params: { format: 'json', q: data.value.location } }
        );
        if (response.data && response.data.length > 0) {
          const { lat, lon } = response.data[0];
          if (lat && lon) {
            mapCenter.value = [lat, lon];
          }
        }
      } catch (error) {
        console.log(error);
      }
    };

    watch(
      [() => mapCenter.value, () => mapInstance.value],
      () => {
        if (mapInstance.value) {
          const icon = L.icon({
            iconUrl: '/images/marker-orange.svg',
            iconSize: [33, 41],
            iconAnchor: [22, 62],
            popupAnchor: [0, -60],
          });
          L.marker(mapCenter.value, { icon }).addTo(mapInstance.value);
          mapInstance.value.setView(mapCenter.value, 8);
        }
      },
      { immediate: true }
    );

    const handleInitMap = async () => {
      mapInstance.value = L.map('map-id');
      L.tileLayer(props.mapTileUrl, {
        maxZoom: 18,
        attribution: '© <a href="https://www.mapbox.com/">Mapbox</a>',
        tileSize: 512,
        zoomOffset: -1,
        zoomControl: false,
      }).addTo(mapInstance.value);
    };

    onMounted(() => {
      handleLoadLocationCoords();
      document.addEventListener('leaflet-ready', () => {
        handleInitMap();
      });
    });

    return {
      isOrganisation,
      data,
      descriptionRefs,
      showAboutIndexes,
      handleToggleAbout,
      setDescriptionRef,
    };
  },
};
</script>
