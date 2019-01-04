<template>

    <div>


        <div class="container mx-auto h-full flex-row bg-blue-light p-8">
            <div class="flex justify-between w-full">
                <input type="text" class="multiselect w-full pl-8 pr-8 mb-8" @input="debounceSearch"
                       v-model="searchInput">
            </div>

            <div class="flex justify-between">


                <multiselect v-model="selectedLevels" :options="levels" :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true" placeholder="Levels" label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="mb-8">
                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span
                            class="multiselect__single"
                            v-if="values.length &amp;&amp; !isOpen">{{ values.length }} levels selected</span>
                    </template>
                </multiselect>


                <multiselect v-model="selectedLanguages" :options="languages" :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true" placeholder="Languages"
                             label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="mr-8 ml-8 mb-8">
                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span
                            class="multiselect__single"
                            v-if="values.length &amp;&amp; !isOpen">{{ values.length }} languages selected</span>
                    </template>
                </multiselect>


                <multiselect v-model="selectedProgrammingLanguages" :options="programmingLanguages"
                             :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true"
                             placeholder="Programming Languages"
                             label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="mb-8">
                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span
                            class="multiselect__single"
                            v-if="values.length &amp;&amp; !isOpen">{{ values.length }} programming languages selected</span>
                    </template>
                </multiselect>
            </div>
            <div class="flex justify-between">


                <multiselect v-model="selectedCategories" :options="categories" :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true" placeholder="Categories"
                             label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="">
                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span
                            class="multiselect__single"
                            v-if="values.length &amp;&amp; !isOpen">{{ values.length }} categories selected</span>
                    </template>
                </multiselect>


                <multiselect v-model="selectedSubjects" :options="subjects" :multiple="true"
                             :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true" placeholder="Subjects"
                             label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="mr-8 ml-8">
                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span
                            class="multiselect__single"
                            v-if="values.length &amp;&amp; !isOpen">{{ values.length }} subjects selected</span>
                    </template>
                </multiselect>

                <multiselect v-model="selectedTypes" :options="types" :multiple="true" :close-on-select="false"
                             :clear-on-select="false" :preserve-search="true" placeholder="Types" label="name"
                             track-by="name" :preselect-first="false" @input="onSubmit()" class="">
                    <template slot="selection" slot-scope="{ values, search, isOpen }"><span
                            class="multiselect__single"
                            v-if="values.length &amp;&amp; !isOpen">{{ values.length }} types selected</span>
                    </template>
                </multiselect>

            </div>
        </div>


        <div class="grid">
            <div class="flex mb-4" v-for="resource in resources">
                <resource-card :resource="resource"></resource-card>
            </div>
        </div>


    </div>

</template>

<script>
    import Multiselect from 'vue-multiselect'
    import _ from 'lodash'
    import ResourceCard from "./ResourceCard";

    window.multiselect = this;

    export default {
        components: {ResourceCard, Multiselect},
        props: {
            name: String,
            levels: Array,
            languages: Array,
            programmingLanguages: Array,
            categories: Array,
            subjects: Array,
            types: Array,
        },
        data() {
            return {
                searchInput: "",
                selectedLevels: [],
                selectedLanguages: [],
                selectedProgrammingLanguages: [],
                selectedCategories: [],
                selectedSubjects: [],
                selectedTypes: [],
                isOpen: false,
                errors: {},
                resources: []
            };
        },
        methods: {
            debounceSearch:
                _.debounce(
                    function () {
                        this.onSubmit();
                    }, 300)
            ,
            onSubmit: function () {
                axios.post('/resources/search', this.$data)
                    .then(response => {
                        console.log(response.data.data);
                        this.resources = response.data.data;
                    })
                    .catch(error => this.errors = error.response.data)
            }
        },
        mounted: function () {
            this.onSubmit();
        },
        computed: {
            chevron: function () {
                return {
                    'fa-chevron-up': this.isOpen,
                    'fa-chevron-down': !this.isOpen
                }
            }
        }
    };
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style scoped>

</style>