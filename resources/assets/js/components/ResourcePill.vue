<template>


                    <a class="inline-block border text-sm m-1 border-blue rounded hover:border-grey-lighter text-blue hover:bg-blue hover:text-white py-0 px-1" href="#">{{ property.name }}</a>



</template>

<script>


    export default {

        props: {
            property: Object
        },

    };
</script>



