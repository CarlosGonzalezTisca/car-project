import { createApp } from "vue";
import App from "../src/App.vue";
import axios from "axios";
import VueAxios from "vue-axios";
import router from "../router";
import "../css/app.css";

axios.defaults.baseURL = "http://localhost:9000/";


createApp(App).use(router).use(VueAxios, axios).mount("#app");
