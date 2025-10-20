<template>
  <div v-if="step < 4" class="flex relative justify-center py-10 codeweek-container-lg">
    <div class="flex gap-12">
      <template v-for="(stepTitle, index) in stepTitles">
        <div class="flex relative flex-col flex-1 gap-2 items-center md:w-52" :class="[
          index === 0 && 'cursor-pointer',
          index + 1 === 2 && validStep1 && 'cursor-pointer',
          index + 1 === 3 && validStep2 && 'cursor-pointer',
        ]" @click="
            () => {
              if (index + 1 === 2 && !validStep1) return;
              if (index + 1 === 3 && !validStep2) return;
              handleMoveStep(index + 1);
            }
          ">
          <div class="w-12 h-12 rounded-full flex justify-center items-center text-['#20262C'] font-semibold text-2xl" :class="[
            step === index + 1 ? 'bg-light-blue-300' : 'bg-light-blue-100',
          ]">
            {{ index + 1 }}
          </div>
          <div class="flex-1">
            <p class="text-slate-500 font-normal text-base leading-[22px] p-0 text-center">
              {{ $t(`event.${stepTitle}`) }}
            </p>
          </div>
          <div v-if="index < stepTitles.length - 1" class="absolute top-6 left-[calc(100%+1.5rem)] -translate-x-1/2 w-[calc(100%-1rem)] md:w-[calc(100%-0.75rem)] h-[2px] bg-[#CCF0F9]"></div>
        </div>
      </template>
    </div>
  </div>

  <div v-if="step === 4" class="flex relative justify-center px-4 py-10 codeweek-container-lg md:px-10 md:py-20">
    <div class="flex flex-col justify-center items-center text-center gap-4 max-w-[660px]">
      <div class="flex justify-center items-center w-16 h-16 rounded-full bg-dark-blue">
        <img class="w-6" src="/images/check-white.svg" />
      </div>

      <div class="text-dark-blue text-[22px] md:text-4xl font-semibold font-[Montserrat]">
        {{
          event
            ? $t('event.your-changes-have-been-saved')
            : $t('event.thank-you-for-adding-your-activity')
        }}
      </div>

      <div v-if="!event" class="flex flex-col gap-4 text-[16px] text-center">
        <div>
          {{ $t('event.one-of-the-ambassadors-or-organisers-will-review-your-activity', { title: formValues.title }) }}
        </div>
        <div>
          {{ $t('event.you-can-share-your-code-week-4-all-code-with-other-people') }}
          {{ formValues.codeweek_for_all_participation_code }}
        </div>
        <div>{{ $t('event.see-the-information-you-supplied-below') }}</div>
      </div>
    </div>
  </div>

  <div ref="containerRef" class="relative w-full">
    <div class="absolute w-full h-full bg-gray-10 md:hidden" style="clip-path: ellipse(370% 90% at 38% 90%)"></div>
    <div class="hidden absolute w-full h-full bg-gray-10 md:block lg:hidden" style="clip-path: ellipse(488% 90% at 50% 90%)"></div>
    <div class="hidden absolute w-full h-full bg-gray-10 lg:block xl:hidden" style="clip-path: ellipse(188% 90% at 50% 90%)"></div>
    <div class="hidden absolute w-full h-full bg-gray-10 xl:block" style="clip-path: ellipse(158% 90% at 50% 90%)"></div>

    <div class="relative pt-20 pb-16 codeweek-container-lg md:pt-32 md:pb-20">
      <div class="flex justify-center">
        <div class="flex flex-col max-w-[852px] w-full">
          <h2 v-if="stepTitles[step - 1]" class="text-dark-blue text-2xl md:text-4xl leading-[44px] font-medium font-['Montserrat'] mb-10 text-center">
            {{ $t(`event.${stepTitles[step - 1]}`) }}
          </h2>

          <div :class="[step !== 1 && 'hidden']">
            <FormStep1 :errors="errors" :formValues="formValues" :themes="themes" :location="location" :countries="countries" />
          </div>
          <div :class="[step !== 2 && 'hidden']">
            <FormStep2 :errors="errors" :formValues="formValues" :audiences="audiences" :leadingTeachers="leadingTeachers" />
          </div>
          <div :class="[step !== 3 && 'hidden']">
            <FormStep3 :errors="errors" :formValues="formValues" :languages="languages" :countries="countries" />

            <CheckboxField class="mt-10" v-model="formValues.privacy" name="privacy">
              <div>
                <span>{{ $t('event.privacy') }}</span>
                <a class="ml-1 !inline cookweek-link" :href="privacyLink" target="_blank">
                  {{ $t('event.privacy-policy-terms') }}
                </a>
              </div>
            </CheckboxField>
          </div>

          <div :class="[step !== 4 && 'hidden']">
            <AddConfirmation :formValues="formValues" :themes="themes" :location="location" :audiences="audiences" :leadingTeachers="leadingTeachers" :languages="languages" :countries="countries" />
          </div>

          <div class="flex flex-wrap gap-y-2 gap-x-4 justify-between mt-10 min-h-12">
            <button v-if="step > 1" class="flex justify-center items-center gap-2 text-[#1C4DA1] border-solid border-2 border-[#1C4DA1] rounded-full py-2.5 px-6 font-semibold text-lg transition-all duration-300 hover:bg-[#E8EDF6] max-sm:w-full sm:min-w-[224px]" type="button" @click="
              () => {
                if (step === 4) handleGoToActivity();
                else handleMoveStep(step - 1);
              }
            ">
              <span v-if="step === 4">{{ $t('event.view-activity') }}</span>
              <span v-else>{{ $t('event.previous-step') }}</span>
            </button>

            <div class="hidden md:block" />

            <div id="footer-scroll-activity" class="flex justify-center max-sm:w-full sm:min-w-[224px]" :class="[
              step < 4 && !pageFooterVisible
                ? 'md:!translate-y-0 max-md:fixed max-md:bottom-0 max-md:left-0 max-md:border-t-2 max-md:border-primary max-md:py-4 max-md:px-[44px] max-md:w-full max-md:bg-white max-md:z-[99]'
                : '!translate-y-0',
            ]">
              <button class="text-nowrap flex justify-center items-center duration-300 rounded-full py-2.5 px-6 font-semibold text-lg max-sm:w-full sm:min-w-[224px]" type="button" :disabled="disableNextbutton || isSubmitting" :class="[
                disableNextbutton || isSubmitting
                  ? 'cursor-not-allowed bg-gray-200 text-gray-400'
                  : 'bg-primary hover:bg-hover-orange text-[#20262C]',
              ]" 
              @click="handleNextClick"
              >
              <template v-if="isSubmitting">
                <span>{{ $t('event.submitting') }}...</span>
              </template>
              <template v-else-if="step === 4">
                <span v-if="event?.id">{{ $t('event.back-to-map-page') }}</span>
                <span v-else>{{ $t('event.add-another-activity') }}</span>
              </template>
              <span v-else-if="step === 3">{{ $t('event.submit') }}</span>
              <span v-else>{{ $t('event.next-step') }}</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, watch, computed, onMounted } from 'vue';
