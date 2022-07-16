<template>
    <nav id="main-nav">
        <ul>
            <li @click="this.$emit('link-clicked')" class="me-4 py-4 px-1" v-for="link in links" :key="link.id">
                <span class="icon-wrapper" v-html="link.icon"></span>
                <router-link
                    class="nav_link d-inline-block"
                    :id="`icon-${link.slug}`"
                    :to="link.url"
                >{{ link.label }}
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Navigation",
    props: ["label"],
    setup() {
        const links = [
            {
                id: 0,
                icon: '<i class="bi bi-house-heart-fill me-3 fs-1"></i>',
                slug: "home",
                label: "Начало",
                url: "/",
            },
            {
                id: 1,
                icon: '<i class="bi bi-scissors me-3 fs-1"></i>',
                slug: "services",
                label: "Услуги",
                url: "/",
            },
            {
                id: 2,
                icon: '<i class="bi bi-person-fill me-3 fs-1"></i>',
                slug: "about",
                label: "За мен",
                url: "/",
            },
            {
                id: 3,
                icon: '<i class="bi bi-currency-dollar me-3 fs-1"></i>',
                slug: "prices",
                label: "Ценоразпис",
                url: "/pricelist",
            },
            {
                id: 4,
                icon: '<i class="bi bi-bag-heart-fill me-3 fs-1"></i>',
                slug: "shop",
                label: "Магазин",
                url: "/",
            },
            {
                id: 5,
                icon: '<i class="bi bi-calendar-week-fill me-3 fs-1"></i>',
                slug: "appointments",
                label: "График",
                url: "/",
            },
        ];

        return {
            links,
        };
    },
};
</script>

<style lang="scss" scoped>
nav#main-nav ul {
    @media screen and (max-width: 992px) {
        display: flex;
        flex-direction: column;
    }
}

a.nav_link {
    position: relative;

    &::after {
        content: "";
        display: block;
        width: 0;
        height: 2px;
        background-color: #9e49a3;
        position: absolute;
        left: 0;
        right: 0;
        transition: width 200ms ease-in;
        bottom: -1px;
    }

    &:hover,
    &.router-link-active {
        &::after {
            width: 100%;
        }
    }
}

span.icon-wrapper {
    @media screen and (min-width: 992px) {
        display: none !important;
    }
}
</style>
