<script lang="ts">
import Cookies from 'js-cookie';
export default {
  name: 'NavbarComponent',
  data() {
    return {
      isLoggedIn: false,
      nickname: '',
      isOpen: false
    }
  },
  mounted() {
    let nicknameC = Cookies.get('nickname')
    if(nicknameC && nicknameC!==undefined) {
      this.nickname = nicknameC
      this.isLoggedIn = true
    }
  },
  methods: {
    logout() {
      Cookies.remove('nickname')
      Cookies.remove('token')
      this.isLoggedIn = false
      this.nickname = ''
      this.isOpen = false
      window.location.reload()
    }
  }
}
</script>
<template>
  <div class="flex w-full justify-center align-middle">
    <div
      class="w-11/12 h-24 bg-purple-600 rounded-lg my-5 text-white px-10 py-8 flex justify-between items-center"
    >
      <h2 class="headers text-4xl">HeliCraft</h2>
      <div class="flex justify-between items-center gap-10">
        <router-link class="text-lg" to="/">Главная</router-link>
        <router-link class="text-lg" to="/rules">Правила</router-link>
        <router-link class="blur cursor-not-allowed text-lg" to="/">Скоро!</router-link>
        <router-link class="text-lg bg-white text-gray-800 px-4 py-2 rounded" v-if="!isLoggedIn" to="/auth">Войти</router-link>
        <div class="relative" v-if="isLoggedIn">
          <button @click="isOpen = !isOpen" class="px-4 py-2 text-gray-800 bg-gray-200 rounded">
            Аккаунт {{ nickname }}
          </button>
          <div v-if="isOpen" class="absolute right-0 mt-2 bg-white border border-gray-200 rounded shadow">
            <router-link to="/profile" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Аккаунт</router-link>
            <a href="#" @click="logout" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Выход</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped></style>
