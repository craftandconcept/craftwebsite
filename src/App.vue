<template>
  <div id="app">
    <router-view/>
  </div>
</template>
<script>
import 'bootstrap/dist/css/bootstrap.css'
export default {
  name: 'App'
}
</script>
<style lang="scss">
// body{
//   overflow-x: hidden;
// }
button:focus,
button:active{
  outline: none;
}
</style>
