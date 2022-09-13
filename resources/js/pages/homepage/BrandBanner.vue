<template>
    <div class="banner-section">
        <div
            class="carousel slide"
            data-bs-ride="carousel"
        >
            <div class="carousel-inner">
                <div
                    class="carousel-item active"
                    :style="`background-image: url('${image}')`"
                >
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BrandBanner",
    props: {
        image: {
            require: true,
        },
    },
};
</script>
<style scoped lang="scss">
.carousel-item {
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    height: 95vh;
    position: relative;
    //border-bottom: 4px solid #9e49a3;
    @media screen and (max-width: 992px) {
        height: 70vh;
        background-position: 57% 50%;
    }
}
</style>
