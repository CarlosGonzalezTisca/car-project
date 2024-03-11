import { createApp } from "vue";
import App from "../src/App.vue";
import axios from "axios";
import VueAxios from "vue-axios";
import router from "../router";
import "../css/app.css";
import PlaceInputImpl from 'vue2-google-maps/dist/components/placeInputImpl.js';

axios.defaults.baseURL = "http://localhost:9000/";

const token = localStorage.getItem("token");

if (token) {
  axios.defaults.headers.common["Authorization"] = "Bearer" + token;
}

createApp(App)
  .use(router)
  .use(VueAxios, axios).
  use(PlaceInputImpl, {
    load: {
      key: "AIzaSyCR86ZiQbIEJKuOZfIW3dNnd8hIUs8zGBc",
      libraries: "places",
    },
  })
  .mount("#app")
  ;
