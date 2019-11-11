<template>
  <div>
    <h2 class="title">_{{$t('collaborators')}}</h2>
    <div class="team-page container">
      <carousel
        :autoplayHoverPause="true"
        :dots="false"
        :margin="11"
        :uRLhashListener="true"
        :responsive="{0:{items:1},550:{items:2}, 800: {items:3}, 1300: {items: 3}}"
        :navText="nav"
      >
        <team-item
          v-for="(item, index) in teams"
          :key="index"
          :option="item"
          @openModal="openModal(index)"
        />
      </carousel>
      <team-modal :option="activeItem" v-if="activeItem" @close="activeItem = null"/>
    </div>
  </div>
</template>
<script>
import Carousel from 'vue-owl-carousel'
import TeamItem from '@/components/TeamItem.vue'
import TeamModal from '@/components/TeamModal'

export default {
  name: 'Teams',
  components: {
    Carousel,
    TeamItem,
    TeamModal
  },
  data: () => ({
    teams: [
      {
        img: 'Artboard 1.jpg',
        img_top: 'Artboard 1.jpg',
        firstName: 'Sergii',
        lastName: 'Slepkan',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: 'L&S_01.jpg',
        img_top: 'L&S_01.jpg',
        firstName: 'Olga',
        lastName: 'Pulyaeva',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: 'Artboard 1.jpg',
        img_top: 'Artboard 1.jpg',
        firstName: 'Johannes',
        lastName: 'Hohn',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: 'L&S_01.jpg',
        img_top: 'L&S_01.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: 'Artboard 1.jpg',
        img_top: 'Artboard 1.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: 'L&S_01.jpg',
        img_top: 'L&S_01.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: 'Artboard 1.jpg',
        img_top: 'Artboard 1.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      }
    ],
    nav: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
    activeItem: null,
    canDraw: false
  }),
  created () {
    this.$parent.$emit('loadingStart')
    this.$parent.$emit('loadingFinish')
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
  padding-bottom: 40px;
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
