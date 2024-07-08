import './bootstrap';
import { createApp } from 'vue';
import ResourceForm from './components/ResourceForm.vue';
import ResourceCard from './components/ResourceCard.vue';
import ResourcePill from './components/ResourcePill.vue';
import Pagination from './components/Pagination.vue';
import SingleSelect from './components/Singleselect.vue';
import Multiselect from "./components/Multiselect.vue";
import CountrySelect from "./components/CountrySelect.vue";
import ModerateEvent from "./components/ModerateEvent.vue";
import AutocompleteGeo from './components/AutocompleteGeo.vue';
import DateTime from "./components/DateTime.vue";
import Question from "./components/Question.vue";
import { createI18n } from 'vue-i18n';

import Locale from './vue-i18n-locales.generated';



const lang = document.documentElement.lang.substr(0, 2);

const i18n = createI18n({
    legacy: true,
    globalInjection: true,
    locale: lang,
    fallbackLocale: 'en',
    messages: Locale
});

const app = createApp({});

app.component('ResourceForm', ResourceForm);
app.component('ResourceCard', ResourceCard);
app.component('ResourcePill', ResourcePill);
app.component('Pagination', Pagination);
app.component('Singleselect', SingleSelect);
app.component('Multiselect', Multiselect);
app.component('CountrySelect', CountrySelect);
app.component('ModerateEvent', ModerateEvent);
app.component('AutocompleteGeo', AutocompleteGeo); // Register the component
app.component('DateTime', DateTime);
app.component('Question', Question);

app.use(i18n);

app.mount("#app");
