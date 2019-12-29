<template>
  <div v-if="creators.length">
    <router-link :to="{name: 'Creators'}">
      <h2 class="title">_{{$t('creators')}}</h2>
    </router-link>
    <div class="team-page" v-if="load">
      <carousel
        :autoplayHoverPause="true"
        :dots="false"
        :margin="11"
        :uRLhashListener="true"
        :responsive="{0:{items:1},550:{items:2}, 800: {items:3}, 1300: {items: 3}}"
        :navText="nav"
        :loop="true"
      >
        <team-item
          v-for="(item, index) in creators"
          :key="index"
          :option="item"
          @openModal="openModal(index)"
          str="creator_"
        />
      </carousel>
      <team-modal :option="activeItem" v-if="activeItem" @close="activeItem = null" str="creator_"/>
    </div>
  </div>
</template>
<script>
import Carousel from 'vue-owl-carousel'
import TeamItem from '@/components/TeamItem.vue'
import TeamModal from '@/components/TeamModal'
import { getCreators } from '@/services/rest'

export default {
  name: 'Creators',
  props: {
    load: Boolean
  },
  components: {
    Carousel,
    TeamItem,
    TeamModal
  },
  data: () => ({
    creators: [],
    nav: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    activeItem: null,
    canDraw: false
  }),
  async created () {
    this.creators = await getCreators()
  },
  methods: {
    openModal (index) {
      this.activeItem = this.creators[index]
    }
  }
}
</script>

<style lang="scss">
.team-page{
  position: relative;
}
.title{
  font-weight: 700;
  font-size: 2.2vw;;
  line-height: 79px;
  text-transform: uppercase;
  color: #000;
  margin: 40px 0;
  @media(max-width: 767px) {
    font-size: 24px;
  }
  @media(max-width: 576px) {
    font-size: 18px;
  }
}
.owl-prev, .owl-next{
  background: none !important;
  color: #000 !important;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  font-size: 32px !important;
}
.owl-prev{
  left: -50px;
}
.owl-next{
  right: -50px;
}
@media(max-width: 767px) {
  .team-page{
    padding: 0;
  }
  .owl-theme .owl-nav {
    display: none;
  }
}
</style>
