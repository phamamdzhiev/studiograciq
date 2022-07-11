<template>
    <ul class="header-contacts py-1">
        <li class="me-4">
            <i class="bi bi-telephone-fill text_secondary"></i>
            <a href="tel:+35914543548">
                089 737 1439
            </a>
        </li>
        <li>
            <i class="bi bi-geo-alt-fill text_secondary"></i>
            <a href="https://goo.gl/maps/1Bm3DzHKc4eHLhgh9" target="_blank">
                ул. Стоян Попов 8, Пещера
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
