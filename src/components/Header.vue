<template>
  <header class="header" id="top">
    <div class="container">
      <div class="d-flex justify-content-between aling-items-center">
        <div class="left d-flex">
          <router-link :to="{name: 'Home'}" class="logo">
            <img src="../assets/img/logo.svg" alt="logo" />
            <p>complex design solutions</p>
          </router-link>
        </div>
        <div class="right d-flex">
          <div class="translator d-flex" v-if="false">
            <router-link :to="{name: 'Home'}" class="active">{{$t('eng')}}</router-link>
            <br />
            <router-link :to="{name: 'Home-fr'}">{{$t('fre')}}</router-link>
            <br />
          </div>
          <div class="two-s">
            <img src="../assets/img/triangle.svg" alt="c&c" />
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: 'Header'
}
</script>

<style lang="scss">
  .header{
    padding: 37px 0 0;
    .left{
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: center;
      .logo{
        img{
          max-height: 20px;
        }
        p{
          font-size: 19px;
          font-weight: 700;
          color: #000;
        }
        text-decoration: none;
      }
    }
    .translator{
      align-items: center;
      margin-right: 80px;
      a{
        font-size: 16px;
        line-height: 17px;
        color: #000;
        transition: all 0.3s;
        margin-right: 20px;
        &.active, &:hover{
          color: #269DC3;
          font-weight: 700;
          text-decoration: none;
        }
      }
    }
    .two-s {
      img {
        height: 69px;
      }
    }
  }
  @media(max-width: 767px) {
    .header{
      .left {
        .logo img{
          height: 11px;
        }
        p{
          font-size: 13px;
        }
      }
      .translator {
        margin-right: 50px;
      }
    }
  }
  @media(max-width: 576px) {
    .header{
      .left img{
        height: 25px;
      }
      .two-s img{
        width: 50px;
        height: 50px;
      }
      .translator {
        margin-right: 3px;
        a{
          margin-right: 5px;
          font-size: 14px;
        }
      }
    }
  }
</style>
