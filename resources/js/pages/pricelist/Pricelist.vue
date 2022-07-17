<template>
    <div id="services">
        <div class="position-relative">
            <img id="service-banner-image" class="img-fluid"
                 src="https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-31-dark-copyright.jpg" alt="">
            <div class="position-absolute top-50 start-50 translate-middle w-100 text-center">
                <h1 class="heading underlined">Всички услуги</h1>
            </div>
        </div>
        <div class="section-wrapper my-5" id="pricelist">
            <div class="container-xxl">
                <div id="pricelist-container" class="px-4 py-5">
                    <h1 class="text-center mb-5">Ценоразпис</h1>
                    <div class="d-grid">
                        <PriceSingleton
                            v-for="price in prices" :key="price.id"
                            :title="price.title"
                            :price="price.price"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import PriceSingleton from "./PriceSingleton";
import SectionDivider from "../../components/SectionDivider";

export default {
    name: "Pricelist",
    components: {
        PriceSingleton,
        SectionDivider
    },
    setup() {
        const prices = [
            {id: 1, title: 'Подстрицка', price: 54},
            {id: 2, title: 'Подстрицка', price: 510},
            {id: 3, title: 'Подстрицка', price: 150},
            {id: 4, title: 'Подстрицка', price: 540},
            {id: 5, title: 'Подстрицка', price: 5},
        ];

        return {
            prices
        }
    },
};
</script>
<style lang="scss" scoped>
#pricelist-container {
    background-color: #1d2223;
}

.d-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0 30px;
    @media screen and (max-width: 992px) {
        grid-template-columns: 1fr;
    }
}

.heading {
    font-size: 5rem;
    @media screen and (max-width: 992px) {
        font-size: 2.6rem;
    }
}

img#service-banner-image {
    @media screen and (max-width: 576px) {
        height: 200px;
    }
}
</style>
