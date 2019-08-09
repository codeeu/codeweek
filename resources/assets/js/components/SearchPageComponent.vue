<template>
    <section id="codeweek-searchpage-component" class="codeweek-page">
        <div class="home-map">
            <div class="landing-wrapper">
                <div class="events-map-wrapper">
                    <div id="home-map"></div>
                </div>
            </div>
        </div>

        <div id="loadmask" v-show="isLoading">
            <div class="loading"><img src="img/loading.gif" style="margin-right:10px;">Loading...</div>
        </div>

        <div class="codeweek-searchbox">

            <div class="basic-fields">


                <div class="codeweek-search-text">
                    <input type="text" v-model="query"
                           v-on:keyup.13="onSubmit()" :placeholder="$t('search.search_placeholder')">
                </div>

                <div class="right-fields">
                    <div class="year-selection">
                        <multiselect v-model="year" :options="years" :multiple="false" :close-on-select="true"
                                     :clear-on-select="false" :preserve-search="false" placeholder="Year"
                                     :show-labels="false" :preselect-first="true" :searchable="false" :allowEmpty="false">
                            <pre class="language-json"><code>{{ year  }}</code></pre>
                        </multiselect>
                    </div>

                    <div class="codeweek-button">
                        <input type="button" :value="$t('search.submit')" @click="onSubmit()">
                    </div>

                    <div class="codeweek-more-button" @click="toggleFilters()">
                        <span>{{showFilters ? '-' : '+'}}</span>
                    </div>
                </div>

            </div>

            <div class="advanced-fields" v-show="showFilters">

                <multiselect v-model="countries" :options="countrieslist" :multiple="true" :close-on-select="false"
                             :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.countries')"
                             :preselect-first="false"
                             label="countries" :custom-label="customLabel" track-by="iso">
                    <pre class="language-json"><code>{{ countries }}</code></pre>
                </multiselect>

                <div class="advanced-line2">

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

                </div>

            </div>

        </div>

        <div class="codeweek-content-wrapper">

            <div class="sub-category-title">Activities</div>

            <!--<div class="flex" style="font-size: 14px;">

                <div class="title events-count" v-if="events.length > 0 && !isLoading">{{pagination.total}}
                    {{pagination.total > 1 ? $t('search.events') : $t('search.event')}} {{$t('search.search_counter')}}
                </div>

            </div>-->

            <div class="codeweek-card-group">
                <a :href="'/view/' + event.id + '/' + event.slug" v-for="event in events" class="card-link">
                    <div class="card">
                        <img :src="thumbnail(event)" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{event.title}}</h5>
                            <p class="card-text card-description">{{event.description}}</p>
                            <p class="card-text">
                                <small class="text-muted">{{event.start_date}}</small>
                            </p>
                        </div>
                    </div>
                </a>

            </div>

            <pagination class="pagination" v-if="pagination.last_page > 1  && !isLoading"
                        :pagination="pagination" :offset="5" @paginate="paginate()"></pagination>


        </div>

    </section>

</template>

<script>
    import Multiselect from 'vue-multiselect'
    import Pagination from "./Pagination";

    export default {
        components: {Multiselect, Pagination},
        name: 'SearchPageComponent',
        props: {
            prpQuery: String,
            prpYears: Array,
            prpSelectedCountry: Array,
            prpSelectedYear: Number,
            name: String,
            countrieslist: Array,
            audienceslist: Array,
            themeslist: Array
        },
        data() {
            return {
                query: this.prpQuery,
                years: this.prpYears,
                year: this.prpSelectedYear,
                countries: this.prpSelectedCountry,
                audiences: [],
                themes: [],
                showFilters: false,
                isLoading: false,
                events: [],
                pagination: {
                    'current_page': 1
                }
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
                var url = "/search";
                if (isPagination) {
                    url = "/search?page=" + this.pagination.current_page;
                }
                console.log(this.countries);
                axios.post(url, this.$data)
                    .then(result => {
                        var response = result.data[0];
                        this.pagination.per_page = response.per_page;
                        this.pagination.current_page = response.current_page;
                        this.pagination.from = response.from;
                        this.pagination.last_page = response.last_page;
                        this.pagination.last_page_url = response.last_page_url;
                        this.pagination.next_page_url = response.next_page_url;
                        this.pagination.prev_page = response.prev_page;
                        this.pagination.prev_page_url = response.prev_page;
                        this.pagination.to = response.to;
                        this.pagination.total = response.total;

                        this.events = response.data;

                        if (!isPagination) {
                            if (window.getEvents) {
                                window.getEvents(result.data[1]);
                            } else {
                                window.eventsToMap = result.data[1];
                            }
                        }
                        this.isLoading = false;
                    })
                    .catch(error => {
                        this.errors = error.response.data
                    })
            },
            thumbnail: function (event) {
                if (event.picture) {
                    return 'https://codeweek-s3.s3.amazonaws.com/' + event.picture;
                }
                return 'https://codeweek-s3.s3.amazonaws.com/event_picture/logo_gs_2016_07703ca0-7e5e-4cab-affb-4de93e3f2497.png';
            },
            customLabel(obj, label) {
                return this.$t(label + '.' + obj.name);
            }
        },
        mounted: function () {
            this.onSubmit();
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>