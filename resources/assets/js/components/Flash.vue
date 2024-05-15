<template>
  <div class="codeweek-flash-message" role="alert" v-show="show">
    <div class="content">
      <div class="level">{{ level }}!</div>
      <div class="body">{{ body }}</div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, onUnmounted } from 'vue';

export default {
  props: ['message'],

  setup(props) {
    const body = ref('');
    const show = ref(false);
    const level = ref('');

    const flash = (data) => {
      if (data) {
        body.value = data.message;
        level.value = data.level.charAt(0).toUpperCase() + data.level.slice(1);
      }

      show.value = true;

      hide();
    };

    const hide = () => {
      setTimeout(() => {
        show.value = false;
      }, 3000);
    };

    onMounted(() => {
      if (props.message) {
        flash();
      }

      window.events.$on('flash', flash);
    });

    onUnmounted(() => {
      window.events.$off('flash', flash);
    });

    return {
      body,
      show,
      level,
    };
  },
};
</script>
