<template>
  <div class="flex flex-col self-stretch w-full mt-8">
    <div class="flex flex-col items-center justify-center w-full px-8 py-12 border-2 border-dashed rounded-2xl border-neutral-200 max-md:px-5">
      <div class="relative flex items-start justify-center w-16 gap-3">
        <!-- Conditional rendering: Display SVG or uploaded image -->
        <div v-if="!pictureClone">
          <!-- Placeholder SVG -->
          <svg width="64" height="65" viewBox="0 0 64 65" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M32 64.399C49.6728 64.399 63.9995 50.0724 63.9995 32.3995C63.9995 14.7267 49.6728 0.400024 32 0.400024C14.3272 0.400024 0.000488281 14.7267 0.000488281 32.3995C0.000488281 50.0724 14.3272 64.399 32 64.399Z" fill="#F95C22"/>
            <path d="M32.1091 46.2626C26.9007 46.2626 21.6923 46.2626 16.4838 46.2626C16.2294 46.2626 15.9717 46.2626 15.7162 46.2357C14.4123 46.1114 13.8881 45.2142 14.4441 44.0011C14.9266 42.9538 15.453 41.9333 15.964 40.8972C18.3767 36.0187 20.7893 31.1409 23.202 26.2638C23.2766 26.1149 23.3544 25.9659 23.4411 25.8236C24.0486 24.8289 25.0356 24.6889 25.8131 25.5469C26.3615 26.1473 26.8254 26.8217 27.3145 27.4724C29.8002 30.7903 32.286 34.1096 34.7718 37.4304C35.8575 38.8754 37.225 38.9538 38.5004 37.6544C39.1332 37.0092 39.7517 36.3472 40.3922 35.7076C41.5469 34.5539 42.8574 34.6234 43.8006 35.9686C45.6934 38.6681 47.5391 41.4035 49.3935 44.1299C49.5385 44.3438 49.6495 44.5797 49.7225 44.8289C49.9024 45.455 49.648 45.9591 49.0262 46.126C48.6363 46.2213 48.236 46.2653 47.8352 46.257C42.5961 46.266 37.354 46.2678 32.1091 46.2626Z" fill="white"/>
            <path d="M43.7896 19.5307C43.7883 20.572 43.4843 21.5895 42.9161 22.4541C42.348 23.3187 41.5413 23.9915 40.5983 24.3872C39.6553 24.783 38.6185 24.8838 37.6194 24.677C36.6202 24.4702 35.7037 23.965 34.986 23.2254C34.2683 22.4859 33.7817 21.5454 33.588 20.5231C33.3942 19.5008 33.502 18.4427 33.8977 17.4831C34.2934 16.5234 34.9592 15.7054 35.8106 15.1327C36.6621 14.56 37.6608 14.2584 38.6803 14.2661C40.0377 14.2838 41.3341 14.8455 42.2899 15.8303C43.2456 16.8151 43.7842 18.1441 43.7896 19.5307Z" fill="white"/>
          </svg>
        </div>
        <div v-else>
          <!-- Uploaded Image Preview -->
          <img :src="pictureClone" alt="Uploaded Image" class="object-cover w-16 h-16 rounded-2xl">
        </div>
      </div>
      <p class="mt-2 text-base text-black">
        Drop your image here, or <span @click="triggerFileInput" class="font-bold text-blue-900 underline cursor-pointer">upload</span>
      </p>
    </div>
    <input ref="fileInput" id="file-upload" name="file-upload" type="file" class="sr-only" @change="handleFileChange" />
    <p class="mt-4 text-sm text-black">
      <span class="font-bold">Info:</span> Max size: 1mb
    </p>

    <!-- Error message display -->
    <div v-if="error !== ''" style="background-color: darkred; color:white; padding: 4px;" class="mt-4">
      {{ error }}
    </div>

    <!-- Hidden input field to submit the image data -->
    <input type="hidden" name="picture" :value="imageClone" />
    <Flash />
  </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import Flash, { emitter } from './Flash.vue';

export default {
  components: { Flash },
  props: {
    image: {
      type: String,
      default: ''
    },
    picture: {
      type: String,
      default: ''
    }
  },
  setup(props) {
    const pictureClone = ref(props.picture || '');
    const imageClone = ref(props.image || '');
    const error = ref('');
    const fileInput = ref(null);

    // Method to handle file input change
    const handleFileChange = (event) => {
      const file = event.target.files[0];
      if (file) {
        persist(file);
      }
    };

    // Method to trigger file input
    const triggerFileInput = () => {
      fileInput.value.click();
    };

    // Upload picture to the server
    const persist = (file) => {
      let data = new FormData();
      data.append('picture', file);

      axios.post(`/api/events/picture`, data)
        .then((result) => {
          error.value = '';

          // Assuming the returned path is relative, make it absolute if necessary
          const baseURL = 'https://your-domain.com'; // Adjust this to your actual domain
          pictureClone.value = result.data.path.startsWith('http') 
            ? result.data.path 
            : `${baseURL}${result.data.path}`;

          // Set image clone value for hidden input
          imageClone.value = result.data.imageName;

          emitter.emit('flash', { message: 'Picture uploaded!', level: 'success' });
        })
        .catch((err) => {
          if (err.response.data.errors && err.response.data.errors.picture) {
            error.value = err.response.data.errors.picture[0];
          } else {
            error.value = "Image is too large. Maximum is 1Mb";
          }
          emitter.emit('flash', { message: error.value, level: 'error' });
        });
    };

    return {
      pictureClone,
      imageClone,
      error,
      fileInput,
      handleFileChange,
      triggerFileInput,
    };
  }
};
</script>

<style scoped>
.flex {
  display: flex;
}

.relative {
  position: relative;
}

.object-contain {
  object-fit: contain;
}

.z-0 {
  z-index: 0;
}

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0;
}

.object-cover {
  object-fit: cover;
}
</style>
