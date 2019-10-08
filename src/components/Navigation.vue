
<template>
    <div class="navigation-wrap" :class="{'open': isOpen}">
        <div class="navigation-left">
            <button @click="toggleMenu()">{{$t('click-me')}}</button>
        </div>
        <div class="navigation-right">

        </div>
    </div>
</template>

<script>
export default {
  name: 'Navigation',
  data: () => ({
    isOpen: false
  }),
  methods: {
    toggleMenu () {
      this.isOpen = !this.isOpen
      this.$emit('toggleMenu', this.isOpen)
    }
  }
}
</script>

<style lang="scss">
    .navigation-wrap{
        position: fixed;
        height: 100vh;
        left: 0;
        top: 0;
        background: #f7f7f7;
        display: flex;
        transition: all 0.3s;
        .navigation-left{
            width: 200px;
            border-right: 1px solid #E8E8E8;
            height: 100%;
        }
        .navigation-right{
            width: 0;
            overflow: hidden;
            transition: all 0.3s;

        }
        &.open{
            background: #424647;
            .navigation-right{
                width: 200px;
            }
        }
    }
</style>
