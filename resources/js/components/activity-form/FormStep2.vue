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
      />

      <template #end>
        <div
          class="w-full flex flex-col gap-4 bg-dark-blue-50 border border-dark-blue-100 rounded-2xl p-4 mt-2.5"
        >
          <div class="w-full flex gap-2 bg-gray-100 rounded p-2 mb-2">
            <img
              class="flex-shrink-0 mt-1 w-6 h-6"
              src="/images/icon_info.svg"
            />
            <span class="text-slate-500 text-xl">
              If you do not have clear information, please provide an estimate.
            </span>
          </div>
          <label class="block text-slate-500 text-xl font-semibold mb-2">
            Of this number, how many are
          </label>

          <div
            class="grid grid-cols-1 md:grid-cols-2 gap-x-4 md:gap-x-8 gap-y-4"
          >
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
      <template #tooltip>
        If you have received a Code Week 4 All code from a school colleague or a
        friend, paste it here. Otherwise, please leave it blank. More info about
        Code Week 4 All is available
        <a href="/codeweek4all" target="_blank"> here</a>.
      </template>
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
        :options="leadingTeacherOptions"
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
