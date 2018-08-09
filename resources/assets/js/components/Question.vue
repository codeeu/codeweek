<template>
    <div class="mb-8 flex">
        <div class="mr-4">
            <button class="border border-solid border-grey-dark rounded-full w-6 h-6 flex items-center justify-center text-xs text-grey-dark font-bold leading-none cursor-pointer"
                    @click="isOpen = ! isOpen"
            >
                <svg v-if="isOpen" xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16" class="fill-current">
                    <path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"/>
                </svg>

                <svg v-else xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16" class="fill-current">
                    <path d="M12 9H7v5H5V9H0V7h5V2h2v5h5z"/>
                </svg>
            </button>
        </div>

        <div class="leading-loose">
            <h3 v-text="question.question"
                class="font-bold text-2xl mb-3 text-black leading-none cursor-pointer"
                @click="isOpen = ! isOpen"
            ></h3>

            <div v-html="question.answer" v-show="isOpen"></div>
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
        }
    };
</script>