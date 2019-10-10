<template>
  <div class="container h-100vh d-flex align-items-center">
    <div class="col-lg-4 col-md-6 col-12 offset-lg-4 offset-md-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Login" v-model="login"/>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" v-model="password"/>
      </div>
      <button class="btn btn-success w-100">Login</button>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data: () => ({
    login: '',
    password: ''
  }),
  methods: {
    singIn () {

    }
  }
}
</script>
<style lang="scss">
  .h-100vh{
    height: 100vh;
  }
</style>
