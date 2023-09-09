<script lang="ts">
import CopyButtonN from '@/components/CopyButton.vue'
import PulsatingDot from '@/components/PulsatingDot.vue';
import axios from 'Axios';
export default {
  components: {
    CopyButtonN,
    PulsatingDot
  },
  data() {
    return {
      online: -1,
      maxOnline: -1,
      season: "null",
      year: "null",
      month: "null",
      day: "null",
    }
  },
  mounted() {
    axios.get('https://server-api.helicraft.ru/v1/server', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis'
      }
    }).then((response) => {
      this.online = response.data.onlinePlayers;
      this.maxOnline = response.data.maxPlayers;
    })

    axios.post('https://server-api.helicraft.ru/v1/placeholders/replace', 
  'message=%25rs_season_world%25&uuid=', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis',
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }).then((response) => {
      this.season = response.data;
    })

    axios.post('https://server-api.helicraft.ru/v1/placeholders/replace', 
  'message=%25rs_year_world%25&uuid=', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis',
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }).then((response) => {
      this.year= response.data;
    })

    axios.post('https://server-api.helicraft.ru/v1/placeholders/replace', 
  'message=%25rs_month_world%25&uuid=', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis',
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }).then((response) => {
      this.month= response.data;
    })

    axios.post('https://server-api.helicraft.ru/v1/placeholders/replace',
  'message=%25rs_day_world%25&uuid=', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis',
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }).then((response) => {
      this.day= response.data;
    })




    //interval
    setInterval(() => {
      axios.get('https://server-api.helicraft.ru//v1/server', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis'
      }
    }).then((response) => {
      this.online = response.data.onlinePlayers;
      this.maxOnline = response.data.maxPlayers;
    })

    axios.post('https://server-api.helicraft.ru/v1/placeholders/replace', 
  'message=%25rs_season_world%25&uuid=', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis',
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }).then((response) => {
      this.season = response.data;
    })

    axios.post('https://server-api.helicraft.ru/v1/placeholders/replace', 
  'message=%25rs_year_world%25&uuid=', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis',
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }).then((response) => {
      this.year = response.data;
    })

    axios.post('https://server-api.helicraft.ru/v1/placeholders/replace', 
  'message=%25rs_month_world%25&uuid=', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis',
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }).then((response) => {
      this.month= response.data;
    })

    axios.post('https://server-api.helicraft.ru/v1/placeholders/replace',
  'message=%25rs_day_world%25&uuid=', {
      headers: {
        'Accept': 'application/json',
        'key': 'ujfvhsohdfsofapkfcolsjfbidsfgsjgposhgvis',
        'Content-Type': 'application/x-www-form-urlencoded'
      }
    }).then((response) => {
      this.day= response.data;
    })
    }, 10000);
  }
}
</script>
<template>
  <header class="flex flex-col h-screen justify-center items-center text-white">
    <h1 class="text-5xl">HeliCraft</h1>
    <h2 class="text-lg">Minecraft сервер. Версия 1.20-1.20.1</h2>
    <CopyButtonN cp="mc.helicraft.ru" class="mt-5" />
    <div class="flex flex-row items-center mt-10">
      
      <PulsatingDot /> &nbsp;&nbsp;&nbsp;&nbsp;На сервере онлайн {{ online }} / {{ maxOnline }} игроков<br>
      &nbsp;&nbsp;&nbsp;&nbsp;Дата на сервере: {{ day }}.{{ month }}.{{ year }} ({{ season }})<br>
    </div>
  </header>
  <main class="flex bg-purple-800 w-full h-96 text-white justify-center items-center text-lg">
    <p>
      Наш сервер был основан в августе 2020 года, и с того момента мы продолжаем развивать его.
      Посмотрите другие разделы сайта, чтобы узнать подробнее о правилах и проч.
    </p>
  </main>
</template>

<style scoped>
.ring-container {
    position: relative;
}

.circle {
    width: 15px;
    height: 15px;
    background-color: #62bd19;
    border-radius: 50%;
    position: absolute;
    top: 23px;
    left: 23px;
}

.ringring {
    border: 3px solid #62bd19;
    -webkit-border-radius: 30px;
    height: 25px;
    width: 25px;
    position: absolute;
    left: 15px;
    top: 15px;
    -webkit-animation: pulsate 1s ease-out;
    -webkit-animation-iteration-count: infinite; 
    opacity: 0.0
}
@-webkit-keyframes pulsate {
    0% {-webkit-transform: scale(0.1, 0.1); opacity: 0.0;}
    50% {opacity: 1.0;}
    100% {-webkit-transform: scale(1.2, 1.2); opacity: 0.0;}
}
</style>
