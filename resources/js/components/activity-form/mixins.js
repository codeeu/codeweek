import { computed, ref, onMounted } from 'vue';
import axios from 'axios';
import { trans } from 'laravel-vue-i18n';

export function useDataOptions() {
  const buildOptionMap = (options) => {
    const result = {};
    options?.forEach((option) => {
      result[option.id] = option.name;
    });
    return result;
  };

  const stepTitles = computed(() => [
    trans('event.activity-overview'),
    trans('event.who-is-the-activity-for'),
    trans('event.organiser'),
  ]);

  const activityFormatOptions = computed(() => [
    { id: 'coding-camp', name: trans('event.coding-camp') },
    { id: 'summer-camp', name: trans('event.summer-camp') },
    { id: 'weekend-course', name: trans('event.weekend-course') },
    { id: 'evening-course', name: trans('event.evening-course') },
    { id: 'careerday', name: trans('event.career-day') },
    { id: 'university-visit', name: trans('event.university-visit') },
    { id: 'coding-home', name: trans('event.coding-at-home') },
    { id: 'code-week-challenge', name: trans('event.code-week-challenge') },
    { id: 'competition', name: trans('event.competition') },
    { id: 'other', name: trans('event.other-group-work-seminars-workshops') },
  ]);
  const activityFormatOptionsMap = computed(() =>
    buildOptionMap(activityFormatOptions.value)
  );

  const activityTypeOptions = computed(() => [
    { id: 'open-online', name: trans('event.activitytype.open-online') },
    { id: 'invite-online', name: trans('event.activitytype.invite-online') },
    { id: 'open-in-person', name: trans('event.activitytype.open-in-person') },
    { id: 'invite-in-person', name: trans('event.activitytype.invite-in-person') },
    { id: 'other', name: trans('event.organizertype.other') },
  ]);
  const activityTypeOptionsMap = computed(() =>
    buildOptionMap(activityTypeOptions.value)
  );

  const recurringFrequentlyMap = computed(() => ({
    daily: trans('event.daily'),
    weekly: trans('event.weekly'),
    monthly: trans('event.monthly'),
  }));

  const durationOptions = computed(() => [
    { id: '0-1', name: trans('event.0-1-hours') },
    { id: '1-2', name: trans('event.1-2-hours') },
    { id: '2-4', name: trans('event.2-4-hours') },
    { id: 'over-4', name: trans('event.longer-than-4-hours') },
  ]);
  const durationOptionsMap = computed(() =>
    buildOptionMap(durationOptions.value)
  );

  const recurringTypeOptions = computed(() => [
    {
      id: 'consecutive',
      name: trans('event.consecutive-learning-over-multiple-sessions'),
    },
    {
      id: 'individual',
      name: trans('event.recurring-individual'),
    },
  ]);
  const recurringTypeOptionsMap = computed(() =>
    buildOptionMap(recurringTypeOptions.value)
  );

  const ageOptions = computed(() => [
    { id: 'under-5', name: trans('event.under-5-early-learners') },
    { id: '6-9', name: trans('event.6-9-primary') },
    { id: '10-12', name: trans('event.10-12-upper-primary') },
    { id: '13-15', name: trans('event.13-15-lower-secondary') },
    { id: '16-18', name: trans('event.16-18-upper-secondary') },
    { id: '19-25', name: trans('event.19-25-young-adults') },
    { id: 'over-25', name: trans('event.over-25-adults') },
  ]);
  const ageOptionsMap = computed(() => buildOptionMap(ageOptions.value));

  const organizerTypeOptions = computed(() => [
    { id: 'school', name: trans('event.organizertype.school') },
    { id: 'library', name: trans('event.organizertype.library') },
    { id: 'non profit', name: trans('event.organizertype.non-profit') },
    { id: 'private business', name: trans('event.organizertype.private-business') },
    { id: 'other', name: trans('event.organizertype.other') },
  ]);
  const organizerTypeOptionsMap = computed(() =>
    buildOptionMap(organizerTypeOptions.value)
  );

  const themeOptions = computed(() => [
    { id: 'robotics-drones-smart-devices', name: trans('event.theme.robotics-drones-smart-devices') },
    { id: 'cybersecurity-data', name: trans('event.theme.cybersecurity-data') },
    { id: 'web-app-software-development', name: trans('event.theme.web-app-software-development') },
    { id: 'visual-block-programming', name: trans('event.theme.visual-block-programming') },
    { id: 'unplugged-playful-activities', name: trans('event.theme.unplugged-playful-activities') },
    { id: 'art-creative-coding', name: trans('event.theme.art-creative-coding') },
    { id: 'game-design', name: trans('event.theme.game-design') },
    { id: 'internet-of-things-wearables', name: trans('event.theme.internet-of-things-wearables') },
    { id: 'ar-vr-3d-technologies', name: trans('event.theme.ar-vr-3d-technologies') },
    { id: 'digital-careers-learning-pathways', name: trans('event.theme.digital-careers-learning-pathways') },
    { id: 'digital-literacy-soft-skills', name: trans('event.theme.digital-literacy-soft-skills') },
    { id: 'ai-generative-ai', name: trans('event.theme.ai-generative-ai') },
    { id: 'awareness-inspiration', name: trans('event.theme.awareness-inspiration') },
    { id: 'promoting-diversity-inclusion', name: trans('event.theme.promoting-diversity-inclusion') },
    { id: 'other-theme', name: trans('event.theme.other-theme') },
  ]);
  const themeOptionsMap = computed(() =>
    buildOptionMap(themeOptions.value)
  );

  const audienceOptions = ref([]);

  onMounted(async () => {
    const response = await axios.get('/api/audiences');
    audienceOptions.value = response.data.map((audience) => ({
      id: audience.id,
      name: trans(`event.${audience.slug}`),
    }));
  });

  const audienceOptionsMap = computed(() =>
    buildOptionMap(audienceOptions.value)
  );

  return {
    stepTitles,
    activityFormatOptions,
    activityFormatOptionsMap,
    activityTypeOptions,
    activityTypeOptionsMap,
    recurringFrequentlyMap,
    durationOptions,
    durationOptionsMap,
    recurringTypeOptions,
    recurringTypeOptionsMap,
    ageOptions,
    ageOptionsMap,
    organizerTypeOptions,
    organizerTypeOptionsMap,
    themeOptions,
    themeOptionsMap,
    audienceOptions,
    audienceOptionsMap,
  };
}
