
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.Vue.config.debug = true; //TODO: Remove in production

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


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.Vue.use(Autocomplete)

const app = new Vue({
    el: "#app",

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
        Autocomplete
    }
});
