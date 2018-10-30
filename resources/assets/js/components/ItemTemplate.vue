<template>
  <div class="address-list-item">
    <i class="fa fa-map-marker"></i>
    <div class="info">
        <div class="name">{{item.name}} {{item.housenumber}}</div>
        <div class="city">{{line2}}</div>
    </div>
  </div>
</template>

<script>

export default {
  props: {
    item: { required: true },
    searchText: { required: true }
  },
  computed: {
    line2() {
        return (this.item.city ? this.item.city + ", " : "") + (this.item.country ? this.item.country : '');
    }
  }
}
</script>