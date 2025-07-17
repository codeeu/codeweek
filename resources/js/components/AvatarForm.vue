<template>
  <div class="flex flex-col tablet:flex-row tablet:items-center gap-6 tablet:gap-14">
    <div class="flex">
      <div class="relative">
        <img :src="avatar" class="w-40 h-40 rounded-full border-4 border-solid border-dark-blue-300">
        <form v-if="canUpdate" method="POST" enctype="multipart/form-data" class="absolute bottom-0 left-0">
          <image-upload name="avatar" class="mr-1" @loaded="onLoad"></image-upload>
        </form>
        <div style="display: flex;align-items: flex-end;margin-left: -35px;">
          <button class="absolute !bottom-0 !right-0 flex justify-center items-center !h-10 !w-10 !p-0 bg-[#FE6824] rounded-full !border-2 !border-solid !border-white" @click="remove" v-show="hasAvatar">
            <img class="w-5 h-5" src="/images/trash.svg">
          </button>
        </div>
      </div>
    </div>
    <div>
      <h1 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat'] mb-6">{{ user.fullName }}</h1>
    </div>
  </div>
</template>

<script>
import ImageUpload from './ImageUpload.vue';
import Flash, {emitter} from './Flash.vue';

export default {

  props: ['user'],

  components: {ImageUpload, Flash},

  data() {
    return {
      avatar: this.user.avatar_path
    };
  },

  computed: {
    canUpdate() {
      console.log('user', this.user);
      return this.$authorize(user => user.id === this.user.id);
    },
    hasAvatar() {
      console.log(this.avatar);
      return this.avatar.split('/').pop() !== "default.png";

    }

  },

  methods: {
    onLoad(avatar) {
      //this.avatar = avatar.src;
      this.persist(avatar.file);
    },

    persist(avatar) {
      let data = new FormData();

      data.append('avatar', avatar);

      axios.post(`/api/users/${this.user.id}/avatar`, data)
          .then((result) => {
            this.avatar = result.data.path;
            emitter.emit('flash', {message: 'Avatar uploaded!', level: 'success'});
          })
    },
    remove() {
      console.log("delete me");

      axios.delete(`/api/users/avatar`)
          .then(() => emitter.emit('flash', {message: 'Avatar Deleted!', level: 'success'})
          )
      ;

      this.avatar = 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/avatars/default.png';
    }
  }
}
</script>
