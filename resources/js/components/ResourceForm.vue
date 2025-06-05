<template>
  <div class="codeweek-resourceform-component font-['Blinker']">
    <div class="codeweek-container py-6">
      <div
        class="max-md:fixed left-0 top-[125px] z-[100] flex-col items-center w-full max-md:p-6 max-md:h-[calc(100dvh-125px)] max-md:overflow-auto max-md:bg-white duration-300"
        :class="[showFilterModal ? 'flex' : 'max-md:hidden']"
      >
        <div class="flex md:hidden flex-shrink-0 justify-end w-full mb-6">
          <button
            id="search-menu-trigger-hide"
            class="block bg-[#FFD700] hover:bg-[#F95C22] rounded-full p-4 duration-300"
            @click="showFilterModal = false"
          >
            <img class="w-6 h-6" src="/images/close_menu_icon.svg" />
          </button>
        </div>
        <div
          class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-12"
        >
          <div>
            <label class="block text-[16px] text-slate-500 mb-2">
              {{ $t('resources.search_by_title_description') }}
            </label>
            <input
              class="px-6 py-3 w-full text-[16px] rounded-full border-solid border-2 border-[#A4B8D9] text-[#333E48] font-semibold placeholder:font-normal"
              type="text"
              v-model="searchInput"
              @search-change="debounceSearch"
              @keyup.enter="onSubmit"
              :placeholder="$t('resources.search_resources')"
            />
          </div>

          <div>
            <label class="block text-[16px] text-slate-500 mb-2">
              {{ $t('resources.resource_type') }}
            </label>
            <multiselect
              v-model="selectedTypes"
              class="multi-select"
              :options="types"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="$t('resources.resource_type_placeholder')"
              label="resources.resources.types"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <template #selection="{ values }">
                <div
                  v-if="values.length > 0"
                  class="multiselect--values font-semibold text-[16px] truncate"
                >
                  Selected {{ values.length }}
                  {{ values.length > 1 ? 'types' : 'type' }}
                </div>
              </template>
              <pre class="language-json"><code>{{ selectedTypes }}</code></pre>
            </multiselect>
          </div>

          <div>
            <label class="block text-[16px] text-slate-500 mb-2">
              {{ $t('resources.target_audience') }}
            </label>
            <multiselect
              v-model="selectedTargetAudiences"
              class="multi-select"
              :options="targetAudiences"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="$t('resources.target_audience_placeholder')"
              label="resources.resources.levels"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <pre class="language-json"><code>{{ selectedTargetAudiences }}</code></pre>
              <template #selection="{ values }">
                <div
                  v-if="values.length > 0"
                  class="multiselect--values font-semibold text-[16px] truncate"
                >
                  Selected {{ values.length }}
                  {{ values.length > 1 ? 'targets' : 'target' }}
                </div>
              </template>
            </multiselect>
          </div>

          <div>
            <label class="block text-[16px] text-slate-500 mb-2">
              {{ $t('resources.level_difficulty') }}
            </label>
            <multiselect
              v-model="selectedLevelsDifficulty"
              class="multi-select"
              :options="levelsDifficulty"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="$t('resources.level_difficulty_placeholder')"
              label="resources.resources.levels"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <pre class="language-json"><code>{{ selectedLevelsDifficulty }}</code></pre>
              <template #selection="{ values }">
                <div
                  v-if="values.length > 0"
                  class="multiselect--values font-semibold text-[16px] truncate"
                >
                  Selected {{ values.length }}
                  {{ values.length > 1 ? 'levels' : 'level' }}
                </div>
              </template>
            </multiselect>
          </div>

          <div>
            <label class="block text-[16px] text-slate-500 mb-2">
              {{ $t('resources.Languages') }}
            </label>
            <multiselect
              v-model="selectedLanguages"
              class="multi-select"
              :options="languages"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="$t('resources.languages_placeholder')"
              label="resources.resources.languages"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <pre
                class="language-json"
              ><code>{{ selectedLanguages }}</code></pre>
              <template #selection="{ values }">
                <div
                  v-if="values.length > 0"
                  class="multiselect--values font-semibold text-[16px] truncate"
                >
                  Selected {{ values.length }}
                  {{ values.length > 1 ? 'languages' : 'language' }}
                </div>
              </template>
            </multiselect>
          </div>

          <div>
            <label class="block text-[16px] text-slate-500 mb-2">
              {{ $t('resources.programming_languages') }}
            </label>
            <multiselect
              v-model="selectedProgrammingLanguages"
              class="multi-select"
              :options="programmingLanguages"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="$t('resources.programming_languages_placeholder')"
              label="resources.resources.programming_languages"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <pre
                class="language-json"
              ><code>{{ selectedProgrammingLanguages }}</code></pre>
              <template #selection="{ values }">
                <div
                  v-if="values.length > 0"
                  class="multiselect--values font-semibold text-[16px] truncate"
                >
                  Selected {{ values.length }}
                  {{
                    values.length > 1
                      ? 'programming languages'
                      : 'programming language'
                  }}
                </div>
              </template>
            </multiselect>
          </div>

          <div>
            <label class="block text-[16px] text-slate-500 mb-2">
              {{ $t('resources.Subjects') }}
            </label>
            <multiselect
              v-model="selectedSubjects"
              class="multi-select"
              :options="subjects"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="$t('resources.subjects_placeholder')"
              label="resources.resources.subjects"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <pre
                class="language-json"
              ><code>{{ selectedSubjects }}</code></pre>
              <template #selection="{ values }">
                <div
                  v-if="values.length > 0"
                  class="multiselect--values font-semibold text-[16px] truncate"
                >
                  Selected {{ values.length }}
                  {{ values.length > 1 ? 'subjects' : 'subject' }}
                </div>
              </template>
            </multiselect>
          </div>

          <div>
            <label class="block text-[16px] text-slate-500 mb-2">
              {{ $t('resources.categories') }}
            </label>
            <multiselect
              v-model="selectedCategories"
              class="multi-select"
              :options="categories"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :placeholder="$t('resources.categories_placeholder')"
              label="resources.resources.categories"
              :custom-label="customLabel"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <pre class="language-json">
                <code>{{ selectedCategories }}</code>
              </pre>
              <template #selection="{ values }">
                <div
                  v-if="values.length > 0"
                  class="multiselect--values font-semibold text-[16px] truncate"
                >
                  Selected {{ values.length }}
                  {{ values.length > 1 ? 'categories' : 'category' }}
                </div>
              </template>
            </multiselect>
          </div>

          <div class="sm:col-span-2 md:col-span-1 lg:col-span-full lg:grid grid-cols-12 mt-3">
            <div class="hidden lg:block lg:col-span-4" />
            <div class="w-full flex items-end justify-center lg:col-span-4 h-full">
              <button
                class="w-full bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300"
                @click="
                  () => {
                    showFilterModal = false;
                    onSubmit();
                  }
                "
              >
                <span
                  class="text-base leading-7 font-semibold text-black normal-case"
                >
                  {{ $t('resources.search') }}
                </span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <button
        class="block md:hidden w-full bg-[#F95C22] rounded-full py-2.5 px-6 font-['Blinker'] hover:bg-hover-orange duration-300 mb-8"
        @click="showFilterModal = true"
      >
        <span
          class="flex gap-2 justify-center items-center text-base leading-7 font-semibold text-black normal-case"
        >
          Filter and search
          <img class="w-5 h-5" src="/images/filter.svg" />
        </span>
      </button>

      <div v-if="tags.length" class="flex md:justify-center">
        <div class="max-md:w-full flex flex-wrap gap-2">
          <template v-for="tag in tags" :key="tag.id">
            <div
              class="bg-light-blue-100 pl-4 pr-3 py-1 rounded-full text-slate-500 text-[16px] font-semibold"
            >
              <div class="flex items-center gap-2">
                <span>{{ tag.name }}</span>
                <button @click="removeSelectedItem(tag)">
                  <img class="w-4 h-4" src="/images/close-icon.svg" />
                </button>
              </div>
            </div>
          </template>

          <div class="max-md:w-full max-md:mt-4 flex justify-center px-4">
            <button
              class="text-dark-blue underline font-semibold text-[16px]"
              @click="removeAllSelectedItems"
            >
              Clear all filters
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="relative pt-20 md:pt-48">
      <div
        class="absolute w-full h-[800px] bg-yellow-50 md:hidden top-0"
        style="clip-path: ellipse(270% 90% at 38% 90%)"
      ></div>
      <div
        class="absolute w-full h-[800px] bg-yellow-50 hidden md:block top-0"
        style="clip-path: ellipse(88% 90% at 50% 90%)"
      ></div>

      <div class="bg-yellow-50">
        <div class="relative z-10 codeweek-container">
          <div
            class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-10"
          >
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
    </div>
  </div>
