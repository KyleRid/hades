
<template>
  <div class="container">
    <div v-for="post in posts">
      <div>
      edit post
      </div>
    </div>
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
      type: Number,
      required: true
    }
  },
  data() {
      axios.get('/api/posts/' + this.postId).then( (response) => {
        console.log('response123', response);
        this.posts = response.data.data;
      });
    return {
      error: false,
      successful: false,
      errors: [],
      posts: [],
    };
  },
  methods: {
    save() {
           this.userId = 3;
        console.log('create', this, this.content, this.userId);
        const formData = new FormData();
        formData.append("title", this.$refs.title.value);
        formData.append("body", this.content);
        formData.append("user_id", this.userId);
        // formData.append("image", this.$refs.image.files[0]);
        axios
          .post("/api/posts", formData)
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
