<template>

        <nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">
        <ul class="flex list-reset border border-grey-light rounded w-auto font-sans">

                <li><a class="block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2 cursor-pointer" @click.prevent="changePage(pagination.current_page - 1)" :disabled="pagination.current_page <= 1">Previous</a></li>
                <li v-for="page in pages">
                        <a v-if="pagination.current_page != page" class="block hover:text-white cursor-pointer hover:bg-blue text-blue border-r border-grey-light px-3 py-2" @click.prevent="changePage(page)">{{ page }}</a>
                        <a v-else class="block text-white bg-blue-light border-r border-blue-light px-3 py-2 cursor-not-allowed">{{ page }}</a>

                </li>
                <li><a class="block hover:text-white hover:bg-blue text-blue px-3 py-2 cursor-pointer" @click.prevent="changePage(pagination.current_page + 1)" :disabled="pagination.current_page >= pagination.last_page">Next</a></li>

        </ul>
        </nav>


</template>

<style>
        .pagination {
                margin-top: 40px;
        }
</style>

<script>
    export default {
        props: ['pagination', 'offset'],

        methods: {
            isCurrentPage(page) {
                return this.pagination.current_page === page;
            },

            changePage(page) {
                if (page > this.pagination.last_page) {
                    page = this.pagination.last_page;
                }

                this.pagination.current_page = page;
                this.$emit('paginate');
            }
        },

        computed: {
            pages() {
                let pages = [];

                let from = this.pagination.current_page - Math.floor(this.offset / 2);

                if (from < 1) {
                    from = 1;
                }

                let to = from + this.offset - 1;

                if (to > this.pagination.last_page) {
                    to = this.pagination.last_page;
                }

                while (from <= to) {
                    pages.push(from);
                    from++;
                }

                return pages;
            }
        }
    }
</script>