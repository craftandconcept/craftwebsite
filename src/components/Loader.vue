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
$d: 2em;
$t: 1.5s;

.load-wrap {
  position: fixed;
  padding-top: 1em;
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
}
</style>
