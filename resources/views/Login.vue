<template>
  <div class="h-screen bg-gray-100 flex justify-center">
    <div class="py-6 px-8 h-auto w-auto mt-20 bg-white rounded shadow-xl">
      <form @submit.prevent="IniciarSesion">
        <div>
          <label for="email" class="block text-gray-800 font-bold"
            >Email:</label
          >
          <input
            type="text"
            name="email"
            id="email"
            placeholder="@email"
            v-model="email"
            class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
          />
        </div>
        <div class="mb-6">
          <label for="name" class="block text-gray-800 font-bold"
            >Password:</label
          >
          <input
            type="password"
            name="name"
            id="name"
            v-model="password"
            placeholder="password"
            class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
          />
          <a
            href="#"
            class="text-sm font-thin text-gray-800 hover:underline mt-2 inline-block hover:text-indigo-600"
            >Forget Password</a
          >
        </div>
          <!-- Mensajes de error y éxito -->
          <div v-if="showMessage" class="mt-4 p-2 bg-red-100 text-red-600 rounded">
            {{ errorMessage }}
          </div>
          <div v-if="showMessageSuccess" class="mt-4 p-2 bg-green-100 text-green-600 rounded">
            {{ message }}
          </div>
        <button
          class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded"
          >Iniciar Sesion</button
        >
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "login",
  data(){
    return {
      showMessage: false,
      showMessageSuccess:false,
      errorMessage:"",
      email:"",
      password:""
    }
  },
  methods:{
    async IniciarSesion(){
      try {
        const response = await this.axios.post("api/login", 
        {
          email: this.email,
          password: this.password
        },
        )
        this.showMessageSuccess = true;
        this.message = "Welcome!";
      } catch (error) {
        const errorMessage = error.response.data?.message || "Ha ocurrido un error";
          this.errorMessage = errorMessage;
          this.showMessage = true;
      }
    }
  }
};
</script>

<style></style>
