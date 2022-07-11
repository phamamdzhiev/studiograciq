require("./bootstrap");

import { createApp } from "vue";
import router from "./router";
// import {createStore} from 'vuex'
import MainApp from "./MainApp";
// import storeData from './store/index';

// const store = createStore(storeData);
const app = createApp(MainApp);
app.use(router);
// app.use(store);
app.mount("#app");
