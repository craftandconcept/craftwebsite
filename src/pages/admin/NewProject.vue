<template>
  <form>
    <div class="container-fluid mb-4 mt-4">
      <div class="col-md-6 offset-md-3 col-12 offset-0">
        <div class="form-group">
          <label>Project name</label>
          <input type="text" class="form-control" placeholder="Enter project name" v-model="name" required>
        </div>
        <div class="form-group">
          <label class="d-block">Main image</label>
          <input type="file" required>
        </div>
        <div class="tags-wrap mb-2">
          <div class="tag" v-for="(tag, index) in tags" :key="index">
            <p>
              {{tag.title}}
              <span>{{tag.text}}</span>
              <button type="button" class="ml-3" @click="changeTag(index)">
                <i class="fa fa-pencil" aria-hidden="true"></i>
              </button>
            </p>
          </div>
          <div class="new-tag" v-show="tagsChanged">
            <div class="row">
              <div class="form-group col-6">
                <label>Title</label>
                <input type="text" class="form-control" v-model="newTag.title">
              </div>
              <div class="form-group col-6">
                <label>Body</label>
                <input type="text" class="form-control" v-model="newTag.text">
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-success" @click="saveTag(activeTag)" v-show="tagsChanged">Save</button>
          <button type="button" class="btn btn-info" @click="tagsChanged = true" v-show="!tagsChanged">Add tags</button>
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea class="form-control" placeholder="Enter project description" v-model="description" required>
          </textarea>
        </div>
        <!-- <div v-html="body"></div> -->
        <div class="form-group" v-show="imgIsVisible">
          <label class="d-block">New image</label>
          <input type="file">
        </div>
        <div class="form-group" v-show="textIsVisible">
          <label>Text</label>
          <textarea class="form-control" placeholder="Enter text" >
          </textarea>
        </div>
        <div class="row">
          <div class="col-6">
            <button type="button" class="btn btn-info" @click="imgIsVisible = true">Add image</button>
          </div>
          <div class="col-6">
            <button type="button" class="btn btn-info" @click="textIsVisible = true">Add text</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  name: 'NewProject',
  data: () => ({
    name: '',
    mainImg: '',
    description: '',
    tags: [],
    body: [],
    tagsChanged: false,
    newTag: {
      title: '',
      text: ''
    },
    activeTag: undefined,
    imgIsVisible: false,
    textIsVisible: false
  }),
  methods: {
    saveTag (id) {
      if (this.newTag.title.length && this.newTag.text.length) {
        if (id !== undefined) {
          this.tags[id] = this.newTag
        } else {
          this.tags.push(this.newTag)
        }
        this.newTag =  {
          title: '',
          text: ''
        }
      }
      this.activeTag = undefined
      this.tagsChanged = false
    },
    changeTag (id) {
      this.tagsChanged = true
      this.newTag = this.tags[id]
      this.activeTag = id
    }
  }
}
</script>

<style>

</style>