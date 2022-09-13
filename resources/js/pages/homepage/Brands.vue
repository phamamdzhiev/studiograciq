<template>
    <div class="section-wrapper my-5 text-center" id="homepageBrands">
        <swiper
            :modules="modules"
            :breakpoints="swiperBreakPoints"
            :slides-per-view="4"
            :space-between="40"
            :autoplay='{
              "delay": 1500,
              "disableOnInteraction": false
            }'
        >
            <swiper-slide v-for="image in images" :key="image.id">
                <img
                    width="200"
                    :title="image.title"
                    :src="`/storage/assets/brands/${image.image}`"
                    :alt="`${image.title} logo`"
                />
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
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            }
        }
        const images = [
            {
                id: 1,
                image: 'alfaparf-brand.png',
                title: 'Alfaparf Milano'
            },
            {
                id: 2,
                image: 'italia-brand.png',
                title: 'Barba Italiana'
            },
            {
                id: 3,
                image: "bes-brand.png",
                title: 'BES | Beauty & Science'
            }
        ]
        return {
            images,
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
        filter: brightness(0);
    }
}
</style>
