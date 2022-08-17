<template>
    <PageBanner :black="true" title="Магазин"
                image="https://hair.nelson.themerex.net/wp-content/uploads/2020/04/hair-global-bg1-copyright.jpg"/>
    <div class="section-wrapper my-5">
        <div class="container-xxl">
            <h1 class="my-5 d-flex align-items-center">
                <i class="bi bi-bag-heart-fill fs-1 me-3"></i>Всички продукти
            </h1>

            <div class="shop" v-if="shopItems.length > 0">
                <div v-for="item in shopItems" :key="item.id">
                    <ProductItemSingleton
                        :id="item.id"
                        :image="item.image"
                        :title="item.title"
                        :desc="item.desc"
                        :price="item.price"
                    />
                </div>
            </div>
        </div>
    </div>


</template>

<script>
import {computed, onMounted} from "vue";
import {useStore} from "vuex";
import ProductItemSingleton from "../../components/ProductItemSingleton";
import PageBanner from "../../components/PageBanner";

export default {
    name: "ShopPage",
    components: {
        ProductItemSingleton,
        PageBanner
    },
    setup() {
        const store = useStore();

        const shopItems = computed(() => {
            return store.getters['Data/getShopItems'];
        });

        onMounted(() => {
            if (shopItems.value.length <= 1) {
                store.dispatch('Data/setShopItems');
            }
        });


        return {
            shopItems
        }
    }
}
</script>

<style scoped>
.heading {
    color: black !important;
}

.shop {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 15px;
}
</style>
