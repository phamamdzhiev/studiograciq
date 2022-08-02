require("./bootstrap");

import {createApp} from "vue";
import VueSmoothScroll from 'vue3-smooth-scroll'
import router from "./router";
import {createStore} from 'vuex'
import MainApp from "./MainApp";
import Cart from "./store/cart";
import Data from "./store/data";

const store = createStore({
    modules: {
        Cart,
        Data
    }
});
const app = createApp(MainApp);
app.use(router);
app.use(VueSmoothScroll, {
    duration: 50,
    updateHistory: false,
    easingFunction: 'easeInOutQuint'
})
app.use(store);
app.mount("#app");
