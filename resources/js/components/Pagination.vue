<template>
  <nav class="codeweek-pagination" role="navigation" aria-label="pagination">
    <ul>
      <li>
        <a
          class="back"
          @click.prevent="changePage(pagination.current_page - 1)"
          :disabled="pagination.current_page <= 1"
        >
          {{ $t('pagination.previous') }}
        </a>
      </li>
      <li v-for="page in pages">
        <a
          v-if="pagination.current_page != page"
          class="page"
          @click.prevent="changePage(page)"
        >
          {{ page }}
        </a>
        <a v-else class="page current">
          {{ page }}
        </a>
      </li>
      <li>
        <a
          class="next"
          @click.prevent="changePage(pagination.current_page + 1)"
          :disabled="pagination.current_page >= pagination.last_page"
        >
          {{ $t('pagination.next') }}
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
