<template>
  <div class="relative">
    <select v-model="selected_country" id="id_country" name="country_iso" @change="newCountry()"
            class="border-2 border-solid border-dark-blue-200 w-full rounded-full h-12 px-4 appearance-none"
    >
      <option value=""> All countries</option>
      <option disabled value="---">-&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;</option>
      <option v-for="country in countries" :value="country.iso">
        {{ country.name }} ({{ country.total }})
      </option>
    </select>
    <div
      class="cursor-pointer absolute top-1/2 right-4 -translate-y-1/2"
    >
      <img src="/images/select-arrow.svg" />
    </div>
  </div>
</template>

<script>


export default {
  props: ['code', 'countries', 'target'],

  data() {
    return {
      selected_country: this.code || ''
    }
  },
  methods: {
    newCountry() {
      window.location.href = '/' + this.target + '/' + this.selected_country;
    }
  }
}
</script>
