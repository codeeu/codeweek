<template>
  <div class="flex flex-col gap-12 w-full">
    <div v-for="{ title, list } in stepDataList" class="flex flex-col gap-6">
      <h2 class="text-dark-blue text-2xl md:text-[30px] leading-[44px] font-medium font-['Montserrat'] text-center">
        {{ title }}
      </h2>

      <div class="flex flex-col gap-1">
        <div v-for="{ label, value, htmlValue, imageUrl, imageName } in list" class="flex gap-10 items-center px-4 py-2 text-[16px] md:text-xl text-slate-500 bg-white">
          <div class="flex-shrink-0 w-32 md:w-60">{{ label }}</div>
          <div v-if="htmlValue" v-html="htmlValue" class="flex-grow w-full space-y-2 [&_p]:py-0" />
          <div v-if="imageUrl">
            <div class="mb-2">{{ trans('event.image-attached') }}</div>
            <img class="mb-2 max-h-80" :src="imageUrl" />
            <div>{{ imageName }}</div>
          </div>
          <div v-if="value" class="flex-grow w-full">{{ value || '' }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { trans } from 'laravel-vue-i18n';
</script>

<script>

import { computed } from 'vue';
import _ from 'lodash';
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
  setup(props) {
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
        theme,
        description,
        audience,
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
        organizer,
        organizer_type,
        language,
        country_iso,
        is_use_resource,
        event_url,
        contact_person,
        user_email,
      } = props.formValues || {};

      const formatValues = (activity_format || []).map(item => activityFormatOptionsMap.value[item]);
      const typeValue = activityTypeOptionsMap.value[activity_type];
      const durationValue = durationOptionsMap.value[duration];
      const startDateValue = start_date ? new Date(start_date).toISOString().slice(0, 10) : '';
      const endDateValue = end_date ? new Date(end_date).toISOString().slice(0, 10) : '';
      const isRecurring = is_recurring_event_local === 'true';
      const recurringType = recurringTypeOptionsMap.value[recurring_type];
      const themeValues = (theme || []).map(id => props.themes.find(t => t.id === id)?.name).map(name => trans(`event.theme.${name}`));

      const step1List = [
        { label: trans('event.title.label'), value: title },
        { label: trans('event.specify-the-format-of-the-activity'), value: formatValues.join(', ') },
        { label: trans('event.activitytype.label'), value: typeValue },
        { label: trans('event.address.label'), value: location },
        { label: trans('event.activity-duration'), value: durationValue },
        { label: trans('event.date'), value: `${startDateValue} - ${endDateValue}` },
        { label: trans('event.is-it-a-recurring-event'), value: isRecurring ? trans('event.yes') : trans('event.no') },
        { label: trans('event.how-frequently'), value: isRecurring ? recurringFrequentlyMap.value[recurring_event] : '' },
        { label: trans('event.what-type-of-recurring-activity'), value: recurringType },
        { label: trans('event.theme-title'), value: themeValues.join(', ') },
        { label: trans('event.activity-description'), htmlValue: description },
      ];
      
      const audienceValues = (audience || [])
        .map(item => props.audiences.find(({ id }) => id === item))
        .filter(aud => aud)
        .map(aud => aud.name);

      const participantsValue = [
        participants_count || 0,
        [
          `${males_count || 0} ${trans('event.males')}`,
          `${females_count || 0} ${trans('event.females')}`,
          `${other_count || 0} ${trans('event.other-gender')}`,
        ].join(', '),
      ].join(' - ');
      const ageValues = (ages || []).map(item => ageOptionsMap.value[item]);

      const step2List = [
        { label: trans('event.audience_title'), value: audienceValues?.join(', ') },
        { label: trans('event.number-of-participants'), value: participantsValue },
        { label: trans('event.age'), value: ageValues?.join(', ') },
        { label: trans('event.is-this-an-extracurricular-activity'), value: is_extracurricular_event === 'true' ? trans('event.yes') : trans('event.no') },
        { label: trans('event.is-this-an-activity-within-the-standard-school-curriculum'), value: is_standard_school_curriculum === 'true' ? trans('event.yes') : trans('event.no') },
        { label: trans('event.code-week-4-all-code-optional'), value: codeweek_for_all_participation_code },
        { label: trans('community.titles.2'), value: leading_teacher_tag },
        { label: trans('event.image'), imageUrl: pictureUrl, imageName: picture?.split('/')?.reverse()?.[0] },
      ];

      const organizerTypeValue = organizerTypeOptionsMap.value[organizer_type];
      const languageValues = language?.map((lang) => props.languages?.[lang]).filter(Boolean);
      const countryValue = props.countries.find(({ iso }) => iso === country_iso)?.name;

      const step3List = [
        { label: trans('event.organizer.label'), value: organizer },
        { label: trans('event.organizertype.label'), value: organizerTypeValue },
        { label: trans('resources.Languages'), value: languageValues?.join(', ') },
        { label: trans('event.country'), value: countryValue },
        { label: trans('event.are-you-using-any-code-week-resources-in-this-activity'), value: is_use_resource === 'true' ? trans('event.yes') : trans('event.no') },
        { label: trans('event.website.label'), value: event_url },
        { label: trans('event.public.label'), value: contact_person },
        { label: trans('event.contact.label'), value: user_email },
      ];

      const filterValidItem = ({ value, htmlValue, imageUrl }) => {
        return (!_.isNil(value) && !_.isEmpty(value)) || !_.isEmpty(htmlValue) || !_.isEmpty(imageUrl);
      };

      return [
        { title: trans('event.confirmation_step.activity_overview'), list: step1List.filter(filterValidItem) },
        { title: trans('event.confirmation_step.who_is_the_activity_for'), list: step2List.filter(filterValidItem) },
        { title: trans('event.confirmation_step.organiser'), list: step3List.filter(filterValidItem) },
      ];
    });

    return {
      stepDataList,
    };
  },
};
</script>
