<template>
    <!-- component -->
    <header>
      <nav>
        <div class="">
          <div class="flex justify-between h-16 px-10 shadow items-center">
            <div class="flex items-center space-x-8">
              <h1 class="text-xl lg:text-2xl font-bold cursor-pointer">CarApp</h1>
            </div>
            <div class="flex space-x-4 items-center">
              <router-link to="/login" class="text-gray-800 text-sm">LOGIN</router-link>
              <router-link to="/register" class="bg-indigo-600 px-4 py-2 rounded text-white hover:bg-indigo-500 text-sm">Register</router-link>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <div class="justify-between items-center">
        <router-view></router-view>
    </div>
  </template>
  
  <script>
  </script>
