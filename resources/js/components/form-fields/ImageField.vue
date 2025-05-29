<template>
  <div>
    <div v-if="pictureClone" class="mb-4">
      <img :src="pictureClone" class="mr-1" />
    </div>

    <form method="POST" enctype="multipart/form-data">
      <div
        class="flex flex-col justify-center items-center gap-2 border-[3px] border-dashed border-dark-blue-200 w-full rounded-2xl py-12 px-8 cursor-pointer"
        @click="onTriggerFileInput"
        @dragover.prevent="onDragOver"
        @dragleave="onDragLeave"
        @drop.prevent="onDrop"
      >
        <img class="w-16 h-16" src="/images/icon_image.svg" />

        <span class="text-xl text-slate-500">
          Drop your image here, or
          <span class="text-dark-blue font-semibold underline">upload</span>
        </span>

        <span class="text-xs text-slate-500">
          Max size: 1 Mb, Image formats: .jpg, png
        </span>

        <input
          class="hidden"
          type="file"
          ref="fileInput"
          @change="onFileChange"
        />
      </div>

      <div
        v-if="error"
        class="flex item-start gap-3 text-error-200 font-semibold mt-2.5 empty:hidden"
      >
        <img src="/images/icon_error.svg" />
        <div class="leading-5">
          {{ error }}
        </div>
      </div>
    </form>

    <div class="w-full flex gap-2.5 mt-4">
      <img class="flex-shrink-0 w-6 h-6" src="/images/icon_info.svg" />

      <div class="text-slate-500 text-xs mt-1">
        By submitting images through this form, you confirm that:
        <ul class="list-disc pl-4 my-4">
          <li>
            You have obtained all necessary permissions from the school,
            organisation, and/or parents/guardians of the children and the
            adults appearing in the photos.
          </li>
          <li>
            You will not submit any images in which the faces of children are
            directly visible or identifiable. If this is the case, please ensure
            that the children's faces are appropriately blurred. Submissions
            that do not comply will not be accepted.
          </li>
          <li>
            You understand and agree that these images will be shared on our
            website along with the description of the activity and may be use
            for promotional purposes.
          </li>
        </ul>
      </div>
    </div>

    <div class="text-xs text-slate-500"><b>Info</b>: Max size: 1MB</div>

    <Flash />
  </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import ImageUpload from '../ImageUpload.vue';
import Flash, { emitter } from '../Flash.vue';

export default {
  components: { ImageUpload, Flash },
  props: {
    name: {
      type: String,
      default: 'picture',
    },
    image: {
      type: String,
      default: '',
    },
    picture: {
      type: String,
      default: '',
    },
  },
  emits: ['onChange'],
  setup(props, { emit }) {
    const isDragOver = ref(false);
    const fileInput = ref(null);

    const pictureClone = ref(props.picture || '');
    const imageClone = ref(props.image || '');
    const error = ref('');

    const onTriggerFileInput = () => {
      fileInput.value?.click();
    };

    const onDragOver = () => {
      isDragOver.value = true;
    };

    const onDragLeave = () => {
      isDragOver.value = false;
    };

    const onDrop = (event) => {
      isDragOver.value = false;
      const [file] = event.dataTransfer.files;
      if (file) persist(file);
    };

    const onFileChange = (event) => {
      const [file] = event.target.files;
      if (file) persist(file);
    };

    const persist = (picture) => {
      let data = new FormData();
      data.append('picture', picture);

      axios
        .post(`/api/events/picture`, data)
        .then((result) => {
          error.value = '';
          pictureClone.value = result.data.path;
          imageClone.value = result.data.imageName;
          emitter.emit('flash', {
            message: 'Picture uploaded!',
            level: 'success',
          });
          emit('onChange', result.data);
        })
        .catch((err) => {
          if (err.response.data.errors && err.response.data.errors.picture) {
            error.value = err.response.data.errors.picture[0];
          } else {
            error.value = 'Image is too large. Maximum is 1Mb';
          }
          emitter.emit('flash', { message: error.value, level: 'error' });
        });
    };

    return {
      fileInput,
      pictureClone,
      imageClone,
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
