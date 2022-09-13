<template>
    <div class="section-wrapper my-5">
        <div class="container-xxl">
            <h1 class="my-5 d-flex align-items-center">
                <i class="bi bi-image me-3 fs-1"></i>
                Галерия
            </h1>
            <div class="position-relative">
                <div class="gallery">
                    <div v-for="image in images" :key="image.id">
                        <img class="gallery__img"
                             :title="`Модел ${image.id}`"
                             :src="`/storage/assets/gallery/${image.src}.jpg`"/>
                    </div>
                </div>
                <div id="more" class="text-center">
                    <a target="_blank" class="d-inline-block mt-5 pt-5" :href="$INSTAGRAM ">
                        <h2>
                            <i class="bi bi-instagram unset "></i>
                            Вижте още в Instagram
                        </h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import {ref} from "vue";

export default {
    name: "GalleryPage",
    components: {},
    setup() {
        const images = ref([
            {id: 7, src: '7'},
            {id: 10, src: '10'},
            {id: 14, src: '14'},
            {id: 15, src: '15'},
            {id: 19, src: '19'},
            {id: 1, src: '1'},
            {id: 2, src: '2'},
            {id: 3, src: '3'},
            {id: 4, src: '4'},
            {id: 5, src: '5'},
            {id: 20, src: '20'},
            {id: 21, src: '21'},
            {id: 22, src: '22'},
            {id: 23, src: '23'},
            {id: 31, src: '31'},
            {id: 32, src: '32'}
        ]);

        return {
            images
        }
    }
}
</script>

<style lang="scss" scoped>
.gallery {
    --s: 150px; /* controls the size */
    --f: 1.2; /* controls the scale factor */

    display: grid;
    gap: 15px;
    width: 100%;
    margin: auto;
    aspect-ratio: 1;
    grid-template-columns: repeat(5, auto);
    @media screen and (max-width: 991px) {
        grid-template-columns: repeat(4, auto);
    }
}


.gallery__img {
    width: 0;
    height: 0;
    min-height: 100%;
    min-width: 100%;
    object-fit: cover;
    transition: all 300ms ease-in;
}

.gallery img:hover {
    width: calc(var(--s) * var(--f));
    height: calc(var(--s) * var(--f));
}


</style>
