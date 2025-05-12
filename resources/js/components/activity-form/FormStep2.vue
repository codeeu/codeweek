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
        min="1"
        required
        name="participants_count"
        placeholder="Enter number"
      />

      <template #end>
        <div
          class="w-full flex flex-col gap-4 bg-dark-blue-50 border border-dark-blue-100 rounded-2xl p-4 mt-2.5"
        >
          <label class="block text-slate-500 text-xl font-semibold mb-2">
            Of this number, how many are
          </label>

          <div class="grid grid-cols-2 gap-x-8 gap-y-4">
            <FieldWrapper label="Males" name="males_count" :errors="errors">
              <InputField
                v-model="formValues.males_count"
                type="number"
                min="1"
                name="males_count"
                placeholder="Enter number"
              />
            </FieldWrapper>
            <FieldWrapper label="Females" name="females_count" :errors="errors">
              <InputField
                v-model="formValues.females_count"
                type="number"
                min="1"
                name="females_count"
                placeholder="Enter number"
              />
            </FieldWrapper>
            <FieldWrapper label="Other" name="other_count" :errors="errors">
              <InputField
                v-model="formValues.other_count"
                type="number"
                min="1"
                name="other_count"
                placeholder="Enter number"
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
      <div class="w-1/2">
        <SelectField
          v-model="formValues.ages"
          multiple
          name="ages"
          :options="ageOptions"
        />
      </div>
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
          label="True"
        />
        <RadioField
          v-model="formValues.is_extracurricular_event"
          name="is_extracurricular_event"
          value="false"
          label="False"
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
          label="True"
        />
        <RadioField
          v-model="formValues.is_standard_school_curriculum"
          name="is_standard_school_curriculum"
          value="false"
          label="False"
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
import { computed } from 'vue';

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
    const ageOptions = computed(() => [
      { id: 'under-5', name: 'Under 5 - Early learners' },
      { id: '6-9', name: '6-9 - Primary' },
      { id: '10-12', name: '10-12 - Upper primary' },
      { id: '13-15', name: '13-15 - Lower secondary' },
      { id: '16-18', name: '16-18 - Upper secondary' },
      { id: '19-25', name: '19-25 - Young Adults' },
      { id: 'over-25', name: 'Over 25 - Adults' },
    ]);

    const onPictureChange = ({ imageName }) => {
      props.formValues.picture = imageName;
    };

    return {
      ageOptions,
      onPictureChange,
    };
  },
};
</script>
