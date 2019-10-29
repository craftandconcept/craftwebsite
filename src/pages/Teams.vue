<template>
  <div class="team-page container">
    <carousel
      :autoplayHoverPause="true"
      :dots="false"
      :margin="11"
      :uRLhashListener="true"
      :responsive="{0:{items:1},550:{items:2}, 800: {items:3}, 1300: {items: 4}}"
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
        img: '1.1.png',
        img_top: '1.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: '1.1.png',
        img_top: '1.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: '1.1.png',
        img_top: '1.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: '1.1.png',
        img_top: '1.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: '1.1.png',
        img_top: '1.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: '1.1.png',
        img_top: '1.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      },
      {
        img: '1.1.png',
        img_top: '1.jpg',
        firstName: 'Vlada',
        lastName: 'Makhno',
        profesion: 'INTERIOR DESIGNER, DECORATOR',
        description: 'The main Sergey’s muse. She got art history and marketing education, dismantling a stereotype that artists fail at exact sciences. She is keen on floristics and knows everything about flowers. Vlada has been with our workshop for about 10 years. We have already lost count of how many breathtaking projects she has created during this time. A lot of them are professionally awarded. Vlada loves when the projects are living, and their owners find there themselves – habits, preferences and their lifestyle itself.'
      }
    ],
    activeItem: null,
    canDraw: false
  }),
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
}
@media(max-width: 1400px) {
  .team-page{
    width: 100%;
    max-width: 100%;
  }
}
</style>
