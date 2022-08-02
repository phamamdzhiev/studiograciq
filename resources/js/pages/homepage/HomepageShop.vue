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
                    :image="item.image"
                    :title="item.title"
                    :desc="item.desc"
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
import {computed} from "vue";
import {useStore} from "vuex";

export default {
    name: "HomepageShop",
    components: {
        ProductItemSingleton,
        Swiper,
        SwiperSlide,
    },
    setup() {
        const store = useStore();

        const shopItems = computed(() => {
            return store.getters['Data/getShopItems'];
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
.heading {
    font-size: 4rem;
}
</style>
