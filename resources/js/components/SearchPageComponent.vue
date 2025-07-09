<template>
  <section>
    <div ref="mapContainerRef" class="w-full h-[520px] top-0 left-0">
      <div id="mapid" class="w-full h-full relative">
        <div
          style="z-index: 999"
          id="map-controls"
          class="absolute z-50 flex flex-col top-4 left-2"
        >
          <!-- Full screen -->
          <button class="pb-2 group" @click="handleToggleMapFullScreen(true)">
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

          <!-- Minimize screen -->
          <button class="pb-2 group" @click="handleToggleMapFullScreen(false)">
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
        </div>
      </div>
    </div>
  </section>
  <section class="codeweek-searchpage-component font-['Blinker']">
    <div class="codeweek-container py-10">
      <div class="flex w-full">
        <div
          class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 items-end gap-4 w-full"
        >
          <FieldWrapper
            class="lg:col-span-2"
            horizontal
            label="Search by title or description"
          >
            <InputField
              v-model="filters.query"
              placeholder="E.g tools assessment in computing"
            />
          </FieldWrapper>

          <FieldWrapper horizontal label="Year">
            <SelectField
              return-object
              placeholder="Select year"
              v-model="filters.year"
              :deselect-label="''"
              :allow-empty="false"
              :options="yearOptions"
            />
          </FieldWrapper>

          <FieldWrapper horizontal label="Language">
            <SelectField
              multiple
              return-object
              placeholder="Select language"
              v-model="filters.languages"
              :options="languageOptions"
            />
          </FieldWrapper>

          <FieldWrapper horizontal label="Country">
            <SelectField
              multiple
              return-object
              id-name="iso"
              placeholder="Select country"
              v-model="filters.countries"
              :options="countrieslist"
            />
          </FieldWrapper>

          <button
            class="bg-[#F95C22] rounded-full py-3 px-20 font-['Blinker'] hover:bg-hover-orange duration-300 mt-2 sm:col-span-2 lg:col-span-1"
            @click="onSubmit()"
          >
            <span
              class="text-base leading-7 font-semibold text-black normal-case"
            >
              Search
            </span>
          </button>
        </div>
      </div>

      <div v-if="tags.length" class="flex md:justify-center mt-10">
        <div class="max-md:w-full flex flex-wrap gap-2">
          <template v-for="tag in tags" :key="tag.id">
            <div
              class="bg-light-blue-100 pl-4 pr-3 py-1 rounded-full text-slate-500 text-[16px] font-semibold"
            >
              <div class="flex items-center gap-2">
                <span>{{ tag.name }}</span>
                <button @click="removeSelectedItem(tag)">
                  <img class="w-4 h-4" src="/images/close-icon.svg" />
                </button>
              </div>
            </div>
          </template>

          <div class="max-md:w-full max-md:mt-4 flex justify-center px-4">
            <button
              class="text-dark-blue underline font-semibold text-[16px]"
              @click="removeAllSelectedItems"
            >
              Clear all filters
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="relative pt-20 md:pt-48">
      <div
        class="absolute w-full h-[800px] bg-yellow-50 md:hidden top-0"
        style="clip-path: ellipse(270% 90% at 38% 90%)"
      />
      <div
        class="absolute w-full h-[800px] bg-yellow-50 hidden md:block top-0"
        style="clip-path: ellipse(88% 90% at 50% 90%)"
      />

      <div class="bg-yellow-50 pb-24">
        <div class="relative z-10 codeweek-container-lg">
          <div class="flex flex-col md:flex-row gap-10">
            <div
              class="flex-shrink-0 grid grid-cols-2 md:grid-cols-1 gap-6 bg-[#FFEF99] px-4 py-6 rounded-2xl self-start w-full md:w-60"
            >
              <FieldWrapper horizontal label="Date">
                <div
                  class="relative w-full flex px-3 justify-between items-center text-gray-700 whitespace-nowrap rounded-3xl border-2 border-dark-blue-200 h-[50px] bg-white"
                >
                  <date-time
                    :key="filters.start_date"
                    placeholder="Start Date"
                    format="yyyy-MM-dd"
                    :value="filters.start_date"
                    @onChange="filters.start_date = $event"
                    @onClear="filters.start_date = null"
                  ></date-time>
                  <div
                    class="absolute top-1/2 right-4 -translate-y-1/2 pointer-events-none"
                  >
                    <img src="/images/select-arrow.svg" />
                  </div>
                </div>
              </FieldWrapper>

              <FieldWrapper horizontal label="Format">
                <SelectField
                  multiple
                  return-object
                  placeholder="Select format"
                  v-model="filters.formats"
                  :options="activityFormatOptions"
                  @onChange="() => onSubmit()"
                />
              </FieldWrapper>

              <FieldWrapper horizontal label="Activity type">
                <SelectField
                  multiple
                  return-object
                  placeholder="Select type"
                  v-model="filters.types"
                  :options="activityTypeOptions"
                  @onChange="() => onSubmit()"
                />
              </FieldWrapper>

              <FieldWrapper horizontal label="Audience">
                <SelectField
                  multiple
                  return-object
                  placeholder="Select audience"
                  v-model="filters.audiences"
                  :options="audienceslist"
                  @onChange="() => onSubmit()"
                />
              </FieldWrapper>

              <FieldWrapper horizontal label="Age range">
                <SelectField
                  multiple
                  return-object
                  placeholder="Select range"
                  v-model="filters.ages"
                  :options="ageOptions"
                  @onChange="() => onSubmit()"
                />
              </FieldWrapper>

              <FieldWrapper horizontal label="Themes">
                <SelectField
                  multiple
                  return-object
                  placeholder="Select themes"
                  v-model="filters.themes"
                  :options="themeslist"
                  @onChange="() => onSubmit()"
                />
              </FieldWrapper>
            </div>
            <div
              v-show="isLoading"
              class="flex items-center justify-center w-full"
            >
              <img src="img/loading.gif" style="margin-right: 10px" />{{
                $t('event.loading')
              }}
            </div>
            <div
              v-if="!isLoading"
              class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-10 h-fit"
            >
              <template v-for="event in events" :key="event.id">
                <event-card :event="event"></event-card>
              </template>

              <div v-if="pagination.last_page > 1" class="col-span-full">
                <pagination
                  :pagination="pagination"
                  :offset="5"
                  @paginate="paginate"
                ></pagination>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
