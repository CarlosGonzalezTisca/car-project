<template>
  <div class="h-screen bg-gray-100 flex justify-center">
    <div class="py-6 px-8 h-80 mt-20 bg-white rounded shadow-xl">
      <form action="">
        <div>
          <label for="email" class="block text-gray-800 font-bold"
            >Email:</label
          >
          <input
            type="text"
            name="email"
            id="email"
            placeholder="@email"
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
            placeholder="password"
            class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 :ring-indigo-600"
          />
          <a
            href="#"
            class="text-sm font-thin text-gray-800 hover:underline mt-2 inline-block hover:text-indigo-600"
            >Forget Password</a
          >
        </div>

        <butt
          class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded"
          ><router-link :to="{ name: 'login' }">Login</router-link></butt
        >
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "login",
};
</script>

<style></style>
