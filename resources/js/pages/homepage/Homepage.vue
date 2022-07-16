<template>
    <div class="page homepage">
        <BrandBanner
            image="https://hair.nelson.themerex.net/wp-content/uploads/2020/05/image-88-copyright.jpg"
        >
            <div id="homepage-banner-slot">
                <div class="container-xxl">
                    <h1 class="heading text_primary">
                        <span class="d-block">Почувстай твоя</span>
                        <span class="d-block"> нов "Грация" стил</span>
                    </h1>
                    <button
                        type="button"
                        class="btn_primary fw-bold px-5 mt-5"
                        id="custom_button"
                    >
                        Услуги
                    </button>
                </div>
            </div>
        </BrandBanner>
        <div class="container-xxl">
            <section-divider/>
            <HomepageAbout/>
            <section-divider/>
            <HomepageServices/>
                <section-divider/>
            <HomepageShop/>
        </div>
    </div>
</template>
<script>
import BrandBanner from "./BrandBanner.vue";
import HomepageAbout from "./HomepageAbout";
import HomepageServices from "./HomepageServices";
import HomepageShop from "./HomepageShop";
import SectionDivider from "../../components/SectionDivider";

export default {
    name: "Homepage",
    components: {
        BrandBanner,
        HomepageAbout,
        HomepageServices,
        SectionDivider,
        HomepageShop
    },
};
</script>
<style scoped lang="scss">
#custom_button {
    width: 200px;
    @media screen and (max-width: 992px) {
        width: 170px;
        font-size: 1.5rem;
    }
}

#homepage-banner-slot {
    position: relative;
    top: 50%;
    left: 0;
    padding: 1rem;
    transform: translate(0, -75%);
    @media screen and (max-width: 992px) {
        left: 50%;
        transform: translate(-60%, -65%);
        width: 85%;
        margin: auto;
    }

    .heading {
        font-size: 6rem;
        display: block;
        position: relative;
        margin-bottom: 1rem;
        padding: 1rem 0;
        @media screen and (max-width: 992px) {
            width: 100%;
            font-size: 3.7rem;
        }

        &:after {
            display: block;
            content: "";
            position: absolute;
            width: calc(50% - 75px);
            height: 1px;
            background: #0c101186;
            bottom: -1px;
            left: 0;
            @media screen and (max-width: 992px) {
                width: 50%;
            }
        }
    }
}
</style>
