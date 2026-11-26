<template>
  <div>
    <v-autocomplete
        :items="items"
        v-model="item"
        :get-label="getLabel"
        :component-item='template'
        @update-items="updateItems"
        @item-selected="itemSelected"
        @change="change"
        :keep-open=false
        :auto-select-one-item=false
        :input-attrs="inputAttrs"
        :wait=300
        :initialLocation="initialLocation"
    >
    </v-autocomplete>
    <input type="hidden" name="geoposition" id="geoposition" :value="localGeoposition">
  </div>
</template>

<script>
import { ref, computed, onMounted, watch } from 'vue';
import ItemTemplate from './ItemTemplate.vue';
import allCountries from "./allCountries";
import VAutocomplete from "./Autocomplete.vue";
import axios from 'axios';

export default {
  components: {
    VAutocomplete
  },
  props: {
    placeholder: String,
    name: String,
    value: String,
    geoposition: String,
    location: String
  },
  emits: ['onChange'],
  setup(props, { emit }) {
    const item = ref(props.value ? { name: props.value } : null);
    const items = ref(null);
    const template = ItemTemplate;
    const inputAttrs = ref({
      placeholder: props.placeholder,
      name: props.name,
      autocomplete: "off"
    });
    const localGeoposition = ref(props.geoposition);
    const initialLocation = props.location;

    watch(() => props.placeholder, () => {
      inputAttrs.value.placeholder = props.placeholder;
    });

    const itemSelected = (selectedItem) => {
      if (!selectedItem?.name) {
        return;
      }

      // Location text only — do not clear country/geoposition before geocode resolves.
      // ArcGIS returns blank Country for disputed regions (e.g. Kosovo); that must not wipe the form.
      emit('onChange', { location: selectedItem.name });

      if (!selectedItem.magicKey) {
        return;
      }

      const baseURL = "/api/proxy/geocode";
      axios.get(baseURL, {
        params: {
          singleLine: selectedItem.name,
          magicKey: selectedItem.magicKey
        }
      }).then(response => {
        const candidate = response.data?.candidates?.[0];
        if (!candidate?.location) {
          return;
        }

        const geoposition = [candidate.location.y, candidate.location.x];
        localGeoposition.value = geoposition;
        if (window.map) {
          window.map.setView(geoposition, 16);
        }

        const countryIso2 = findCountry(candidate.attributes?.Country)?.iso2;
        const payload = {
          location: selectedItem.name,
          geoposition,
        };
        if (countryIso2) {
          payload.country_iso = countryIso2;
        }

        emit('onChange', payload);

        if (countryIso2 && document.getElementById('id_country')) {
          document.getElementById('id_country').value = countryIso2;
        }
      }).catch(error => {
        console.error('Error:', error);
      });
    };


    const findCountry = (iso3) => {
      if (!iso3) {
        return undefined;
      }
      return allCountries.find(country => country.iso3 === iso3);
    };

    const getLabel = (item) => {
      return item && item.name ? item.name : '';
    };

    const change = (text) => {
      if (text === "") {
        items.value = null;
      }
    };

    const updateItems = (query) => {
      const baseURL = "/api/proxy/suggest"; // Update to your Laravel endpoint
      axios.get(baseURL, {
        params: {
          f: 'json',
          text: query
        }
      }).then(response => {
        items.value = response.data.suggestions.map(suggestion => ({
          name: suggestion.text,
          magicKey: suggestion.magicKey
        }));
      }).catch(error => {
        console.error('Error:', error);
      });
    };

    watch(() => props.value, (newValue) => {
      item.value = newValue ? { name: newValue } : null;
    });

    watch(() => props.geoposition, (newValue) => {
      localGeoposition.value = newValue;
    });

    return {
      item,
      items,
      template,
      inputAttrs,
      itemSelected,
      getLabel,
      change,
      updateItems,
      localGeoposition,
      initialLocation
    };
  }
};
</script>
