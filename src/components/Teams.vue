<template>
  <div v-if="teams.length">
    <h2 class="title">_{{$t('team')}}</h2>
    <div class="team-page container">
      <carousel
        :autoplayHoverPause="true"
        :dots="false"
        :margin="11"
        :uRLhashListener="true"
        :responsive="{0:{items:1},550:{items:2}, 800: {items:3}, 1300: {items: 3}}"
        :navText="nav"
        :loop="true"
      >
        <template
          v-for="(item, index) in teams"
        >
          <team-item
            v-if="item.main_image"
            :key="index"
            :option="item"
            @openModal="openModal(index)"
            str=""
          />
        </template>
      </carousel>
      <team-modal :option="activeItem" v-if="activeItem" @close="activeItem = null" str=""/>
    </div>
  </div>
</template>
<script>
import Carousel from 'vue-owl-carousel'
import TeamItem from '@/components/TeamItem.vue'
import TeamModal from '@/components/TeamModal'
import { getTeams } from '@/services/rest'

export default {
  name: 'Teams',
  components: {
    Carousel,
    TeamItem,
    TeamModal
  },
  data: () => ({
    nav: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    activeItem: null,
    canDraw: false,
    teams: []
  }),
  async created () {
    this.$parent.$emit('loadingStart')
    this.$parent.$emit('loadingFinish')
    this.teams = await getTeams()
  },
  methods: {
    openModal (index) {
      this.activeItem = this.teams[index]
    }
  }
}
</script>

<style lang="scss">
.team-page{
  max-width: 80%;
  width: 80%;
  position: relative;
}
.title{
  font-weight: 700;
  font-size: 64px;
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
@media(max-width: 1400px) {
  .team-page{
    width: 100%;
    max-width: 100%;
  }
}
</style>
