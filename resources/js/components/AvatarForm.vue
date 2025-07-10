<template>
  <div class="flex flex-col tablet:fex-row tablet:items-center gap-6 tablet:gap-14">
    <div>
      <img :src="avatar" class="w-40 h-40 rounded-full border-4 border-solid border-dark-blue-300">
    </div>
    <div>
      <h1 class="text-white font-normal text-3xl tablet:font-medium tablet:text-5xl font-['Montserrat'] mb-6">{{ user.fullName }}</h1>
      <p class="text-xl font-normal text-white p-0 max-md:max-w-full max-w-[864px] mb-10 tablet:mb-6">
        Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero.
      </p>
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
