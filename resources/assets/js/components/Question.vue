<template>


    <div class="mb-0 flex">


        <!--<div class="mr-4">-->
            <!--<button class="border border-solid border-grey-dark rounded-full w-6 h-6 flex items-center justify-center text-xs text-grey-dark font-bold leading-none cursor-pointer"-->
                    <!--@click="isOpen = ! isOpen"-->
            <!--&gt;-->
                <!--<svg v-if="isOpen" xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16"-->
                     <!--class="fill-current">-->
                    <!--<path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/>-->
                <!--</svg>-->

                <!--<svg v-else xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16"-->
                     <!--class="fill-current">-->
                    <!--<path d="M12 9H7v5H5V9H0V7h5V2h2v5h5z"/>-->
                <!--</svg>-->
            <!--</button>-->
        <!--</div>-->



            <div class="tab">

                <div class="question" @click="isOpen = ! isOpen">{{question.title1}}<i class="fa fa-1x chevron" v-bind:class="chevron"></i></div>
                <div class="answer" v-show="isOpen">
                    <div class="subtitle">{{question.title2}}</div>
                    <p v-for="content in question.content">
                        {{ content }}
                    </p>

                    <div v-if="question.map" class="flex justify-center text-center m-32">
                        <iframe class="w-4/5 map " src="/map"></iframe>
                    </div>

                    <div v-if="question.button.show" class="flex align-center justify-center">

                        <a v-bind:href="question.button.link" class="btn btn-primary btn-directional btn-lg submit-button-wrapper">
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
                isOpen: false
            };
        },
        computed:{
            chevron: function () {
                return {
                    'fa-chevron-up': this.isOpen,
                    'fa-chevron-down': !this.isOpen
                }
            }
        }
    };
</script>