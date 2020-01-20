
<template>
    <div class="navigation-wrap" :class="{'open': isOpen}">
        <div class="navigation-left">
            <button class="burger" :class="{'on': isOpen}" @click="toggleMenu()"><span></span></button>
            <div class="social-link">
                <a href="https://www.facebook.com/craftandconceptmontreux/" target="_blank">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
                <a href="https://www.instagram.com/craft.and.concept/?hl=ru" target="_blank">
                    <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
                <a href="https://www.linkedin.com/company/30127412/" target="_blank">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
                <div class="shield">
                    <Shield />
                </div>
            </div>
        </div>
        <div class="navigation-right">
            <div class="text-menu">
                <ul @click.prevent="mobileClose">
                    <li><router-link :to="{name: 'Home'}">Home</router-link></li>
                    <li><a href="#" @click.prevent="toHome('#ourStory')" v-scroll-to="'#ourStory'">About Us</a></li>
                    <li
                        v-for="category in categories"
                        :key="category.id"
                        v-show="category.category_name !== 'Featured projects'">
                        <a
                            href="#"
                            @click.prevent="toHome(`#${category.category_name.replace(/[0-9]/g, '').replace(/ /g,'')}`)"
                            v-scroll-to="`#${category.category_name.replace(/ /g,'').replace(/[0-9]/g, '')}`"
                            v-if="category.category_name === 'Featured projects'"
                        >
                            {{category.category_name}}
                        </a>
                        <router-link v-else :to="`/category/${category.id}`">_{{category.category_name}}</router-link>
                    </li>
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
  created () {
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
    },
    mobileClose () {
      if (window.innerWidth < 767) {
        this.toggleMenu()
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
        background: #fff;
        display: flex;
        transition: all 0.3s;
        max-width: 72px;
        .navigation-left{
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-end;
            padding: 50px 15px 50px;
            .social-link{
                display: flex;
                flex-direction: column;
                align-items: flex-end;
                a{
                    margin-bottom: 28px;
                    color: #a3a3a3;
                    font-size: 18px;
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
                width: 30px;
                height: 30px;
                border-radius: 24px;
                background: none;
                border: 2px solid #000;
                padding: 0;
                transition: all 0.3s;
                span{
                    position: relative;
                    display: block;
                    width: 16px;
                    height: 2px;
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
                        top: -5px;
                        width: 100%;
                        height: 2px;
                        background-color: #000;
                        transition: all 0.3s;
                        backface-visibility: hidden;
                    }
                    &:after{
                        top: 5px;
                    }
                }
                &.on{
                    border-color: #fff;
                    span {
                        background-color: transparent;
                        &:before {
                            background: #fff;
                            transform: rotate(45deg) translate(4px, 3px);
                        }
                        &:after {
                            background: #fff;
                            transform: rotate(-45deg) translate(4px, -3px);
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
            padding-left: 0;
            @media(max-width: 767px) {
                justify-content: center;
            }
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
                            color: #fff;
                            white-space: nowrap;
                            &:after {
                                content: '';
                                position: absolute;
                                width: 0;
                                left: 50%;
                                bottom: -4px;
                                height: 2px;
                                background: #fff;
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
            background: #000;
            .navigation-right{
                padding-left: 10px;
                width: 200px;
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
                .navigation-right{
                    width: 215px;
                }
            }
        }
    }
    @media(max-width: 768px) {
        .navigation-wrap{
            width: 80px;
            max-width: 80px;
            .shield{
                opacity: 1;
                transition-delay: 0s;
            }
            .navigation-left{
                max-height: 100vh;
                overflow: auto;
                padding-bottom: 80px;
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
