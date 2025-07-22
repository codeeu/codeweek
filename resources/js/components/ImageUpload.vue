<template>
  <div>
    <input id="image" type="file" accept="image/*" @change="onChange" />
    <label class="!flex justify-center items-center !h-10 !w-10 !p-0 !bg-dark-blue border-2 border-white" for="image">
      <img class="w-5 h-5" src="/images/edit.svg" />
    </label>
  </div>
</template>

<script>
import { defineComponent } from 'vue';

export default defineComponent({
  emits: ['loaded'],
  methods: {
    onChange(e) {
      if (!e.target.files.length) return;

      let file = e.target.files[0];
      let reader = new FileReader();

      reader.readAsDataURL(file);

      reader.onload = (e) => {
        let src = e.target.result;
        this.$emit('loaded', { src, file });
      };
    }
  }
});
</script>
