<template>
  <div class="codeweek-resourceform-component">
    <div class="codeweek-searchbox">
      <div class="basic-fields">
        <div class="codeweek-search-text">
          <input
              type="text"
              v-model="searchInput"
              @search-change="debounceSearch"
              @keyup.enter="onSubmit"
              :placeholder="t('resources.search_resources')"
          />
        </div>
        <div class="codeweek-more-button" @click="toggleFilters">
          <span>{{ showFilters ? '-' : '+' }}</span>
        </div>
      </div>

      <div class="advanced-fields" v-show="showFilters">
        <div class="line">
          <multiselect
              v-model="selectedTypes"
              :options="types"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="t('resources.types')"
              label="resources.resources.types"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @search-change="onSubmit"
          >
            <pre class="language-json"><code>{{ selectedTypes }}</code></pre>
          </multiselect>

          <multiselect
              v-model="selectedLevels"
              :options="levels"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="t('resources.levels')"
              label="resources.resources.levels"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
          >
            <pre class="language-json"><code>{{ selectedLevels }}</code></pre>
          </multiselect>

          <multiselect
              v-model="selectedProgrammingLanguages"
              :options="programmingLanguages"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="t('resources.programming_languages')"
              label="name"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
          >
            <pre class="language-json"><code>{{ selectedProgrammingLanguages }}</code></pre>
          </multiselect>

          <multiselect
              v-show="section === 'teach'"
              v-model="selectedSubjects"
              :options="subjects"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="t('resources.Subjects')"
              label="resources.resources.subjects"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"

          >
            <pre class="language-json"><code>{{ selectedSubjects }}</code></pre>
          </multiselect>
        </div>

        <div class="line">
          <multiselect
              v-model="selectedCategories"
              :options="categories"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="t('resources.categories')"
              label="resources.resources.categories"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"

          >
            <pre class="language-json"><code>{{ selectedCategories }}</code></pre>
          </multiselect>

          <multiselect
              v-model="selectedLanguages"
              :options="languages"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="t('resources.Languages')"
              label="name"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"

          >
            <pre class="language-json"><code>{{ selectedLanguages }}</code></pre>
          </multiselect>
        </div>
      </div>
    </div>

    <div class="codeweek-content-wrapper">
      <div class="tools">

          <button
              class="codeweek-blank-button"
              @click="copy">
          {{ t('resources.share') }}
        </button>
      </div>

      <div class="codeweek-grid-layout">
        <template v-for="resource in resources" :key="resource.id">
          <resource-card :resource="resource"></resource-card>
        </template>
      </div>

      <pagination
          v-if="pagination.last_page > 1"
          :pagination="pagination"
          :offset="5"
          @paginate="paginate"
      ></pagination>
    </div>
  </div>
</template>

<script>
import { ref, reactive, computed, onMounted } from 'vue';
import { useI18n } from 'vue-i18n';
import Multiselect from 'vue-multiselect';
import _ from 'lodash';
import ResourceCard from './ResourceCard.vue';
import Pagination from './Pagination.vue';
import useClipboard from 'vue-clipboard3'
import axios from 'axios';

export default {
  components: { ResourceCard, Multiselect, Pagination },
  props: {
    prpQuery: String,
    prpLevels: Array,
    prpTypes: Array,
    prpProgrammingLanguages: Array,
    prpCategories: Array,
    prpLanguages: Array,
    prpSubjects: Array,
    name: String,
    levels: Array,
    languages: Array,
    programmingLanguages: Array,
    categories: Array,
    subjects: Array,
    types: Array,
    section: String,
    locale: String,
  },
  setup(props) {
    const {t} = useI18n();
    const { toClipboard } = useClipboard()

    const query = ref(props.prpQuery);
    const searchInput = ref(props.prpQuery);
    const selectedLevels = ref(props.prpLevels);
    const selectedTypes = ref(props.prpTypes);
    const selectedProgrammingLanguages = ref(props.prpProgrammingLanguages);
    const selectedCategories = ref(props.prpCategories);
    const selectedLanguages = ref(props.prpLanguages);
    const selectedSubjects = ref(props.prpSubjects);
    const showFilters = ref(false);
    const errors = ref({});
    const pagination = reactive({
      current_page: 1,
    });
    const resources = ref([]);



    const searchQuery = computed(() => {
      let result = window.location.hostname + '/resources/' + props.section + '?lang=' + props.locale;

      if (searchInput.value) {
        result += '&q=' + searchInput.value;
      }
      selectedLevels.value.forEach((level) => {
        result += '&levels[]=' + level.id;
      });
      selectedTypes.value.forEach((type) => {
        result += '&types[]=' + type.id;
      });
      selectedProgrammingLanguages.value.forEach((language) => {
        result += '&proglang[]=' + language.id;
      });
      selectedCategories.value.forEach((category) => {
        result += '&categories[]=' + category.id;
      });
      selectedLanguages.value.forEach((language) => {
        result += '&languages[]=' + language.id;
      });
      selectedSubjects.value.forEach((subject) => {
        result += '&subjects[]=' + subject.id;
      });

      return result;
    });

    const copy = async () => {
      try {
        await toClipboard(searchQuery.value)
        alert('Link has been copied to the clipboard!');
      } catch (e) {
        alert('Failed to copy texts');
      }
    }

    const toggleFilters = () => {
      showFilters.value = !showFilters.value;
    };

    const scrollToTop = () => {
      window.scrollTo(0, 0);
    };

    const debounceSearch = _.debounce(() => {
      onSubmit();
    }, 300);

    const paginate = () => {
      scrollToTop();
      onSubmit(true);
    };

    const onSubmit = (isPagination = false) => {
      if (!isPagination) {
        pagination.current_page = 1;
      }
      resources.value = [];
      axios
          .post('/resources/search?page=' + pagination.current_page, {
            query: query.value,
            searchInput: searchInput.value,
            selectedLevels: selectedLevels.value,
            selectedTypes: selectedTypes.value,
            selectedProgrammingLanguages: selectedProgrammingLanguages.value,
            selectedCategories: selectedCategories.value,
            selectedLanguages: selectedLanguages.value,
            selectedSubjects: selectedSubjects.value,
          })
          .then((response) => {
            pagination.per_page = response.data.per_page;
            pagination.current_page = response.data.current_page;
            pagination.from = response.data.from;
            pagination.last_page = response.data.last_page;
            pagination.last_page_url = response.data.last_page_url;
            pagination.next_page_url = response.data.next_page_url;
            pagination.prev_page = response.data.prev_page;
            pagination.prev_page_url = response.data.prev_page;
            pagination.to = response.data.to;
            pagination.total = response.data.total;

            resources.value = response.data.data;
          })
          .catch((error) => {
            errors.value = error.response.data;
          });
    };

    const customLabel = (obj, label) => {
      return t(label + '.' + obj.name);
    };

    onMounted(() => {
      onSubmit();
    });

    return {
      query,
      searchInput,
      selectedLevels,
      selectedTypes,
      selectedProgrammingLanguages,
      selectedCategories,
      selectedLanguages,
      selectedSubjects,
      showFilters,
      errors,
      pagination,
      resources,
      searchQuery,
      t,
      toggleFilters,
      debounceSearch,
      paginate,
      onSubmit,
      customLabel,
      copy
    };
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
