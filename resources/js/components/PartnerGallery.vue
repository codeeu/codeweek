<template>
  <section class="flex flex-col pt-3.5">
    <div class="flex py-4 md:py-20 relative flex-col mt-3.5 w-full bg-aqua max-md:max-w-full items-center">
      <div class="z-0 flex flex-col items-start justify-between max-w-full gap-10 p-10 md:px-24">
        <div class="grid w-full grid-cols-1 md:grid-cols-2 gap-x-8">
          <article class="flex flex-col w-full max-md:max-w-full">
            <h2 class="text-2xl font-bold leading-none text-orange-500">Consortium Partner</h2>
            <div class="flex flex-col pt-5 mt-1 w-full text-base text-black min-h-[244px] max-md:max-w-full">
              <p class="leading-6 max-md:max-w-full max-w-[480px]">
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.
              </p>
              <a href="#" class="mt-5 text-blue-900 underline hover:no-underline max-md:max-w-full pb-14">Website link</a>
            </div>
          </article>

          <!-- Main Image controlled by Vue.js -->
          <div class="flex items-start justify-start">
            <img :src="images[currentIndex].src" :alt="images[currentIndex].alt" class="main-image object-contain aspect-[1.63] w-full md:w-[480px] max-md:max-w-full" />
          </div>
        </div>

        <!-- Thumbnail Gallery with Vue.js -->
        <div class="w-full overflow-hidden image-gallery">
          <!-- Ensure at least 3 thumbnails are visible on mobile (768px) -->
          <div ref="thumbnailGallery" class="flex gap-4 overflow-x-auto flex-nowrap">
            <img
              v-for="(image, index) in images"
              :key="index"
              :src="image.src"
              :alt="'Gallery image ' + (index + 1)"
              :class="{ 'border-2 border-orange-500': currentIndex === index }"
              class="thumbnail cursor-pointer object-contain shrink-0 aspect-[1.5] min-h-[120px] w-[calc(33.33%-8px)]"
              @click="selectImage(index)"
            />
          </div>
        </div>

        <!-- Image Slider Controls -->
        <div class="flex justify-end w-full mt-4 image-gallery-controls">
          <div class="flex flex-wrap items-center gap-5">
            <!-- Previous Button -->
            <button @click="prevImage" class="flex group flex-col justify-center items-center self-stretch my-auto w-8 h-8 bg-orange-500 rounded min-h-[24px]">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="32" height="32" rx="4" class="fill-primary group-hover:fill-secondary" />
                <path d="M19 22L13 16L19 10" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>

            <!-- Next Button -->
            <button @click="nextImage" class="flex group flex-col justify-center items-center self-stretch my-auto w-8 h-8 bg-orange-500 rounded min-h-[24px]">
              <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="32" height="32" rx="4" class="fill-primary group-hover:fill-secondary" />
                <path d="M13 22L19 16L13 10" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      images: [
        { src: 'https://cdn.builder.io/api/v1/image/assets/TEMP/1e054358a7188baf8777a09512012cf16ab84970ef1c7610feb6dad13e504666', alt: 'Consortium partner visual representation' },
        { src: 'https://cdn.builder.io/api/v1/image/assets/TEMP/2972cd5748880295748a9baa3e8fe3c996a0cdc09d86b46dbc72790d1cbc0655', alt: 'Gallery image 1' },
        { src: 'https://cdn.builder.io/api/v1/image/assets/TEMP/fb06d640ec9446e59ef5e3fb63ceaaaf0b25d0117f209f11e3ab8e6ce3240acb', alt: 'Gallery image 2' },
        { src: 'https://cdn.builder.io/api/v1/image/assets/TEMP/1e054358a7188baf8777a09512012cf16ab84970ef1c7610feb6dad13e504666', alt: 'Gallery image 3' },
        { src: 'https://cdn.builder.io/api/v1/image/assets/TEMP/2972cd5748880295748a9baa3e8fe3c996a0cdc09d86b46dbc72790d1cbc0655', alt: 'Gallery image 4' },
        { src: 'https://cdn.builder.io/api/v1/image/assets/TEMP/fb06d640ec9446e59ef5e3fb63ceaaaf0b25d0117f209f11e3ab8e6ce3240acb', alt: 'Gallery image 5' }
      ],
      currentIndex: 0
    };
  },
  methods: {
    nextImage() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length;
      this.scrollToThumbnail();
    },
    prevImage() {
      this.currentIndex = this.currentIndex === 0 ? this.images.length - 1 : this.currentIndex - 1;
      this.scrollToThumbnail();
    },
    selectImage(index) {
      this.currentIndex = index;
      this.scrollToThumbnail();
    },
    scrollToThumbnail() {
      const thumbnailGallery = this.$refs.thumbnailGallery;
      const thumbnailWidth = thumbnailGallery.clientWidth / 3; // Ensure at least 3 thumbnails are visible
      const startScrollPosition = Math.max(0, (this.currentIndex - 1) * thumbnailWidth);

      thumbnailGallery.scrollTo({
        left: startScrollPosition,
        behavior: 'smooth'
      });
    }
  }
};
</script>

<style scoped>
.thumbnail {
  transition: transform 0.3s ease;
}
.thumbnail:hover {
  transform: scale(1.1);
}
.image-gallery {
  display: flex;
  justify-content: space-between;
}
</style>
