<template>
  <div id="app">
    <router-view/>
  </div>
</template>
<script>
import 'bootstrap/dist/css/bootstrap.css'
import '@/assets/fonts/fonts.css'
import 'font-awesome/css/font-awesome.css'
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
