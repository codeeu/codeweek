<template>
  <div>

    <select v-model="selected_country" class="codeweek-input-select" id="id_country" name="country_iso" @change="newCountry()">
      <option value=""> All countries</option>
      <option disabled value="---">-&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;</option>
      <option v-for="country in countries" :value="country.iso">
        {{ country.name }} ({{ country.total }})
      </option>
    </select>
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
