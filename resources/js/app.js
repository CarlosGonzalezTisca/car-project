import { createApp } from "vue";
import App from "../src/App.vue";
import axios from "axios";
import VueAxios from "vue-axios";
import router from "../router";
import "../css/app.css";

axios.defaults.baseURL = "http://localhost:9000/";

const token = localStorage.getItem('token');

if(token){
    axios.defaults.headers.common['Authorization'] = 'Bearer' + token;
}


createApp(App).use(router).use(VueAxios, axios).mount("#app");
