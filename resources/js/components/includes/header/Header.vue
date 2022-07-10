<template>
    <TopBarHeader class="d-block d-xl-none"/>
    <header id="header">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <div id="logo" class="me-5">
                    <img class="img-fluid py-4 px-1"
                         src="https://hair.nelson.themerex.net/wp-content/uploads/2020/04/Logo-Salon.png"
                         alt="Brand Logo">
                </div>
                <div class="d-flex justify-content-between align-items-center w-100 d-none d-lg-flex">
                    <nav>
                        <ul>
                            <li class="me-4 py-4 px-1" v-for="link in links" :key="link.id">
                                <a class="nav_link d-inline-block" :href="link.url">{{ link.label }}</a>
                            </li>
                        </ul>
                    </nav>
                    <HeaderContacts class="d-none d-xl-flex"/>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
import TopBarHeader from "./TopBarHeader";
import HeaderContacts from "./HeaderContacts";

export default {
    name: "Header",
    components: {
        TopBarHeader,
        HeaderContacts
    },
    setup() {
        const links = [
            {id: 0, label: 'Начало', url: '/'},
            {id: 1, label: 'Услуги', url: '/'},
            {id: 2, label: 'За мен', url: '/'},
            {id: 3, label: 'Ценоразпис', url: '/'},
            {id: 4, label: 'Магазин', url: '/'},
            {id: 5, label: 'График', url: '/'},
        ];

        return {
            links
        }
    }
}
</script>

<style lang="scss" scoped>
#header {
    //outline: 2px solid salmon;
    //position: fixed;
    //top: 0;
    //left: 0;
    //width: 100%;

    .nav_link {
        position: relative;

        &::after {
            content: '';
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

        &:hover {
            &::after {
                width: 100%;
            }
        }
    }
}
</style>
