<template>
    <div id="about">
        <PageBanner
            title="За мен"
            image="/storage/assets/banners/banner-about.png"
        />
        <div class="container-xxl">
            <div class="text-center p-3 my-5 text_fourtriary">
                <p id="about_paragraph">
                    Здравейте, казвам се Дамяна Стайкова. През 2016 година завърших Професионална гимназия по
                    облекло "Ана Май" в град Пловдив. Оттогава работя като стилист.
                    Очарована съм как работата ми може напълно да промени не само
                    начина, по който хората изглеждат, но и как се чувстват към себе си.
                    Непрекъснато работя върху усъвършенстване на уменията си,
                    научавам нови техники, експериментирам и съм в крак с актуалните
                    тенденции. Работила съм с всички типове коса, обичам да правя различни
                    прически и процеса на намиране на собствен стил на клиента.
                </p>
            </div>
            <div class="gallery">
                <div class="gallery-item" v-for="image in images" :key="image.id">
                    <img
                        class="img-fluid"
                        :src="`/storage/assets/about/${image.image}`"
                        alt="Damyana Staykova accomplishment image"
                    />
                </div>
            </div>
            <div class="action text-center my-5">
                <a
                    :href="`tel:${$MOBILE_CONST}`"
                    class="btn btn_secondary d-inline-block"
                >Запази час по телефона</a
                >
            </div>
        </div>
    </div>
</template>

<script>
import PageBanner from "../../components/PageBanner";

export default {
    name: "About",
    components: {
        PageBanner,
    },

    setup() {
        const images = [
            {id: 1, image: "damuana1.jpg"},
            {id: 2, image: "damuana2.jpg"},
            {id: 3, image: "damuana3.jpg"},
            {id: 4, image: "damuana4.jpg"},
        ];

        return {
            images,
        };
    },
};
</script>

<style lang="scss" scoped>
.action {
    a {
        font-size: 1.8rem;
    }
}

#about_paragraph {
    letter-spacing: 0.07rem;
    line-height: 1.75;
}

.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    border-radius: 6px;
    overflow: hidden;
    @media screen and (max-width: 991px) {
        grid-template-columns: 1fr 1fr
    }

    .gallery-item {
        overflow: hidden;

        &:hover {
            img {
                transform: scale(1.1);
            }
        }
    }

    img {
        transition: transform 150ms ease-in;
        height: 100%;
    }
}
</style>
