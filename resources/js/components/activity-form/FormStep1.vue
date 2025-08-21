<template>
  <div class="flex flex-col gap-4 w-full">
    <FieldWrapper horizontalBreakpoint="md" :label="`${$t('event.title.label')}*`" name="title" :errors="errors">
      <InputField v-model="formValues.title" required name="title" :placeholder="$t('event.title.placeholder')" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.specify-the-format-of-the-activity')" name="activity_format" :errors="errors">
      <SelectField v-model="formValues.activity_format" multiple name="activity_format" :options="activityFormatOptions" :placeholder="$t('event.select-option')" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="`${$t('event.activitytype.label')}*`" name="activity_type" :errors="errors">
      <SelectField v-model="formValues.activity_type" required name="activity_type" :options="activityTypeOptions" />

      <template #end>
        <div class="flex gap-4 p-4 mt-2.5 w-full rounded-2xl border bg-dark-blue-50 border-dark-blue-100">
          <img class="flex-shrink-0 mt-1 w-6 h-6" src="/images/icon_info.svg" />
          <span class="text-xl text-slate-500">
             {{ $t('event.if-no-clear-information-provide-estimate') }}
          </span>
        </div>
      </template>
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      :label="`${$t('event.address.label')} ${['open-online','invite-online'].includes(formValues.activity_type) ? '(optional)' : '*'}`"
      name="location"
      :errors="errors"
    >
      <autocomplete-geo
        class="custom-geo-input"
        name="location"
        :placeholder="$t('event.address.placeholder')"
        :location="formValues.location"
        :value="formValues.location"
        :geoposition="formValues.geoposition"
        @onChange="handleLocationChange"
        @input="handleLocationTyping"
        @clear="handleLocationClear"
      ></autocomplete-geo>

      <template #end>
        <div v-if="showSelectHint" class="text-sm text-slate-500 mt-2">
          {{ $t('event.please-select-address-from-dropdown') }}
        </div>
      </template>
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.activity-duration')" name="duration" :errors="errors">
      <div class="w-full md:w-1/2">
        <SelectField v-model="formValues.duration" required name="duration" :options="durationOptions" :placeholder="$t('event.select-option')" />
      </div>
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.date')" :names="['start_date', 'end_date']" :errors="errors">
      <div class="w-full flex px-3 justify-between items-center text-gray-700 whitespace-nowrap rounded-3xl border-2 border-dark-blue-200 h-[50px] bg-white">
        <date-time name="start_date" :placeholder="$t('event.start.label')" :flow="['calendar', 'time']" :value="formValues.start_date" @onChange="formValues.start_date = $event" />
        <span>-</span>
        <date-time name="end_date" :placeholder="$t('event.end.label')" :flow="['calendar', 'time']" :value="formValues.end_date" @onChange="formValues.end_date = $event" />
      </div>
    </FieldWrapper>

    <!-- new -->
    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.is-it-a-recurring-event')" name="is_recurring_event_local" :errors="errors">
      <div class="flex items-center gap-8 min-h-[48px]">
        <RadioField v-model="formValues.is_recurring_event_local" name="is_recurring_event_local" value="true" :label="$t('event.true')" />
        <RadioField v-model="formValues.is_recurring_event_local" name="is_recurring_event_local" value="false" :label="$t('event.false')" />
      </div>

      <div v-if="formValues.is_recurring_event_local === 'true'" class="p-4 mt-4 w-full rounded-2xl border bg-dark-blue-50 border-dark-blue-100">
        <label class="block mb-2 text-xl font-semibold text-slate-500">
          {{ $t('event.how-frequently') }}
        </label>

        <div class="flex flex-wrap gap-8 items-center">
          <RadioField v-model="formValues.recurring_event" name="recurring_event" value="daily" :label="$t('event.daily')" />
          <RadioField v-model="formValues.recurring_event" name="recurring_event" value="weekly" :label="$t('event.weekly')" />
          <RadioField v-model="formValues.recurring_event" name="recurring_event" value="monthly" :label="$t('event.monthly')" />
        </div>

        <label class="block mt-6 mb-2 text-xl font-semibold text-slate-500">
          {{ $t('event.what-type-of-recurring-activity') }}
        </label>

        <SelectField v-model="formValues.recurring_type" name="recurring_type" :options="recurringTypeOptions" />
      </div>
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.theme-title')" name="theme" :errors="errors">
      <SelectField v-model="formValues.theme" multiple required name="theme" :placeholder="$t('event.select-theme')" :options="themes" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.activity-description')" name="description" :errors="errors">
      <TinymceField v-model="formValues.description" name="description" />
    </FieldWrapper>
  </div>
</template>

<script>
import { computed } from 'vue';

import { useDataOptions } from './mixins.js';

import FieldWrapper from '../form-fields/FieldWrapper.vue';
import SelectField from '../form-fields/SelectField.vue';
import InputField from '../form-fields/InputField.vue';
import RadioField from '../form-fields/RadioField.vue';
import TinymceField from '../form-fields/TinymceField.vue';

export default {
  props: {
    errors: Object,
    formValues: Object,
    themes: Array,
    location: Object,
    countries: Array,
  },
  components: {
    FieldWrapper,
    SelectField,
    InputField,
    RadioField,
    TinymceField,
  },
  setup(props) {
    const {
      activityFormatOptions,
      activityTypeOptions,
      durationOptions,
      recurringTypeOptions,
    } = useDataOptions();

    const showSelectHint = computed(() => {
      const isOnline = ['open-online','invite-online'].includes(props.formValues.activity_type);
      return !isOnline && props.formValues.locationDirty === true && props.formValues.locationSelected === false;
    });
    
    const handleLocationTyping = (text) => {
      props.formValues.location = text ?? '';
      props.formValues.locationDirty = true;
      props.formValues.locationSelected = false;
    };
    
    const handleLocationClear = () => {
      props.formValues.location = '';
      props.formValues.locationDirty = true;
      props.formValues.locationSelected = false;
    };
    
    const handleLocationChange = ({ location, geoposition, country_iso }) => {
      props.formValues.location = location || '';
      props.formValues.geoposition = geoposition;
      props.formValues.country_iso = country_iso;
      props.formValues.locationSelected = true;
      props.formValues.locationDirty = true;
    };

    return {
      activityFormatOptions,
      activityTypeOptions,
      durationOptions,
      recurringTypeOptions,

      // UX hint
      showSelectHint,
      handleLocationTyping,
      handleLocationClear,
      handleLocationChange,
    };
  },
};
</script>
