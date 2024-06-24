<div>

    <x-select.styled :request="[
                    'url' => 'https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/suggest?f=json
                    https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/suggest?f=json&text=rue%20de%20la%20fontaine',
                    'method' => 'get'
                 ]" select="label:name|value:id" />

</div>
