
<template>
  <div class="container">
    <template v-if="loading">
      loading...
    </template>
    <template v-else>
        <tr v-for="user in users">
          <span>userID: {{user.id}}</span>
          name: <input :value="user.name" :ref="'name'+user.id">
          email: <input :value="user.email" :ref="'email'+user.email">
          role: dropdown
          <button v-on:click="saveChanges(user.id)">Save</button>
          <br>
        </tr>
    </template>
    <button v-on:click="getDataFromApi">Get Users</button>
    <Paginate
      :page-count="pages"
      :click-handler="() => {}"
      :prev-text="'Prev'"
      :next-text="'Next'"
      :container-class="'className'">
    </Paginate>
  </div>
</template>


<script>
import Paginate from 'vuejs-paginate'

export default {
  components: {
    Paginate
  },
  data() {
    console.log('data', this.pages);
    this.getDataFromApi();

    return {
      loading: true,
      users: [],
      pages: 0,
    };
  },
  methods: {
    saveChanges(userID) {
      const formData = new FormData();
      formData.append("name", this.$refs.name.value);
      formData.append("description", this.$refs.description.value);

      axios
        .post("/api/roles", formData)
        .then(response => {
          this.successful = true;
          this.error = false;
          this.errors = [];
          this.getDataFromApi();
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
      this.$refs.name.value = "";
      this.$refs.description.value = "";
    },
    async getDataFromApi() {
      this.loading = true;
      const response = await axios.get('/api/users/');
      this.pages = response.data.data.length;
      this.loading = false;
    console.log('data', this.pages);
      this.users = response.data.data;
    }
  }
};
</script>
