<template>
  <TopBarHeader class="d-block d-xl-none" />
  <header id="header">
    <div class="container-fluid">
      <div class="d-flex align-items-center">
        <div id="logo" class="me-5">
          <router-link to="/">
            <img
              class="img-fluid py-4 px-1"
              width="125"
              src="/storage/assets/logo-transparent.png"
              alt="Brand Logo"
            />
          </router-link>
        </div>
        <div
          :class="{ 'd-none': isHidden }"
          class="d-flex justify-content-between align-items-center d-lg-flex"
          id="navigation"
        >
          <nav>
            <ul>
              <li class="me-4 py-4 px-1" v-for="link in links" :key="link.id">
                <span class="icon-wrapper" v-html="link.icon"></span>
                <a
                  class="nav_link d-inline-block"
                  :id="`icon-${link.slug}`"
                  :href="link.url"
                  >{{ link.label }}</a
                >
              </li>
            </ul>
          </nav>
          <HeaderContacts class="d-none d-xl-flex" />
        </div>
        <div
          @click="hamburgerHandler"
          id="hamburger"
          :class="{ opened: !isHidden }"
          class="d-flex d-lg-none"
        >
          <div class="bar bar-1"></div>
          <div class="bar bar-2"></div>
          <div class="bar bar-3"></div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import TopBarHeader from "./TopBarHeader";
import HeaderContacts from "./HeaderContacts";
import { ref } from "vue";

export default {
  name: "Header",
  components: {
    TopBarHeader,
    HeaderContacts,
  },
  setup() {
    const isHidden = ref(true);

    const hamburgerHandler = () => {
      isHidden.value = !isHidden.value;
    };

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
        url: "/",
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
      hamburgerHandler,
      isHidden,
    };
  },
};
</script>

<style lang="scss" scoped>
#header {
  //outline: 2px solid salmon;
  position: relative;
  //top: 0;
  //left: 0;
  //width: 100%;
  div#logo {
    transform-origin: center center;
    transition: transform 100ms ease-in;
    &:hover {
      transform: rotate(-5deg);
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

    &:hover {
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

  div#hamburger {
    display: flex;
    flex-flow: column nowrap;
    justify-content: space-around;
    width: 35px;
    height: 35px;
    margin: 0 0 0 auto;

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
