<template>
  <div>
    <div v-if="error !== ''" style="background-color: darkred; color:white; padding: 4px;">{{ error }}</div>
    <div class="level">
      <img :src="pictureClone" class="mr-1">
    </div>
    <input type="hidden" name="picture" :value="imageClone">
    <form method="POST" enctype="multipart/form-data">
      <image-upload name="picture" class="mr-1" @loaded="onLoad"></image-upload>
    </form>


  </div>
</template>

<script>
import ImageUpload from './ImageUpload.vue';

export default {

  components: {ImageUpload},
  props: ['image', 'picture'],
  data() {
    return {
      pictureClone: this.picture || '',
      imageClone: this.image || '',
      error: ''
    }
  },
  methods: {
    onLoad(picture) {
      this.persist(picture.file);
    },

    persist(picture) {
      let data = new FormData();

      data.append('picture', picture);

      axios.post(`/api/events/picture`, data)
          .then((result) => {
            this.error = '';
            this.pictureClone = result.data.path;
            this.imageClone = result.data.imageName;
            flash('Picture uploaded !');
          }).catch(error => {


        if (error.response.data.errors && error.response.data.errors.picture) {
          this.error = error.response.data.errors.picture[0];
        } else {
          this.error = "Image is too large. Maximum is 1Mb";
        }
        flash(this.error, "Error");


      })
    },
    remove() {
      axios.delete(`/api/event/picture`)
          .then(() => flash('Event Picture deleted!'));

      this.pictureClone = 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/events/pictures/default.png';
    }
  }
}
</script>
