<template>
  <div @click.prevent="$emit('openModal')">
    <img :src="require(`@/assets/img/team/${option.img}`)" :alt="option.firstName + option.lastName">
  </div>
</template>

<script>
export default {
  name: 'TeamItem',
  props: {
    option: Object
  }
}
</script>

<style lang="scss">

</style>