<template>
    <div class="section-wrapper my-5">
        <swiper
            :breakpoints="swiperBreakPoints"
            :slides-per-view="4"
            :space-between="50"
            :modules="modules"
            navigation
            virtual
        >
            <swiper-slide v-for="item in shopItems" :key="item.id">
                <ProductItemSingleton
                    :id="item.id"
                    :image="item.image_big"
                    :name="item.name"
                    :brand="item.brand"
                    :price="item.price"
                />
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import ProductItemSingleton from "../../components/ProductItemSingleton";
import {Swiper, SwiperSlide} from 'swiper/vue';
import {Navigation, Virtual} from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';
import {onMounted, ref} from "vue";
import axios from "axios";

export default {
    name: "HomepageShop",
    components: {
        ProductItemSingleton,
        Swiper,
        SwiperSlide,
    },
    setup() {
        const DATA_API = '/api/products/all';

        const shopItems = ref([]);

        function fetchData() {
            axios.get(DATA_API).then((res) => {
                if (res.status === 200) {
                    shopItems.value = res.data;
                }
            }).catch(e => console.log('Could not fetch products', e));
        }

        onMounted(() => {
            fetchData()
        });

        const swiperBreakPoints = {
            0: {
                slidesPerView: 1,
            },
            480: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 3,
            },
            1024: {
                slidesPerView: 4,
            }
        }
        return {
            swiperBreakPoints,
            modules: [Navigation, Virtual],
            shopItems
        }
    }

}
</script>

<style lang="scss" scoped>

</style>
