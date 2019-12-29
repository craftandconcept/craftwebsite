<template>
  <div v-if="collaborators.length">
    <router-link :to="{name: 'Collaborators'}">
      <h2 class="title">_{{$t('collaborators')}}</h2>
    </router-link>
    <div class="team-page collaborators" v-if="load">
      <carousel
        :autoplayHoverPause="true"
        :dots="false"
        :margin="11"
        :uRLhashListener="true"
        :responsive="{0:{items:1},550:{items:2}, 800: {items:3}, 1300: {items: 3}}"
        :navText="nav"
      >
        <team-item
          v-for="(item, index) in collaborators"
          :key="index"
          :option="item"
          @openModal="openModal(index)"
          str=""
        />
      </carousel>
      <team-modal :option="activeItem" v-if="activeItem" @close="activeItem = null" str=""/>
    </div>
  </div>
</template>
<script>
import Carousel from 'vue-owl-carousel'
import TeamItem from '@/components/TeamItem.vue'
import TeamModal from '@/components/TeamModal'
import { getCollaborators } from '@/services/rest'

export default {
  name: 'Collaborators',
  props: {
    load: Boolean
  },
  components: {
    Carousel,
    TeamItem,
    TeamModal
  },
  data: () => ({
    collaborators: [],
    nav: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    activeItem: null,
    canDraw: false
  }),
  async created () {
    this.$parent.$emit('loadingStart')
    this.collaborators = await getCollaborators()
    this.$parent.$emit('loadingFinish')
  },
  methods: {
    openModal (index) {
      this.activeItem = this.collaborators[index]
    }
  }
}
</script>

<style lang="scss">
.team-page{
  position: relative;
  padding-bottom: 40px;
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
.owl-item{
  padding-right: 8px;
}
.team-item{
  img{
    min-height: 230px;
    width: 100%;
    object-fit: cover;
  }
}
.collaborators {
  .owl-carousel .owl-item {
    .team-item {
      height: auto;
      img {
        background: #fff;
        object-fit: contain;
      }
      .img-under{
        position: static;
      }
    }
  }
}
@media (max-width: 767px) {
  .team-page{
    padding: 0;
  }
  .owl-item{
    padding-right: 0px;
  }
  .owl-theme .owl-nav {
    display: none;
  }
}
</style>
