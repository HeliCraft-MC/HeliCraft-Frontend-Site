<script lang="ts">
import Cookies from 'js-cookie';

export default {
  name: 'NavbarComponent',
  data() {
    return {
      isLoggedIn: false,
      nickname: '',
      isOpen: false,
      isOpen2: false,
      isMobile: false
    }
  },
  mounted() {
    let nicknameC = Cookies.get('nickname')
    if(nicknameC && nicknameC!==undefined) {
      this.nickname = nicknameC
      this.isLoggedIn = true
    }
    this.checkWindowSize();
    window.addEventListener('resize', this.checkWindowSize);
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.checkWindowSize);
  },
  methods: {
    logout() {
      Cookies.remove('nickname')
      Cookies.remove('token')
      this.isLoggedIn = false
      this.nickname = ''
      this.isOpen = false
      window.location.reload()
    },
    checkWindowSize() {
      this.isMobile = window.innerWidth <= 900;
    }
  }
}
</script>

<template>
  <div class="flex w-full justify-center align-middle">
    <div class="w-full md:w-5/6 lg:w-4/5 xl:w-2/3 h-24 bg-purple-600 rounded-lg my-5 text-white px-10 py-8 flex justify-start gap-4 md:justify-between items-center">
      <h2 v-if="!isMobile" class="headers text-4xl">HeliCraft</h2>
      <h2 v-else class="headers text-4xl">HC</h2>
      <div class="flex justify-between items-center gap-10">
        <div v-show="isMobile" class="relative">
          <button @click="isOpen = !isOpen" class="px-4 py-2 text-gray-800 bg-gray-200 rounded">
            ☰
          </button>
          <div v-if="isOpen" class="absolute right-0 mt-2 bg-white border border-gray-200 rounded shadow">
            <router-link to="/" class="block px-4 py-2 text-lg text-gray-800 hover:bg-gray-200">Главная</router-link>
            <router-link to="/rules" class="block px-4 py-2 text-lg text-gray-800 hover:bg-gray-200">Правила</router-link>
            <router-link to="/" class="block px-4 py-2 text-lg text-gray-800 hover:bg-gray-200">Скоро!</router-link>
            <router-link to="/auth" class="block px-4 py-2 text-lg bg-white text-gray-800 rounded hover:bg-gray-200" v-if="!isLoggedIn">Войти</router-link>
            <router-link to="/profile" class="block px-4 py-2 text-lg text-gray-800 hover:bg-gray-200" v-if="isLoggedIn">Аккаунт</router-link>
            <a href="#" @click="logout" class="block px-4 py-2 text-lg text-gray-800 hover:bg-gray-200" v-if="isLoggedIn">Выход</a>
          </div>
        </div>
        <div v-show="!isMobile" class="flex justify-between items-center gap-10">
          <router-link to="/" class="text-lg">Главная</router-link>
          <router-link to="/rules" class="text-lg">Правила</router-link>
          <router-link to="/" class="blur cursor-not-allowed text-lg">Скоро!</router-link>
          <router-link to="/auth" class="text-lg bg-white text-gray-800 px-4 py-2 rounded" v-if="!isLoggedIn">Войти</router-link>
          <div class="relative" v-if="isLoggedIn">
            <button @click="isOpen = !isOpen" class="px-4 py-2 text-gray-800 bg-gray-200 rounded">
              Аккаунт {{ nickname }}
            </button>
            <div v-if="isOpen" class="absolute right-0 mt-2 bg-white border border-gray-200 rounded shadow">
              <router-link to="/profile" class="block px-4 py-2 text-lg text-gray-800 hover:bg-gray-200">Аккаунт</router-link>
              <a href="#" @click="logout" class="block px-4 py-2 text-lg text-gray-800 hover:bg-gray-200">Выход</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
</style>