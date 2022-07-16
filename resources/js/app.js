require("./bootstrap");

import {createApp} from "vue";
import VueSmoothScroll from 'vue3-smooth-scroll'
import router from "./router";
// import {createStore} from 'vuex'
import MainApp from "./MainApp";
// import storeData from './store/index';

// const store = createStore(storeData);
const app = createApp(MainApp);
app.use(router);
app.use(VueSmoothScroll, {
    duration: 50,
    updateHistory: false,
    easingFunction: 'easeInOutQuint'
})
// app.use(store);
app.mount("#app");
