<template>
    <div class="container-fluid">
        <div class="section-wrapper my-5">
            <div class="image-wrapper p-3">
                <img
                    class="img-fluid"
                    src="https://hair.nelson.themerex.net/wp-content/uploads/2019/08/image-10-copyright.jpg"
                    alt="About me section image"
                />
            </div>
            <div class="info-wrapper p-3">
                <h1 class="heading">
                    Обслужване <span class="d-block">над очакванията</span>
                </h1>
                <p class="text text_fourtriary my-4">
                    Фризьорският ни салон е мястото, създадено за жените,
                    <span class="d-block">които ценят високото качество, перфектното</span>
                    <span class="d-block">обслужване и първокласната визия.</span>
                    <span class="d-block mt-3">Добре дошли в "Грация"!</span>
                </p>
                <button class="btn_tertiary btn-inverse mt-4" type="button">
                    Повече за мен
                </button>
            </div>
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
    gap: 10px;
    max-width: 1300px;
    margin: auto;
    @media screen and (max-width: 992px) {
        grid-template-columns: 1fr;
    }
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
