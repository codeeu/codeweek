<template>

    <div class="min-w-full mr-4 mt-4 flex">

        <div class="flex flex-col border-grey-lighter border-2">
            <img class="h-48 min-h-48 lg:h-48 lg:w-48 rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                 :src="thumbnail">

            <a :href="resource.source" class="mt-2 text-center inline-block border text-base m-1 border-orange bg-orange-light rounded hover:border-orange-dark text-grey-lighter hover:bg-orange-dark hover:text-orange-lighter py-0 px-1">Visit</a>
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
        computed: {
            thumbnail: function () {
                return this.resource.thumbnail
            }
        },
        mounted: function () {
            console.log("card mounted")
        }

    };
</script>



