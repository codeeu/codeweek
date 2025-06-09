<template>
  <section id="codeweek-searchpage-component" class="codeweek-page">

    <div class="home-map">
      <div class="add-button">
        <a class="codeweek-action-link-button" href="/add">{{ $t('menu.add_event') }}</a>
      </div>
      <div class="landing-wrapper">
        <div class="events-map-wrapper">
          <div id="home-map"></div>
        </div>
      </div>
    </div>

    <div id="loadmask" v-show="isLoading">
      <div class="loading">
        <img src="img/loading.gif" style="margin-right:10px;">
        {{ $t('event.loading') }}
      </div>
    </div>

    <div class="codeweek-searchbox">

      <!-- Search fields -->
      <div class="basic-fields">

        <div class="codeweek-search-text">
          <input type="text" v-model="query" v-on:keyup.13="onSubmit()" :placeholder="$t('search.search_placeholder')">
        </div>

        <div class="codeweek-search-text">
          <input type="text" v-model="tag" v-on:keyup.13="onSubmit()" :placeholder="$t('event.tags')">
        </div>

        <div class="right-fields">
          <div class="year-selection">
            <multiselect v-model="year" :options="years" :multiple="false" :close-on-select="true" :clear-on-select="false" :preserve-search="false" placeholder="Year" :show-labels="false" :preselect-first="true" :searchable="false" :allowEmpty="false">
            </multiselect>
          </div>

          <div class="codeweek-button">
            <input type="button" :value="$t('search.submit')" @click="onSubmit()">
          </div>
        </div>

      </div>

      <!-- Filters -->
      <div class="advanced-fields" v-show="showFilters">

        <multiselect v-model="countries" :options="countrieslist" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.countries')" :preselect-first="false" label="countries" :custom-label="translated" track-by="iso">
        </multiselect>

        <multiselect v-model="audiences" :options="audienceslist" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.audiences')" :preselect-first="false" label="event.audience" :custom-label="customLabel" track-by="id">
        </multiselect>

        <multiselect v-model="themes" :options="themeslist" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.themes')" :preselect-first="false" label="event.theme" :custom-label="customLabel" track-by="id">
        </multiselect>

        <multiselect v-model="types" :options="typeslist" :multiple="true" :close-on-select="false" :clear-on-select="false" :preserve-search="false" :placeholder="$t('event.activitytype.label')" :preselect-first="false" label="event.activitytype" :custom-label="customLabel" track-by="id">
        </multiselect>

      </div>

    </div>

    <!-- Events -->
    <div class="codeweek-content-wrapper">
      <div class="codeweek-grid-layout">
        <div class="codeweek-card" v-for="event in events">
          <img :src="thumbnail(event)" class="card-image">
          <div class="card-content">
            <div class="card-title">{{ event.title }}</div>
            <div class="card-subtitle">{{ event.start_date }}</div>
            <div class="card-description" v-html="limit(event.description)"></div>
          </div>
          <div class="card-actions">
            <a class="codeweek-action-link-button" :href="'/view/' + event.id + '/' + event.slug">
              {{ $t('myevents.view') }}
            </a>
          </div>
        </div>
      </div>

      <!-- Pagination -->
      <pagination v-if="pagination.last_page > 1 && !isLoading" :pagination="pagination" :offset="5" @paginate="paginate()"></pagination>

    </div>

  </section>
</template>

<script>
import Multiselect from 'vue-multiselect'
import Pagination from "./Pagination.vue"

export default {
  components: { Multiselect, Pagination },
  name: 'SearchPageComponent',
  props: {
    prpQuery: String,
    prpYears: Array,
    prpSelectedCountry: Array,
    prpSelectedYear: Number,
    name: String,
    prpTag: String,
    countrieslist: Array,
    audienceslist: Array,
    themeslist: Array,
    typeslist: Array,
  },
  data() {
    return {
      query: this.prpQuery,
      years: this.prpYears,
      year: this.prpSelectedYear,
      countries: this.prpSelectedCountry,
      audiences: [],
      themes: [],
      types: [],
      showFilters: true,
      isLoading: false,
      events: [],
      pagination: {
        current_page: 1
      },
      tag: this.prpTag
    }
  },
  methods: {
    paginate() {
      this.scrollToTop();
      this.onSubmit(true);
    },
    scrollToTop() {
      window.scrollTo(0, 0);
    },
    onSubmit(isPagination = false) {
      this.events = [];
      this.isLoading = true;

      let url = "/search";
      if (isPagination) {
        url = "/search?page=" + this.pagination.current_page;
      }

      axios.post(url, this.$data)
        .then(result => {
          const response = result.data;
          console.log("🔥 Full response:", response);

          let eventsData, mapData;

          if (Array.isArray(response)) {
            eventsData = response[0];
            mapData = response[1] || null;
          } else if (response.events) {
            eventsData = response.events;
            mapData = response.map || null;
          } else {
            console.warn("❌ Unexpected response structure:", response);
            this.isLoading = false;
            return;
          }

          // Pagination
          this.pagination = {
            per_page: eventsData.per_page,
            current_page: eventsData.current_page,
            from: eventsData.from,
            last_page: eventsData.last_page,
            last_page_url: eventsData.last_page_url,
            next_page_url: eventsData.next_page_url,
            prev_page: eventsData.prev_page,
            prev_page_url: eventsData.prev_page_url,
            to: eventsData.to,
            total: eventsData.total
          };

          // Events array
          this.events = eventsData.data ? (Array.isArray(eventsData.data) ? eventsData.data : Object.values(eventsData.data)) : [];

          console.log("✅ Events loaded:", this.events.length);

          // Map
          if (!isPagination && mapData) {
            if (window.getEvents) {
              console.log("🗺️ Calling window.getEvents...");
              window.getEvents(mapData);
            } else {
              console.warn("⚠️ window.getEvents not ready, caching mapData");
              window.eventsToMap = mapData;
            }
          }

          this.setSelectedCountryToCenterMap();
          this.isLoading = false;
        })
        .catch(error => {
          console.error("❌ Request failed:", error);
          this.isLoading = false;
        });
    },
    thumbnail(event) {
      if (event.picture) {
        if (event.picture.startsWith("http")) return event.picture;
        return 'https://codeweek-s3.s3.amazonaws.com/' + event.picture;
      }
      return 'https://codeweek-s3.s3.amazonaws.com/event_picture/logo_gs_2016_07703ca0-7e5e-4cab-affb-4de93e3f2497.png';
    },
    translated(obj) {
      return obj.translation;
    },
    customLabel(obj, label) {
      return this.$t(label + '.' + obj.name);
    },
    setSelectedCountryToCenterMap() {
      if (this.countries && this.countries.length === 1 && this.countries[0]) {
        window.countrySelected = this.countries[0].iso;
        console.log("🌍 Filtering map to country:", window.countrySelected);
        if (window.centralizeMap) {
          window.centralizeMap(window.countrySelected);
        }
      } else {
        window.countrySelected = null;
        console.log("🌍 Showing all countries on map");
        if (window.centralizeMap) {
          window.centralizeMap();
        }
      }
    },
    limit(text) {
      return text.length > 400 ? text.substring(0, 400) + "..." : text;
    }
  },
  mounted() {
    console.log("✅ Search page mounted — loading all markers");
    window.countrySelected = null;
    this.onSubmit();
  }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
