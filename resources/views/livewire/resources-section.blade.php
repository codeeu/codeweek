<div class="codeweek-resourceform-component">

        <div class="codeweek-searchbox">


                <div class="basic-fields">
                        <div class="codeweek-search-text">
                                <input type="text" wire:model="searchInput"
                                       placeholder="{{__('resources.search_resources')}}">
                        </div>

{{--                        <div class="codeweek-more-button" @click="toggleFilters()">--}}
{{--                                <span>{{showFilters ? '-' : '+'}}</span>--}}
{{--                        </div>--}}
                </div>


                <div class="advanced-fields">
                        <div class="line">

                                <x-select.styled
                                        wire:change="doSomething"
                                        wire:model.live="selectedTypes" :options="$types" multiple select="label:name|value:id"/>

{{--                                <multiselect v-model="selectedTypes" :options="types" :multiple="true" :close-on-select="false"--}}
{{--                                             :clear-on-select="false" :preserve-search="true" :placeholder="$t('resources.types')"--}}
{{--                                             label="resources.resources.types" :custom-label="customLabel"--}}
{{--                                             track-by="name" :preselect-first="false" @input="onSubmit()">--}}
{{--                                        <pre class="language-json"><code>{{ $this->selectedTypes  }}</code></pre>--}}
{{--                                </multiselect>--}}

{{--                                <multiselect v-model="selectedLevels" :options="levels" :multiple="true"--}}
{{--                                             :close-on-select="false"--}}
{{--                                             :clear-on-select="false" :preserve-search="true" :placeholder="$t('resources.levels')"--}}
{{--                                             label="resources.resources.levels" :custom-label="customLabel"--}}
{{--                                             track-by="name" :preselect-first="false" @input="onSubmit()">--}}
{{--                                        <pre class="language-json"><code>{{ selectedLevels  }}</code></pre>--}}
{{--                                </multiselect>--}}

{{--                                <multiselect v-model="selectedProgrammingLanguages"--}}
{{--                                             :options="programmingLanguages"--}}
{{--                                             :multiple="true"--}}
{{--                                             :close-on-select="false"--}}
{{--                                             :clear-on-select="false" :preserve-search="true"--}}
{{--                                             :placeholder="$t('resources.programming_languages')"--}}
{{--                                             label="name"--}}
{{--                                             track-by="name" :preselect-first="false" @input="onSubmit()">--}}
{{--                                        <pre class="language-json"><code>{{ selectedProgrammingLanguages  }}</code></pre>--}}
{{--                                </multiselect>--}}

{{--                                <multiselect v-show="section === 'teach'" v-model="selectedSubjects" :options="subjects"--}}
{{--                                             :multiple="true"--}}
{{--                                             :close-on-select="false"--}}
{{--                                             :clear-on-select="false" :preserve-search="true"--}}
{{--                                             :placeholder="$t('resources.Subjects')"--}}
{{--                                             label="resources.resources.subjects" :custom-label="customLabel"--}}
{{--                                             track-by="name" :preselect-first="false" @input="onSubmit()">--}}
{{--                                        <pre class="language-json"><code>{{ selectedSubjects  }}</code></pre>--}}
{{--                                </multiselect>--}}
                        </div>

                        <div class="line">

{{--                                <multiselect v-model="selectedCategories" :options="categories" :multiple="true"--}}
{{--                                             :close-on-select="false"--}}
{{--                                             :clear-on-select="false" :preserve-search="true" :placeholder="$t('resources.categories')"--}}
{{--                                             label="resources.resources.categories" :custom-label="customLabel"--}}
{{--                                             track-by="name" :preselect-first="false" @input="onSubmit()">--}}
{{--                                        <pre class="language-json"><code>{{ selectedCategories  }}</code></pre>--}}
{{--                                </multiselect>--}}


{{--                                <multiselect v-model="selectedLanguages" :options="languages" :multiple="true"--}}
{{--                                             :close-on-select="false"--}}
{{--                                             :clear-on-select="false" :preserve-search="true" :placeholder="$t('resources.Languages')"--}}
{{--                                             label="name"--}}
{{--                                             track-by="name" :preselect-first="false" @input="onSubmit()">--}}
{{--                                        <pre class="language-json"><code>{{ selectedLanguages  }}</code></pre>--}}
{{--                                </multiselect>--}}


                        </div>

                </div>


        </div>


        <div class="codeweek-content-wrapper">

{{--                <div class="tools">--}}

{{--                        <button class="codeweek-blank-button"--}}
{{--                                v-clipboard:copy="searchQuery"--}}
{{--                                v-clipboard:success="onCopy"--}}
{{--                                v-clipboard:error="onError">--}}
{{--                                {{$t('resources.share')}}--}}
{{--                        </button>--}}

{{--                </div>--}}


                <div class="codeweek-grid-layout">
                        @foreach ($items as $item)
                                <div>{{ $item->name }}</div>
                        @endforeach
                </div>

                {{ $items->links(data: ['scrollTo' => false]) }}

        </div>

</div>