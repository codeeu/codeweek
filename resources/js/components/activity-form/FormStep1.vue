<template>
  <div class="flex flex-col gap-4 w-full">
    <FieldWrapper
      horizontalBreakpoint="md"
      :label="`${$t('event.title.label')}*`"
      name="title"
      :errors="errors"
    >
      <InputField
        v-model="formValues.title"
        required
        name="title"
        :placeholder="$t('event.title.placeholder')"
      />
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Specify the format of the activity"
      name="activity_format"
      :errors="errors"
    >
      <SelectField
        v-model="formValues.activity_format"
        multiple
        name="activity_format"
        :options="activityFormatOptions"
      />
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      :label="`${$t('event.activitytype.label')}*`"
      name="activity_type"
      :errors="errors"
    >
      <SelectField
        v-model="formValues.activity_type"
        required
        name="activity_type"
        :options="activityTypeOptions"
      />

      <template #end>
        <div
          class="w-full flex gap-4 bg-dark-blue-50 border border-dark-blue-100 rounded-2xl p-4 mt-2.5"
        >
          <img class="flex-shrink-0 mt-1 w-5 h-5" src="/images/icon_info.svg" />
          <span class="text-slate-500 text-xl">
            Any address added below won’t be shown publicly for invite-only
            actitivities.
          </span>
        </div>
      </template>
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      :label="`${$t('event.address.label')} ${
        ['open-online', 'invite-online'].includes(formValues.activity_type)
          ? '(optional)'
          : '*'
      }`"
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
      ></autocomplete-geo>
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Activity duration*"
      name="duration"
      :errors="errors"
    >
      <div class="w-full md:w-1/2">
        <SelectField
          v-model="formValues.duration"
          required
          name="duration"
          :options="durationOptions"
        />
      </div>
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Date*"
      :names="['start_date', 'end_date']"
      :errors="errors"
    >
      <div
        class="w-full flex px-3 justify-between items-center text-gray-700 whitespace-nowrap rounded-3xl border-2 border-dark-blue-200 h-[50px] bg-white"
      >
        <date-time
          name="start_date"
          :placeholder="$t('event.start.label')"
          :flow="['calendar', 'time']"
          :value="formValues.start_date"
          @onChange="formValues.start_date = $event"
        ></date-time>

        <span>-</span>

        <date-time
          name="end_date"
          :placeholder="$t('event.end.label')"
          :flow="['calendar', 'time']"
          :value="formValues.end_date"
          @onChange="formValues.end_date = $event"
        ></date-time>
      </div>
    </FieldWrapper>

    <!-- new -->
    <FieldWrapper
      horizontalBreakpoint="md"
      label="Is it a recurring event?*"
      name="recurring_event"
      :errors="errors"
    >
      <div class="flex items-center gap-8 min-h-[48px]">
        <RadioField
          v-model="formValues.is_recurring_event_local"
          name="is_recurring_event_local"
          value="true"
          label="Yes"
        />
        <RadioField
          v-model="formValues.is_recurring_event_local"
          name="is_recurring_event_local"
          value="false"
          label="No"
        />
      </div>

      <div
        v-if="formValues.is_recurring_event_local === 'true'"
        class="w-full bg-dark-blue-50 border border-dark-blue-100 rounded-2xl p-4 mt-4"
      >
        <label class="block text-slate-500 text-xl font-semibold mb-2">
          How frequently?
        </label>

        <div class="flex items-center flex-wrap gap-8">
          <RadioField
            v-model="formValues.recurring_event"
            name="recurring_event"
            value="daily"
            label="Daily"
          />
          <RadioField
            v-model="formValues.recurring_event"
            name="recurring_event"
            value="weekly"
            label="Weekly"
          />
          <RadioField
            v-model="formValues.recurring_event"
            name="recurring_event"
            value="monthly"
            label="Monthly"
          />
        </div>

        <label class="block text-slate-500 text-xl font-semibold mb-2 mt-6">
          What type of recurring activity?
        </label>

        <SelectField
          v-model="formValues.recurring_type"
          name="recurring_type"
          :options="recurringTypeOptions"
        />
      </div>
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Theme*"
      name="theme"
      :errors="errors"
    >
      <SelectField
        v-model="formValues.theme"
        multiple
        required
        name="theme"
        placeholder="Select theme"
        :options="themes"
      />
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Activity description*"
      name="description"
      :errors="errors"
    >
      <TinymceField v-model="formValues.description" name="description" />
    </FieldWrapper>
  </div>
</template>

<script>
import { onMounted } from 'vue';

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
  setup(props, { emit }) {
    const {
      activityFormatOptions,
      activityTypeOptions,
      durationOptions,
      recurringTypeOptions,
    } = useDataOptions();

    const handleLocationChange = ({ location, geoposition, country_iso }) => {
      props.formValues.location = location;
      props.formValues.geoposition = geoposition;
      const foundCountry = props.countries.find(
        ({ iso }) => iso === country_iso
      );
      props.formValues.country_iso = foundCountry;
    };

    return {
      activityFormatOptions,
      activityTypeOptions,
      durationOptions,
      recurringTypeOptions,
      handleLocationChange,
    };
  },
};
</script>
