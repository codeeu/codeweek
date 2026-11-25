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

                console.log("Map: ", window.map);

                if (item && item.name && item.magicKey){
                    var me = this;
                    var baseURL = "https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates?f=json";
                    $.ajax({
                        url: baseURL + "&singleLine=" + item.name + "&magicKey=" + item.magicKey + "&outFields=Country",
                        success: function (res) {
                            var candidate = res.candidates[0];
                            if (!candidate || !candidate.location) {
                              return;
                            }
                            me.geoposition = [candidate.location.y, candidate.location.x];
                            if (window.map){
                              map.setView(me.geoposition,16);
                            }
                            // ArcGIS returns blank Country for disputed regions (e.g. Kosovo).
                            var countryIso2 = me.findCountry(candidate.attributes && candidate.attributes.Country);
                            if (countryIso2) {
                              $("#id_country").val(countryIso2);
                            }
                        }
                    });
                }
            },
            findCountry(iso3) {
                if (!iso3) {
                    return undefined;
                }
                var match = allCountries.find(country => country.iso3 === iso3);
                return match ? match.iso2 : undefined;
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
