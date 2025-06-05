<template>
  <div class="flex flex-col gap-4 w-full">
    <FieldWrapper
      horizontalBreakpoint="md"
      :label="`${$t('event.audience_title')}*`"
      name="audience"
      :errors="errors"
    >
      <SelectField
        v-model="formValues.audience"
        multiple
        name="audience"
        :options="audiences"
      />
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Number of participants*"
      name="participants_count"
      :errors="errors"
    >
      <InputField
        v-model="formValues.participants_count"
        type="number"
        :min="0"
        required
        name="participants_count"
        placeholder="Enter number"
        @onBlur="handleCorrectCount('males_count')"
      />

      <template #end>
        <div
          class="w-full flex flex-col gap-4 bg-dark-blue-50 border border-dark-blue-100 rounded-2xl p-4 mt-2.5"
        >
          <label class="block text-slate-500 text-xl font-semibold mb-2">
            Of this number, how many are
          </label>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 md:gap-x-8 gap-y-4">
            <FieldWrapper label="Males" name="males_count" :errors="errors">
              <InputField
                v-model="formValues.males_count"
                type="number"
                :min="0"
                name="males_count"
                placeholder="Enter number"
                @onBlur="handleCorrectCount('males_count')"
              />
            </FieldWrapper>
            <FieldWrapper label="Females" name="females_count" :errors="errors">
              <InputField
                v-model="formValues.females_count"
                type="number"
                :min="0"
                name="females_count"
                placeholder="Enter number"
                @onBlur="handleCorrectCount('females_count')"
              />
            </FieldWrapper>
            <FieldWrapper label="Other" name="other_count" :errors="errors">
              <InputField
                v-model="formValues.other_count"
                type="number"
                :min="0"
                name="other_count"
                placeholder="Enter number"
                @onBlur="handleCorrectCount('other_count')"
              />
            </FieldWrapper>
          </div>
        </div>
      </template>
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Age*"
      name="ages"
      :errors="errors"
    >
      <SelectField
        v-model="formValues.ages"
        multiple
        name="ages"
        :options="ageOptions"
      />
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Is this an extracurricular activity?*"
      name="is_extracurricular_event"
      :errors="errors"
    >
      <div class="flex items-center gap-8 min-h-[48px] h-full">
        <RadioField
          v-model="formValues.is_extracurricular_event"
          name="is_extracurricular_event"
          value="true"
          label="Yes"
        />
        <RadioField
          v-model="formValues.is_extracurricular_event"
          name="is_extracurricular_event"
          value="false"
          label="No"
        />
      </div>
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Is this an activity within the standard school curriculum?"
      name="is_standard_school_curriculum"
      :errors="errors"
    >
      <div class="flex items-center gap-8 min-h-[48px] h-full">
        <RadioField
          v-model="formValues.is_standard_school_curriculum"
          name="is_standard_school_curriculum"
          value="true"
          label="Yes"
        />
        <RadioField
          v-model="formValues.is_standard_school_curriculum"
          name="is_standard_school_curriculum"
          value="false"
          label="No"
        />
      </div>
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      label="Code Week 4 All code (optional)"
      name="codeweek_for_all_participation_code"
      :errors="errors"
    >
      <InputField
        v-model="formValues.codeweek_for_all_participation_code"
        name="codeweek_for_all_participation_code"
      />
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      :label="`${$t('community.titles.2')} (optional)`"
      name="leading_teacher_tag"
      :errors="errors"
    >
      <SelectField
        v-model="formValues.leading_teacher_tag"
        name="leading_teacher_tag"
        :options="leadingTeachers"
      />
    </FieldWrapper>

    <FieldWrapper
      horizontalBreakpoint="md"
      :label="`${$t('event.image')} (optional)`"
      name="picture"
      :errors="errors"
    >
      <ImageField
        name="picture"
        :picture="formValues.pictureUrl"
        :image="formValues.picture"
        @onChange="onPictureChange"
      />
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
  setup(props, { emit }) {
    const { ageOptions } = useDataOptions();

    const onPictureChange = (data) => {
      props.formValues.picture = data.imageName;
      props.formValues.pictureUrl = data.path;
    };

    const handleCorrectCount = (currentField) => {
      const fields = ['males_count', 'females_count', 'other_count'];
      const [primaryField, secondaryField] = fields.filter(
        (field) => field !== currentField
      );

      const allCount = Number(props.formValues.participants_count || '0');
      const currentCount = Number(props.formValues[currentField] || '0');
      const primaryCount = Number(props.formValues[primaryField] || '0');
      const secondaryCount = Number(props.formValues[secondaryField] || '0');

      if (!currentCount && !primaryCount && !secondaryCount) {
        return;
      }

      if (currentCount > allCount) {
        props.formValues[currentField] = allCount;
        props.formValues[primaryField] = 0;
        props.formValues[secondaryField] = 0;
      } else if (currentCount + primaryCount > allCount) {
        props.formValues[primaryField] = allCount - currentCount;
        props.formValues[secondaryField] = 0;
      } else if (currentCount + primaryCount + secondaryCount > allCount) {
        props.formValues[primaryField] = primaryCount;
        props.formValues[secondaryField] = Math.max(
          allCount - currentCount - primaryCount,
          0
        );
      } else {
        props.formValues[primaryField] = allCount - currentCount - primaryCount;
        props.formValues[secondaryField] = 0;
      }
    };

    return {
      ageOptions,
      onPictureChange,
      handleCorrectCount,
    };
  },
};
</script>
