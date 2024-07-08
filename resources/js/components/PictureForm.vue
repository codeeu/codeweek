<template>
  <div>
    <div v-if="error !== ''" style="background-color: darkred; color:white; padding: 4px;">{{ error }}</div>
    <div class="level">
      <img :src="pictureClone" class="mr-1" />
    </div>
    <input type="hidden" name="picture" :value="imageClone" />
    <form method="POST" enctype="multipart/form-data">
      <ImageUpload name="picture" class="mr-1" @loaded="onLoad" />
    </form>
    <Flash />
  </div>
</template>

<script>
import { ref } from 'vue';
import axios from 'axios';
import ImageUpload from './ImageUpload.vue';
import Flash, { emitter } from './Flash.vue';

export default {
  components: { ImageUpload, Flash },
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

    const onLoad = (picture) => {
      persist(picture.file);
    };

    const persist = (picture) => {
      let data = new FormData();
      data.append('picture', picture);

      axios.post(`/api/events/picture`, data)
          .then((result) => {
            error.value = '';
            pictureClone.value = result.data.path;
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

    const remove = () => {
      axios.delete(`/api/event/picture`)
          .then(() => {
            emitter.emit('flash', { message: 'Event Picture deleted!', level: 'success' });
            pictureClone.value = 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/default.png';
          });
    };

    return {
      pictureClone,
      imageClone,
      error,
      onLoad,
      persist,
      remove,
    };
  }
};
</script>
