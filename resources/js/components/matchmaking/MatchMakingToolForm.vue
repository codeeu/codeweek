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
            <multiselect
              v-model="selectedSupportTypes"
              class="multi-select"
              :options="supportTypeOptions"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :custom-label="(opt) => opt.name"
              placeholder="Select type, e.g. volunteer"
              label="Select type, e.g. volunteer"
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
                  {{ values.length > 1 ? 'languages' : 'language' }}
                </div>
              </template>
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
                  {{ values.length > 1 ? 'locations' : 'location' }}
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
              :options="typeOptions"
              :multiple="true"
              :close-on-select="false"
              :clear-on-select="false"
              :preserve-search="true"
              :custom-label="(opt) => opt.name"
              placeholder="Select type"
              label="Type"
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
                  {{ values.length > 1 ? 'types' : 'type' }}
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
                  {{ values.length > 1 ? 'topics' : 'topic' }}
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
    prpQuery: {
      type: String,
      default: '',
    },
    prpLanguages: {
      type: Array,
      default: () => [],
    },
    prpLocations: {
      type: Array,
      default: () => [],
    },
    prpTypes: {
      type: Array,
      default: () => [],
    },
    prpTopics: {
      type: Array,
      default: () => [],
    },
    languages: {
      type: Array,
      default: () => [],
    },
    locations: {
      type: Array,
      default: () => [],
    },
    types: {
      type: Array,
      default: () => [],
    },
    topics: {
      type: Array,
      default: () => [],
    },
    support_types: {
      type: Array,
      default: () => [],
    },
    locale: String,
  },
  setup(props) {
    const { toClipboard } = useClipboard();
    console.log('props', { ...props });

    const showFilterModal = ref(false);
    const query = ref(props.prpQuery);
    const searchInput = ref(props.prpQuery);
    const selectedSupportTypes = ref([]);
    const selectedLanguages = ref(props.prpLanguages);
    const selectedLocations = ref(props.prpLocations);
    const selectedTypes = ref(props.prpTypes);
    const selectedTopics = ref(props.prpTopics);
    const errors = ref({});
    const pagination = ref({
      current_page: 1,
      per_page: 0,
      from: null,
      last_page: 0,
      last_page_url: null,
      next_page_url: null,
      prev_page: null,
      prev_page_url: null,
      to: null,
      total: 0,
    });
    const tools = ref([]);

    const typeOptions = computed(() => {
      return props.types.map((id) => ({ id, name: id }));
    });

    const supportTypeOptions = computed(() => {
      return [
        { id: 'organisation', name: 'Organisations' },
        { id: 'volunteer', name: 'Volunteers' },
      ];
    });

    const tags = computed(() => {
      return [
        ...selectedSupportTypes.value,
        ...selectedLanguages.value,
        ...selectedLocations.value,
        ...selectedTypes.value,
        ...selectedTopics.value,
      ];
    });

    const removeSelectedItem = (tag) => {
      const filterFn = (item) => item.id !== tag.id;
      selectedSupportTypes.value = selectedSupportTypes.value.filter(filterFn);
      selectedLanguages.value = selectedLanguages.value.filter(filterFn);
      selectedLocations.value = selectedLocations.value.filter((item) => item.iso !== tag?.iso);
      selectedTypes.value = selectedTypes.value.filter(filterFn);
      selectedTopics.value = selectedTopics.value.filter(filterFn);
      onSubmit();
    };

    const removeAllSelectedItems = () => {
      selectedSupportTypes.value = [];
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

      const params = {
        page: pagination.value.current_page,
        support_types: selectedSupportTypes.value.map((item) => item.id),
        languages: selectedLanguages.value.map((item) => item.id),
        locations: selectedLocations.value.map((item) => item.iso),
        types: selectedTypes.value.map((item) => item.id),
        topics: selectedTopics.value.map((item) => item.id),
      };

      axios
        .post('/matchmaking-tool/search', {}, { params })
        .then(({ data: response }) => {
          console.log('>>> data', response.data);

          tools.value = response.data.map((item) => {
            const result = {
              ...item,
              avatar_dark: item.avatar_dark,
              avatar: item.avatar,
              types: [
                { title: 'Online & In-person', highlight: true },
                { title: 'Ongoing availability' },
              ],
            };

            if (item.type === 'volunteer') {
              return {
                ...result,
                name: `${item.first_name || ''} ${item.last_name || ''}`.trim(),
                location: item.location,
                description: item.description,
              };
            }

            return {
              ...result,
              name: item.organisation_name,
              location:
                props.locations?.find(({ iso }) => iso === item.country)
                  ?.name || '',
              description: item.organisation_mission,
            };
          });
          console.log(
            '>>> tools.value',
            JSON.parse(JSON.stringify(tools.value))
          );

          // Set pagination
          pagination.value = {
            per_page: response.per_page,
            current_page: response.current_page,
            from: response.from,
            last_page: response.last_page,
            last_page_url: response.last_page_url,
            next_page_url: response.next_page_url,
            prev_page: response.prev_page,
            prev_page_url: response.prev_page_url,
            to: response.to,
            total: response.total,
          };
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
      selectedSupportTypes,
      selectedLanguages,
      selectedLocations,
      selectedTypes,
      selectedTopics,
      errors,
      pagination,
      tools,
      debounceSearch,
      paginate,
      onSubmit,
      customLabel,
      showFilterModal,
      tags,
      removeSelectedItem,
      removeAllSelectedItems,
      typeOptions,
      supportTypeOptions,
    };
  },
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
