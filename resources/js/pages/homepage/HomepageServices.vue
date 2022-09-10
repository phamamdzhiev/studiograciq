<template>
    <div class="section-wrapper my-5" id="homepageServices">
        <ServiceContainer title="Подстригване" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Изсушаване" tagline="Таглине, таглине, таглине, таглине" icon="bi-wind" url="/"/>
        <ServiceContainer title="Боядисване" tagline="Таглине, таглине, таглине, таглине" icon="bi-palette2" url="/"/>
        <ServiceContainer title="Официални прически" tagline="Таглине, таглине, таглине, таглине" icon="bi-stars"
                          url="/"/>
    </div>
</template>

<script>
import ServiceContainer from "../../components/ServiceContainer";

export default {
    name: "HomepageServices",
    components: {
        ServiceContainer
    }
}
</script>

<style lang="scss" scoped>
.section-wrapper {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    justify-content: center;
    @media screen and (max-width: 992px) {
        grid-template-columns: repeat(2, 1fr);
    }

    @media screen and (max-width: 576px) {
        grid-template-columns: 1fr;
    }
}
</style>
