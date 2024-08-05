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
  setup(props) {
    const item = ref(props.value ? { name: props.value } : null);
    const items = ref(null);
    const template = ItemTemplate;
    const inputAttrs = {
      placeholder: props.placeholder,
      name: props.name,
      autocomplete: "off"
    };
    const localGeoposition = ref(props.geoposition);
    const initialLocation = props.location;



    const itemSelected = (selectedItem) => {
      if (selectedItem && selectedItem.name && selectedItem.magicKey) {
        const baseURL = "/api/proxy/geocode"; // Update to your Laravel endpoint
        axios.get(baseURL, {
          params: {
            singleLine: selectedItem.name,
            magicKey: selectedItem.magicKey
          }
        }).then(response => {
          const candidate = response.data.candidates[0];
          localGeoposition.value = [candidate.location.y, candidate.location.x];
          if (window.map) {
            window.map.setView([candidate.location.y, candidate.location.x], 16);
          }
          const countryIso2 = findCountry(candidate.attributes.Country).iso2;
          document.getElementById('id_country').value = countryIso2;
        }).catch(error => {
          console.error('Error:', error);
        });
      }
    };


    const findCountry = (iso3) => {
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
