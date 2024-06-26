@extends('layout.base')


@section('content')

    <section id="codeweek-events-add-page" class="codeweek-page">

        <section class="codeweek-banner simple">
            <div class="text">
                <h2>#EUCodeWeek</h2>
                <h1>@lang('event.main_title')</h1>
                <a style="color:black;" href="{{route('guide')}}" target="_blank">@lang('event.howto')?</a>
            </div>
        </section>

        <section class="codeweek-content-wrapper" style="margin-top:0px;" x-data="addActivity()">


            <form enctype="multipart/form-data" method="post" role="form" class="codeweek-form" action="/events">
                <p>@lang('event.required')</p>

                {{csrf_field()}}


                <div class="codeweek-form-inner-two-columns">


                    <div class="codeweek-form-inner-container">

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="activity_type">* @lang('event.activitytype.label')</label>
                                <select id="id_activity_type" name="activity_type" class="codeweek-input-select"
                                        x-model="selectedActivityType">
                                    <option value="open-online" {{ old('activity_type') == "open-online" ? 'selected' : '' }}>@lang('event.activitytype.open-online')</option>
                                    <option value="invite-online" {{ old('activity_type') == "invite-online" ? 'selected' : '' }}>@lang('event.activitytype.invite-online')</option>
                                    <option value="open-in-person" {{ old('activity_type') == "open-in-person" ? 'selected' : '' }}>@lang('event.activitytype.open-in-person')</option>
                                    <option value="invite-in-person" {{ old('activity_type') == "invite-in-person" ? 'selected' : '' }}>@lang('event.activitytype.invite-in-person')</option>
                                    <option value="other" {{ old('activity_type') == "other" ? 'selected' : '' }}>@lang('event.organizertype.other')</option>
                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'activity_type'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_title">* @lang('event.title.label')</label>
                                <input id="id_title" maxlength="255" name="title"
                                       placeholder="@lang('event.title.placeholder')" type="text"
                                       value="{{old('title')}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'title'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_organizer">* @lang('event.organizer.label')</label>
                                <input id="id_organizer" maxlength="255"
                                       name="organizer" placeholder="@lang('event.organizer.placeholder')" type="text"
                                       value="{{old('organizer')?:$location->name??''}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'organizer'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_language">* @lang('resources.Languages')</label>
                                <select id="id_language" name="language" class="codeweek-input-select">
                                    @foreach($languages as $key => $value)
                                        <option value="{{$key}}" {{ $key == App::getLocale() ? 'selected' : '' }}>{{$value}}</option>
                                    @endforeach

                                </select>
                            </div>

                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_organizer">* @lang('event.organizertype.label')</label>
                                <select id="id_organizer_type" name="organizer_type" class="codeweek-input-select">
                                    <option disabled value> ---</option>
                                    <option value="school" {{ old('organizer_type') == "school" ? 'selected' : '' }}>@lang('event.organizertype.school')</option>
                                    <option value="library" {{ old('organizer_type') == "library" ? 'selected' : '' }}>@lang('event.organizertype.library')</option>
                                    <option value="non profit" {{ old('organizer_type') == "non profit" ? 'selected' : '' }}>@lang('event.organizertype.non profit')</option>
                                    <option value="private business" {{ old('organizer_type') == "private business" ? 'selected' : '' }}>@lang('event.organizertype.private business')</option>
                                    <option value="other" {{ old('organizer_type') == "other" ? 'selected' : '' }}>@lang('event.organizertype.other')</option>
                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'organizer_type'])@endcomponent
                            </div>
                        </div>


                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field align-flex-start">
                                <label for="id_description">*@lang('event.description.label')</label>
                                <textarea cols="40" id="id_description" name="description"
                                          placeholder="@lang('event.description.placeholder')"
                                          rows="10"> {{old('description')}}</textarea>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'description'])@endcomponent
                            </div>
                        </div>

                        <h3>@lang('event.who')</h3>


                        <div class="flex items-center space-x-4 mb-4">
                            <label for="id_audience" class="w-1/5 text-right font-medium text-black">
                                *@lang('event.audience_title')
                            </label>
                            <div class="w-4/5">
                                <select name="audience" id="audience-multi-select" data-search=false
                                        data-placeholder="{{__('event.audience_title')}}" search="false"
                                        multiple="multiple" data-multi-select
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach($audiences as $audience)
                                        <option {{ (collect(old('audience'))->contains($audience->id)) ? 'selected':'' }} value="{{ $audience->id }}">{{ __('event.audience.'.$audience->name) }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1 text-red-600">
                                    @component('components.validation-errors', ['field' => 'audience'])@endcomponent
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 mb-4">
                            <label for="id_theme" class="w-1/5 text-right font-medium text-black">
                                *@lang('event.theme_title')
                            </label>
                            <div class="w-4/5">
                                <select name="theme" id="example-multi-select" data-search=false
                                        data-placeholder="Select options" search="false" multiple="multiple"
                                        data-multi-select
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    @foreach($themes as $theme)
                                        <option {{ (collect(old('theme'))->contains($theme->id)) ? 'selected':'' }} value="{{ $theme->id }}">{{ __('event.theme.'.$theme->name) }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-1 text-red-600">
                                    @component('components.validation-errors', ['field' => 'theme'])@endcomponent
                                </div>
                            </div>
                        </div>


                    </div>


                    <div class="codeweek-form-inner-container">

                        <div class="codeweek-form-field-wrapper">

                            <div class="flex items-center space-x-4 mb-4">
                                <label for="id_location"><span
                                            x-show="!isOnlineActivitySelected()">*</span>@lang('event.address.label')
                                    <br/>
                                    <a href="{{route('activities-locations')}}">
                                        <img src="{{asset('svg/address-book.svg')}}" class="static-image">
                                    </a>
                                </label>
                                <div class="w-4/5">
                                    {{--                                        <livewire:address-autocomplete/>--}}
                                    <input type="text" id="address"
                                           class="block w-full p-2 border border-gray-300 rounded-md"
                                           placeholder="Type an address...">
                                    <ul id="autocomplete-list"
                                        class="absolute z-10 w-full bg-white border border-gray-300 rounded-md mt-1 hidden"></ul>

                                    <div class="mt-1 text-red-600">
                                        @component('components.validation-errors', ['field'=>'location'])@endcomponent
                                    </div>
                                </div>
                            </div>


                            {{--                            <div class="max-w-md mx-auto">--}}
                            {{--                                <label for="address" class="block text-sm font-medium text-gray-700">Enter Address</label>--}}
                            {{--                                <div class="relative mt-1">--}}
                            {{--                                    <input type="text" id="address" class="block w-full p-2 border border-gray-300 rounded-md" placeholder="Type an address...">--}}
                            {{--                                    <ul id="autocomplete-list" class="absolute z-10 w-full bg-white border border-gray-300 rounded-md mt-1 hidden"></ul>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}

                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_country">* @lang('event.country')</label>
                                <select id="id_country" name="country_iso" class="codeweek-input-select">
                                    <option value=""></option>
                                    @isset($location)

                                        @foreach ($countries as $country)
                                            <option value="{{$country->iso}}" {{$location->country_iso == $country->iso ? 'selected' : ''}}>@lang('countries.'. $country->name)</option>
                                        @endforeach
                                    @else
                                        @foreach ($countries as $country)
                                            <option value="{{$country->iso}}">@lang('countries.'. $country->name)</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'country'])@endcomponent
                            </div>
                        </div>


                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_start_date">*@lang('event.start.label')</label>
                                <input name="start_date" type="datetime-local" value="{{old('start_date')}}"
                                       placeholder="@lang('event.start.placeholder')">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'start_date'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_end_date">*@lang('event.end.label')</label>
                                <input name="end_date" type="datetime-local" value="{{old('end_date')}}"
                                       placeholder="@lang('event.end.placeholder')">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'end_date'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_event_url"><span
                                            x-show="isOnlineActivitySelected()">*</span>@lang('event.website.label')
                                </label>
                                <input id="id_event_url" maxlength="200" name="event_url"
                                       placeholder="@lang('event.website.placeholder')" type="text"
                                       value="{{old('event_url')}}">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'event_url'])@endcomponent
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field">
                                <label for="id_contact_person">@lang('event.public.label')</label>
                                <input id="id_contact_person" maxlength="75" name="contact_person"
                                       placeholder="@lang('event.public.placeholder')" type="text">
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'contact_person'])@endcomponent
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 mb-4">
                            <label for="id_tags" class="w-1/5 text-right font-medium text-black">
                                @lang('event.tags')
                            </label>
                            <div x-data="tagComponent()" class="w-4/5">
                                <div class="flex flex-wrap border p-2 rounded-full">
                                    <template x-for="(tag, index) in tags" :key="index">
                                        <div class="bg-blue-100 text-blue-700 px-2 py-1 m-1 rounded-full flex items-center">
                                            <span x-text="tag"></span>
                                            <button @click.prevent="removeTag(index)" class="ml-2 text-red-500">x
                                            </button>
                                        </div>
                                    </template>
                                    <input
                                            type="text"
                                            x-model="tagInput"
                                            @keydown.enter.prevent="addTag()"
                                            @keydown.tab.prevent="addTag()"
                                            class="flex-grow p-2 border-none focus:outline-none"
                                            placeholder="Enter a tag and press Enter or Tab"
                                    >
                                </div>
                                <input type="hidden" name="tags" :value="tags.join(',')">
                            </div>
                        </div>


                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field align-flex-start">
                                <label for="id_codeweek_forall_code_label">@lang('event.codeweek_for_all_participation_code.title')</label>
                                <div class="group-fields">
                                    <input id="id_codeweek_forall_code" maxlength="75"
                                           name="codeweek_for_all_participation_code" value="">
                                    <span style="font-size: 13px;font-style: italic;">
                                        @lang('event.codeweek_for_all_participation_code.explanation')
                                        <a href="/codeweek4all">@lang('event.codeweek_for_all_participation_code.link')</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="codeweek-form-field-wrapper">
                            <div class="codeweek-form-field-searchable">
                                <label for="id_leading_teacher_tag_label">@lang('community.titles.2')</label>

                                <select name="leading_teacher_tag" id="id_leading_teacher_tag_label" data-search=true
                                        data-placeholder="Select Leading Teacher"
                                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option value=""></option>
                                    @foreach ($leading_teachers as $leading_teacher)
                                        <option value="{{$leading_teacher}}" {{old('leading_teacher_tag') == $leading_teacher ? 'selected' : ''}}>{{$leading_teacher}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="errors">
                                @component('components.validation-errors', ['field'=>'theme'])@endcomponent
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 mb-4">
                            <label for="id_picture" class="w-1/5 text-right font-medium text-black">
                                @lang('event.image')
                            </label>
                            <div data-provides="fileinput" data-name="picture" class="w-4/5">
                                <div class="fileinput-new">
                                    <div class="fileinput-preview fileinput-exists mb-4">
                                        <img id="imagePreview" src="" alt="Image Preview"
                                             class="hidden w-24 h-24 rounded-md border"/>
                                    </div>
                                    <div>
                                        <!-- file upload -->
                                        <input type="file" id="imageUpload" accept="image/*"
                                               onchange="showPreview(event);" class="hidden">
                                        <button type="button"
                                                class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-400"
                                                onclick="document.getElementById('imageUpload').click();">Upload Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="codeweek-form-message">
                    <div class="message">
                        @lang('event.contact.explanation')
                    </div>
                    <div class="codeweek-form-field-wrapper">
                        <div class="codeweek-form-field">
                            <label for="id_user_email">* @lang('event.contact.label')</label>
                            <input id="id_user_email" name="user_email" type="email"
                                   placeholder="@lang('event.contact.placeholder')"
                                   value="{{old('user_email')}}"
                                   track-by="tag"
                                   label="tag">
                        </div>
                        <div class="errors">
                            @component('components.validation-errors', ['field'=>'user_email'])@endcomponent
                        </div>
                    </div>
                </div>

                <div class="codeweek-form-field-privacy">
                    <label>
                        <input id="checkPrivacy" name="privacy"
                               type="checkbox" {{ auth()->user()->privacy === 1 ? 'checked="checked"' : '' }}>
                        @lang('event.privacy')
                        <a href="{{route('privacy-contact-points')}}" target="_blank">
                            <img src="/images/external-link.svg" width="16" class="static-image">
                        </a>
                    </label>
                    @component('components.validation-errors', ['field'=>'privacy'])
                    @endcomponent
                </div>


                <div class="codeweek-form-button-container">
                    <div class="codeweek-button">
                        <input type="submit" id="add-button"
                               onclick="javascript:return addEvent('{{__('school.required.location')}}');"
                               value="@lang('event.add_activity')">
                    </div>
                </div>

            </form>

        </section>

    </section>

@endsection


@push('scripts')

    <script defer src="//europa.eu/webtools/load.js" type="text/javascript"></script>
    <script type="application/json">
        {
            "service" : "map",
            "version" : "2.0",
            "renderTo" : "events-add-map",
            "height": "250",
            "width": "422",
            "custom": ["/js/hideMenuMap.js"]
        }


    </script>

    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>

    {{--    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}


    <script>

        tinymce.init({
            selector: '#id_description',
            height: 400,
            width: 460
        });


        function addActivity() {
            return {
                selectedActivityType: 'open-in-person',
                isOnlineActivitySelected() {
                    return (this.selectedActivityType === 'open-online' || this.selectedActivityType === 'invite-online')
                },
            }
        }
    </script>

    <script>
        function tagComponent() {
            return {
                tagInput: '',
                tags: [],
                addTag() {
                    if (this.tagInput.trim() !== '' && !this.tags.includes(this.tagInput.trim())) {
                        this.tags.push(this.tagInput.trim());
                        this.tagInput = '';
                    }
                },
                removeTag(index) {
                    this.tags.splice(index, 1);
                }
            };
        }
    </script>

    <script>
        function showPreview(event) {
            var file = event.target.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var preview = document.getElementById('imagePreview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const addressInput = document.getElementById('address');
            const autocompleteList = document.getElementById('autocomplete-list');

            addressInput.addEventListener('input', async function () {
                const query = addressInput.value;

                if (query.length > 2) {
                    try {
                        const response = await axios.get('/arcgis/candidates', {params: {search: query}});
                        const suggestions = response.data;

                        autocompleteList.innerHTML = '';
                        suggestions.forEach(item => {
                            const listItem = document.createElement('li');
                            listItem.textContent = item.text;
                            listItem.className = 'p-2 cursor-pointer hover:bg-gray-200';
                            listItem.addEventListener('click', () => handleSelect(item));
                            autocompleteList.appendChild(listItem);
                        });

                        autocompleteList.classList.remove('hidden');
                    } catch (error) {
                        console.error('Error fetching autocomplete suggestions', error);
                    }
                } else {
                    autocompleteList.classList.add('hidden');
                }
            });

            async function handleSelect(item) {
                //const url = `https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates?f=json&singleLine=${item.text}&magicKey=${item.magicKey}&outFields=Country`;

                try {
                    const response = await axios.get('/arcgis/selected-address', {params: item});
                    console.log('Selected item details:', response.data);

                    // Process the response as needed
                } catch (error) {
                    console.error('Error fetching address details', error);
                }

                autocompleteList.classList.add('hidden');
            }
        });
    </script>

@endpush

@section('extra-css')
    <link rel="stylesheet" href="{{asset('css/MultiSelect.css')}}">
@endsection

@section('extra-js')
    <script src="{{asset('js/MultiSelect.js')}}"></script>
@endsection