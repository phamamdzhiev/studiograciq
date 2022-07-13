<template>
    <div class="section-wrapper my-5">
        <ServiceContainer/>
        <ServiceContainer/>
        <ServiceContainer/>
        <ServiceContainer/>
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
