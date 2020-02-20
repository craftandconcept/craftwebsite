<template>
  <div class="load-wrap">
    <img src="../assets/img/loader.gif" alt="c&c" />
  </div>
</template>

<script>
export default {
  name: 'Loader'
}
</script>

<style lang="scss">

.load-wrap {
  position: fixed;
  background: currentcolor;
  color: #fff;
  text-align: center;
  z-index: 1000;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  img {
    width: 110px;
  }
}
</style>
