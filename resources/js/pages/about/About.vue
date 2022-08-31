<template>
    <div id="about">
        <PageBanner
            title="За мен"
            image="https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-31-dark-copyright.jpg"
        />
        <div class="container-xxl">
            <div class="text-center p-3 my-5 text_fourtriary">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                    pellentesque felis risus, vitae pretium felis facilisis sed. Etiam
                    tincidunt tortor vitae convallis porttitor. Phasellus eu eros nec
                    lorem mattis tempor quis nec lorem. Vivamus luctus, urna sed eleifend
                    sollicitudin, ex urna suscipit diam, non mollis est justo id ligula.
                    Nullam iaculis quis neque ut rutrum. Curabitur lacinia fringilla
                    nulla, vitae molestie nulla. Sed eu orci posuere, congue ante vel,
                    lobortis enim. Praesent ipsum dolor, gravida at elementum id, ornare
                    id odio. Ut at justo a est varius vulputate iaculis id arcu. Vivamus
                    lobortis augue elit, ut egestas dolor condimentum mattis.
                </p>
                <p>
                    Morbi sollicitudin turpis vitae tempor rhoncus. Nullam rutrum libero
                    quis justo accumsan, nec suscipit ex ultrices. Duis mattis, nisi vitae
                    sagittis pharetra, lacus felis placerat dui, non egestas neque enim
                    vitae urna. Etiam et aliquam sem, vel accumsan ipsum. Pellentesque non
                    bibendum odio. Nunc vel nibh pharetra, hendrerit ligula nec, pharetra
                    turpis. Suspendisse quis elementum ante. Ut non elit facilisis,
                    volutpat erat sed, placerat sem.
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
                <a :href="`tel:${$MOBILE_CONST}`" class="btn btn_secondary d-inline-block">Запази час по телефона</a>
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

.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    align-items: stretch;
    border-radius: 6px;
    overflow: hidden;

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