</template>

<script>
import { ref, reactive, computed, onMounted } from 'vue';
import Multiselect from 'vue-multiselect';
import _ from 'lodash';
import ResourceCard from './ResourceCard.vue';
import Pagination from './Pagination.vue';
import useClipboard from 'vue-clipboard3';
import axios from 'axios';
import { trans } from 'laravel-vue-i18n';

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
    locale: String,
  },
  setup(props) {
    const { toClipboard } = useClipboard();

    const showFilterModal = ref(false);
    const query = ref(props.prpQuery);
    const searchInput = ref(props.prpQuery);
    const selectedTargetAudiences = ref(props.prpLevels.filter((item) => item.teach === 1));
    const selectedLevelsDifficulty = ref(props.prpLevels.filter((item) => item.learn === 1));
    const selectedTypes = ref(props.prpTypes);
    const selectedProgrammingLanguages = ref(props.prpProgrammingLanguages);
    const selectedCategories = ref(props.prpCategories);
    const selectedLanguages = ref(props.prpLanguages);
    const selectedSubjects = ref(props.prpSubjects);
    const errors = ref({});
    const pagination = reactive({
      current_page: 1,
    });
    const resources = ref([]);

    const targetAudiences = computed(() => {
      return props.levels.filter((item) => item.teach === 1);
    });

    const levelsDifficulty = computed(() => {
      return props.levels.filter((item) => item.learn === 1);
    });

    const tags = computed(() => {
      return [
        ...selectedTypes.value,
        ...selectedTargetAudiences.value,
        ...selectedLevelsDifficulty.value,
        ...selectedLanguages.value,
        ...selectedProgrammingLanguages.value,
        ...selectedSubjects.value,
        ...selectedCategories.value,
      ];
    });

    const removeSelectedItem = (tag) => {
      const filterFn = (item) => item.id !== tag.id;
      selectedTypes.value = selectedTypes.value.filter(filterFn);
      selectedTargetAudiences.value = selectedTargetAudiences.value.filter(filterFn);
      selectedLevelsDifficulty.value = selectedLevelsDifficulty.value.filter(filterFn);
      selectedLanguages.value = selectedLanguages.value.filter(filterFn);
      selectedProgrammingLanguages.value =
        selectedProgrammingLanguages.value.filter(filterFn);
      selectedSubjects.value = selectedSubjects.value.filter(filterFn);
      selectedCategories.value = selectedCategories.value.filter(filterFn);
      onSubmit();
    };

    const removeAllSelectedItems = () => {
      selectedTypes.value = [];
      selectedTargetAudiences.value = [];
      selectedLevelsDifficulty.value = [];
      selectedLanguages.value = [];
      selectedProgrammingLanguages.value = [];
      selectedSubjects.value = [];
      selectedCategories.value = [];
      onSubmit();
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
          selectedLevels: [...selectedTargetAudiences.value, ...selectedLevelsDifficulty.value],
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
      return trans(label + '.' + obj.name);
    };

    onMounted(() => {
      onSubmit();
    });

    return {
      query,
      searchInput,
      targetAudiences,
      levelsDifficulty,
      selectedTargetAudiences,
      selectedLevelsDifficulty,
      selectedTypes,
      selectedProgrammingLanguages,
      selectedCategories,
      selectedLanguages,
      selectedSubjects,
      errors,
      pagination,
      resources,
      debounceSearch,
      paginate,
      onSubmit,
      customLabel,
      showFilterModal,
      tags,
      removeSelectedItem,
      removeAllSelectedItems,
    };
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
