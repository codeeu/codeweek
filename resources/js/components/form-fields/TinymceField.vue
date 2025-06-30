<template>
  <div class="custom-tinymce">
    <textarea
      class="hidden"
      cols="40"
      :id="`id_${name}`"
      :name="name"
      :placeholder="placeholder"
      rows="10"
    />
  </div>
</template>

<script>
import { onMounted } from 'vue';

export default {
  props: {
    modelValue: String,
    name: String,
    placeholder: String,
    height: {
      type: Number,
      default: 400,
    },
  },
  emits: ['update:modelValue', 'onChange'],
  setup(props, { emit }) {
    const handleChange = (content) => {
      emit('update:modelValue', content);
      emit('onChange', content);
    };

    const handleLoadScript = () => {
      const tinymceSrc = '/js/tinymce/tinymce.min.js';
      return new Promise((resolve, reject) => {
        if (document.querySelector(`script[src="${tinymceSrc}"]`)) {
          return resolve();
        }
        const script = document.createElement('script');
        script.src = tinymceSrc;
        script.onload = () => resolve();
        script.onerror = () =>
          reject(new Error(`Failed to load script ${tinymceSrc}`));
        document.head.appendChild(script);
      });
    };

    const handleInit = async () => {
      try {
        await handleLoadScript();
      } catch (error) {
        console.log(`Can't load tinymce scrip:`, error);
      }

      tinymce.init({
        selector: `#id_${props.name}`,
        height: props.height,
        width: '100%',
        setup: (editor) => {
          editor.on('init', () => {
            editor.setContent(props.modelValue || '');
          });

          editor.on('change input', () => {
            const content = editor.getContent();
            editor.save();
            handleChange(content);
          });
        },
      });
    };

    onMounted(() => {
      handleInit();
    });

    return {};
  },
};
</script>
