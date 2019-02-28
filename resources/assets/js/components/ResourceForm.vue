<template>

    <div>


        <div class="container mx-auto h-full flex-row bg-blue-light p-4">
            <div class="flex justify-between w-full">
                <input type="text" class="multiselect w-full pl-8 pr-8 " @input="debounceSearch"
                       v-model="searchInput" placeholder="Search a resource ...">
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





                <multiselect v-model="selectedProgrammingLanguages" :options="programmingLanguages"
                             :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true"
                             placeholder="Programming Languages"
                             label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="mb-4">
                    <pre class="language-json"><code>{{ selectedProgrammingLanguages  }}</code></pre>
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

                <!--<multiselect v-model="selectedSubjects" :options="subjects" :multiple="true"-->
                             <!--:close-on-select="false"-->
                             <!--:clear-on-select="false" :preserve-search="true" placeholder="Subjects"-->
                             <!--label="name"-->
                             <!--track-by="name" :preselect-first="false" @input="onSubmit()" class="mr-8 ml-8">-->
                    <!--<template slot="selection" slot-scope="{ values, search, isOpen }"><span-->
                            <!--class="multiselect__single"-->
                            <!--v-if="values.length &amp;&amp; !isOpen">{{ values.length }} subjects selected</span>-->
                    <!--</template>-->
                <!--</multiselect>-->



            </div>
            <span @click="toggleFilters()" class="cursor-pointer text-white text-sm">{{button.text}}</span>
        </div>


        <div class="grid">
            <div class="flex mb-4" v-for="resource in resources">
                <resource-card :resource="resource"></resource-card>
            </div>
        </div>

        <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5"
                    @paginate="paginate()"></pagination>


    </div>

</template>

<script>
    import Multiselect from 'vue-multiselect'
    import _ from 'lodash'
    import ResourceCard from "./ResourceCard";
    import Pagination from "./Pagination";

    window.multiselect = this;

    export default {
        components: {ResourceCard, Multiselect, Pagination},
        props: {
            name: String,
            levels: Array,
            languages: Array,
            programmingLanguages: Array,
            categories: Array,
            subjects: Array,
            types: Array,
            section: String
        },
        data() {
            return {
                selectedSection:this.section,
                searchInput: "",
                selectedLevels: [],
                selectedLanguages: [],
                selectedProgrammingLanguages: [],
                selectedCategories: [],
                selectedSubjects: [],
                selectedTypes: [],
                isOpen: false,
                showFilters: false,
                errors: {},
                pagination: {
                    'current_page': 1
                },
                resources: [],
                button: {
                    text: 'Show Filters >>>'
                },
            };
        },
        methods: {
            toggleFilters(){
                this.showFilters = !this.showFilters;
                if (!this.showFilters) {
                    this.button.text = "Show Filters >>>"
                } else {

                    this.button.text = "Hide Filters <<<"
                }
            },
            scrollToTop() {
                window.scrollTo(0,0);
            },
            debounceSearch:
                _.debounce(
                    function () {
                        this.onSubmit();
                    }, 300)
            ,
            paginate: function(){
                this.scrollToTop();
                this.onSubmit(true);
            },

            onSubmit: function(isPagination) {
                if (!isPagination){
                    this.pagination.current_page = 1;
                }
                axios.post('/resources/search?page=' + this.pagination.current_page, this.$data)
                    .then(response => {
                        console.log(response.data.data);

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
            this.onSubmit();
        }
    };
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

