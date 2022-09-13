<template>
    <div class="position-relative text-center">
        <div class="gallery">
            <div v-for="image in images" :key="image.id">
                <img class="gallery__img"
                     :title="`Модел ${image.id}`"
                     :src="`/storage/assets/gallery/${image.src}.jpg`"/>
            </div>
        </div>
        <router-link class="btn_tertiary btn-inverse mt-5 d-inline-block" to="/gallery">
            Разгледайте цялата галерия
        </router-link>
    </div>
</template>

<script>
export default {
    name: "HomepageGallery",
    setup() {
        const images = [
            // {id: 6, src: '6'},
            {id: 8, src: '8'},
            {id: 9, src: '9'},
            {id: 17, src: '17'},
            // {id: 11, src: '11'},
            // {id: 12, src: '12'},
            {id: 13, src: '13'},
            {id: 25, src: '25'},
            {id: 26, src: '26'},
            {id: 27, src: '27'},
            {id: 28, src: '28'},
            {id: 29, src: '29'},
            {id: 30, src: '30'},
            // {id: 16, src: '16'},
        ];

        return {
            images
        }
    }
}
</script>

<style lang="scss" scoped>
img.gallery__img {
    width: 0;
    height: 0;
    min-height: 100%;
    min-width: 100%;
    object-fit: cover;
    filter: brightness(0.85);
    cursor: default;
}

.gallery {
    display: grid;
    grid-template-columns: repeat(4, auto);
    grid-template-rows: repeat(3, 275px);

    @media screen and (max-width: 992px) {

        grid-template-columns: repeat(2, auto);
        grid-template-rows: repeat(6, 250px);
    }
}
</style>
