<template>
    <div class="codeweek-user-avatar">
        <div class="name">
            <h1>{{ user.fullName }}</h1>
        </div>
        <div class="avatar">
            <div class="actions">
                <form v-if="canUpdate" method="POST" enctype="multipart/form-data">
                    <image-upload name="avatar" class="mr-1" @loaded="onLoad"></image-upload>
                </form>
            </div>
            <img :src="avatar" class="codeweek-avatar-image">
            <div style="display: flex;align-items: flex-end;margin-left: -35px;">
                <button class="codeweek-image-button" @click="remove" v-show="hasAvatar">
                    <img src="/images/trash.svg">
                </button>
            </div>
        </div>
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

            async persist(avatar) {
                const data = new FormData();
                data.append('avatar', avatar);
                try {
                    const result = await axios.post(`/api/users/${this.user.id}/avatar`, data);
                    this.avatar = result.data.path;
                    flash('Avatar uploaded!');
                } catch (error) {
                    if (error.response && error.response.status === 422) {
                        const errors = error.response.data.errors;
                        const messages = Object.values(errors).flat().join('\n');
                        flash(messages, 'error');
                    } else {
                        console.error('Upload failed:', error);
                        flash('An unexpected error occurred while uploading the avatar.', 'error');
                    }
                }
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
