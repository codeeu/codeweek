<template>

    <form method="/resources/search" @submit.prevent="onSubmit">


    <div class="mb-0 flex">

        <div>
            <multiselect v-model="selectedLevels" :options="levels" :multiple="true" :close-on-select="false"
                         :clear-on-select="false" :preserve-search="true" placeholder="Levels" label="name"
                         track-by="name" :preselect-first="false">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single"
                                                                                         v-if="values.length &amp;&amp; !isOpen">{{ values.length }} levels selected</span>
                </template>
            </multiselect>

            <multiselect v-model="selectedLanguages" :options="languages" :multiple="true" :close-on-select="false"
                         :clear-on-select="false" :preserve-search="true" placeholder="Languages" label="name"
                         track-by="name" :preselect-first="false">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single"
                                                                                         v-if="values.length &amp;&amp; !isOpen">{{ values.length }} languages selected</span>
                </template>
            </multiselect>

            <multiselect v-model="selectedProgrammingLanguages" :options="programmingLanguages" :multiple="true" :close-on-select="false"
                         :clear-on-select="false" :preserve-search="true" placeholder="Programming Languages" label="name"
                         track-by="name" :preselect-first="false">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single"
                                                                                         v-if="values.length &amp;&amp; !isOpen">{{ values.length }} programming languages selected</span>
                </template>
            </multiselect>

            <multiselect v-model="selectedCategories" :options="categories" :multiple="true" :close-on-select="false"
                         :clear-on-select="false" :preserve-search="true" placeholder="Categories" label="name"
                         track-by="name" :preselect-first="false">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single"
                                                                                         v-if="values.length &amp;&amp; !isOpen">{{ values.length }} categories selected</span>
                </template>
            </multiselect>

            <multiselect v-model="selectedSubjects" :options="subjects" :multiple="true" :close-on-select="false"
                         :clear-on-select="false" :preserve-search="true" placeholder="Subjects" label="name"
                         track-by="name" :preselect-first="false">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single"
                                                                                         v-if="values.length &amp;&amp; !isOpen">{{ values.length }} subjects selected</span>
                </template>
            </multiselect>

            <multiselect v-model="selectedTypes" :options="types" :multiple="true" :close-on-select="false"
                         :clear-on-select="false" :preserve-search="true" placeholder="Types" label="name"
                         track-by="name" :preselect-first="false">
                <template slot="selection" slot-scope="{ values, search, isOpen }"><span class="multiselect__single"
                                                                                         v-if="values.length &amp;&amp; !isOpen">{{ values.length }} types selected</span>
                </template>
            </multiselect>



        </div>
        <div>
            <ul id="example-1">
                <li v-for="item in selectedLevels">
                    {{ item.name }}
                </li>
            </ul>

            <ul id="example-2">
                <li v-for="item in selectedLanguages">
                    {{ item.name }}
                </li>
            </ul>

            <ul id="example-3">
                <li v-for="item in selectedProgrammingLanguages">
                    {{ item.name }}
                </li>
            </ul>

            <ul id="example-4">
                <li v-for="item in selectedCategories">
                    {{ item.name }}
                </li>
            </ul>

            <ul id="example-5">
                <li v-for="item in selectedSubjects">
                    {{ item.name }}
                </li>
            </ul>

            <ul id="example-6">
                <li v-for="item in selectedTypes">
                    {{ item.name }}
                </li>
            </ul>
        </div>

    </div>

        <input type="submit" class="btn btn-small btn-primary" value="Go">
    </form>

</template>

<script>
    import Multiselect from 'vue-multiselect'

    window.multiselect = this;

    export default {
        components: {Multiselect},
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
                selectedLevels: [],
                selectedLanguages: [],
                selectedProgrammingLanguages: [],
                selectedCategories: [],
                selectedSubjects: [],
                selectedTypes: [],
                isOpen: false,
                errors: {}
            };
        },
        methods:{
            onSubmit: function(){
                axios.post('/resources/search', this.$data)
                    .then( response => alert("success"))
                    .catch( error => this.errors = error.response.data)
            }
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