<template>
    <router-view/>
</template>

<script>
export default {
  created () {
    if (this.$route.name === 'Home') {
      this.$i18n.locale = 'en'
    } else {
      this.$i18n.locale = 'fr'
    }
  },
  watch: {
    '$route.name' () {
      if (this.$route.name === 'Home') {
        this.$i18n.locale = 'en'
      } else {
        this.$i18n.locale = 'fr'
      }
    }
  }
}
</script>
