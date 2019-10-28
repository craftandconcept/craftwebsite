<template>
  <div class="container-fluid">
    <button class="btn btn-success" @click="$router.push({name: 'NewProject', params: {id: 'new'}})">Add project</button>
  </div>
</template>

<script>
export default {
  name: 'Dashboard'
}
</script>

<style lang="scss">

</style>