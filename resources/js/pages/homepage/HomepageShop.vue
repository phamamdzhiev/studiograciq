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
            <swiper-slide>
                <ShopContainer/>
            </swiper-slide>
            <swiper-slide>
                <ShopContainer/>
            </swiper-slide>
            <swiper-slide>
                <ShopContainer/>
            </swiper-slide>
            <swiper-slide>
                <ShopContainer/>
            </swiper-slide>
            <swiper-slide>
                <ShopContainer/>
            </swiper-slide>
            <swiper-slide>
                <ShopContainer/>
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import ShopContainer from "../../components/ShopContainer";
import {Swiper, SwiperSlide} from 'swiper/vue';
import {Navigation, Virtual} from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

export default {
    name: "HomepageShop",
    components: {
        ShopContainer,
        Swiper,
        SwiperSlide,
    },
    setup() {
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
            modules: [Navigation, Virtual]
        }
    }

}
</script>

<style lang="scss" scoped>
.heading {
    font-size: 4rem;
}
</style>
