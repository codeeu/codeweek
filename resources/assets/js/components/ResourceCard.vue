<template>

    <div class="min-w-full flex flex-col">

        <div class="flex flex-col justify-between">
            <img class="w-48 block rounded-b"
                 :src="thumbnail">

            <a :href="resource.source" target="_blank"
               class="mt-2 text-center inline-block border text-base m-1 border-orange bg-orange-light rounded hover:border-orange-dark text-grey-lighter hover:bg-orange-dark hover:text-orange-lighter py-0 px-1">Visit</a>
        </div>

        <div class="w-full bg-white p-4 flex flex-col justify-between leading-normal">
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
                //console.log(this.resource.thumbnail);
                if (this.resource.thumbnail && this.resource.thumbnail.toLowerCase().startsWith('http')) {
                    return this.resource.thumbnail
                }

                return 'https://codeweek-s3.s3.amazonaws.com/event_picture/logo_gs_2016_07703ca0-7e5e-4cab-affb-4de93e3f2497.png';
            }
        },
        mounted: function () {
            //console.log("card mounted")
        }

    };
</script>



<style scoped>
    .card{
        border-width: 1px;
        border-radius: 8px;
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.15);
    }
    .card:hover{
        box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.30);
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

</style>
