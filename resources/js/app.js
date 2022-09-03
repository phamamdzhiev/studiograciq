require("./bootstrap");

import {createApp} from "vue";
import createPersistedState from "vuex-persistedstate";
import {cartPersist} from "./store/persist";
import VueSmoothScroll from 'vue3-smooth-scroll'
import router from "./router";
import {createStore} from 'vuex'
import MainApp from "./MainApp";
import Cart from "./store/cart";
// import Data from "./store/data";
import {plugin, defaultConfig} from '@formkit/vue'
import '@formkit/themes/genesis'
import VueLazyLoad from 'vue3-lazyload'

const store = createStore({
    modules: {
        Cart,
        // Data
    },
    plugins: [
        createPersistedState(cartPersist),
    ],
});
const app = createApp(MainApp);
app.use(router);
app.use(plugin, defaultConfig({
    messages: {
        en: {
            validation: {
                required() {
                    return 'Това поле е задължително';
                },
                number() {
                    return 'Това поле трябва да съдържа само цифри';
                },
                email() {
                    return 'Моля, въведете валиден имейл адрес';
                }
            }
        }
    }
}));
app.use(VueSmoothScroll, {
    duration: 50,
    updateHistory: false,
    easingFunction: 'easeInOutQuint'
})
app.use(store);
app.use(VueLazyLoad, {
    loading: '',
    error: '',
    lifecycle: {
        loading: (el) => {
            console.log('loading', el)
        },
        error: (el) => {
            console.log('error', el)
        },
        loaded: (el) => {
            console.log('loaded', el)
        }
    }
});
app.config.globalProperties.$MOBILE_CONST = '+359897371439'
app.config.globalProperties.$MOBILE_CONST_HR = '+359 897 371 439'
app.config.globalProperties.$ADDRESS_STREET_CONST = 'ул. Стоян Попов 8'
app.config.globalProperties.$ADDRESS_CITY_CONST = 'Пещера'
app.config.globalProperties.$FACEBOOK = 'https://www.facebook.com/studio.gratzia'
app.config.globalProperties.$INSTAGRAM = 'https://www.instagram.com/hairstyle_studio_graciq'
app.mount("#app");
