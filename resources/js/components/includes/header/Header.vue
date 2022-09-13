<template>
    <TopBarHeader class="d-block d-xl-none"/>
    <header id="header">
        <div class="container-fluid">
            <div class="d-flex align-items-center">
                <div id="logo" class="me-5">
                    <router-link to="/">
                        <img
                            class="img-fluid py-4 px-1"
                            width="120"
                            src="/storage/assets/logo-transparent.png"
                            title="Студио Грация | Дамяна Стайкова"
                            alt="Brand Logo"
                        />
                    </router-link>
                </div>
                <div
                    :class="{ 'd-none': isHidden }"
                    class="d-flex justify-content-between align-items-center d-lg-flex"
                    id="navigation"
                >
                    <Navigation @link-clicked="isHidden = true"/>
                    <HeaderContacts class="d-none d-xl-flex"/>
                </div>
               <div id="hamburger-wrapper" class="d-lg-none d-flex align-items-center">
                   <div class="me-4">
                       <Cart/>
                   </div>
                   <div
                       @click="hamburgerHandler"
                       id="hamburger"
                       :class="{ opened: !isHidden }"
                       class="d-flex"
                   >
                       <div class="bar bar-1"></div>
                       <div class="bar bar-2"></div>
                       <div class="bar bar-3"></div>
                   </div>
               </div>
            </div>
        </div>
    </header>
</template>

<script>
import TopBarHeader from "./TopBarHeader";
import HeaderContacts from "./HeaderContacts";
import Navigation from "./Navigation";
import {ref} from "vue";
import Cart from "./Cart";

export default {
    name: "Header",
    components: {
        Cart,
        TopBarHeader,
        HeaderContacts,
        Navigation,
    },
    setup() {
        const isHidden = ref(true);

        const hamburgerHandler = () => {
            isHidden.value = !isHidden.value;
        };

        return {
            hamburgerHandler,
            isHidden,
        };
    },
};
</script>

<style lang="scss" scoped>
#header {
    position: relative;

    div#navigation {
        width: 100%;
        @media screen and (max-width: 992px) {
            padding-top: 2rem;
            background-color: #1c2325;
            position: absolute;
            height: 100vh;
            top: 0;
            left: 0;
            width: 75%;
            flex-direction: column;
            box-shadow: rgba(17, 17, 26, 0.1) 0 1px 0,
            rgba(17, 17, 26, 0.1) 0 8px 24px, rgba(17, 17, 26, 0.1) 0 16px 48px;
            z-index: 5000;
            li {
                display: block;
            }
        }
    }

    div#hamburger-wrapper {
        margin: 0 0 0 auto;
    }

    div#hamburger {
        display: flex;
        flex-flow: column nowrap;
        justify-content: space-around;
        width: 35px;
        height: 35px;


        .bar {
            width: 100%;
            height: 2px;
            background-color: white;
            margin: 0 0 0 auto;
            transition: transform 200ms ease-in;

            &.bar-1 {
                width: calc(100% - 10px);
            }

            &.bar-2 {
                width: calc(100% - 5px);
            }
        }

        &.opened {
            .bar-1 {
                width: 100%;
                transform: rotate(45deg);
            }

            .bar-2 {
                display: none;
            }

            .bar-3 {
                transform: rotate(-45deg) translate(10px, -13px);
            }
        }
    }
}
</style>
