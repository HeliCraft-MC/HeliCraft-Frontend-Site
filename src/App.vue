<script setup lang="ts">
import { RouterView } from 'vue-router'
import NavbarComponent from './components/NavbarComponent.vue'
import FooterComponent from './components/FooterComponent.vue'

import axios from 'Axios'
//base url
axios.defaults.baseURL = 'https://api.helicraft.ru'
</script>

<template>
  <NavbarComponent class="fixed top-0 left-0 z-10" />
  <RouterView class="h-full" />
  <FooterComponent class="" />
</template>

<style scoped></style>
