<template>

    <div class="min-w-full mr-4 mt-4 flex">

        <div class="flex flex-col border-grey-lighter border-2 justify-between">
            <img class="w-48 block rounded-b"
                 :src="thumbnail">

            <a :href="resource.source"
               class="mt-2 text-center inline-block border text-base m-1 border-orange bg-orange-light rounded hover:border-orange-dark text-grey-lighter hover:bg-orange-dark hover:text-orange-lighter py-0 px-1">Visit</a>
        </div>

        <div class="w-full border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <div class="text-black font-bold text-xl mb-2">{{resource.name}}</div>
                <div class="text-grey-darker text-base"><span class="text-black font-bold">Description:</span>
                    {{resource.description}}
                </div>

                <div class="text-grey-darker text-base"><span class="text-black font-bold">Type:</span>
                    <span v-for="type in resource.types">
                    <resource-pill :property="type"></resource-pill>
                    </span>
                </div>

                <div v-show="isOpen">
                    <div class="text-grey-darker text-base"><span class="text-black font-bold">Level:</span>
                        <span v-for="level in resource.levels">
                        <resource-pill :property="level"></resource-pill>
                        </span>
                    </div>

                    <div class="text-grey-darker text-base"><span
                            class="text-black font-bold">Programming Languages:</span>
                        <span v-for="programmingLanguage in resource.programming_languages">
                        <resource-pill :property="programmingLanguage"></resource-pill>
                        </span>
                    </div>

                    <div class="text-grey-darker text-base"><span class="text-black font-bold">Categories:</span>
                        <span v-for="category in resource.categories">
                        <resource-pill :property="category"></resource-pill>
                        </span>
                    </div>

                    <div class="text-grey-darker text-base"><span class="text-black font-bold">Languages:</span>
                        <span v-for="language in resource.languages">
                        <resource-pill :property="language"></resource-pill>
                        </span>
                    </div>
                </div>

                <button @click="toggle()" type="button" class="mt-4 btn btn-sm btn-light">{{button.text}}
                </button>

            </div>

        </div>
    </div>


</template>

<script>


    import ResourcePill from "./ResourcePill";

    export default {
        components: {ResourcePill},
        props: {
            resource: Object
        },
        data() {
            return {
                button: {
                    text: 'Show Details'
                },
                isOpen: false
            };
        },
        methods: {
            toggle(){
                this.isOpen = !this.isOpen;
                if (!this.isOpen) {
                    this.button.text = "Show Details"
                } else {

                    this.button.text = "Hide Details"
                }
            }
        },
        computed: {

            thumbnail: function () {
                console.log(this.resource.thumbnail);
                if (this.resource.thumbnail.toLowerCase().startsWith('http')) {
                    return this.resource.thumbnail
                }

                return 'https://codeweek-s3.s3.amazonaws.com/event_picture/logo_gs_2016_07703ca0-7e5e-4cab-affb-4de93e3f2497.png';
            }
        },
        mounted: function () {
            console.log("card mounted")
        }

    };
</script>



