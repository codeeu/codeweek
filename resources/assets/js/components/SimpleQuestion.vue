<template>

    <div class="mb-0 flex">

            <div class="tab">

                <div class="question" @click="isOpen = ! isOpen">
                    <slot name="title"></slot><i class="fa fa-1x chevron" v-bind:class="chevron"></i>
                </div>
                <div class="answer" v-show="isOpen">
                    <p>
                        <slot name="content"></slot>
                    </p>
                </div>
            </div>

    </div>

</template>

<script>
    export default {
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