<script lang="ts">
export default {
  name: 'NavbarComponent'
}
</script>
<template>
  <div class="flex w-full justify-center align-middle">
    <div
      class="w-11/12 h-24 bg-purple-600 rounded-lg my-5 text-white px-10 py-8 flex justify-between items-center"
    >
      <h2 class="headers text-4xl">HeliCraft</h2>
      <div class="flex justify-between gap-10">
        <router-link class="text-lg" to="/">Главная</router-link>
        <router-link class="text-lg" to="/rules">Правила</router-link>
        <router-link class="text-lg" to="/">Home</router-link>
        <router-link class="text-lg" to="/"></router-link>
        <router-link class="text-lg" to="/"></router-link>
      </div>
    </div>
  </div>
</template>
<style scoped></style>
