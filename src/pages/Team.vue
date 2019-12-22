<template>
  <div>
    <h2 class="title">Teams</h2>
    <div class="row" v-if="teams.length">
      <div
        class="col-12 col-md-6 col-lg-4 mb-3"
        v-for="(item, index) in teams"
        :key="index"
        v-show="item.main_image"
      >
        <team-item
          :option="item"
          @openModal="openModal(index)"
          str=""
        />
      </div>
    </div>
    <team-modal :option="activeItem" v-if="activeItem" @close="activeItem = null" str=""/>
  </div>
</template>

<script>
import TeamModal from '@/components/TeamModal'
import TeamItem from '@/components/TeamItem.vue'
import { getTeams } from '@/services/rest'
export default {
  name: 'Team',
  components: {
    TeamItem,
    TeamModal
  },
  data: () => ({
    teams: [],
    activeItem: null
  }),
  async created () {
    this.$parent.$emit('loadingStart')
    this.teams = await getTeams()
    this.$parent.$emit('loadingFinish')
  },
  methods: {
    openModal (index) {
      this.activeItem = this.teams[index]
    }
  }
}
</script>

<style>

</style>
