
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import example from './components/ExampleComponent.vue';

import countrySelect from './components/CountrySelect.vue';
import flash from './components/Flash.vue';
import avatarForm from './components/AvatarForm.vue';
import pictureForm from './components/PictureForm.vue';
import dateTime from './components/DateTime.vue';
import inputTags from './components/InputTags.vue';
import moderateEvent from './components/ModerateEvent.vue';
import reportEvent from './components/ReportEvent.vue';




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


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
        reportEvent
    }
});
