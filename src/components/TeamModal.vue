<template>
  <div>
    <div class="team-modal-wrap"></div>
    <div class="overlay" @click="$emit('close')"></div>
  </div>
</template>

<script>
export default {
  name: 'TeamModal',
  props: {
    option: Object
  }
}
</script>

<style lang="scss">
  .team-modal-wrap{
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100%;
    max-width: 600px;
    min-height: 200px;
    background: #fff;
    z-index: 3;
  }
  .overlay{
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(0,0,0,0.2);
    z-index: 2;
  }
</style>