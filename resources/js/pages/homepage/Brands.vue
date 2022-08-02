<template>
    <div class="section-wrapper my-5 text-center" id="homepageBrands">
        <swiper
            :modules="modules"
            :breakpoints="swiperBreakPoints"
            :slides-per-view="4"
            :space-between="40"
            :autoplay='{
              "delay": 2500,
              "disableOnInteraction": false
            }'
        >
            <swiper-slide>
                <img src="https://hair.nelson.themerex.net/wp-content/uploads/2020/06/partner-logo-5.png" alt="">
            </swiper-slide>
            <swiper-slide>
                <img src="https://hair.nelson.themerex.net/wp-content/uploads/2020/06/partner-logo-5.png" alt="">
            </swiper-slide>
            <swiper-slide>
                <img src="https://hair.nelson.themerex.net/wp-content/uploads/2020/06/partner-logo-5.png" alt="">
            </swiper-slide>
            <swiper-slide>
                <img src="https://hair.nelson.themerex.net/wp-content/uploads/2020/06/partner-logo-5.png" alt="">
            </swiper-slide>
            <swiper-slide>
                <img src="https://hair.nelson.themerex.net/wp-content/uploads/2020/06/partner-logo-5.png" alt="">
            </swiper-slide>
            <swiper-slide>
                <img src="https://hair.nelson.themerex.net/wp-content/uploads/2020/06/partner-logo-5.png" alt="">
            </swiper-slide>
            <swiper-slide>
                <img src="https://hair.nelson.themerex.net/wp-content/uploads/2020/06/partner-logo-5.png" alt="">
            </swiper-slide>
        </swiper>
    </div>
</template>

<script>
import {Swiper, SwiperSlide} from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/autoplay';
import {Autoplay} from "swiper";

export default {
    name: "Brands",
    components: {
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
            modules: [Autoplay]
        }
    }
}
</script>

<style lang="scss" scoped>
#homepageBrands {
    background-color: #ebd0d9;

    img {
        padding: 4rem 1rem;
    }
}
</style>
