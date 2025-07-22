<template>
  <div>
    <!-- Drop/upload area -->
    <div class="flex flex-col justify-center items-center gap-2 border-[3px] border-dashed border-dark-blue-200 w-full rounded-2xl py-12 px-8 cursor-pointer" @click="onTriggerFileInput" @dragover.prevent="onDragOver" @dragleave="onDragLeave" @drop.prevent="onDrop">
      <!-- Preview if already uploaded -->
      <div class="mb-4" :class="[!pictureClone && 'hidden']">
        <img :src="pictureClone" class="mr-1" />
      </div>

      <!-- Placeholder icon -->
      <div :class="[!!pictureClone && 'hidden']">
        <img class="w-16 h-16" src="/images/icon_image.svg" />
      </div>

      <!-- Drop/upload text -->
      <span class="text-xl text-slate-500">
        {{ $t('event.drop-your-image-here-or-upload') }}
      </span>

      <!-- Max size/formats -->
      <span class="text-xs text-slate-500">
        {{ $t('event.max-size-1mb-image-formats-jpg-png') }}
      </span>

      <input class="hidden" type="file" ref="fileInput" @change="onFileChange" />
    </div>

    <!-- Error message -->
    <div v-if="error" class="flex gap-3 mt-2.5 font-semibold item-start text-error-200">
      <img src="/images/icon_error.svg" />
      <div class="leading-5">
        {{ error }}
      </div>
    </div>

    <!-- Permissions info -->
    <div class="flex gap-2.5 mt-4 w-full">
      <img class="flex-shrink-0 w-6 h-6" src="/images/icon_info.svg" />
      <div class="mt-1 text-xs text-slate-500">
        {{ $t('event.by-submitting-images-through-this-form-you-confirm-that') }}
        <ul class="pl-4 my-4 list-disc">
          <li>{{ $t('event.you-have-obtained-all-necessary-permissions') }}</li>
          <li>
            {{ $t('event.you-will-not-submit-any-images-with-faces-directly-visible-or-identifiable') }}
            {{ $t('event.if-this-is-the-case-ensure-faces-are-blurred') }}
            {{ $t('event.submissions-that-do-not-comply-will-not-be-accepted') }}
          </li>
          <li>{{ $t('event.you-understand-and-agree-images-will-be-shared') }}</li>
        </ul>
      </div>
    </div>

    <!-- Bottom info line -->
    <div class="text-xs text-slate-500">
      {{ $t('event.info-max-size-1mb') }}
    </div>

    <Flash />
  </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import Flash, { emitter } from '../Flash.vue';

export default {
  components: { Flash },
  props: {
    name: {
      type: String,
      default: 'picture',
    },
    picture: {
      type: String,
      default: '',
    },
  },
  emits: ['onChange'],
  setup(props, { emit }) {
    const fileInput = ref(null);
    const pictureClone = ref(props.picture || '');
    const error = ref('');

    const onTriggerFileInput = () => fileInput.value?.click();
    const onDragOver = () => { };
    const onDragLeave = () => { };
    const onDrop = (e) => {
      const [file] = e.dataTransfer.files;
      if (file) persist(file);
    };
    const onFileChange = (e) => {
      const [file] = e.target.files;
      if (file) persist(file);
    };

    function persist(file) {
      const data = new FormData();
      data.append('picture', file);

      axios
        .post(`/api/events/picture`, data)
        .then((res) => {
          error.value = '';
          pictureClone.value = res.data.path;
          emitter.emit('flash', {
            message: 'Picture uploaded!',
            level: 'success',
          });
          emit('onChange', res.data);
        })
        .catch((err) => {
          const msg =
            err.response?.data?.errors?.picture?.[0] ||
            'Image is too large. Maximum is 1Mb';
          error.value = msg;
          emitter.emit('flash', { message: msg, level: 'error' });
        });
    }

    return {
      fileInput,
      pictureClone,
      error,
      onTriggerFileInput,
      onDragOver,
      onDragLeave,
      onDrop,
      onFileChange,
    };
  },
};
</script>
