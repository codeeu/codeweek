<template>
    <section id="codeweek-searchpage-component" class="codeweek-page">


        <div class="home-map">
            <div class="add-button">
                <a class="codeweek-action-link-button"
                   href="/add">{{$t('menu.add_event')}}</a>
            </div>
            <div class="landing-wrapper">
                <div class="events-map-wrapper">
                    <div id="home-map"></div>
                </div>
            </div>
        </div>

        <div id="loadmask" v-show="isLoading">
            <div class="loading"><img src="img/loading.gif" style="margin-right:10px;">{{$t('event.loading')}}</div>
        </div>

        <div class="codeweek-searchbox">

            <div class="basic-fields">


                <div class="codeweek-search-text">
                    <input type="text" v-model="query"
                           v-on:keyup.13="onSubmit()" :placeholder="$t('search.search_placeholder')">
                </div>

              <div class="codeweek-search-text">
                    <input type="text" v-model="tag"
                           v-on:keyup.13="onSubmit()" :placeholder="$t('event.tags')">
                </div>

                <div class="right-fields">
                    <div class="year-selection">
                        <multiselect v-model="year" :options="years" :multiple="false" :close-on-select="true"
                                     :clear-on-select="false" :preserve-search="false" placeholder="Year"
                                     :show-labels="false" :preselect-first="true" :searchable="false"
                                     :allowEmpty="false">
                            <pre class="language-json"><code>{{ year  }}</code></pre>
                        </multiselect>
                    </div>

                    <div class="codeweek-button">
                        <input type="button" :value="$t('search.submit')" @click="onSubmit()">
                    </div>

                    <!--<div class="codeweek-more-button" @click="toggleFilters()">
                        <span>{{showFilters ? '-' : '+'}}</span>
                    </div>-->
                </div>

            </div>

            <div class="advanced-fields" v-show="showFilters">

                <multiselect v-model="countries" :options="countrieslist" :multiple="true" :close-on-select="false"
                             :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.countries')"
                             :preselect-first="false"
                             label="countries" :custom-label="translated" track-by="iso">
                    <pre class="language-json"><code>{{ countries }}</code></pre>
                </multiselect>

                <multiselect v-model="audiences" :options="audienceslist" :multiple="true" :close-on-select="false"
                             :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.audiences')"
                             :preselect-first="false"
                             label="event.audience" :custom-label="customLabel" track-by="id" class="mr-4">
                    <pre class="language-json"><code>{{ audiences }}</code></pre>
                </multiselect>

                <multiselect v-model="themes" :options="themeslist" :multiple="true" :close-on-select="false"
                             :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.themes')"
                             :preselect-first="false"
                             label="event.theme" :custom-label="customLabel" track-by="id">
                    <pre class="language-json"><code>{{ themes }}</code></pre>
                </multiselect>

                <multiselect v-model="types" :options="typeslist" :multiple="true" :close-on-select="false"
                             :clear-on-select="false" :preserve-search="false"
                             :placeholder="$t('event.activitytype.label')"
                             :preselect-first="false"
                             label="event.activitytype" :custom-label="customLabel" track-by="id">
                    <pre class="language-json"><code>{{ types }}</code></pre>
                </multiselect>


            </div>

        </div>

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
                        <a class="codeweek-action-link-button"
                           :href="'/view/' + event.id + '/' + event.slug">{{ $t('myevents.view') }}</a>
                    </div>
                </div>

            </div>

            <pagination v-if="pagination.last_page > 1  && !isLoading"
                        :pagination="pagination" :offset="5" @paginate="paginate()"></pagination>


        </div>

    </section>

</template>

<script>
    import Multiselect from 'vue-multiselect'
    import Pagination from "./Pagination.vue";

    export default {
        components: {Multiselect, Pagination},
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
                    'current_page': 1
                },
                sortedCountries: [],
                tag: this.prpTag
            }
        },
        methods: {
            toggleFilters() {
                this.showFilters = !this.showFilters;
            },
            scrollToTop() {
                window.scrollTo(0, 0);
            },
            paginate: function () {
                this.scrollToTop();
                this.onSubmit(true);
            },
            onSubmit: function (isPagination) {
                this.events = [];
                this.isLoading = true;

                let url = "/search";
                if (isPagination) {
                    url = "/search?page=" + this.pagination.current_page;
                }

                axios.post(url, this.$data)
                    .then(result => {
                        console.log("🔥 Full response", result.data);

                        if (Array.isArray(result.data) && result.data.length > 0) {
                            const eventsData = result.data[0]; // Paginated events
                            const mapData = result.data[1] || null; // Map (optional on pagination)

                            // Set pagination values
                            this.pagination.per_page = eventsData.per_page;
                            this.pagination.current_page = eventsData.current_page;
                            this.pagination.from = eventsData.from;
                            this.pagination.last_page = eventsData.last_page;
                            this.pagination.last_page_url = eventsData.last_page_url;
                            this.pagination.next_page_url = eventsData.next_page_url;
                            this.pagination.prev_page = eventsData.prev_page;
                            this.pagination.prev_page_url = eventsData.prev_page_url;
                            this.pagination.to = eventsData.to;
                            this.pagination.total = eventsData.total;

                            // Set event list
                            this.events = eventsData.data;

                            // Set map data (only on non-pagination call)
                            if (!isPagination) {
                                if (window.getEvents) {
                                    window.getEvents(mapData);
                                } else {
                                    window.eventsToMap = mapData;
                                }
                            }

                            this.setSelectedCountryToCenterMap();
                        } else {
                            console.warn("❌ Unexpected response structure:", result.data);
                            this.errors = "Unexpected response format from server.";
                        }

                        this.isLoading = false;
                    })
                    .catch(error => {
                        console.error("❌ Request failed:", error);
                        this.errors = error.response ? error.response.data : "Unknown error";
                        this.isLoading = false;
                    });
            },
            thumbnail: function (event) {

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
                    if (window.centralizeMap) {
                        window.centralizeMap(window.countrySelected);
                    }
                } else {
                    window.countrySelected = null;
                    if (window.centralizeMap) {
                        window.centralizeMap();
                    }
                }
            },
            limit(text) {

                if (text.length > 400) {
                    return text.substring(0, 400) + "...";
                }
                return text;
            }
        },
        mounted: function () {
            this.onSubmit();
            this.setSelectedCountryToCenterMap();
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
