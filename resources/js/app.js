import './bootstrap';
import { createApp } from 'vue';
import ActivityForm from './components/activity-form/index.vue';
import ResourceForm from './components/ResourceForm.vue';
import ResourceCard from './components/ResourceCard.vue';
import ResourcePill from './components/ResourcePill.vue';
import Pagination from './components/Pagination.vue';
import SingleSelect from './components/Singleselect.vue';
import PasswordField from './components/PasswordField.vue';
import Multiselect from "./components/Multiselect.vue";
import CountrySelect from "./components/CountrySelect.vue";
import ModerateEvent from "./components/ModerateEvent.vue";
import AutocompleteGeo from './components/AutocompleteGeo.vue';
import DateTime from "./components/DateTime.vue";
import Question from "./components/Question.vue";
import PictureForm from "./components/PictureForm.vue";
import Flash from "./components/Flash.vue";
import InputTags from "./components/InputTags.vue";
import ReportEvent from "./components/ReportEvent.vue";
import EventCard from "./components/EventCard.vue";
import EventDetail from "./components/EventDetail.vue";
import SearchPageComponent from "./components/SearchPageComponent.vue";
import MatchMakingToolForm from "./components/matchmaking/MatchMakingToolForm.vue";
import ToolCard from "./components/matchmaking/ToolCard.vue";
import ToolDetailCard from "./components/matchmaking/ToolDetailCard.vue";
import SelectField from "./components/form-fields/SelectField.vue";
// import { createI18n } from 'vue-i18n';
// import Locale from './vue-i18n-locales.generated';
import AvatarForm from "./components/AvatarForm.vue";
import authorizationPlugin from "./components/authorizationPlugin.js";
import PartnerGallery from './components/PartnerGallery.vue';

import { i18nVue } from 'laravel-vue-i18n';

const app = createApp({});

app.use(authorizationPlugin);
app.use(i18nVue, {
    resolve: async lang => {
        const langs = import.meta.glob('../lang/*.json');
        return await langs[`../lang/${lang}.json`]();
    }
})
app.component('ActivityForm', ActivityForm);
app.component('ResourceForm', ResourceForm);
app.component('ResourceCard', ResourceCard);
app.component('ResourcePill', ResourcePill);
app.component('Pagination', Pagination);
app.component('Singleselect', SingleSelect);
app.component('PasswordField', PasswordField);
app.component('Multiselect', Multiselect);
app.component('CountrySelect', CountrySelect);
app.component('ModerateEvent', ModerateEvent);
app.component('ReportEvent', ReportEvent);
app.component('AutocompleteGeo', AutocompleteGeo); // Register the component
app.component('DateTime', DateTime);
app.component('Question', Question);
app.component('PictureForm', PictureForm);
app.component('Flash', Flash);
app.component('InputTags', InputTags);
app.component('SearchPageComponent', SearchPageComponent);
app.component('AvatarForm', AvatarForm);
app.component('PartnerGallery', PartnerGallery);
app.component('MatchMakingToolForm', MatchMakingToolForm);
app.component('ToolCard', ToolCard);
app.component('ToolDetailCard', ToolDetailCard);
app.component('EventCard', EventCard);
app.component('EventDetail', EventDetail);
app.component('SelectField', SelectField);
app.mount("#app");
