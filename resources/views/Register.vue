<template>
    <div class="h-screen bg-gray-100 flex justify-center">
      <div class="py-6 px-8 h-auto w-auto mt-20 bg-white rounded shadow-xl">
        <form @submit.prevent="createUser">
          <div>
            <label for="name" class="block text-gray-800 font-bold">Nombre:</label>
            <input type="text" name="name" id="name" placeholder="Andrea Sanchez" v-model="name" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
          </div>
          <div>
            <label for="email" class="block text-gray-800 font-bold">Email:</label>
            <input type="text" name="email" id="email" placeholder="@email" v-model="email" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
          </div>
          <div>
            <label for="candy" class="block text-gray-800 font-bold">Password:</label>
          </div>
          <div>
            <input type="password" name="candy" v-model="password" id="password" placeholder="password" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
            <label for="candyconfirm" class="block text-gray-800 font-bold">Confirmar password:</label>
            <input type="password" name="candyconfirm" v-model="password_confirmation" id="confirm" placeholder="confirm password" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600" />
            <a href="#" class="text-sm font-thin text-gray-800 hover:underline mt-2 inline-block hover:text-indigo-600">Olvidé mi contraseña</a>
          </div>
  
          <!-- Mensajes de error y éxito -->
          <div v-if="showMessage" class="mt-4 p-2 bg-red-100 text-red-600 rounded">
            {{ errorMessage }}
          </div>
          <div v-if="showMessageSuccess" class="mt-4 p-2 bg-green-100 text-green-600 rounded">
            {{ message }}
          </div>
  
          <!-- Botón de registro -->
          <button class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded">Registrarse</button>
        </form>
    </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "register",
    data() {
      return {
        showMessage: false,
        showMessageSuccess: false,
        errorMessage: "",
        message: "",
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
      };
    },
    methods: {
      async createUser() {
        try {
          const response = await this.axios.post("api/register", {
            email: this.email,
            name: this.name,
            password: this.password,
            password_confirmation: this.password_confirmation,
          });
          this.showMessageSuccess = true;
          this.message = "Registro exitoso";
        } catch (error) {
          const errorMessage = error.response?.data?.error || "Ha ocurrido un error durante el registro";
          this.errorMessage = errorMessage;
          this.showMessage = true;
        }
      },
    },
  };
  </script>
  
  <style></style>
  