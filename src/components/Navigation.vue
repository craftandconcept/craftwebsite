
<template>
    <div class="navigation-wrap" :class="{'open': isOpen}">
        <div class="navigation-left">
            <button @click="toggleMenu()">{{$t('click-me')}}</button>
            <div class="social-link">
                <a href="#">
                    <img src="../assets/img/facebook.png" alt="facebook" />
                </a>
                <a href="#">
                    <img src="../assets/img/twitter.png" alt="twitter" />
                </a>
                <a href="#">
                    <img src="../assets/img/instagram.png" alt="instagram" />
                </a>
                <a href="#">
                    <img src="../assets/img/linkedin.png" alt="linkedin" />
                </a>
            </div>
        </div>
        <div class="navigation-right">
            <div class="text-menu">
                <ul>
                    <li><a href="#">{{$t('our-story')}}</a></li>
                    <li><a href="#">— {{$t('architecture')}}</a></li>
                    <li><a href="#">— {{$t('individual-objects')}}</a></li>
                    <li><a href="#">— {{$t('interior-design')}}</a></li>
                    <li><a href="#">— {{$t('3D-rendering')}}</a></li>
                    <li><a href="#">— {{$t('production-facilities')}}</a></li>
                    <li><a href="#">{{$t('team-&-creators')}}</a></li>
                    <li><a href="#">{{$t('collaborators')}}</a></li>
                    <li><a href="#">{{$t('contact-us')}}</a></li>
                </ul>  
            </div>
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
            width: 150px;
            border-right: 1px solid #E8E8E8;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-end;
            padding: 50px 30px 50px;
            .social-link{
                display: flex;
                flex-direction: column;
                a{
                    margin-bottom: 28px;
                }
            }
        }
        .navigation-right{
            width: 0;
            overflow: hidden;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            .text-menu{
                ul{
                    margin: 0;
                    padding: 0;
                    li{
                        padding-bottom: 15px;
                        list-style: none;
                        a{
                            position: relative;
                            text-decoration: none;
                            font-size: 18px;
                            line-height: 22px;
                            color: #F7F7F7;
                            white-space: nowrap;
                            &:after {
                                content: '';
                                position: absolute;
                                width: 0;
                                left: 50%;
                                bottom: -4px;
                                height: 2px;
                                background: #f7f7f7;
                                transition: all .6s;
                            }
                            &:hover:after{
                                left: 0;
                                width: 100%;
                            }
                        }
                    }
                }
                
            }

        }
        &.open{
            background: #424647;
            .navigation-right{
                width: 270px;
            }
        }
    }
</style>
