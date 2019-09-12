<template>

    <div class="codeweek-card">

            <img :src="thumbnail" class="card-image">

            <div class="card-content">

                    <div class="card-title">{{resource.name}}</div>
                    <div class="card-description">{{resource.description}}</div>

                    <div class="card-divider"></div>

                    <div class="card-subtitle">{{$t('resources.types')}}:</div>
                    <div class="card-chips">
                        <template v-for="type in resource.types">
                            <resource-pill :property="type" type="types"></resource-pill>
                        </template>
                    </div>

                    <div v-show="isOpen">
                        <div class="card-subtitle">{{$t('resources.levels')}}:</div>
                        <div class="card-chips">
                            <template v-for="level in resource.levels">
                                <resource-pill :property="level" type="levels"></resource-pill>
                            </template>
                        </div>

                        <div class="card-subtitle">{{$t('resources.programming_languages')}}:</div>
                        <div class="card-chips">
                            <template v-for="programmingLanguage in resource.programming_languages">
                                <resource-pill :property="programmingLanguage"></resource-pill>
                            </template>
                        </div>

                        <div class="card-subtitle">{{$t('resources.categories')}}:</div>
                        <div class="card-chips">
                            <template v-for="category in resource.categories">
                                <resource-pill :property="category" type="categories"></resource-pill>
                            </template>
                        </div>

                        <div class="card-subtitle">{{$t('resources.Languages')}}:</div>
                        <div class="card-chips">
                            <template v-for="language in resource.languages">
                                <resource-pill :property="language"></resource-pill>
                            </template>
                        </div>
                    </div>
            </div>

            <div class="card-expander collapsed" @click="toggle()"
                 v-bind:class="[isOpen ? 'expanded' : 'collapsed']">
            </div>

            <div class="card-actions">
                <a :href="resource.source" target="_blank"
                    class="codeweek-action-link-button">{{$t('myevents.view')}}</a>
            </div>

    </div>


</template>

<script>


    import ResourcePill from "./ResourcePill";

    var RESOURCES_URL = process.env.MIX_RESOURCES_URL;

    export default {
        components: {ResourcePill},
        props: {
            resource: Object
        },
        data() {
            return {
                isOpen: false
            };
        },
        methods: {
            toggle(){
                this.isOpen = !this.isOpen;
            }
        },
        computed: {

            thumbnail: function () {

                if (this.resource.thumbnail && this.resource.thumbnail.toLowerCase().startsWith('http')) {
                    return this.resource.thumbnail
                } else {
                    return RESOURCES_URL + this.resource.thumbnail;
                }
            }
        },
        mounted: function () {
        }

    };
</script>
