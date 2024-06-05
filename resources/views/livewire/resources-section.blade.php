<div class="codeweek-resourceform-component">

    <div class="codeweek-searchbox">


        <div class="basic-fields">
            <div class="codeweek-search-text">
                <input type="text" wire:model.live.debounce.50ms="searchInput"
                       placeholder="Search Resources">
            </div>

            {{--                        <div class="codeweek-more-button" @click="toggleFilters()">--}}
            {{--                                <span>{{showFilters ? '-' : '+'}}</span>--}}
            {{--                        </div>--}}
        </div>


        <div class="advanced-fields">
            <div class="grid grid-cols-4 gap-8 codeweek-search-text">
                <div class="min-w-48">
                    <x-select.styled wire:model.live="selectedTypes" :options="$types" multiple
                                     select="label:name|value:id" placeholder="Types"/>
                </div>

                <div class="min-w-48">
                    <x-select.styled wire:model.live="selectedLevels" :options="$levels" multiple
                                     select="label:name|value:id" placeholder="Levels"/>
                </div>

                <div class="min-w-48">
                    <x-select.styled wire:model.live="selectedProgrammingLanguages" :options="$programmingLanguages" multiple
                                     select="label:name|value:id" placeholder="Programming Languages"/>
                </div>

                <div class="min-w-48">
                    <x-select.styled wire:model.live="selectedSubjects" :options="$subjects" multiple
                                     select="label:name|value:id" placeholder="Subjects"/>
                </div>

                <div class="min-w-48">
                    <x-select.styled wire:model.live="selectedCategories" :options="$categories" multiple
                                     select="label:name|value:id" placeholder="Categories"/>
                </div>

                <div class="min-w-48">
                    <x-select.styled wire:model.live="selectedLanguages" :options="$languages" multiple
                                     select="label:name|value:id" placeholder="Languages"/>
                </div>
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