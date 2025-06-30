<template>
  <div
    class="codeweek-matchmakingtool-component font-['Blinker'] bg-light-blue"
  >
    <div class="codeweek-container py-10">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-12">
          <div>
            <label class="block text-[16px] leading-5 text-slate-500 mb-2">
              Support type
            </label>
            <input
              class="px-6 py-3 w-full text-[16px] rounded-full border-solid border-2 border-[#A4B8D9] text-[#333E48] font-semibold placeholder:font-normal"
              type="text"
              v-model="searchInput"
              @search-change="debounceSearch"
              @keyup.enter="onSubmit"
              placeholder="Select type, e.g. volunteer"
            />
          </div>

          <div>
            <label class="block text-[16px] leading-5 text-slate-500 mb-2">
              Language
            </label>
            <multiselect
              v-model="selectedLanguages"
              class="multi-select"
              :options="languages"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              placeholder="Select language"
              label="resources.resources.languages"
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
              <pre class="language-json">
                <code>{{ selectedLanguages }}</code>
            </pre>
            </multiselect>
          </div>

          <div>
            <label class="block text-[16px] leading-5 text-slate-500 mb-2">
              Location
            </label>
            <multiselect
              v-model="selectedLocations"
              class="multi-select"
              :options="locations"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              placeholder="Select country/city"
              label="Location"
              :custom-label="(opt) => opt.name"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <pre class="language-json">
                <code>{{ selectedLocations }}</code>
              </pre>
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
            <label class="block text-[16px] leading-5 text-slate-500 mb-2">
              Type
            </label>
            <multiselect
              v-model="selectedTypes"
              class="multi-select"
              :options="types"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :custom-label="(opt) => opt.name"
              placeholder="Online/in-person"
              label="Type"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <pre class="language-json"><code>{{ selectedTypes }}</code></pre>
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
            <label
              class="flex items-center text-[16px] leading-5 text-slate-500 mb-2"
            >
              <span>Topics</span>
              <div
                class="w-5 h-5 bg-dark-blue rounded-full flex justify-center items-center text-white ml-1.5 cursor-pointer text-xs"
              >
                i
              </div>
            </label>
            <multiselect
              v-model="selectedTopics"
              class="multi-select"
              :options="topics"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :custom-label="(opt) => opt.name"
              placeholder="Select topic, e.g. robotics"
              label="Topics"
              track-by="name"
              :preselect-first="false"
              @select="onSubmit"
              @remove="onSubmit"
            >
              <pre class="language-json"><code>{{ selectedTopics }}</code></pre>
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

          <div class="flex items-end">
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

      <div class="bg-yellow-50 pb-20">
        <div class="relative z-10 codeweek-container">
          <div
            class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 lg:gap-10"
          >
            <template v-for="tool in tools" :key="tool.id">
              <tool-card :tool="tool"></tool-card>
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
import ToolCard from './ToolCard.vue';
import Pagination from '../Pagination.vue';
import useClipboard from 'vue-clipboard3';
import axios from 'axios';
import { trans } from 'laravel-vue-i18n';
import { individuals, organisations } from './match-makingtool-data.js';

export default {
  components: { ToolCard, Multiselect, Pagination },
  props: {
    prpQuery: String,
    prpLanguages: Array,
    prpLocations: Array,
    prpTypes: Array,
    prpTopics: Array,
    name: String,
    supportedTypes: Array,
    languages: Array,
    locations: Array,
    types: Array,
    topics: Array,
    locale: String,
  },
  setup(props) {
    const { toClipboard } = useClipboard();
    console.log('props', { ...props });

    const showFilterModal = ref(false);
    const query = ref(props.prpQuery);
    const searchInput = ref(props.prpQuery);
    const selectedLanguages = ref(props.prpLanguages);
    const selectedLocations = ref(props.prpLocations);
    const selectedTypes = ref(props.prpTypes);
    const selectedTopics = ref(props.prpTopics);
    const errors = ref({});
    const pagination = reactive({
      current_page: 1,
    });
    const tools = ref([]);

    const tags = computed(() => {
      return [
        ...selectedLanguages.value,
        ...selectedLocations.value,
        ...selectedTypes.value,
        ...selectedTopics.value,
      ];
    });

    const searchQuery = computed(() => {
      let result =
        window.location.hostname +
        '/matchmaking-tool/' +
        props.section +
        '?lang=' +
        props.locale;

      if (searchInput.value) {
        result += '&q=' + searchInput.value;
      }
      selectedLanguages.value.forEach((language) => {
        result += '&languages[]=' + language.id;
      });
      selectedLocations.value.forEach((location) => {
        result += '&locations[]=' + location.id;
      });
      selectedTypes.value.forEach((type) => {
        result += '&types[]=' + type.id;
      });
      selectedTopics.value.forEach((topic) => {
        result += '&topics[]=' + topic.id;
      });

      return result;
    });

    const copy = async () => {
      try {
        await toClipboard(searchQuery.value);
        alert('Link has been copied to the clipboard!');
      } catch (e) {
        alert('Failed to copy texts');
      }
    };

    const removeSelectedItem = (tag) => {
      const filterFn = (item) => item.id !== tag.id;
      selectedLanguages.value = selectedLanguages.value.filter(filterFn);
      selectedLocations.value = selectedLocations.value.filter(filterFn);
      selectedTypes.value = selectedTypes.value.filter(filterFn);
      selectedTopics.value = selectedTopics.value.filter(filterFn);
      onSubmit();
    };

    const removeAllSelectedItems = () => {
      selectedLanguages.value = [];
      selectedLocations.value = [];
      selectedTypes.value = [];
      selectedTopics.value = [];
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

      const list = [];

      organisations.forEach((item) => {
        list.push({
          id: `organisation-${item.id}`,
          name: item.organisation_name,
          location: item.country,
          description: item.organisation_mission,
          types: [
            { title: 'Online & In-person', highlight: true },
            { title: 'Ongoing availability' },
          ],
          avatar_dark: item.avatar_dark,
          avatar: item.avatar,
        });
      });

      individuals.forEach((item) => {
        list.push({
          id: `individual-${item.id}`,
          name: `${item.first_name || ''} ${item.last_name}`.trim(),
          location: item.location,
          description: item.description,
          types: [
            { title: 'Online & In-person', highlight: true },
            { title: 'Ongoing availability' },
          ],
          avatar_dark: item.avatar_dark,
          avatar: item.avatar,
        });
      });

      tools.value = list;
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
      selectedLanguages,
      selectedLocations,
      selectedTypes,
      selectedTopics,
      errors,
      pagination,
      tools,
      searchQuery,
      debounceSearch,
      paginate,
      onSubmit,
      customLabel,
      copy,
      showFilterModal,
      tags,
      removeSelectedItem,
      removeAllSelectedItems,
    };
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
