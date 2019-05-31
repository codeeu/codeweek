
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.Vue.config.debug = true; //TODO: Remove in production

import VueInternationalization from 'vue-i18n';
import Locale from './vue-i18n-locales.generated';

import example from './components/ExampleComponent.vue';

import countrySelect from './components/CountrySelect.vue';
import flash from './components/Flash.vue';
import avatarForm from './components/AvatarForm.vue';
import pictureForm from './components/PictureForm.vue';
import dateTime from './components/DateTime.vue';
import inputTags from './components/InputTags.vue';
import moderateEvent from './components/ModerateEvent.vue';
import reportedEvent from './components/ReportedEvent.vue';
import reportEvent from './components/ReportEvent.vue';
import question from './components/Question.vue';
import simpleQuestion from './components/SimpleQuestion.vue';
import counter from './components/Counter';
import Multiselect from './components/Multiselect.vue';
import AutocompleteGeo from './components/AutoCompleteGeo.vue'
import Autocomplete from 'v-autocomplete'
import ResourceForm from './components/ResourceForm.vue'
import SearchPageComponent from './components/SearchPageComponent.vue'
import VueClipboard from 'vue-clipboard2'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.Vue.use(Autocomplete);
Vue.use(VueInternationalization);
const lang = document.documentElement.lang.substr(0, 2);
// or however you determine your current app locale

const i18n = new VueInternationalization({
    locale: lang,
    fallbackLocale: 'en',
    messages: Locale
});


Vue.use(VueClipboard);


const app = new Vue({
    el: "#app",
    i18n,
    components: {
        flash,
        avatarForm,
        pictureForm,
        example,
        countrySelect,
        dateTime,
        inputTags,
        moderateEvent,
        reportedEvent,
        reportEvent,
        question,
        simpleQuestion,
        counter,
        Multiselect,
        AutocompleteGeo,
        Autocomplete,
        ResourceForm,
        SearchPageComponent

    }
});
