<template>
  <div class="codeweek-question-container">
    <div class="expander-always-visible">
      <div class="expansion">
        <button @click="toggleOpen" class="codeweek-expander-button">
          <div> {{ isOpen ? '-' : '+' }}</div>
        </button>
      </div>
      <div class="content">
        <h1>{{ question.title1 }}</h1>
      </div>
    </div>
    <div :class="chevron" class="container-expansible">
      <div class="expansion">
        <div class="expansion-path"></div>
      </div>
      <div class="content">
        <h2>{{ question.title2 }}</h2>
        <p v-for="(content, index) in question.content" :key="index">
          {{ content }}
        </p>
        <div v-if="question.map" class="maps">
          <iframe class="map" src="/map" scrolling="no"></iframe>
        </div>
        <div v-if="question.button.show" class="button">
          <a :href="question.button.link" class="codeweek-button">
            <input type="submit" :value="question.button.label"/>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {ref, computed} from 'vue';

export default {
  props: {
    question: {
      type: Object,
      required: true,
    },
  },
  setup(props) {
    const isOpen = ref(true);

    const toggleOpen = () => {
      isOpen.value = !isOpen.value;
    };

    const chevron = computed(() => ({
      expanded: isOpen.value,
      collapsed: !isOpen.value,
    }));

    return {
      isOpen,
      toggleOpen,
      chevron,
    };
  },
};
</script>
