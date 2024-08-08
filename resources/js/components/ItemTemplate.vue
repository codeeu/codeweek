<template>
  <div class="address-list-item">
    <div class="address-info">
      <div class="name">{{ item.name }} {{ item.housenumber }}</div>
      <div class="city">{{ line2 }}</div>
    </div>
  </div>
</template>

<script>
import {computed} from 'vue';

export default {
  props: {
    item: {required: true},
    searchText: {required: true}
  },
  setup(props) {
    const line2 = computed(() => {
      return (props.item.city ? props.item.city + ", " : "") + (props.item.country ? props.item.country : '');
    });

    return {
      line2
    };
  }
}
</script>

<style scoped>
.address-list-item {
  /* Add any required styles here */
}

.address-info {
  /* Add any required styles here */
}

.name {
  /* Add any required styles here */
}

.city {
  /* Add any required styles here */
}
</style>
