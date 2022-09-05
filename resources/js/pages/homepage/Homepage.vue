<template>
    <div class="page homepage">
        <BrandBanner
            image="/storage/assets/banners/banner-home.jpg"
        >
            <div id="homepage-banner-slot" class="text-start">
                <div class="container-xxl">
                    <h1 class="heading text-white">
                        <span class="d-block">Почувстай твоя</span>
                        <span class="d-block"> нов "Грация" стил</span>
                    </h1>
                    <router-link
                        to="/services"
                        class="d-inline-block text-center btn_primary fw-bold px-5 mt-5"
                        id="custom_button"
                    >
                        Услуги
                    </router-link>
                </div>
            </div>
        </BrandBanner>
        <div class="container-xxl">
            <section-divider/>
            <HomepageAbout/>
            <section-divider/>
            <HomepageServices/>
            <section-divider/>
            <HomepageGallery/>
            <section-divider/>
            <HomepageShop/>
            <section-divider/>
        </div>
        <Brands/>
        <div class="container-xxl">
            <section-divider/>
            <HomepageContacts/>
        </div>
    </div>
</template>
<script>
import BrandBanner from "./BrandBanner.vue";
import HomepageAbout from "./HomepageAbout";
import HomepageServices from "./HomepageServices";
import HomepageShop from "./HomepageShop";
import HomepageGallery from "./HomepageGallery";
import HomepageContacts from "./HomepageContacts";
import SectionDivider from "../../components/SectionDivider";
import Brands from "./Brands";

export default {
    name: "Homepage",
    components: {
        BrandBanner,
        HomepageAbout,
        HomepageServices,
        SectionDivider,
        HomepageShop,
        Brands,
        HomepageContacts,
        HomepageGallery
    }
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
            background: white;
            bottom: -1px;
            left: 0;
            @media screen and (max-width: 992px) {
                width: 50%;
            }
        }
    }
}
</style>
