<script lang="ts">
import SkinViewer from '@/components/SkinViewerComponent.vue' 
import axios from 'Axios';
import Cookies from 'js-cookie';
  
export default {
    components: {
        SkinViewer
    },
    data() {
      return {
        file: null as File | null,
        nickname: '',
        token: '',
        componentKey: 0,
        password: '',
        passwordError: false,
        passwordErrorMessage: '',
        skinError: false,
        skinErrorMessage: '',
        passwordUpdate: false,
        auth: true
      };
    },
    created() {
      let nicknameC = Cookies.get('nickname')
      if(nicknameC && nicknameC!==undefined) {
        this.nickname = nicknameC
      }
      let tokenC = Cookies.get('token')
      if(tokenC && tokenC!==undefined) {
        this.token = tokenC
      } else {
        this.auth = false
      }
    },
    methods: {
      handleFileChange(event: Event): void {
        const target = event.target as HTMLInputElement;
        this.file = (target.files as FileList)[0];
      },
      async changePassword(): Promise<void> {
        try {
          if (!this.password || this.password == '') {
            this.passwordError = true;
            this.passwordErrorMessage = 'Вы не ввели пароль';
            setTimeout(() => {
              this.passwordError = false;
              this.passwordErrorMessage = '';
            }, 3000)
          } 
          axios.post('/newPassword', {
            nickname: this.nickname,
            token: this.token,
            password: this.password
          }).then((response) => {
            this.password = ''
            this.passwordUpdate = true
            setTimeout(() => {
              this.passwordUpdate = false
            }, 3000)
          })
        } catch (error) {
          console.error(error);
        }
      },
      async uploadFile(): Promise<void> {
        try {
          if (!this.file) {
            this.skinError = true;
            this.skinErrorMessage = 'Вы не выбрали файл';
            setTimeout(() => {
              this.skinError = false;
              this.skinErrorMessage = '';
            }, 3000)
          }
  
          const formData = new FormData();
          if(this.file != null){
            formData.append('file', this.file);
          }
          formData.append('nickname', this.nickname);
          formData.append('token', this.token);

  
          const response = await axios.post('/skin/upload', formData, {
            headers: {
              'Content-Type': 'multipart/form-data',
            },
          }
          );
  
          console.log(response.data.message);
          if(response.data.message === 'File uploaded successfully'){
            
            window.location.reload();
          }
        } catch (error) {
          console.error(error);
        }
      },
    },
  };
</script>
<template>
    <div class="h-full" v-if="auth">
      <h1 class="text-5xl text-white text-center">Профиль {{ nickname }}</h1>
      <div class="flex h-fit justify-center">
        
          <div class="mx-6 grid lg:h-screen lg:grid-cols-2 lg:grid-rows-2 gap-4 grid-cols-1 w-11/12">
                <div class="cont h-fit lg:row-span-2 lg:col-span-1 p-5 rounded flex justify-center justify-items-center flex-col">
                  <SkinViewer class="w-fit place-self-center justify-self-center" :key="componentKey" />
                  <div class="bg-slate-300 ml-5 pr-5 py-5 rounded justify-center justify-items-center flex flex-col">
                    <h3 class="text-xl text-center md-5">Загрузить новый скин</h3>
                      <div class="justify-center justify-items-center flex flex-col sm:flex-row gap-4" >
      
                        <div class="bg-red-200 text-red-800 p-4 rounded ml-5 my-5" v-if="skinError">
                          <span class="font-bold">{{ skinErrorMessage }}</span>
                        </div>
                        <input class=" bg-slate-100 rounded ml-5 p-5" type="file" ref="fileInput" @change="handleFileChange" />
                        <button class=" bg-slate-100 rounded ml-10 p-5" @click="uploadFile">Загрузить</button>
                      </div>
                  </div>
                  <div class="flex blur-md justify-center cursor-not-allowed ">
                    <router-link to="" class="bg-slate-100 cursor-not-allowed rounded mt-10 p-5">
                      Каталог скинов(СКОРО!!!!)
                    </router-link>
                  </div>
              </div>
              <div class=" ">
                  <div class="cont lg:row-span-1 lg:col-span-1 rounded h-fit p-10">
                    <div class="bg-slate-300 ml-5 pr-5 py-5 rounded flex flex-col justify-center justify-items-center">
                      <h3 class="text-xl text-center md-5">Изменить пароль</h3>
                      <div class="bg-red-200 text-red-800 p-4 rounded ml-5 my-5" v-if="passwordError">
                        <span class="font-bold">{{ passwordErrorMessage }}</span>
                      </div>
                      <div class="bg-green-200 text-green-800 p-4 rounded ml-5 my-5" v-if="passwordUpdate">
                        <span class="font-bold">Пароль обновлен!</span>
                      </div>
                      
                      <div class="justify-center justify-items-center flex flex-col sm:flex-row gap-4">
                        <input class=" bg-slate-100 rounded ml-5 p-5" type="password" v-model="password" placeholder="Введите новый пароль" />
                        <button class=" bg-slate-100 rounded ml-10 p-5" @click="changePassword">Изменить</button>
                      </div>
                    </div>
                  </div>
                  <div class="cont lg:row-span-1 lg:col-span-1 rounded h-fit p-10 flex flex-col justify-center cursor-not-allowed blur-md  text-white">
                      <h2 class="text-2xl text-center">HeliCraft Reloaded Season 4</h2>
                      <h3 class="text-2xl text-center">Следущее обновление: --СКОРО--</h3>
                      <img class="rounded" src="https://placehold.co/500x200?text=Скоро" alt="">
                      <div class="flex justify-between flex-row items-center">
                        <p class="text-center">СКОРО</p>
                        <router-link to="" class="bg-slate-100 cursor-not-allowed text-black rounded mt-10 p-5">
                          Подробнее
                        </router-link>
                      </div>
                  </div>
              </div>
          
          </div>
      </div>
    </div>
    <div v-else>
      <h1 class="text-5xl text-white text-center">Вы не авторизованы</h1>
      <div class="flex justify-center">
        <router-link to="/auth" class="bg-slate-100 rounded mt-10 p-5">
          Авторизоваться
        </router-link>
      </div>
    </div>
</template>
<style scoped>
.cont{
    background-color: rgba(0, 0, 0, 0.5); /* Set the background color with alpha transparency */
    backdrop-filter: blur(5px); /* Apply a blur effect to the background */
    z-index: 0;
}
.content{
    width: 100%;
}
h1{
  margin-top: 130px;
  margin-bottom: 20px;
}
</style>