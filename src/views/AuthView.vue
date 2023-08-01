<template>
    <div class="login-page">
      <div class="header">
        <h1 class="headers">HeliCraft</h1>
        <h2 class="subheader">Авторизация</h2>
      </div>
      <div class="content">
        <form class="form" @submit.prevent="loginOrRegister">
          <div class="inline-block px-2 py-1 leading-none bg-red-500 text-white rounded-full" v-if="isError">Error: {{ error }}</div>
          <h3 class="form-title">{{ isLogin ? 'Вход' : 'Регистрация' }}</h3>
          <div class="form-group">
            <label for="email" class="form-label">Никнейм:</label>
            <input type="text" id="email" v-model="nickname" class="form-input" />
          </div>
          <div class="form-group">
            <label for="password" class="form-label">Пароль:</label>
            <input type="password" id="password" v-model="password" class="form-input" />
          </div>
          <button type="submit" class="form-button">
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
  import Cookies from 'js-cookie';
  import axios from 'Axios';
  export default {
    name: 'AuthView',
    data() {
      return {
        nickname: '',
        password: '',
        token: '',
        error: '',
        isError: false,
        isLogin: true
      }
    },
    methods: {
      convertDurationToSeconds(duration:string) {
        const durationValue = parseInt(duration);
        const durationUnit = duration.slice(-1);

        let seconds = 0;

        switch (durationUnit) {
          case 's':
            seconds = durationValue;
            break;
          case 'm':
            seconds = durationValue * 60;
            break;
          case 'h':
            seconds = durationValue * 60 * 60;
            break;
          case 'd':
            seconds = durationValue * 24 * 60 * 60;
            break;
          default:
            // handle invalid duration unit
            break;
          }

        return seconds;
      },
      requestAuthToken() {
        axios.post('/auth', {
          nickname: this.nickname,
          password: this.password,
          request: 'login'
        }).then((response) => {
          this.token = response.data.token;
          const expiresIn = response.data.expiresIn;
          const expirationSeconds = this.convertDurationToSeconds(expiresIn);
      
          const expirationDate = new Date();
          expirationDate.setSeconds(expirationDate.getSeconds() + expirationSeconds);
      
          Cookies.set('token', this.token, {
            expires: expirationDate,
            secure: true
          });

          Cookies.set('nickname', this.nickname, {
            expires: expirationDate,
            secure: true
          });

          window.location.href = '/';

        }).catch((error) => {
          console.log(error);
          this.isError = true;
          this.error = error;
        });
      },
      loginOrRegister() {
        if (this.isLogin) {
          this.requestAuthToken();
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