<template>
    <div class="service-singleton text-center p-5">
        <!--        <img src="" alt="">-->
        <i :class="icon" class="bi animated text_secondary" style="font-size: 6.5rem"></i>
        <h1 class="heading fw-light my-5">{{ title }}</h1>
        <!-- <p class="my-5" style="opacity: 0">{{ tagline }}</p> -->
        <router-link to="/services" class="d-inline-block fw-bold text_tertiary my-3" id="read-more">Виж още</router-link>
    </div>
</template>

<script>
export default {
    name: "ServiceContainer",
    props: {
        title: {
            required: true
        },
        tagline: {
            required: true
        },
        url: {
            required: true
        },
        icon: {
            required: true
        },
    }
}
</script>

<style lang="scss" scoped>
.service-singleton {
    display: flex;
    flex-flow: column nowrap;
    justify-content: space-evenly;
    background-color: #1d2223;

    a#read-more {
        font-size: 1.6rem;
    }

    .heading {
        font-size: 2.8rem;
        @media screen and (max-width: 1024px) {
            font-size: 2.5rem;
        }
    }

    &:hover {
        .animated {
            animation-name: scale;
            animation-duration: 600ms;
            animation-timing-function: ease-out;
        }
    }

    @keyframes scale {
        0% {
            transform: scale(0.8);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }
}
</style>
