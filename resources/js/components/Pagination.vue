<template>
  <nav role="navigation" aria-label="pagination">
    <ul class="flex flex-wrap items-center justify-center gap-2 py-12 m-0 font-['Blinker']">
      <li>
        <a
          class="block p-4 duration-300 rounded-full cursor-pointer bg-yellow hover:bg-primary"
          @click.prevent="changePage(pagination.current_page - 1)"
          :disabled="pagination.current_page <= 1"
        >
          <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M25.8335 16H7.16683" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.5 6.66663L7.16667 16L16.5 25.3333" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </li>
      <li v-for="page in pages" class="flex items-center gap-1 whitespace-nowrap">
        <a
          v-if="pagination.current_page != page"
          class="flex justify-center items-center w-12 h-12 text-xl hover:bg-[#1C4DA1]/10 rounded font-bold text-[#1C4DA1] underline duration-300"
          @click.prevent="changePage(page)"
        >
          {{ page }}
        </a>
        <a
          v-else
          class="flex justify-center items-center w-12 h-12 text-xl rounded font-normal text-[#333E48] duration-300"
        >
          {{ page }}
        </a>
      </li>
      <li>
        <a
          class="block p-4 duration-300 rounded-full cursor-pointer bg-yellow hover:bg-primary"
          @click.prevent="changePage(pagination.current_page + 1)"
          :disabled="pagination.current_page >= pagination.last_page"
        >
          <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.16699 16H25.8337" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16.5 6.66663L25.8333 16L16.5 25.3333" stroke="black" stroke-width="2.66667" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </a>
      </li>
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
      if (page < 1 || page > this.pagination.last_page) {
        return;
      }
      this.pagination.current_page = page;
      this.$emit('paginate', page); // Emit the event with the new page number
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
};
</script>
