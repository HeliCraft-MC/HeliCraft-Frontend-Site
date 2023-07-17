<script lang="ts">
import CopyButtonN from '@/components/CopyButton.vue'
export default {
  components: {
    CopyButtonN
  }
}
</script>
<template>
  <header class="flex flex-col hscreenh justify-center items-center text-white">
    <h1 class="headers text-5xl">HeliCraft</h1>
    <h2 class="text-lg">Minecraft сервер с королевствами</h2>
    <CopyButtonN cp="mc.helicraft.ru" class="mt-5" />
  </header>
  <main class="flex bg-violet-800 w-full h-96 text-white justify-center items-center text-lg">
    <p>
      Наш сервер был основан в августе 2020 года, и с того момента мы продолжаем развивать его.
      Посмотрите другие разделы сайта, чтобы узнать подробнее о правилах и проч.
    </p>
  </main>
</template>
<style scoped>
.hscreenh {
  height: 95vh;
}
</style>
