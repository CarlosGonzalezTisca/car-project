<template>
  <!-- component -->
  <header>
    <nav>
      <div class="">
        <div class="flex justify-between w-screen px-10 shadow items-center">
          <div class="flex items-center space-x-8">
            <h1
              @click="route"
              class="text-xl lg:text-2xl font-bold cursor-pointer"
            >
              CarApp
            </h1>
          </div>
          <div class="flex space-x-4 items-center">
            <router-link v-if="!isLoggedIn" to="/login" class="text-gray-800 text-sm">LOGIN</router-link>
            <router-link v-if="!isLoggedIn" to="/register" class="bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-500 text-sm">Register</router-link>
            <div v-if="isLoggedIn">
              <h1>Hola!</h1>
              <button  @click="logout" class="bg-red-600 px-4 py-2 rounded text-white hover:bg-gray-500 text-sm">Logout</button>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div
    v-show="!isLoginPage && !isRegisterPage"
    class="flex flex-col items-center pt-4"
  >
    <button
      @click="tocars()"
      class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
    >
      Carros
    </button>
    <button
      @click="tomap()"
      class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
    >
      Mapa
    </button>
  </div>
  <div>
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  created() {
    if (!localStorage.getItem('token') && !this.isLoginPage && !this.isRegisterPage && !this.isHomePage) {
      alert('No autorizado');
      this.$router.push('/login');
    }
  },
  mounted() {
      if (localStorage.getItem("token")) {
        this.isLoggedIn = true;
      }
    },
  data() {
    return {
      currentRoute: this.$route.path,
      isLoggedIn: false
    };
  },
  computed: {
    isLoginPage() {
      return this.currentRoute === "/login";
    },
    isRegisterPage() {
      return this.currentRoute === "/register";
    },
  },
  methods: {
    async logout(){
      try {
        const response = await this.axios.post("api/logout")
        localStorage.clear('token', response.data.access_token);
        this.$router.push('/')
        window.location.reload();

      } catch (error) {
        const errorMessage = error.response.data?.message || "Ha ocurrido un error";
          this.errorMessage = errorMessage;
          this.showMessage = true;
      }
    },
    route() {
      this.$router.push("/");
    },
    tocars() {
      this.$router.push("/home");
    },
    tomap() {
      this.$router.push("/maps");
    },
  },
  watch: {
    $route(to, from) {
      this.currentRoute = to.path;
    },
  },
};
</script>
