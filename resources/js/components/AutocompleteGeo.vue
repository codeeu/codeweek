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
    >
    </v-autocomplete>
    <input type="text" name="geoposition" id="geoposition" :value="localGeoposition">
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
    geoposition: String
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


    const itemSelected = (selectedItem) => {
      if (selectedItem && selectedItem.name && selectedItem.magicKey) {
        const baseURL = "https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates?f=json";
        axios.get(baseURL, {
          params: {
            singleLine: selectedItem.name,
            magicKey: selectedItem.magicKey,
            outFields: 'Country'
          }
        }).then(response => {
          const candidate = response.data.candidates[0];
          localGeoposition.value = [candidate.location.y, candidate.location.x];
          if (window.map) {
            window.map.setView([candidate.location.y, candidate.location.x], 16);
          }
          const countryIso2 = findCountry(candidate.attributes.Country).iso2;
          document.getElementById('id_country').value = countryIso2;
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

    const updateItems = (text) => {
      const baseURL = "https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/suggest?f=json";
      axios.get(baseURL, { params: { text } }).then(response => {
        const locations = response.data.suggestions.map(location => ({
          name: location.text,
          magicKey: location.magicKey
        }));
        items.value = locations;
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
      localGeoposition
    };
  }
};
</script>
