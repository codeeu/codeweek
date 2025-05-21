<template>
  <div class="flex flex-col gap-12 w-full">
    <div v-for="{ title, list } in stepDataList" class="flex flex-col gap-6">
      <h2
        class="text-dark-blue text-2xl md:text-[30px] leading-[44px] font-medium font-['Montserrat'] text-center"
      >
        {{ title }}
      </h2>

      <div class="flex flex-col gap-1">
        <div
          v-for="{ label, value, htmlValue, imageUrl, imageName } in list"
          class="flex gap-10 items-center px-4 py-2 text-[16px] md:text-xl text-slate-500 bg-white"
        >
          <div class="flex-shrink-0 w-32 md:w-60">{{ label }}</div>
          <div
            v-if="htmlValue"
            v-html="htmlValue"
            class="flex-grow w-full space-y-2 [&_p]:py-0"
          />
          <div v-if="imageUrl">
            <div class="mb-2">Image attached</div>
            <img class="max-h-80 mb-2" :src="imageUrl" />
            <div>{{ imageName }}</div>
          </div>
          <div v-if="value" class="flex-grow w-full">{{ value || '' }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { computed } from 'vue';
import { trans } from 'laravel-vue-i18n';

import { useDataOptions } from './mixins.js';

export default {
  props: {
    formValues: Object,
    themes: Array,
    audiences: Array,
    leadingTeachers: Array,
    languages: Object,
    countries: Array,
  },
  components: {},
  setup(props, { emit }) {
    const {
      activityFormatOptionsMap,
      activityTypeOptionsMap,
      recurringFrequentlyMap,
      durationOptionsMap,
      recurringTypeOptionsMap,
      ageOptionsMap,
      organizerTypeOptionsMap,
    } = useDataOptions();

    const stepDataList = computed(() => {
      // Step 1
      const {
        title,
        activity_format,
        activity_type,
        location,
        duration,
        start_date,
        end_date,
        is_recurring_event_local,
        recurring_event,
        recurring_type,
        theme: themes,
        description,
      } = props.formValues || {};

      const formatValues = (activity_format || []).map(
        (item) => activityFormatOptionsMap.value[item]
      );
      const typeValue = activityTypeOptionsMap.value[activity_type];
      const durationValue = durationOptionsMap.value[duration];
      const startDateValue = start_date
        ? new Date(start_date).toISOString().slice(0, 10)
        : '';
      const endDateValue = end_date
        ? new Date(end_date).toISOString().slice(0, 10)
        : '';

      const isRecurring = is_recurring_event_local === 'true';
      const recurringType = recurringTypeOptionsMap.value[recurring_type];
      const themeValues = (themes || [])
        .map((item) => props.themes.find(({ id }) => id === item)?.name)
        .map((name) => trans(`event.theme.${name}`));

      const step1List = [
        { label: trans('event.title.label'), value: title },
        {
          label: 'Specify the format of the activity',
          value: formatValues.join(', '),
        },
        { label: trans('event.activitytype.label'), value: typeValue },
        { label: trans('event.address.label'), value: location },
        { label: 'Activity duration', value: durationValue },
        { label: 'Date', value: `${startDateValue} - ${endDateValue}` },
        {
          label: 'Is it a recurring event?',
          value: isRecurring ? 'Yes' : 'No',
        },
        {
          label: 'How frequently?',
          value: isRecurring
            ? recurringFrequentlyMap.value[recurring_event]
            : '',
        },
        { label: 'What type of recurring activity?', value: recurringType },
        { label: 'Theme?', value: themeValues.join(', ') },
        { label: 'Activity description', htmlValue: description },
      ];

      // Step 2
      const {
        audience: audiences,
        participants_count,
        males_count,
        females_count,
        other_count,
        ages,
        is_extracurricular_event,
        is_standard_school_curriculum,
        codeweek_for_all_participation_code,
        leading_teacher_tag,
        pictureUrl,
        picture,
      } = props.formValues || {};

      const audienceValues = (audiences || [])
        .map((item) => props.audiences.find(({ id }) => id === item)?.name)
        .map((name) => trans(`event.audience.${name}`));
      const participantsValue = [
        participants_count || 0,
        [
          `${males_count || 0} Males`,
          `${females_count || 0} Females`,
          `${other_count || 0} Other`,
        ].join(', '),
      ].join(' - ');
      const ageValues = (ages || []).map((item) => ageOptionsMap.value[item]);
      const teacherValues = (leading_teacher_tag || []).map(
        (item) => props.leadingTeachers.find(({ id }) => id === item)?.name
      );

      const step2List = [
        {
          label: trans('event.audience_title'),
          value: audienceValues?.join(', '),
        },
        {
          label: 'Number of participants',
          value: participantsValue,
        },
        {
          label: 'Age',
          value: ageValues?.join(', '),
        },
        {
          label: 'Is this an extracurricular activity?',
          value: is_extracurricular_event === 'true' ? 'Yes' : 'No',
        },
        {
          label: 'Is this an activity within the standard school curriculum?',
          value: is_standard_school_curriculum === 'true' ? 'Yes' : 'No',
        },
        {
          label: 'Code Week 4 All code (optional)',
          value: codeweek_for_all_participation_code,
        },
        {
          label: trans('community.titles.2'),
          value: teacherValues?.join(', '),
        },
        {
          label: trans('event.image'),
          imageUrl: pictureUrl,
          imageName: picture?.split('/')?.reverse()?.[0],
        },
      ];

      // Step 3
      const {
        organizer,
        organizer_type,
        language,
        country_iso,
        is_use_resource,
        event_url,
        contact_person,
        user_email,
      } = props.formValues || {};
      const organizerTypeValue = organizerTypeOptionsMap.value[organizer_type];

      const languageValue = Object.entries(props.languages).find(
        ([key]) => key === language
      )?.[1];
      const countryValue = props.countries.find(
        ({ iso }) => iso === country_iso
      )?.name;

      const step3List = [
        { label: trans('event.organizer.label'), value: organizer },
        {
          label: trans('event.organizertype.label'),
          value: organizerTypeValue,
        },
        {
          label: trans('resources.Languages'),
          value: languageValue,
        },
        {
          label: trans('event.country'),
          value: countryValue,
        },
        {
          label: 'Is this an activity within the standard school curriculum?',
          value: is_use_resource === 'true' ? 'Yes' : 'No',
        },
        {
          label: trans('event.website.label'),
          value: event_url,
        },
        {
          label: trans('event.public.label'),
          value: contact_person,
        },
        {
          label: trans('event.contact.label'),
          value: user_email,
        },
      ];

      return [
        { title: 'Activity overview', list: step1List },
        { title: 'Who is the activity for', list: step2List },
        { title: 'Organiser', list: step3List },
      ];
    });

    return {
      stepDataList,
    };
  },
};
</script>
