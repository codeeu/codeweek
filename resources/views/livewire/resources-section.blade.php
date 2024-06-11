<div class="codeweek-resourceform-component">
    <div class="flex">
        <div class="w-1/4 bg-orange-50 ml-8 px-4">
                <div class="space-y-2">
                    <div class="my-4 text-center text-xl font-bold text-gray-800">Search Resources</div>

                    <div class="min-w-48">
                        <x-input type="text" wire:model.live="searchInput" placeholder="Keyword Search"/>
                    </div>
                    <div class="min-w-48">
                        <x-select.styled wire:model.live="selectedTypes" :options="$types" multiple
                                         select="label:name|value:id" placeholder="Types"/>
                    </div>
                    <div class="min-w-48">
                        <x-select.styled wire:model.live="selectedLevels" :options="$levels" multiple
                                         select="label:name|value:id" placeholder="Levels"/>
                    </div>
                    <div class="min-w-48">
                        <x-select.styled wire:model.live="selectedProgrammingLanguages" :options="$programmingLanguages"
                                         multiple select="label:name|value:id" placeholder="Programming Languages"/>
                    </div>
                    @if($section === 'teach')
                    <div class="min-w-48">
                        <x-select.styled wire:model.live="selectedSubjects" :options="$subjects" multiple
                                         select="label:name|value:id" placeholder="Subjects"/>
                    </div>
                    @endif
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
        <div class="w-3/4 mx-8">
            <div class="codeweek-grid-layout grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($items as $item)

                    <div class="codeweek-card max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden flex flex-col h-full">
                        <img src="{{$item->thumbnail}}" class="w-full h-48 object-cover">
                        <div class="p-4 flex flex-col flex-grow">
                            <div class="card-title text-xl font-semibold text-gray-800">{{$item->name}}</div>
                            <div class="card-description text-gray-600 mt-4">
                                {{$item->description}}
                            </div>
                            <div class="card-actions mt-4">
                                <a href="{{$item->source}}" target="_blank"
                                   class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">{{__('myevents.view')}}</a>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="mt-4">
                {{ $items->links(data: ['scrollTo' => false]) }}
            </div>
        </div>
    </div>
</div>
