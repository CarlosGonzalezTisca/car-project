<template>
  <div>
    <table class="min-w-full divide-y divide-gray-200">
      <thead class="bg-gray-50">
        <tr>
          <th
            scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            ID
          </th>
          <th
            scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Car Name
          </th>
          <th
            scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Year
          </th>
          <th
            scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Model
          </th>
          <th
            scope="col"
            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
          >
            Description
          </th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        <tr v-for="item in data" :key="item.id">
          <td class="px-6 py-4 whitespace-nowrap">{{ item.id }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ item.car_name }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ item.year }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ item.model }}</td>
          <td class="px-6 py-4 whitespace-nowrap">{{ item.description }}</td>
        </tr>
      </tbody>
    </table>
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
  async mounted() {
    try {
      const response = await this.axios.get("/api/car/retrive");
      if (response.data.success) {
        this.data = response.data.data.data;
        this.message = response.data.message;
      } else {
        this.error = response.data.message;
      }
    } catch (error) {
      console.error("Error fetching data:", error);
      this.error = "Failed to fetch data.";
    }
  },
  data() {
    return {
      data: [],
    };
  },
};
</script>