import axios from 'axios';
import _ from 'lodash';

import { useDataOptions } from './mixins.js';

import FormStep1 from './FormStep1.vue';
import FormStep2 from './FormStep2.vue';
import FormStep3 from './FormStep3.vue';
import AddConfirmation from './AddConfirmation.vue';
import CheckboxField from '../form-fields/CheckboxField.vue';

export default {
  props: {
    token: {
      type: String,
      default: '',
    },
    event: {
      type: Object,
      default: () => ({}),
    },
    selectedValues: {
      type: Object,
      default: () => ({}),
    },
    locale: {
      type: String,
      default: '',
    },
    user: {
      type: Object,
      default: () => ({}),
    },
    themes: {
      type: Array,
      default: () => [],
    },
    audiences: {
      type: Array,
      default: () => [],
    },
    leadingTeachers: {
      type: Array,
      default: () => [],
    },
    languages: {
      type: Object,
      default: () => ({}),
    },
    countries: {
      type: Array,
      default: () => [],
    },
    location: {
      type: Object,
      default: () => ({}),
    },
    privacyLink: {
      type: String,
      default: '',
    },
  },
  components: {
    FormStep1,
    FormStep2,
    FormStep3,
    AddConfirmation,
    CheckboxField,
  },
  setup(props, { emit }) {
    // console.log('event', props.event);
    const { stepTitles } = useDataOptions();

    const newEvent = ref(null);
    const containerRef = ref(null);
    const step = ref(1);
    const errors = ref({});
    const pageFooterVisible = ref(false);
    const isSubmitting = ref(false);

    const defaultFormValues = ref({
      // step 1
      activity_type: 'open-in-person',
      location: props.location?.location || '',
      geoposition: props.location?.geoposition?.split(',') || [],
      is_recurring_event_local: 'false',
      recurring_event: 'daily',

      // step 2
      is_extracurricular_event: 'false',
      is_standard_school_curriculum: 'false',

      // step 3,
      organizer: props.location?.name || '',
      organizer_type: props?.location?.organizer_type || '',
      language: props.locale ? [props.locale] : [],
      country_iso: props.location.country_iso || '',
      is_use_resource: 'false',
      privacy: false,
    });
    const formValues = ref(_.clone(defaultFormValues.value));

    const handleNextClick = async () => {
      if (isSubmitting.value) return;

      if (step.value === 4) {
        if (props.event?.id) handleGoMapPage();
        else handleReloadPage();
        return;
      }
      
      console.log(validStep3.value);
      if (step.value === 3 && validStep3.value) {
        isSubmitting.value = true;
        try {
          await handleSubmit();
        } finally {
          isSubmitting.value = false;
        }
        return;
      }
      
      if (step.value === 2 && validStep2.value) {
        handleMoveStep(3);
        return;
      }

      if (step.value === 1 && validStep1.value) {
        handleMoveStep(2);
        return;
      }
    };

    const validStep1 = computed(() => {
      const data = _.cloneDeep(formValues.value);

      const requiredFields = [
        'title',
        'activity_type',
        'duration',
        'is_recurring_event_local',
        'start_date',
        'end_date',
        'theme',
        'description',
      ];

      if (!['open-online', 'invite-online'].includes(data.activity_type)) {
        requiredFields.push('location');
      }

      return requiredFields.every((field) => !_.isEmpty(data[field]));
    });

    const validStep2 = computed(() => {
      const data = _.cloneDeep(formValues.value);

      const requiredFields = ['audience', 'ages', 'is_extracurricular_event'];

      return (
        !!data.participants_count &&
        requiredFields.every((field) => !_.isEmpty(data[field]))
      );
    });

    const validStep3 = computed(() => {
      const data = _.cloneDeep(formValues.value);

      const requiredFields = [
        'organizer',
        'organizer_type',
        'country_iso',
        'user_email',
      ];

      if (['open-online', 'invite-online'].includes(data.activity_type)) {
        requiredFields.push('event_url');
      }

      if (!data.privacy) {
        return false;
      }

      return requiredFields.every((field) => !_.isEmpty(data[field]));
    });

    const disableNextbutton = computed(() => {
      if (step.value === 1 && !validStep1.value) return true;
      if (step.value === 2 && !validStep2.value) return true;
      if (step.value === 3 && !validStep3.value) return true;
      return false;
    });

    const handleMoveStep = (newStep) => {
      step.value = Math.max(Math.min(newStep, 4), 1);
    };

    const handleGoToActivity = () => {
      const eventId = props?.event?.id || newEvent.value?.id;
      const eventSlug = props?.event?.slug || newEvent.value?.slug;
      window.location.href = `/view/${eventId}/${eventSlug}`;
    };
    const handleGoMapPage = () => (window.location.href = '/events');
    const handleReloadPage = () => window.location.reload();

    const handleSubmit = async () => {
      errors.value = {};

      const values = formValues.value;
      const payload = {
        _token: props.token,
        _method: !_.isNil(props.event.id) ? 'PATCH' : undefined,
        // step 1
        title: values.title,
        activity_format: values.activity_format?.join(','),
        activity_type: values.activity_type,
        location: values.location,
        geoposition: values.geoposition?.join(',') || [],
        duration: values.duration,
        start_date: values.start_date,
        end_date: values.end_date,
        theme: values.theme?.join(','),
        description: values.description,
        // step 2
        audience: values.audience?.join(','),
        participants_count: values.participants_count,
        males_count: values.males_count,
        females_count: values.females_count,
        other_count: values.other_count,
        ages: values.ages?.join(','),
        is_extracurricular_event: values.is_extracurricular_event === 'true',
        is_standard_school_curriculum:
          values.is_standard_school_curriculum === 'true',
        codeweek_for_all_participation_code:
          values.codeweek_for_all_participation_code,
        leading_teacher_tag: values.leading_teacher_tag,
        picture: values.picture,
        // step 3,
        organizer: values.organizer,
        organizer_type: values.organizer_type,
        language: values.language,
        country_iso: values.country_iso,
        is_use_resource: values.is_use_resource === 'true',
        event_url: values.event_url,
        contact_person: values.contact_person,
        user_email: values.user_email,
        privacy: values.privacy === true ? 'on' : undefined,
      };

      if (values.is_recurring_event_local === 'true') {
        payload.recurring_event = values.recurring_event;
        payload.recurring_type = values.recurring_type;
      }

      try {
        if (!_.isNil(props.event.id)) {
          await axios.post(`/events/${props.event.id}`, payload);
        } else {
          const { data } = await axios.post('/events', payload);
          newEvent.value = data.event;
        }
        handleMoveStep(4);
      } catch (error) {
        errors.value = error.response?.data?.errors;
        step.value = 1;
      }
      finally {
        isSubmitting.value = false;
      }
    };

    watch(
      () => props.event,
      () => {
        if (!props.event.id) return;

        const mapIds = (items) =>
          items
            ?.split(',')
            ?.filter((i) => !!i)
            ?.map((id) => Number(id)) || [];

        const event = props.event;
        const geoposition = event.geoposition || props.location?.geoposition;
        formValues.value = {
          ...formValues.value,
          // step 1
          title: event.title,
          activity_format: event.activity_format,
          activity_type: event.activity_type || 'open-in-person',
          location: event.location || props.location?.location,
          geoposition: geoposition?.split(','),
          duration: event.duration,
          start_date: event.start_date,
          end_date: event.end_date,
          recurring_event: event.recurring_event || 'daily',
          recurring_type: event.recurring_type,
          theme: mapIds(props.selectedValues.themes),
          description: event.description,

          // step 2
          audience: mapIds(props.selectedValues.audiences),
          participants_count: event.participants_count,
          males_count: event.males_count,
          females_count: event.females_count,
          other_count: event.other_count,
          ages: event.ages,
          is_extracurricular_event: String(!!event.is_extracurricular_event),
          is_standard_school_curriculum: String(
            !!event.is_standard_school_curriculum
          ),
          codeweek_for_all_participation_code:
            event.codeweek_for_all_participation_code,
          leading_teacher_tag: event.leading_teacher_tag,
          picture: event.picture,
          pictureUrl: props.selectedValues.picture,

          // step 3,
          organizer: event.organizer || props.location?.name,
          organizer_type:
            event.organizer_type || props?.location?.organizer_type,
          language: event.languages || [props.locale],
          country_iso: event.country_iso || props.location.country_iso,
          is_use_resource: String(!!event.is_use_resource),
          event_url: event.event_url,
          contact_person: event.contact_person,
          user_email: event.user_email,
        };

        if (event.recurring_event) {
          formValues.value.is_recurring_event_local = 'true';
        }
      },
      { immediate: true }
    );

    watch(
      () => step.value,
      () => {
        if (step.value === 4) {
          const heroElement = document.getElementById('add-event-hero-section');
          if (heroElement) heroElement.style.display = 'none';
          window.scrollTo({ top: 0 });
        } else if (containerRef.value) {
          const offsetTop = containerRef.value.getBoundingClientRect().top;
          window.scrollTo({ top: offsetTop + window.pageYOffset - 40 });
        }
      }
    );

    onMounted(() => {
      const observer = new IntersectionObserver(([entry]) => {
        pageFooterVisible.value = entry.isIntersecting;
      });
      const footer = document.getElementById('page-footer');
      if (footer) {
        observer.observe(footer);
      }
    });

    return {
      containerRef,
      step,
      stepTitles,
      errors,
      formValues,
      handleGoToActivity,
      handleGoMapPage,
      handleReloadPage,
      handleMoveStep,
      handleSubmit,

      disableNextbutton,
      validStep1,
      validStep2,
      validStep3,

      pageFooterVisible,
      handleNextClick,
      isSubmitting
    };
  },
};
</script>
