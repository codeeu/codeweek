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
            :wait=0
            >
        </v-autocomplete>
        <input type="hidden" name="geoposition" id="geoposition" :value="geoposition">
    </div>
</template>

<script>
    import ItemTemplate from './ItemTemplate.vue'
    import Autocomplete from 'v-autocomplete'


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
            name: this.name
          }
        }
      },
      props: {
          placeholder: null,
          name: null,
          value: null,
          geoposition:null
      },
      methods: {
        itemSelected (item) {
            if (item.coordinates && map){
                var coords = new Array().concat(item.coordinates).reverse();
                this.geoposition = coords.join(",");
                map.setView(coords,16);

                $("#id_country").val(item.country);
            }
        },
        getLabel (item) {
            if (item && item.name) {
              return item.name + (item.city ? ', ' + item.city : '') + (item.country ? ', ' + item.country : '')
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
          $.ajax({
              url: "https://europa.eu/webtools/rest/gisco/api?q="+text+"&limit=5",
              success: function (res) {
                    var locations = [];
                    $.each(res.features, function (key, location) {
                        locations.push({
                            coordinates: location.geometry.coordinates,
                            name: location.properties.name || location.properties.street,
                            housenumber: location.properties.housenumber,
                            city: location.properties.city,
                            country: location.properties.country
                        });
                    });
                    //console.log(locations);
                  me.items = locations;
              }
          });
        }
      }
    }
</script>
