
<template>
  <div class="container">
  <template v-if="loading">
   loading...
  </template>
   <template v-else>
      <tr v-for="role in roles">
        {{role}}
      </tr>
  </template>
  <button  @click.prevent="getDataFromApi">Button</button>
    <form>
      <div class="form-group">
        <input type="title" ref="title" class="form-control" id="role-name" placeholder="Enter role" required>
      </div>
      <button type="submit" @click.prevent="create" class="btn btn-primary block">Create</button>
    </form>
  </div>
</template>


<script>
export default {
  data() {
    return {
      loading: false,
      roles: [],
    };
  },
  methods: {
    create() {
      const formData = new FormData();
      formData.append("title", this.$refs.title.value);
      formData.append("body", this.$refs.body.value);
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
              this.errors = error.response.data.errors;
              this.successful = false;
              this.error = true;
            }
          }
        });
      this.$refs.title.value = "";
      this.$refs.body.value = "";
    },
    created() {
      this.getDataFromApi();
    },
    async getDataFromApi() {
      console.log('getDataFromApi');
      this.loading = true;
      const response = await axios.get('/api/roles/');
      console.log('response', response);

      this.loading = false;
      this.roles = response.data;
    }
  }
};
</script>
