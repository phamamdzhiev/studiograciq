<template>
    <div class="section-wrapper my-5">
        <div class="image-wrapper">
            <img
                class="img-fluid"
                src="/storage/assets/banners/banner-home-about.jpg"
                alt="About me section image"
            />
        </div>
        <div class="info-wrapper">
            <h1 class="heading">
                Обслужване <span class="d-block">над очакванията</span>
            </h1>
            <p class="text text_fourtriary my-4">
                Фризьорският ни салон е мястото, създадено за жените,
                <span class="d-block">които ценят високото качество, перфектното</span>
                <span class="d-block">обслужване и първокласната визия.</span>
                <span class="d-block mt-3">Добре дошли в "Грация"!</span>
            </p>
            <router-link to="/about" class="btn_tertiary btn-inverse mt-4 d-inline-block">
                Повече за мен
            </router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "HomepageAbout"
}
</script>

<style lang="scss" scoped>
.section-wrapper {
    display: grid;
    grid-template-columns: 1fr 1fr;
    justify-content: center;
    gap: 20px;
    @media screen and (max-width: 992px) {
        grid-template-columns: 1fr;
    }
}

.img-fluid {
    filter: brightness(0.8);
}

.heading {
    font-size: 5rem;
    @media screen and (max-width: 1024px) {
        font-size: 3rem;
    }
}

.image-wrapper > img {
    margin: auto;
}

.info-wrapper {
}
</style>
