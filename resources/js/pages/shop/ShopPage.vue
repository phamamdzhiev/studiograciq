<template>
    <PageBanner  title="Магазин"
                image="/storage/assets/banners/banner-shop.png"/>
    <div class="section-wrapper my-5">
        <div class="container-xxl">
            <h1 class="my-5 d-flex align-items-center">
                <i class="bi bi-bag-heart-fill fs-1 me-3"></i>Продукти
            </h1>

            <CategoriesHeader @changeUri="emitHandler"/>

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
            <div class="my-5" v-else>
                <h2 class="text-center">Няма намерени продукти в тази категория :(</h2>
            </div>
        </div>
    </div>


</template>

<script>
import {onMounted, ref} from "vue";
import ProductItemSingleton from "../../components/ProductItemSingleton";
import CategoriesHeader from "./CategoriesHeader";
import PageBanner from "../../components/PageBanner";
import axios from "axios";

export default {
    name: "ShopPage",
    components: {
        ProductItemSingleton,
        PageBanner,
        CategoriesHeader
    },
    setup() {
        const shopItems = ref([]);
        const DATA_API = ref('/api/products/all');

        // const shopItems = computed(() => {
        //     return store.getters['Data/getShopItems'];
        // });

        function emitHandler(value) {
            (value == null) ? DATA_API.value = '/api/products/all' : DATA_API.value = `/api/products/all?category=${value}`;
            fetchData()
        }

        function fetchData() {
            axios.get(DATA_API.value).then((res) => {
                if (res.status === 200) {
                    shopItems.value = res.data;
                }
            }).catch(e => console.log('Could not fetch products', e));
        }

        onMounted(() => {
            fetchData()
            // if (shopItems.value.length <= 1) {
            //     store.dispatch('Data/setShopItems');
            // }
        });


        return {
            shopItems,
            emitHandler
        }
    }
}
</script>

<style lang="scss" scoped>
.heading {
    color: black !important;
}

.shop {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 15px;

    @media screen and (max-width: 991px) {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>
