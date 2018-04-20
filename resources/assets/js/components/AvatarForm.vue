<template>
    <div>
        <div class="level">
            <img :src="avatar" class="mr-1">

            <h1>
                {{ user.fullName }}
            </h1>
        </div>

        <form v-if="canUpdate" method="POST" enctype="multipart/form-data">
            <image-upload name="avatar" class="mr-1" @loaded="onLoad"></image-upload>
        </form>

        <button @click="remove" v-show="hasAvatar">Delete Avatar</button>

    </div>
</template>

<script>
    import ImageUpload from './ImageUpload.vue';

    export default {

        props: ['user'],

        components: {ImageUpload},

        data() {
            return {
                avatar: this.user.avatar_path
            };
        },

        computed: {
            canUpdate() {
                return this.authorize(user => user.id === this.user.id);
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
                        flash('Avatar uploaded!');
                    })
            },
            remove() {
                console.log("delete me");

                axios.delete(`/api/users/avatar`)
                    .then(() => flash('Avatar deleted!'));

                this.avatar = 'https://s3-eu-west-1.amazonaws.com/codeweek-dev/avatars/default.png';
            }
        }
    }
</script>
