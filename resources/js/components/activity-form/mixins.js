import { computed } from 'vue';
import { trans } from 'laravel-vue-i18n';

export function useDataOptions() {
  const stepItems = computed(() => [
    { name: 'Join the community', title: 'Activity overview' },
    { name: 'Who is the activity for', title: 'Who is the activity for' },
    { name: 'Organiser', title: 'Organiser' },
  ]);

  const activityFormatOptions = computed(() => [
    { id: 'coding-camp', name: 'Coding camp' },
    { id: 'summer-camp', name: 'Summercamp' },
    { id: 'weekend-course', name: 'Weekend course' },
    { id: 'evening-course', name: 'Evening course' },
    { id: 'careerday', name: 'Careerday' },
    { id: 'university-visit', name: 'University visit' },
    { id: 'coding-home', name: 'Coding@Home' },
    { id: 'code-week-challenge', name: 'Code Week Challenge' },
    { id: 'competition', name: 'Competition' },
    { id: 'other', name: 'Other (e.g. Group work, Seminars, Workshops' },
  ]);

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

  const durationOptions = computed(() => [
    { id: '0-1', name: trans('event.duration.0-1-hour') },
    { id: '1-2', name: trans('event.duration.1-2-hours') },
    { id: '2-4', name: trans('event.duration.2-4-hours') },
    {
      id: 'over-4',
      name: trans('event.duration.more-than-4-hours'),
    },
  ]);

  const recurringTypeOptions = computed(() => [
    {
      id: 'consecutive',
      name: 'Consecutive learning over multiple sessions',
    },
    {
      id: 'individual',
      name: 'Individual, stand-alone lessons under a common theme/joint event.',
    },
  ]);

  const ageOptions = computed(() => [
    { id: 'under-5', name: 'Under 5 - Early learners' },
    { id: '6-9', name: '6-9 - Primary' },
    { id: '10-12', name: '10-12 - Upper primary' },
    { id: '13-15', name: '13-15 - Lower secondary' },
    { id: '16-18', name: '16-18 - Upper secondary' },
    { id: '19-25', name: '19-25 - Young Adults' },
    { id: 'over-25', name: 'Over 25 - Adults' },
  ]);

  const organizerTypeOptions = computed(() => [
    { id: 'school', name: trans('event.organizertype.school') },
    { id: 'library', name: trans('event.organizertype.library') },
    { id: 'non profit', name: trans('event.organizertype.non profit') },
    {
      id: 'private business',
      name: trans('event.organizertype.private business'),
    },
    { id: 'other', name: trans('event.organizertype.other') },
  ]);

  return {
    stepItems,
    activityFormatOptions,
    activityTypeOptions,
    durationOptions,
    recurringTypeOptions,
    ageOptions,
    organizerTypeOptions,
  };
}
