<template>

        <div class="codeweek-question-container">
            <div class="expander-always-visible">
                <div class="expansion">
                    <button @click="isOpen = ! isOpen" class="codeweek-expander-button"><div> {{isOpen ? '-' : '+'}}</div></button>
                </div>
                <div class="content">
                    <h1>{{question.title1}}</h1>
                </div>
            </div>
            <div class="container-expansible" v-bind:class="chevron">
                <div class="expansion">
                    <div class="expansion-path"></div>
                </div>
                <div class="content">
                    <h2>{{question.title2}}</h2>
                    <p v-for="content in question.content">
                        {{ content }}
                    </p>

                    <div v-if="question.map" class="maps">
                        <iframe class="map" src="/map" scrolling="no"></iframe>
                    </div>

                    <div v-if="question.button.show" class="button">
                        <a v-bind:href="question.button.link" class="codeweek-button">
                            <input type="submit" v-bind:value="question.button.label">
                        </a>
                    </div>

                </div>
            </div>
        </div>

</template>

<script>
    export default {
        props: ['question'],
        data() {
            return {
                isOpen: true
            };
        },
        computed:{
            chevron: function () {
                return {
                    'expanded': this.isOpen,
                    'collapsed': !this.isOpen
                }
            }
        }
    };
</script>