<template>
    <div class="login-page">
      <div class="header">
        <h1 class="headers">HeliCraft</h1>
        <h2 class="subheader">Авторизация</h2>
      </div>
      <div class="content">
        <form class="form">
          <h3 class="form-title">{{ isLogin ? 'Вход' : 'Регистрация' }}</h3>
          <div class="form-group">
            <label for="email" class="form-label">Никнейм:</label>
            <input type="email" id="email" v-model="nickname" class="form-input" />
          </div>
          <div class="form-group">
            <label for="password" class="form-label">Пароль:</label>
            <input type="password" id="password" v-model="password" class="form-input" />
          </div>
          <button @click="loginOrRegister" class="form-button">
            {{ isLogin ? 'Войти' : 'Зарегестрироваться' }}
          </button>
          <button @click.prevent="toggleForm" class="form-toggl">
            {{ isLogin ? 'У меня пока нет аккаунта' : 'У меня уже есть аккаунт' }}
          </button>
        </form>
      </div>
    </div>
  </template>
  
  <script lang="ts">
  import { checkPassword } from '@/utils/authUtils';
import { createToken } from '@/utils/jwtUtils';
  import Cookies from 'js-cookie';
  export default {
    name: 'AuthView',
    data() {
      return {
        nickname: '',
        password: '',
        isLogin: true
      }
    },
    methods: {
      async loginOrRegister() {
        if ( this.isLogin) {
          if(await checkPassword(this.nickname, this.password)) {
            Cookies.set('nickname', this.nickname, {
              expires: 7
            })
            Cookies.set('token', createToken(this.nickname), {
              expires: 7
            })
            window.location.href = '/';
          }
        }
      },
      toggleForm() {
        this.isLogin = !this.isLogin
      }
    }
  }
  </script>
  
  <style scoped>
  .login-page {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }
  
  .header {
    text-align: center;
    margin-bottom: 20px;
  }
  
  .headers {
    font-size: 48px;
    color: #fff;
  }
  
  .subheader {
    font-size: 18px;
    color: #fff;
  }
  
  .content {
    background-color: #7c3aed;
    padding: 20px;
    border-radius: 8px;
  }
  
  .form {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .form-title {
    font-size: 24px;
    font-weight: bold;
    color: #fff;
    margin-bottom: 20px;
  }
  
  .form-group {
    display: flex;
    flex-direction: column;
    margin-bottom: 10px;
  }
  
  .form-label {
    font-size: 16px;
    color: #fff;
    margin-bottom: 5px;
  }
  
  .form-input {
    padding: 8px;
    border-radius: 4px;
    border: none;
  }
  
  .form-button {
    background-color: #4f46c1;
    color: #fff;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 4px;
    border: none;
    margin-top: 10px;
    cursor: pointer;
  }
  
  .form-toggle {
    color: #ffffff !important;
    font-size: 14px;
    margin-top: 10px;
    cursor: pointer;
  }
  </style>