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
          :value="formValues.start_date"
          @onChange="formValues.start_date = $event"
        ></date-time>

        <span>-</span>

        <date-time
          name="end_date"
          :placeholder="$t('event.end.label')"
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
          label="True"
        />
        <RadioField
          v-model="formValues.is_recurring_event_local"
          name="is_recurring_event_local"
          value="false"
          label="False"
        />
      </div>

      <div
        v-if="formValues.is_recurring_event_local === 'true'"
        class="w-full bg-dark-blue-50 border border-dark-blue-100 rounded-2xl p-4 mt-4"
      >
        <label class="block text-slate-500 text-xl font-semibold mb-2">
          How frequently?
        </label>

        <div class="flex items-center gap-8">
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
      <div class="custom-tinymce">
        <textarea
          class="hidden"
          cols="40"
          id="id_description"
          name="description"
          :placeholder="$t('event.description.placeholder')"
          rows="10"
          @change="hanleChangeDescription"
        />
      </div>
    </FieldWrapper>
  </div>
</template>

<script>
import { computed, onMounted } from 'vue';
import { trans } from 'laravel-vue-i18n';

import FieldWrapper from '../form-fields/FieldWrapper.vue';
import SelectField from '../form-fields/SelectField.vue';
import InputField from '../form-fields/InputField.vue';
import RadioField from '../form-fields/RadioField.vue';

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
  },
  setup(props, { emit }) {
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

    const handleLocationChange = ({ location, geoposition, country_iso }) => {
      props.formValues.location = location;
      props.formValues.geoposition = geoposition;
      const foundCountry = props.countries.find(
        ({ iso }) => iso === country_iso
      );
      props.formValues.country_iso = foundCountry;
    };

    onMounted(() => {
      document.addEventListener('tinymce-ready', () => {
        tinymce.init({
          selector: '#id_description',
          height: 400,
          width: '100%',
          setup: function (editor) {
            editor.on('init', function () {
              editor.setContent(props.formValues.description || '');
            });

            editor.on('change input', function () {
              const content = editor.getContent();
              props.formValues.description = content;
              editor.save();
            });
          },
        });
      });
    });

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
