<template>

    <div>

        <div class="container mx-auto h-full flex-row bg-blue-light p-4" style="border-radius: 8px">


            <div class="flex justify-between w-full">
                <div class="w-full mr-4">
                    <input type="text" class="input-text w-full pl-8 pr-8" v-model="searchInput" @input="debounceSearch"
                           v-on:keyup.13="onSubmit()" placeholder="Search resources ...">
                </div>

                <div class="more-button">
                    <input type="button" class="btn btn-primary btn-sm w-full fa fa-trophy button-plus"
                           :value="showFilters ? '-' : '+'" @click="toggleFilters()">
                </div>
            </div>


            <div class="flex justify-between mt-4" v-show="showFilters">

                <multiselect v-model="selectedTypes" :options="types" :multiple="true" :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true" placeholder="Types" label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()"
                             class="mb-4 mr-8">
                    <pre class="language-json"><code>{{ selectedTypes  }}</code></pre>
                </multiselect>

                <multiselect v-model="selectedLevels" :options="levels" :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true" placeholder="Levels" label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="mb-4 mr-8">
                    <pre class="language-json"><code>{{ selectedLevels  }}</code></pre>
                </multiselect>

                <multiselect v-show="section === 'learn'" v-model="selectedProgrammingLanguages"
                             :options="programmingLanguages"
                             :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true"
                             placeholder="Programming Languages"
                             label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="mb-4">
                    <pre class="language-json"><code>{{ selectedProgrammingLanguages  }}</code></pre>
                </multiselect>

                <multiselect v-show="section === 'teach'" v-model="selectedSubjects" :options="subjects"
                             :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true"
                             placeholder="Subjects"
                             label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="mr-8 ml-8">
                    <pre class="language-json"><code>{{ selectedSubjects  }}</code></pre>
                </multiselect>
            </div>

            <div class="flex justify-between" v-show="showFilters">

                <multiselect v-model="selectedCategories" :options="categories" :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true" placeholder="Categories"
                             label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="mr-8">
                    <pre class="language-json"><code>{{ selectedCategories  }}</code></pre>
                </multiselect>


                <multiselect v-model="selectedLanguages" :options="languages" :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true" placeholder="Languages"
                             label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="ml-8">
                    <pre class="language-json"><code>{{ selectedLanguages  }}</code></pre>
                </multiselect>


            </div>


        </div>


        <div class="container events-container">

            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto" style="font-size: 14px;">
<div class="text-sm lg:flex-grow">
                <div class="title events-count" v-if="resources.length > 0">{{pagination.total}} resources match in your
                    search criteria
                </div>
                <div class="title events-page" v-if="pagination.last_page > 1">Page {{pagination.current_page}} of
                    {{pagination.last_page}}
                </div>
</div>
<div>
    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"
            v-clipboard:copy="searchQuery"
            v-clipboard:success="onCopy"
            v-clipboard:error="onError">
        Share
    </button>
</div>


            </div>

            <div class="card-group grid mt-6">
                <div class="card flex mb-4" v-for="resource in resources">
                    <resource-card :resource="resource"></resource-card>
                </div>
            </div>

            <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5"
                        @paginate="paginate()"></pagination>

        </div>


    </div>

</template>

