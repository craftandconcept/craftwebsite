<template>
  <div v-if="collaborators.length">
    <h2 class="title">_{{$t('collaborators')}}</h2>
    <div class="team-page container collaborators">
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
    this.$parent.$emit('loadingFinish')
    this.collaborators = await getCollaborators()
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
  font-size: 32px;
  line-height: 79px;
  text-transform: uppercase;
  color: #000;
  margin: 40px 0;
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
    img {
      height: 230px;
      background: #f7f7f7;
      object-fit: contain;
    }
  }
}
@media(max-width: 1400px) {
  .team-page{
    padding: 0 50px;
    width: 100%;
    max-width: 100%;
  }
}
@media (max-width: 767px) {
  .team-page{
    padding: 0 30px;
  }
  .owl-prev{
    left: -30px;
  }
  .owl-next{
    right: -30px;
  }
  .owl-item{
    padding-right: 0px;
  }
}
</style>
