<script setup lang="ts">
import { RouterView } from 'vue-router'
import NavbarComponent from './components/NavbarComponent.vue'
import FooterComponent from './components/FooterComponent.vue'
</script>

<template>
  <NavbarComponent class="fixed top-0 left-0" />
  <RouterView />
  <FooterComponent />
</template>

<style scoped>
</style>
