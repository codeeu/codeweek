<template>
    <div>

        <select v-model="selected_country" class="search-form-element" id="id_country" name="country_iso" @change="newCountry()">
            <option value=""> All countries</option>
            <option value="">---------------</option>
            <option v-for="country in countries" v-bind:value="country.iso">{{country.name}} ({{country.iso}})</option>
        </select>
    </div>
</template>

<script>


    export default {
        props: ['code', 'countries'],

        data() {
            return {
                selected_country: this.code || ''
            }
        },
        methods: {
            newCountry() {

                window.location.href = '/pending/' + this.selected_country;
            }
        }
    }
</script>
