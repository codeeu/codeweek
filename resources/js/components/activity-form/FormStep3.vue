<template>
  <div class="flex flex-col gap-4 w-full">
    <FieldWrapper horizontalBreakpoint="md" :label="`${$t('event.organizer.label')}*`" name="organizer" :errors="errors">
      <InputField v-model="formValues.organizer" required name="organizer" :placeholder="$t('event.organizer.placeholder')" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="`${$t('event.organizertype.label')}*`" name="organizer_type" :errors="errors">
      <SelectField :placeholder="$t('event.select-option')" v-model="formValues.organizer_type" required name="organizer_type" :options="organizerTypeOptions" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="`${$t('resources.Languages')} (${$t('event.optional')})`" name="language" :errors="errors">
      <SelectField :placeholder="$t('event.select-option')" v-model="formValues.language" name="language" searchable multiple :options="languageOptions" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="`${$t('event.country')}*`" name="country_iso" :errors="errors">
      <SelectField :placeholder="$t('event.select-option')" v-model="formValues.country_iso" id-name="iso" searchable required name="country_iso" :options="countries" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.are-you-using-any-code-week-resources-in-this-activity')" name="is_use_resource" :errors="errors">
      <div class="flex items-center gap-8 min-h-[48px] h-full">
        <RadioField v-model="formValues.is_use_resource" name="is_use_resource" value="true" :label="$t('event.yes')" />
        <RadioField v-model="formValues.is_use_resource" name="is_use_resource" value="false" :label="$t('event.no')" />
      </div>
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="`${$t('event.website.label')} ${['open-online', 'invite-online'].includes(formValues.activity_type)
        ? '*'
        : $t('event.optional')
      }`" name="event_url" :errors="errors">
      <InputField v-model="formValues.event_url" name="event_url" :placeholder="$t('event.website.placeholder')" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="`${$t('event.public.label')} (${$t('event.optional')})`" name="contact_person" :errors="errors">
      <InputField v-model="formValues.contact_person" type="email" name="contact_person" :placeholder="$t('event.public.placeholder')" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="`${$t('event.contact.label')}*`" name="user_email" :errors="errors">
      <InputField v-model="formValues.user_email" required type="email" name="user_email" :placeholder="$t('event.contact.placeholder')" />

      <template #end>
        <div class="flex gap-2.5 mt-4 w-full">
          <img class="flex-shrink-0 w-6 h-6" src="/images/icon_info.svg" />

          <div class="mt-1 text-xs text-slate-400">
            {{ $t('event.contact.explanation') }}
          </div>
        </div>
      </template>
    </FieldWrapper>
  </div>
</template>

<script>
import { computed } from 'vue';
import { trans } from 'laravel-vue-i18n';

import { useDataOptions } from './mixins.js';

import FieldWrapper from '../form-fields/FieldWrapper.vue';
import SelectField from '../form-fields/SelectField.vue';
import InputField from '../form-fields/InputField.vue';
import RadioField from '../form-fields/RadioField.vue';
import ImageField from '../form-fields/ImageField.vue';

export default {
  props: {
    errors: Object,
    formValues: Object,
    languages: Object,
    countries: Array,
  },
  components: {
    FieldWrapper,
    SelectField,
    InputField,
    RadioField,
    ImageField,
  },
  setup(props, { emit }) {
    const { organizerTypeOptions } = useDataOptions();

    const languageOptions = computed(() =>
      Object.entries(props.languages).map(([key, value]) => ({
        id: key,
        name: value,
      }))
    );

    return {
      organizerTypeOptions,
      languageOptions,
    };
  },
};
</script>