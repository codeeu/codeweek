<template>
  <div>

    <select v-model="selected_country" class="codeweek-input-select" id="id_country" name="country_iso"
            @change="newCountry()">
      <option value="00"> All countries</option>
      <option disabled value="">---------------</option>
      <option v-for="country in countries" v-bind:value="country.iso">{{ $t('countries.'+country.name) }} ({{ country.iso }}) - {{ country.total }}</option>
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
