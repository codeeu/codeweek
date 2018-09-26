<template>
    <div>

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
        props: ['image','picture'],
        data() {
            return {
                pictureClone: this.picture || '',
                imageClone: this.image || '',
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
                        console.log(result);
                        this.pictureClone = result.data.path;
                        this.imageClone = result.data.imageName;
                        flash('Picture uploaded !');
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
