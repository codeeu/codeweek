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
        <input type="hidden" name="geoposition" id="geoposition" :value="geoposition">
    </div>
</template>

<script>
    import ItemTemplate from './ItemTemplate.vue'
    import Autocomplete from 'v-autocomplete'
    import allCountries from "./allCountries";


    export default {
        components: {Autocomplete},
      data () {
        return {
          item: this.value ? {name:this.value} : null,
          items: null,
          geoposition: null,
          template: ItemTemplate,
          inputAttrs: {
            placeholder: this.placeholder,
            name: this.name,
            autocomplete: "off"
          }
        }
      },
      props: {
          placeholder: null,
          name: null,
          value: null,
          geoposition: null
      },
        methods: {
            itemSelected (item) {
                if (map && item && item.name && item.magicKey){
                    var me = this;
                    var baseURL = "https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates?f=json";
                    $.ajax({
                        url: baseURL + "&singleLine=" + item.name + "&magicKey=" + item.magicKey + "&outFields=Country",
                        success: function (res) {
                            var candidate = res.candidates[0];
                            me.geoposition = [candidate.location.y, candidate.location.x];
                            map.setView(me.geoposition,16);
                            var countryIso2 = me.findCountry(candidate.attributes.Country).iso2;
                            $("#id_country").val(countryIso2);
                        }
                    });
                }
            },
            findCountry(iso3) {
                return allCountries.find(country => country.iso3 === iso3);
            },
            getLabel (item) {
                if (item && item.name) {
                    return item.name;
                }
                return ''
            },
            change (text) {
                if (text == ""){
                    this.items = null;
                }
            },
            updateItems (text) {
                var me = this;
                var baseURL = "https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/suggest?f=json";
                $.ajax({
                    url: baseURL + "&text="+text,
                    success: function (res) {
                        var locations = [];
                        $.each(res.suggestions, function (key, location) {
                            locations.push({
                                name: location.text,
                                magicKey: location.magicKey
                            });
                        });
                        me.items = locations;
                    }
                });
            }
        }
    }
</script>