<script>
import { ref, computed, onMounted } from 'vue';
import Pagination from './Pagination.vue';
import axios from 'axios';
import EventCard from './EventCard.vue';

import FieldWrapper from './form-fields/FieldWrapper.vue';
import SelectField from './form-fields/SelectField.vue';
import InputField from './form-fields/InputField.vue';

import { useDataOptions } from './activity-form/mixins.js';

export default {
  name: 'SearchPageComponent',
  components: {
    EventCard,
    Pagination,

    FieldWrapper,
    SelectField,
    InputField,
  },
  props: {
    mapTileUrl: String,
    prpQuery: String,
    prpSelectedCountry: Array,

    name: String,
    years: Array,
    countrieslist: Array,
    audienceslist: Array,
    themeslist: Array,
    typeslist: Array,
    languagesObject: {
      type: Object,
      default: () => ({}),
    },
  },
  setup(props) {
    const { activityFormatOptions, activityTypeOptions, ageOptions } =
      useDataOptions();

    const isLoading = ref(true);
    const mapContainerRef = ref(null);
    const mapInstance = ref(null);
    const mapMarkerClusterInstance = ref(null);
    const events = ref([]);
    const mapDataObject = ref({});
    const errors = ref(null);

    const emptyFilters = {
      query: '',
      languages: [],
      countries: [],
      start_date: '',
      formats: [],
      types: [],
      audiences: [],
      ages: [],
      themes: [],
    };

    const filters = ref({
      ...emptyFilters,
      query: props.prpQuery || '',
      year: { id: new Date().getFullYear(), name: new Date().getFullYear() },
      countries: props.prpSelectedCountry || [],
    });

    const pagination = ref({
      current_page: 1,
      per_page: 0,
      from: null,
      last_page: 0,
      last_page_url: null,
      next_page_url: null,
      prev_page: null,
      prev_page_url: null,
      to: null,
      total: 0,
    });

    const yearOptions = computed(() =>
      props.years.map((id) => ({ id, name: id }))
    );

    const languageOptions = computed(() =>
      Object.entries(props.languagesObject).map(([key, value]) => ({
        id: key,
        name: value,
      }))
    );

    const tags = computed(() => {
      const result = [
        ...filters.value.languages,
        ...filters.value.countries,
        ...filters.value.formats,
        ...filters.value.types,
        ...filters.value.audiences,
        ...filters.value.ages,
        ...filters.value.themes,
      ];

      if (filters.value.start_date) {
        result.push({
          id: 'start_date',
          name: filters.value.start_date.slice(0, 10),
        });
      }

      return result;
    });

    const removeSelectedItem = (tag) => {
      if (tag.id === 'start_date') {
        filters.value.start_date = '';
        return;
      }

      const filterFn = (item) => item.id !== tag.id;
      filters.value.languages = filters.value.languages.filter(filterFn);
      filters.value.countries = filters.value.countries.filter(
        (item) => item.iso !== tag.iso
      );
      filters.value.formats = filters.value.formats.filter(filterFn);
      filters.value.audiences = filters.value.audiences.filter(filterFn);
      filters.value.themes = filters.value.themes.filter(filterFn);
      onSubmit();
    };

    const removeAllSelectedItems = () => {
      filters.value = { ...emptyFilters };
      onSubmit();
    };

    const scrollToTop = () => {
      window.scrollTo(0, 0);
    };

    const paginate = () => {
      scrollToTop();
      onSubmit(true);
    };

    const onSubmit = (isPagination = false) => {
      events.value = [];
      isLoading.value = true;

      let url = '/search';
      if (isPagination) {
        url = `/search?page=${pagination.value.current_page}`;
      }

      const requestData = {
        ...filters.value,
        year: filters.value.year?.id,
        start_date: filters.value.start_date
          ? new Date(filters.value.start_date).toISOString().slice(0, 10)
          : '',
        pagination: {
          current_page: pagination.current_page,
        },
      };

      axios
        .post(url, requestData)
        .then((result) => {
          const response = result.data;
          console.log('🔥 Full response:', response);

          let eventsData, mapData;

          // Handle both response formats: array OR object
          if (Array.isArray(response)) {
            eventsData = response[0];
            mapData = response[1] || null;
          } else if (response.events) {
            eventsData = response.events;
            mapData = response.map || null;
          } else {
            console.warn('❌ Unexpected response structure:', response);
            errors.value = 'Unexpected response format from server.';
            isLoading.value = false;
            return;
          }

          // Set pagination
          pagination.value = {
            per_page: eventsData.per_page,
            current_page: eventsData.current_page,
            from: eventsData.from,
            last_page: eventsData.last_page,
            last_page_url: eventsData.last_page_url,
            next_page_url: eventsData.next_page_url,
            prev_page: eventsData.prev_page,
            prev_page_url: eventsData.prev_page_url,
            to: eventsData.to,
            total: eventsData.total,
          };

          // Ensure data is an array, even if returned as an object
          if (eventsData.data) {
            events.value = Array.isArray(eventsData.data)
              ? eventsData.data
              : Object.values(eventsData.data);
          } else {
            events.value = [];
          }

          console.log('✅ Events loaded:', events.value.length);

          if (!isPagination && mapData) {
            if (window.getEvents) {
              window.getEvents(mapData);
            } else {
              window.eventsToMap = mapData;
            }
            mapDataObject.value = mapData;
            handleAddMarkerLayer();
          } else if (!mapData) {
            console.warn('⚠️ mapData is null, skipping map update');
          }

          setSelectedCountryToCenterMap();
          isLoading.value = false;
        })
        .catch((error) => {
          console.error('❌ Request failed:', error);
          errors.value = error.response ? error.response.data : 'Unknown error';
          isLoading.value = false;
        });
    };

    const setSelectedCountryToCenterMap = () => {
      if (!mapInstance.value) return;
      let centerInfo = { latitude: 51, longitude: 4, zoom: 4 };

      if (filters.value.countries?.length === 1) {
        const { latitude, longitude } = filters.value.countries[0] || {};
        if (latitude && longitude) {
          centerInfo = { latitude, longitude, zoom: 4 };
        }
      }

      mapInstance.value.setView(
        new L.LatLng(centerInfo.latitude, centerInfo.longitude),
        4,
        { animation: true }
      );
    };

    const limit = (text) => {
      if (text.length > 400) {
        return text.substring(0, 400) + '...';
      }
      return text;
    };

    var handleClickMarker = async (e) => {
      const id = e.target.options.id;

      try {
        const { data } = await axios.get(`/api/event/detail?id=${id}`);
        const event = data.data;
        console.log('event/detail', event);

        const content = `
          <div class="marker-popup-content" style="font-family: Blinker">
            <h4 style="margin-bottom: 16px; font-size: 16px; font-family: Montserrat; font-weight: 500; color: #1C4DA1;">
              <a class="map-marker" href="${event.path}">${event.title}</a>
            </h4>
            <div style="display:flex;align-items: center; gap: 16px">
              <img class="marker-buble-img" src="${event.picture}" style="width:100px;height:100px; border-radius: 4px;" />
              <div class="marker-popup-description">
                <p style="overflow:hidden; padding: 0; margin: 0; font-size: 14px;">${event.description}</p>
              </div>
            </div>
          </div>
        `;

        const popup = L.popup({ maxWidth: 600 }).setContent(content);
        e.target.bindPopup(popup).openPopup();
      } catch (error) {
        console.error('Can NOT load event', error);
      }
    };

    const handleAddMarkerLayer = () => {
      if (!mapInstance.value) return;

      try {
        if (mapMarkerClusterInstance.value) {
          // Clear layer will take time, let try without [clearLayers] for now
          // mapMarkerClusterInstance.value.clearLayers();
          mapInstance.value.removeLayer(mapMarkerClusterInstance.value);
          mapMarkerClusterInstance.value = null;
        }
        const clusterGroup = L.markerClusterGroup();

        const markerDataList = [];
        Object.values(mapDataObject.value).forEach((list) => {
          markerDataList.push(...list);
        });

        console.group('Started add markers', markerDataList.length);

        markerDataList.map(({ id, geoposition }, index) => {
          if (index % 10000 === 0) {
            console.log('Adding markers', index);
          }
          const coordinates = geoposition.split(',');
          const latitude = parseFloat(coordinates[0]);
          const longitude = parseFloat(coordinates[1]);
          if (latitude && longitude) {
            const marker = L.marker([latitude, longitude], { id });
            marker.on('click', handleClickMarker);
            clusterGroup.addLayer(marker);
          }
        });
        console.log('Done add markers', markerDataList.length);
        console.groupEnd();

        mapMarkerClusterInstance.value = clusterGroup;
        mapInstance.value.addLayer(clusterGroup);
      } catch (error) {
        console.log('Add marker error', error);
      }
    };

    const handleAddUserLocationMarker = () => {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            const { latitude, longitude } = position.coords;
            const icon = L.icon({
              iconUrl: '/images/marker-orange.svg',
              iconSize: [33, 41],
              iconAnchor: [22, 62],
              popupAnchor: [0, -60],
            });
            L.marker([latitude, longitude], { icon }).addTo(mapInstance.value);
          },
          (err) => {
            console.error('Geolocation error:', err);
          }
        );
      }
    };

    const handleInitMap = () => {
      mapInstance.value = L.map('mapid');
      mapInstance.value.setView([51, 10], 5);
      
      L.tileLayer(props.mapTileUrl, {
        maxZoom: 18,
        attribution: '© <a href="https://www.mapbox.com/">Mapbox</a>',
        tileSize: 512,
        zoomOffset: -1,
        zoomControl: false,
      }).addTo(mapInstance.value);
    };

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

    onMounted(() => {
      onSubmit();

      // document.addEventListener('leaflet-ready', () => {
      setTimeout(() => {
        handleInitMap();
        setSelectedCountryToCenterMap();
        handleAddMarkerLayer();
        handleAddUserLocationMarker();
      }, 2000);
      // });
    });

    return {
      mapContainerRef,
      yearOptions,
      languageOptions,
      activityFormatOptions,
      activityTypeOptions,
      ageOptions,
      filters,

      removeSelectedItem,
      removeAllSelectedItems,

      isLoading,
      events,
      errors,
      tags,
      pagination,
      scrollToTop,
      paginate,
      onSubmit,
      limit,
      handleToggleMapFullScreen,
    };
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
