import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import dotenv from "dotenv";

dotenv.config();


export default defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/app.css", "resources/js/app.js"],
      refresh: true,
    }),
    vue(),
  ],
  server: {
    port: parseInt(process.env.VUE_LOCAL_PORT),
    host: '0.0.0.0'
  },
  
  
});
