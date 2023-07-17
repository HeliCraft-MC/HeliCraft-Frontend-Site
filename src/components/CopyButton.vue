<script lang="ts">
import { defineComponent, ref } from 'vue';
import { useClipboard } from '@vueuse/core';

export default defineComponent({
  name: 'CopyButton',
  props: {
    cp: {
      type: String,
      required: true
    }
  },
  setup(props) {
    const copyToClipboard = () => {
      const { copy } = useClipboard();
      copy(props.cp);
      buttonText.value = '<i class="bi bi-clipboard-check-fill"></i>Скопировано';
      setTimeout(() => {
        buttonText.value = '<i class="bi bi-clipboard-fill"></i> Скопировать IP сервера';
      }, 2000);
    };

    const buttonText = ref('<i class="bi bi-clipboard-fill"></i> Скопировать IP сервера');

    return {
      buttonText,
      copyToClipboard
    };
  }
});
</script>

<template>
    <button :cp="'Скопировать IP сервера'" v-html="buttonText" @click="copyToClipboard()" class="rounded-lg text-white bg-purple-700 py-2 px-4"></button>
</template>
<style scoped>

</style>
