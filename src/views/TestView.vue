<template>
    <div>
      <input type="file" ref="fileInput" @change="handleFileChange" />
      <button @click="uploadFile">Upload</button>
    </div>
  </template>
  
  <script lang="ts">
  import axios from 'Axios';
  
  export default {
    data() {
      return {
        file: null as File | null,
      };
    },
    methods: {
      handleFileChange(event: Event): void {
        const target = event.target as HTMLInputElement;
        this.file = (target.files as FileList)[0];
      },
      async uploadFile(): Promise<void> {
        try {
          if (!this.file) {
            throw new Error('No file selected');
          }
  
          const formData = new FormData();
          formData.append('file', this.file);
  
          const response = await axios.post('/skin/upload', formData);
  
          console.log(response.data.message); // File uploaded successfully
        } catch (error) {
          console.error(error);
        }
      },
    },
  };
  
  
  </script>