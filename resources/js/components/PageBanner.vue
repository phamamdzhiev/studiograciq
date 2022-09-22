<template>
    <div class="position-relative">
        <img id="banner-image" class="img-fluid"
             :src="image" :alt="title">
        <div class="position-absolute top-50 start-50 translate-middle w-100 text-center">
            <h1 class="heading underlined" :class="{'text-black': black}">{{title}}</h1>
        </div>
    </div>
</template>

<script>
export default {
    name: "PageBanner",
    props: {
        title: {
            required: true
        },
        image: {
            required: true
        },
        black: {
            default: false
        }
    }
}
</script>

<style lang="scss" scoped>
.heading {
    font-size: 5rem;
    @media screen and (max-width: 992px) {
        font-size: 2.6rem;
    }
}
</style>
