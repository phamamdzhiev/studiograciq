<template>
    <div class="service-singleton text-center p-5">
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
        <ServiceContainer title="Подстрижка" tagline="Таглине, таглине, таглине, таглине" icon="bi-scissors" url="/"/>
    </div>
</template>

<script>
import ServiceContainer from "../../components/ServiceContainer";
export default {
    name: "Services",
    components: {
        ServiceContainer
    }
}
</script>

<style scoped>
.service-singleton {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;

}
</style>
