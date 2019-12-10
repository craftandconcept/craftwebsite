
<template>
    <div class="navigation-wrap" :class="{'open': isOpen}">
        <div class="navigation-left">
            <button class="burger" :class="{'on': isOpen}" @click="toggleMenu()"><span></span></button>
            <div class="social-link">
                <a href="https://www.facebook.com/craftandconceptmontreux/" target="_blank">
                    <img src="../assets/img/facebook.png" alt="facebook" />
                </a>
                <a href="https://www.instagram.com/craft.and.concept/?hl=ru" target="_blank">
                    <img src="../assets/img/instagram.png" alt="instagram" />
                </a>
                <a href="https://www.linkedin.com/company/30127412/" target="_blank">
                    <img src="../assets/img/linkedin.png" alt="linkedin" />
                </a>
                <div class="shield">
                    <Shield />
                </div>
            </div>
        </div>
        <div class="navigation-right">
            <div class="text-menu">
                <ul>
                    <li><a href="#" @click.prevent="toHome('#ourStory')" v-scroll-to="'#ourStory'">{{$t('our-story')}}</a></li>
                    <li v-for="catogory in categories" :key="catogory.id"><router-link :to="`/category/${catogory.id}`">_{{catogory.category_name}}</router-link></li>
                    <!-- <li><router-link to="/category/interior-design">_{{$t('interior-design')}}</router-link></li>
                    <li><router-link to="/category/individual-objects">_{{$t('individual-objects')}}</router-link></li>
                    <li><router-link to="/category/3d-rendering">_{{$t('3d-rendering')}}</router-link></li>
                    <li><router-link to="/category/brand-development">_{{$t('brand-development')}}</router-link></li>
                    <li><router-link to="/category/production-facilities">_{{$t('production-facilities')}}</router-link></li> -->
                    <li><a href="#" @click.prevent="toHome('#teams')" v-scroll-to="'#teams'">{{$t('team')}}</a></li>
                    <li><a href="#" @click.prevent="toHome('#creators')" v-scroll-to="'#creators'">{{$t('creators')}}</a></li>
                    <li><a href="#" @click.prevent="toHome('#collaborators')" v-scroll-to="'#collaborators'">{{$t('collaborators')}}</a></li>
                    <li><a href="#" v-scroll-to="'#footer'">{{$t('contact-us')}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import Shield from '@/components/Shield.vue'
import { mapMutations, mapGetters, mapActions } from 'vuex'
export default {
  name: 'Navigation',
  data: () => ({
    isOpen: false
  }),
  components: {
    Shield
  },
  created() {
      if (!this.categories.length) {
          this.getCategories()
      }
  },
  computed: mapGetters({
    categories: 'categories'
  }),
  methods: {
    ...mapMutations({
      toggleNav: 'toggleNav'
    }),
    ...mapActions({
        getCategories: 'getCategories'
    }),
    toggleMenu () {
      this.toggleNav()
      this.isOpen = !this.isOpen
      this.$emit('toggleMenu', this.isOpen)
    },
    toHome (anchor) {
      if (this.$route.name !== 'Home') {
        this.$router.push({ name: 'Home', params: { anchor } })
      }
    }
  }
}
</script>

<style lang="scss">
    .navigation-wrap{
        z-index: 4;
        position: fixed;
        height: 100vh;
        left: 0;
        top: 0;
        background: #f7f7f7;
        display: flex;
        transition: all 0.3s;
        max-width: 150px;
        .navigation-left{
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
                align-items: flex-end;
                a{
                    margin-bottom: 28px;
                }
                .shield{
                    margin-top: 20px;
                    svg {
                        height: 46px;
                        width: auto;
                        path{
                            fill: #a3a3a3;
                        }
                    }
                }
            }
            .burger {
                display: block;
                width: 48px;
                height: 48px;
                border-radius: 24px;
                background: none;
                border: 2px solid #000;
                padding: 0;
                transition: all 0.3s;
                span{
                    position: relative;
                    display: block;
                    width: 30px;
                    height: 4px;
                    left: 50%;
                    transform: translateX(-50%);
                    background-color: #000;
                    transition: all 0.3s;
                    backface-visibility: hidden;
                    &:after,
                    &:before {
                        content: "";
                        position: absolute;
                        left: 0;
                        top: -9px;
                        width: 100%;
                        height: 4px;
                        background-color: #000;
                        transition: all 0.3s;
                        backface-visibility: hidden;
                    }
                    &:after{
                        top: 9px;
                    }
                }
                &.on{
                    border-color: #f7f7f7;
                    span {
                        background-color: transparent;
                        &:before {
                            background: #f7f7f7;
                            transform: rotate(45deg) translate(7px, 6px);
                        }
                        &:after {
                            background: #f7f7f7;
                            transform: rotate(-45deg) translate(6px, -6px);
                        }
                    }
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
                            font-weight: 400;
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
            max-width: 100%;
            background: #424647;
            .navigation-right{
                width: 220px;
            }
            .navigation-left .social-link .shield{
                margin-top: 20px;
                svg {
                    height: 46px;
                    width: auto;
                }
            }
        }
    }
    @media(max-width: 1200px) {
        .navigation-wrap{
            .navigation-left{
                width: 80px;
                padding: 50px 15px;
                align-items: center;
            }
             &.open{
            background: #424647;
                .navigation-right{
                    width: 250px;
                }
            }
        }

    }
    @media(max-width: 992px) {
        .navigation-wrap{
            .navigation-left{
                .burger{
                    width: 40px;
                    min-height: 40px;
                    height: 40px;
                    span{
                        height: 2px;
                        width: 21px;
                        &::before,
                        &::after{
                            height: 2px;
                        }
                    }
                }
            }
             &.open{
            background: #424647;
                .navigation-right{
                    width: 215px;
                }
            }
        }
    }
    @media(max-width: 768px) {
        .navigation-wrap{
            width: 80px;
            .shield{
                opacity: 1;
                transition-delay: 0s;
            }
            .navigation-left{
                max-height: 100vh;
                overflow: auto;
            }
            &.open{
                width: 100vw;
                .navigation-right{
                    width: calc(100vw - 80px);
                    .text-menu{
                        max-height: 100vh;
                        overflow: auto;
                        ul li{
                            text-align: center;
                        }
                    }
                }
            }
        }

    }
    @media(max-width: 576px) {

    }
</style>
