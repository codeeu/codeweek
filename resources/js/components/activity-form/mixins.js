import { computed } from 'vue';
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
    {
      id: 'open-online',
      name: trans('event.activitytype.open-online'),
    },
    {
      id: 'invite-online',
      name: trans('event.activitytype.invite-online'),
    },
    {
      id: 'open-in-person',
      name: trans('event.activitytype.open-in-person'),
    },
    {
      id: 'invite-in-person',
      name: trans('event.activitytype.invite-in-person'),
    },
    {
      id: 'other',
      name: trans('event.organizertype.other'),
    },
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
    { id: 'robotics-drones-smart-devices', name: t('event.theme.robotics-drones-smart-devices') },
    { id: 'cybersecurity-data', name: t('event.theme.cybersecurity-data') },
    { id: 'web-app-software-development', name: t('event.theme.web-app-software-development') },
    { id: 'visual-block-programming', name: t('event.theme.visual-block-programming') },
    { id: 'unplugged-playful-activities', name: t('event.theme.unplugged-playful-activities') },
    { id: 'art-creative-coding', name: t('event.theme.art-creative-coding') },
    { id: 'game-design', name: t('event.theme.game-design') },
    { id: 'internet-of-things-wearables', name: t('event.theme.internet-of-things-wearables') },
    { id: 'ar-vr-3d-technologies', name: t('event.theme.ar-vr-3d-technologies') },
    { id: 'digital-careers-learning-pathways', name: t('event.theme.digital-careers-learning-pathways') },
    { id: 'digital-literacy-soft-skills', name: t('event.theme.digital-literacy-soft-skills') },
    { id: 'ai-generative-ai', name: t('event.theme.ai-generative-ai') },
    { id: 'awareness-inspiration', name: t('event.theme.awareness-inspiration') },
    { id: 'promoting-diversity-inclusion', name: t('event.theme.promoting-diversity-inclusion') },
    { id: 'other-theme', name: t('event.theme.other-theme') },
  ]);
  const themeOptionsMap = computed(() =>
    buildOptionMap(themeOptions.value)
  );

  const audienceOptions = computed(() => [
    { id: 'pre-school-children', name: trans('event.pre-school-children') },
    { id: 'elementary-school-students', name: trans('event.elementary-school-students') },
    { id: 'high-school-students', name: trans('event.high-school-students') },
    { id: 'graduate-students', name: trans('event.graduate-students') },
    { id: 'post-graduate-students', name: trans('event.post-graduate-students') },
    { id: 'employed-adults', name: trans('event.employed-adults') },
    { id: 'unemployed-adults', name: trans('event.unemployed-adults') },
    { id: 'others-see-description', name: trans('event.others-see-description') },
    { id: 'teachers', name: trans('event.teachers') },
  ]);
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
