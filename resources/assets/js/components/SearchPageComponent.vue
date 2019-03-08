<template>
    <div class="search-page-component">
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

        <div class="container mx-auto flex flex-col p-4 searchbox-container">

            <div class="basic-fields flex flex-row">

                <div class="w-full mr-4" >
                    <input type="text" class="input-text w-full pl-8 pr-8" v-model="query"
                           v-on:keyup.13="onSubmit()" placeholder="Search by title or description">
                </div>

                <div class="year-selection mr-4">
                    <multiselect v-model="year" :options="years" :multiple="false" :close-on-select="true"
                                 :clear-on-select="false" :preserve-search="false" placeholder="Year"
                                 :show-labels="false" :preselect-first="true" :searchable="false" :allowEmpty="false">
                        <pre class="language-json"><code>{{ year  }}</code></pre>
                    </multiselect>
                </div>

                <div class="search-button mr-4">
                    <input type="button" class="btn btn-primary btn-sm w-full button-search" value="Search" @click="onSubmit()">
                </div>

                <div class="more-button">
                    <input type="button" class="btn btn-primary btn-sm w-full fa fa-trophy button-plus" :value="showFilters ? '-' : '+'" @click="toggleFilters()">
                </div>

            </div>

            <div class="advanced-fields flex flex-col mt-4" v-show="showFilters">

                <multiselect v-model="countries" :options="countrieslist" :multiple="true" :close-on-select="false"
                             :clear-on-select="false" :preserve-search="false" placeholder="Countries" :preselect-first="false"
                             label="name" track-by="iso">
                    <pre class="language-json"><code>{{ countries }}</code></pre>
                </multiselect>

                <div class="flex flex-row mt-4">

                    <multiselect v-model="audiences" :options="audienceslist" :multiple="true" :close-on-select="false"
                                 :clear-on-select="false" :preserve-search="false" placeholder="Audiences" :preselect-first="false"
                                 label="name" track-by="id" class="mr-4">
                        <pre class="language-json"><code>{{ audiences }}</code></pre>
                    </multiselect>

                    <multiselect v-model="themes" :options="themeslist" :multiple="true" :close-on-select="false"
                                 :clear-on-select="false" :preserve-search="false" placeholder="Themes" :preselect-first="false"
                                 label="name" track-by="id">
                        <pre class="language-json"><code>{{ themes }}</code></pre>
                    </multiselect>

                </div>

            </div>

        </div>

        <div class="container events-container">

            <div class="flex" style="font-size: 14px;">

                <div class="title events-count" v-if="events.length > 0 && !isLoading">{{pagination.total}} events match in your search criteria</div>
                <div class="title events-page" v-if="pagination.last_page > 1 && !isLoading">Page {{pagination.current_page}} of {{pagination.last_page}}</div>

            </div>

            <div class="card-group grid mt-6">
                <a :href="'/view/' + event.id + '/' + event.slug" v-for="event in events" class="card-link">
                    <div class="card">
                        <img :src="thumbnail(event)" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{event.title}}</h5>
                            <p class="card-text card-description">{{event.description}}</p>
                            <p class="card-text"><small class="text-muted">{{event.start_date}}</small></p>
                        </div>
                    </div>
                </a>

            </div>

            <pagination class="pagination" v-if="pagination.last_page > 1  && !isLoading"
                        :pagination="pagination" :offset="5" @paginate="paginate()"></pagination>


        </div>

    </div>

</template>

<script>
    import Multiselect from 'vue-multiselect'
    import Pagination from "./Pagination";

    export default {
        components: {Multiselect, Pagination},
        name: 'SearchPageComponent',
        props: {
            name: String,
            countrieslist: Array,
            audienceslist: Array,
            themeslist: Array
        },
        data() {
            return {
                query: "",
                year: '',
                years:[2019,2018,2017,2016,2015,2014],
                countries: [],
                audiences: [],
                themes: [],
                showFilters:false,
                isLoading: false,
                events:[],
                pagination: {
                    'current_page': 1
                },
            }
        },
        methods:{
            toggleFilters(){
                this.showFilters = !this.showFilters;
            },
            scrollToTop() {
                window.scrollTo(0,0);
            },
            paginate: function(){
                this.scrollToTop();
                this.onSubmit(true);
            },
            onSubmit: function(isPagination) {
                this.events = [];
                this.isLoading = true;
                var url="/search";
                if (isPagination){
                    url = "/search?page=" + this.pagination.current_page;
                }
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
            }
        },
        mounted: function () {
            this.onSubmit();
        }
    }
</script>

<style scoped>

    .landing-wrapper{
        position: relative;
        height: 450px;
    }

    #loadmask{
        position: absolute;
        height: 450px;
        width: 100%;
        top: 110px;
        background-color: rgba(0,0,0,0.5);
        z-index:1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loading{
        background-color: white;
        padding: 15px;
        border-radius: 10px;
    }

    .events-map-wrapper{
        position: absolute;
        width: 100%;
        height: 450px;
    }

    .card-link .card{
        border-width: 1px;
        border-radius: 8px;
        height: 500px;
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.15);
    }

    .card-link .card:hover{
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.30);
    }

    .input-text{
        min-height: 40px;
        border-radius: 5px;
        border: 1px solid #e8e8e8;
        font-size:14px;
        font-family:'Lato'
    }

    .button-search{
        border-radius: 5px;
        width: 120px;
        height:40px;
    }

    .button-plus{
        border-radius: 5px;
        width: 40px;
        height:40px;
    }

    .events-container{
        margin-top: 20px;
    }

    .events-page{
        margin-left: 20px;
        font-weight: bold;
        flex: 1;
        justify-content: end;
        display: flex;
    }

    .searchbox-container{
        position:relative;
        margin-top: -80px;
        background-color: rgba(68,68,68,0.8);
        border-radius: 8px;
    }

    .card-group{
        grid-template-columns: 1fr 1fr 1fr;
    }

    .card img{
        width:100%;
        object-fit: cover;
        height: 200px;
        background-color: white;
        border-radius: 8px 8px 0px 0px;
        border-bottom: 1px solid #EEEEEE;
    }

    .card-body{
        padding:15px;
    }

    .card-title{
        font-size:20px;
        height:60px;
        overflow:hidden;
    }

    .card-description{
        font-size:15px;
        overflow: hidden;
        padding-top: 10px;
        height: 140px;
        color:black;
    }

    .pagination{
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>