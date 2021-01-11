
<template>
  <div class="container">
    <div  v-if="!posts.length">
      No posts yet.
    </div>
    <div v-for="post in posts">
      <div>
       <router-link :to="{ name: 'editPost', params: { postId: post.id } }">{{post.title}}</router-link>
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
    userId: {
      type: Number,
      required: true
    }
  },
  data() {
      axios.get('/api/posts/').then( (response) => {
        console.log('response123', response);
        this.posts = response.data.data;
        // this.posts = response.data.data;
      });
    return {
      error: false,
      successful: false,
      errors: [],
      posts: [],
    };
  },
};
</script>
