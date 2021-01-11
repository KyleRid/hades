
<template>
<div class="container">
<form>
<div :class="['form-group m-1 p-3', successful ? 'alert-success' : '']">
  <span v-if="successful" class="label label-sucess"> Published! </span>
</div>
 <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
    <span v-if="errors.title" class="label label-danger"> {{ errors.title[0] }} </span>
    <span v-if="errors.body" class="label label-danger"> {{ errors.body[0] }} </span>
    <span v-if="errors.image" class="label label-danger"> {{ errors.image[0] }} </span>
</div>

<div class="form-group">
  <input type="title" ref="title" class="form-control" id="title" placeholder="Enter title" required>
</div>

<div class="form-group">
  <vue-editor v-model="content"></vue-editor>
  <!-- <textarea class="form-control" ref="body" id="body" placeholder="Enter a body" rows="8" required></textarea>-->
</div>

<div class="custom-file mb-3">
  <input type="file" ref="image" name="image" class="custom-file-input" id="image" required>
    <label class="custom-file-label" >Choose thumbnail...</label>
</div>
  <button type="submit" @click.prevent="save" class="btn btn-primary block">Submit</button>
</form>
</div>
</template>

<style>
.quillWrapper {
  background: #fff;
}
</style>

<script>
import {VueEditor} from 'vue2-editor';
export default {
  components: {
    VueEditor,
  },
  props: {
    postId: {
      type: Number | String,
      required: true
    }
  },
  data() {
      axios.get('/api/posts/' + this.postId).then( (response) => {
        console.log('response single post', response);
        this.content = response.data.data.body;
        this.$refs.title.value = response.data.data.title;
      });
    return {
      error: false,
      successful: false,
      errors: [],
      content: '',
    };
  },
  methods: {
    save() {
      this.userId = 3;
      console.log('update', this.content, this.$refs.title.value);
      const formData = new FormData();
      formData.append("title", this.$refs.title.value);
      formData.append("body", this.content);
      formData.append("user_id", this.userId);
      // formData.append("image", this.$refs.image.files[0]);
      formData.append('test', 123);
      console.log('formData', formData)
      axios
        .put("/api/posts/" + 3, {
          'title': this.$refs.title.value,
          'body': this.content,
          'user_id': this.userId,
        })
        .then(response => {
          this.successful = true;
          this.error = false;
          this.errors = [];
        })
        .catch(error => {
          if (!_.isEmpty(error.response)) {
            if ((error.response.status = 422)) {
              console.log('error', error);
              this.errors = error.response.data.errors;
              this.successful = false;
              this.error = true;
            }
          }
        });
    }
  }
};
</script>
