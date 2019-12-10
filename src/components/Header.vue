<template>
  <header class="header">
    <div class="container-fluid">
      <div class="d-flex justify-content-between aling-items-center">
        <div class="left d-flex">
          <router-link :to="{name: 'Home'}" class="logo">
            <img src="../assets/img/logo.jpg" alt="logo" />
          </router-link>
          <p>complex design solutions</p>
        </div>
        <div class="right d-flex">
          <div class="translator d-flex" v-if="false">
            <router-link :to="{name: 'Home'}" class="active">{{$t('eng')}}</router-link>
            <br />
            <router-link :to="{name: 'Home-fr'}">{{$t('fre')}}</router-link>
            <br />
          </div>
          <div class="two-s">
            <img src="../assets/img/c&c.png" alt="c&c" />
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
          max-height: 26px;
        }
      }
      p{
        font-size: 32px;
        font-weight: 700;
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
      .two-s img{
        width: 80px;
        height: 80px;
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
