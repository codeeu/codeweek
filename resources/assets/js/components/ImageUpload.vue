<template>
    <div>
        <input id="image" type="file" accept="image/*" @change="onChange"/>
        <label for="image">Choose a file</label>
      Max size: 1 Mb
    </div>
</template>

<script>
    export default {
        methods: {
            onChange(e) {
                if (! e.target.files.length) return;

                let file = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(file);

                reader.onload = e => {
                    let src = e.target.result;

                    this.$dispatch('loaded', { src, file });
                };
            }
        }
    }
</script>
