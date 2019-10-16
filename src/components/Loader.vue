<template>
  <div class="load-wrap">
    <div class="a" style="--n: 5;">
      <div class="dot" style="--i: 0;"></div>
      <div class="dot" style="--i: 1;"></div>
      <div class="dot" style="--i: 2;"></div>
      <div class="dot" style="--i: 3;"></div>
      <div class="dot" style="--i: 4;"></div>
    </div>
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
.dot {
  background: #dbe3e5;
  &, &:after {
    display: inline-block;
    width: $d; height: $d;
    border-radius: 50%;
    animation: a $t calc(((var(--i) + var(--o, 0))/var(--n) - 1)*#{$t}) infinite
  }
  &:after {
    --o: 1;
    background: currentcolor;
    content: '';
  }
}

@keyframes a { 0%, 50% { transform: scale(0) } }
</style>
