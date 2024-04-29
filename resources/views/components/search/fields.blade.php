<div class="bg-gray-200 h-auto w-full">

    {{--    <div class="flex justify-between bg-orange-400 pt-6 px-48">--}}
    {{--        <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 m-2">1</div>--}}
    {{--        <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 m-2">2</div>--}}
    {{--        <div class="text-gray-700 text-center bg-gray-400 px-4 py-2 m-2">3</div>--}}
    {{--    </div>--}}

    <div class="flex justify-start px-6 py-6">


        <input wire:model.live.debounce.300ms="search"
               id="search"
               type="search"
               placeholder="{{__('search.search_placeholder')}}"
               class="p-4 rounded w-2/3 mr-4">

        {{--        <input wire:model.live.debounce.500ms="year"--}}
        {{--               id="search"--}}
        {{--               type="search"--}}
        {{--               placeholder="{{__('search.search_placeholder')}}"--}}
        {{--               class="p-4 rounded">--}}

        <select id="location" wire:model.live="selectedYear"
                class="mt-1 form-select block w-1/3 pl-3 pr-10 py-2 text-base leading-6 border-gray-300 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 sm:text-sm sm:leading-5">
            @foreach($years as $year)
                <option value="{{$year}}">{{$year}}</option>
            @endforeach
        </select>

        {{--        <div class="right-fields">--}}
        {{--            <div class="year-selection">--}}
        {{--                <multiselect v-model="year" :options="years" :multiple="false" :close-on-select="true"--}}
        {{--                             :clear-on-select="false" :preserve-search="false" placeholder="Year"--}}
        {{--                             :show-labels="false" :preselect-first="true" :searchable="false"--}}
        {{--                             :allowEmpty="false">--}}
        {{--                    <pre class="language-json"><code>{{ year  }}</code></pre>--}}
        {{--                </multiselect>--}}
        {{--            </div>--}}


        {{--        </div>--}}


        {{--        <div class="right-fields">--}}
        {{--            <div class="year-selection">--}}
        {{--                <multiselect v-model="year" :options="years" :multiple="false" :close-on-select="true"--}}
        {{--                             :clear-on-select="false" :preserve-search="false" placeholder="Year"--}}
        {{--                             :show-labels="false" :preselect-first="true" :searchable="false"--}}
        {{--                             :allowEmpty="false">--}}
        {{--                    <pre class="language-json"><code>{{ year  }}</code></pre>--}}
        {{--                </multiselect>--}}
        {{--            </div>--}}

        {{--            <div class="codeweek-button">--}}
        {{--                <input type="button" :value="$t('search.submit')" @click="onSubmit()">--}}
        {{--            </div>--}}

        {{--        <!--<div class="codeweek-more-button" @click="toggleFilters()">--}}
        {{--                        <span>{{showFilters ? '-' : '+'}}</span>--}}
        {{--                    </div>-->--}}
        {{--        </div>--}}

        {{--    </div>--}}

        {{--    <div class="advanced-fields" v-show="showFilters">--}}

        {{--        <multiselect v-model="countries" :options="countrieslist" :multiple="true" :close-on-select="false"--}}
        {{--                     :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.countries')"--}}
        {{--                     :preselect-first="false"--}}
        {{--                     label="countries" :custom-label="translated" track-by="iso">--}}
        {{--            <pre class="language-json"><code>{{ countries }}</code></pre>--}}
        {{--        </multiselect>--}}

        {{--        <multiselect v-model="audiences" :options="audienceslist" :multiple="true" :close-on-select="false"--}}
        {{--                     :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.audiences')"--}}
        {{--                     :preselect-first="false"--}}
        {{--                     label="event.audience" :custom-label="customLabel" track-by="id" class="mr-4">--}}
        {{--            <pre class="language-json"><code>{{ audiences }}</code></pre>--}}
        {{--        </multiselect>--}}

        {{--        <multiselect v-model="themes" :options="themeslist" :multiple="true" :close-on-select="false"--}}
        {{--                     :clear-on-select="false" :preserve-search="false" :placeholder="$t('search.themes')"--}}
        {{--                     :preselect-first="false"--}}
        {{--                     label="event.theme" :custom-label="customLabel" track-by="id">--}}
        {{--            <pre class="language-json"><code>{{ themes }}</code></pre>--}}
        {{--        </multiselect>--}}

        {{--        <multiselect v-model="types" :options="typeslist" :multiple="true" :close-on-select="false"--}}
        {{--                     :clear-on-select="false" :preserve-search="false"--}}
        {{--                     :placeholder="$t('event.activitytype.label')"--}}
        {{--                     :preselect-first="false"--}}
        {{--                     label="event.activitytype" :custom-label="customLabel" track-by="id">--}}
        {{--            <pre class="language-json"><code>{{ types }}</code></pre>--}}
        {{--        </multiselect>--}}


        {{--    </div>--}}

    </div>