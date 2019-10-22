<template>
  <div id="app">
    <router-view/>
  </div>
</template>
<script>
import 'bootstrap/dist/css/bootstrap.css'
import '@/assets/fonts/fonts.css'
export default {
  name: 'App'
}
</script>
<style lang="scss">
body{
  font-family: 'CoreSans';
}
button:focus,
button:active{
  outline: none;
}
</style>
