<template>
  <div class="codeweek-flash-message" role="alert" v-if="show">
    <div :class="['content', flashClass]">
      <div class="level">{{ level }}!</div>
      <div class="body">{{ body }}</div>
    </div>
  </div>
</template>

<script>
import { ref, onMounted, onUnmounted, computed } from 'vue';
import mitt from 'mitt';

const emitter = mitt();

export default {
  props: {
    message: {
      type: Object,
      default: null,
    },
  },
  setup(props) {
    const body = ref('');
    const show = ref(false);
    const level = ref('');

    const flash = (data) => {
      if (data) {
        body.value = data.message;
        level.value = data.level.charAt(0).toUpperCase() + data.level.slice(1);
        show.value = true;

        hide();
      }
    };

    const hide = () => {
      setTimeout(() => {
        show.value = false;
      }, 3000);
    };

    const flashClass = computed(() => {
      return {
        'success': level.value.toLowerCase() === 'success',
        'error': level.value.toLowerCase() === 'error'
      };
    });

    onMounted(() => {
      if (props.message) {
        flash(props.message);
      }

      emitter.on('flash', flash);
    });

    onUnmounted(() => {
      emitter.off('flash', flash);
    });

    return {
      body,
      show,
      level,
      flashClass,
    };
  },
};

export { emitter };
</script>

<style scoped>
.codeweek-flash-message {
  position: fixed;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  width: auto;
  max-width: 100%;
  display: flex;
  justify-content: center;
  z-index: 1000;
}

.codeweek-flash-message .content {
  padding: 5px 30px;
  display: flex;
  border-radius: 0 0 10px 10px;
}

.codeweek-flash-message .content.success {
  background-color: #28a745; /* Green for success */
}

.codeweek-flash-message .content.error {
  background-color: #dc3545; /* Red for error */
}

.codeweek-flash-message .content .level {
  font-weight: bold;
  margin-right: 10px;
}
</style>
