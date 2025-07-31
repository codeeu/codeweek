<template>
  <div class="flex flex-col gap-4 w-full">
    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.audiences')" name="audience" :errors="errors">
      <SelectField :placeholder="$t('event.select-option')"  v-model="formValues.audience" multiple name="audience" :options="audiences" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.number-of-participants')" name="participants_count" :errors="errors">
      <InputField v-model="formValues.participants_count" type="number" :min="0" required name="participants_count" :placeholder="$t('event.enter-number')" />
      <template #end>
        <div class="flex flex-col gap-4 p-4 mt-2.5 w-full rounded-2xl border bg-dark-blue-50 border-dark-blue-100">
          <div class="flex gap-2 p-2 mb-2 w-full bg-gray-100 rounded">
            <img class="flex-shrink-0 mt-1 w-6 h-6" src="/images/icon_info.svg" />
            <span class="text-xl text-slate-500">
              {{ $t('event.if-no-clear-information-provide-estimate') }}
            </span>
          </div>
          <label class="block mb-2 text-xl font-semibold text-slate-500">
            {{ $t('event.of-this-number-how-many-are') }}
          </label>

          <div class="grid grid-cols-1 gap-x-4 gap-y-4 md:grid-cols-2 md:gap-x-8">
            <FieldWrapper :label="$t('event.males')" name="males_count" :errors="errors">
              <InputField v-model="formValues.males_count" type="number" :min="0" name="males_count" :placeholder="$t('event.enter-number')" @onBlur="handleCorrectCount('event.males_count')" />
            </FieldWrapper>
            <FieldWrapper :label="$t('event.females')" name="females_count" :errors="errors">
              <InputField v-model="formValues.females_count" type="number" :min="0" name="females_count" :placeholder="$t('event.enter-number')" @onBlur="handleCorrectCount('event.females_count')" />
            </FieldWrapper>
            <FieldWrapper :label="$t('event.other-gender')" name="other_count" :errors="errors">
              <InputField v-model="formValues.other_count" type="number" :min="0" name="other_count" :placeholder="$t('event.enter-number')" @onBlur="handleCorrectCount('event.other_count')" />
            </FieldWrapper>
          </div>
        </div>
      </template>
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.age')" name="ages" :errors="errors">
      <SelectField :placeholder="$t('event.select-option')" v-model="formValues.ages" multiple name="ages" :options="ageOptions" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('is-this-an-extracurricular-activity')" name="is_extracurricular_event" :errors="errors">
      <div class="flex items-center gap-8 min-h-[48px] h-full">
        <RadioField v-model="formValues.is_extracurricular_event" name="is_extracurricular_event" value="true" :label="$t('event.yes')" />
        <RadioField v-model="formValues.is_extracurricular_event" name="is_extracurricular_event" value="false" :label="$t('event.no')" />
      </div>
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.is-this-an-activity-within-the-standard-school-curriculum')" name="is_standard_school_curriculum" :errors="errors">
      <div class="flex items-center gap-8 min-h-[48px] h-full">
        <RadioField v-model="formValues.is_standard_school_curriculum" name="is_standard_school_curriculum" value="true" :label="$t('event.yes')" />
        <RadioField v-model="formValues.is_standard_school_curriculum" name="is_standard_school_curriculum" value="false" :label="$t('event.no')" />
      </div>
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.code-week-4-all-code-optional')" name="codeweek_for_all_participation_code" :errors="errors">
      <InputField v-model="formValues.codeweek_for_all_participation_code" name="codeweek_for_all_participation_code" />
      <template #tooltip>
        {{ $t('event.codeweek_for_all_participation_code.explanation') }}
        <a href="/codeweek4all" target="_blank">{{ $t('event.codeweek_for_all_participation_code.link') }}</a>.
      </template>
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.leading-teachers-optional')" name="leading_teacher_tag" :errors="errors">
      <SelectField v-model="formValues.leading_teacher_tag" name="leading_teacher_tag" :options="leadingTeacherOptions" />
    </FieldWrapper>

    <FieldWrapper horizontalBreakpoint="md" :label="$t('event.image-optional')" name="picture" :errors="errors">
      <ImageField name="picture" :picture="formValues.pictureUrl" :image="formValues.picture" @onChange="onPictureChange" />
    </FieldWrapper>
  </div>
</template>

<script>
import { ref, computed } from 'vue';
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
    audiences: Array,
    leadingTeachers: Array,
  },
  components: {
    FieldWrapper,
    SelectField,
    InputField,
    RadioField,
    ImageField,
  },
  setup(props) {
    const { ageOptions } = useDataOptions();

    const leadingTeacherOptions = computed(() =>
      props.leadingTeachers.map((name) => ({ id: name, name }))
    );

    const onPictureChange = (data) => {
      props.formValues.picture = data.imageName;
      props.formValues.pictureUrl = data.path;
    };

    const handleCorrectCount = (currentField) => {
      const allCount = Number(props.formValues.participants_count || '0');
      const currentCount = Number(props.formValues[currentField] || '0');
      if (currentCount > allCount) {
        props.formValues[currentField] = allCount;
      }
    };

    return {
      leadingTeacherOptions,
      ageOptions,
      onPictureChange,
      handleCorrectCount,
    };
  },
};
</script>
