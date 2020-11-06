<template>
    <vue-dropzone :options="dropzoneOptions" ref="myVueDropzone" id="dropzone"
    ></vue-dropzone>
</template>

<script>

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
  name: 'dropzone',
  components: {
    vueDropzone: vue2Dropzone
  },
  data: function () {
    return {
        dropzoneOptions: {
            url: 'http://pulse-amazon.test/upload',
            thumbnailWidth: 150,
            maxFilesize: 0.5,
            headers: { 'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content }
        }
    }
  },
}
</script>