<script>
    import Multiselect from 'vue-multiselect'
    import _ from 'lodash'
    import ResourceCard from "./ResourceCard";
    import Pagination from "./Pagination";
    import VueClipboard from 'vue-clipboard2'

    window.multiselect = this;



    export default {
        components: {ResourceCard, Multiselect, Pagination, VueClipboard},
        props: {
            prpQuery: String,
            prpLevels: Array,
            prpTypes: Array,
            prpProgrammingLanguages: Array,
            prpCategories: Array,
            prpLanguages: Array,
            prpSubjects: Array,
            name: String,
            levels: Array,
            languages: Array,
            programmingLanguages: Array,
            categories: Array,
            subjects: Array,
            types: Array,
            section: String,
            locale: String
        },
        data() {
            return {
                query: this.prpQuery,
                searchInput: this.prpQuery,
                selectedLevels: this.prpLevels,
                selectedTypes: this.prpTypes,
                selectedProgrammingLanguages: this.prpProgrammingLanguages,
                selectedCategories: this.prpCategories,
                selectedLanguages: this.prpLanguages,
                selectedSubjects:this.prpSubjects,
                selectedSection: this.section,
                isOpen: false,
                showFilters: false,
                errors: {},
                pagination: {
                    'current_page': 1
                },
                resources: [],

            };
        },
        computed: {
            searchQuery: function () {

                let result = window.location.hostname + "/resources/"+this.section+"?lang=" + this.locale;

                if (this.searchInput) {
                    result += "&q=" + this.searchInput;
                }
                for (let i = 0; i < this.selectedLevels.length; i++) {
                    result += "&levels[]=" + this.selectedLevels[i].id;
                }

                for (let i = 0; i < this.selectedTypes.length; i++) {
                    result += "&types[]=" + this.selectedTypes[i].id;
                }

                for (let i = 0; i < this.selectedProgrammingLanguages.length; i++) {
                    result += "&proglang[]=" + this.selectedProgrammingLanguages[i].id;
                }

                for (let i = 0; i < this.selectedCategories.length; i++) {
                    result += "&categories[]=" + this.selectedCategories[i].id;
                }

                for (let i = 0; i < this.selectedLanguages.length; i++) {
                    result += "&languages[]=" + this.selectedLanguages[i].id;
                }

                for (let i = 0; i < this.selectedSubjects.length; i++) {
                    result += "&subjects[]=" + this.selectedSubjects[i].id;
                }

                return result;
            }
        },
        methods: {
            onCopy: function (e) {
                flash('Link has been copied to the clipboard!');
            },
            onError: function (e) {
                alert('Failed to copy texts')
            },
            toggleFilters() {
                this.showFilters = !this.showFilters;
            },
            scrollToTop() {
                window.scrollTo(0, 0);
            },
            debounceSearch:
                _.debounce(
                    function () {
                        this.onSubmit();
                    }, 300)
            ,
            paginate: function () {
                this.scrollToTop();
                this.onSubmit(true);
            },

            onSubmit: function (isPagination) {
                if (!isPagination) {
                    this.pagination.current_page = 1;
                }
                axios.post('/resources/search?page=' + this.pagination.current_page, this.$data)
                    .then(response => {
                        //console.log(response.data.data);

                        this.pagination.per_page = response.data.per_page;
                        this.pagination.current_page = response.data.current_page;
                        this.pagination.from = response.data.from;
                        this.pagination.last_page = response.data.last_page;
                        this.pagination.last_page_url = response.data.last_page_url;
                        this.pagination.next_page_url = response.data.next_page_url;
                        this.pagination.prev_page = response.data.prev_page;
                        this.pagination.prev_page_url = response.data.prev_page;
                        this.pagination.to = response.data.to;
                        this.pagination.total = response.data.total;

                        this.resources = response.data.data;
                    })
                    .catch(error => this.errors = error.response.data)
            }
        },
        mounted: function () {
            console.log(this.searchQuery);
                if (this.searchQuery !== window.location.hostname + "/resources/"+this.section+"?1=1"){
                    this.showFilters = true;
                }
            this.onSubmit();
        }
    };
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
    .landing-wrapper {
        position: relative;
        height: 450px;
    }

    #loadmask {
        position: absolute;
        height: 450px;
        width: 100%;
        top: 110px;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .loading {
        background-color: white;
        padding: 15px;
        border-radius: 10px;
    }

    .events-map-wrapper {
        position: absolute;
        width: 100%;
        height: 450px;
    }

    .card {
        border-width: 1px;
        border-radius: 8px;
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.15);
    }

    .card:hover {
        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.30);
    }

    .input-text {
        min-height: 40px;
        border-radius: 5px;
        border: 1px solid #e8e8e8;
        font-size: 14px;
        font-family: 'Lato'
    }

    .button-search {
        border-radius: 5px;
        width: 120px;
        height: 40px;
    }

    .button-plus {
        border-radius: 5px;
        width: 40px;
        height: 40px;
    }

    .events-container {
        margin-top: 20px;
    }

    .events-page {
        margin-left: 20px;
        font-weight: bold;
        flex: 1;
        justify-content: flex-end;
        display: flex;
        display: -webkit-box;
    }

    .searchbox-container {
        position: relative;
        margin-top: -80px;
        background-color: rgba(68, 68, 68, 0.8);
        border-radius: 8px;
    }

    .card-group {
        grid-template-columns: 1fr 1fr 1fr;
    }

    .pagination {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
