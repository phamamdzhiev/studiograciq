<template>
    <ul class="header-contacts py-1">
        <li class="me-4">
            <i class="bi bi-telephone-fill text_secondary me-2"></i>
            <a :href="`tel:${$MOBILE_CONST}`">
                {{$MOBILE_CONST_HR}}
            </a>
        </li>
        <li>
            <i class="bi bi-geo-alt-fill text_secondary me-2"></i>
            <a href="https://goo.gl/maps/1Bm3DzHKc4eHLhgh9" target="_blank">
               {{$ADDRESS_STREET_CONST}}, {{$ADDRESS_CITY_CONST}}
            </a>
        </li>
    </ul>
</template>

<script>
export default {
    name: "HeaderContacts"
}
</script>

<style scoped lang="scss">
.header-contacts {
    @media screen and (max-width: 991px) {
        font-size: 1.3rem;
    }
}
</style>
