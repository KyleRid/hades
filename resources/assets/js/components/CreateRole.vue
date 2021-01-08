
<template>
  <div class="container">
  <template v-if="loading">
   loading...
  </template>
   <template v-else>
      <tr v-for="role in roles">
        RoleID: {{role.id}}
        RoleName: {{role.name}}
        <button v-on:click="deleteRole(role.id)">Delete</button>
        <br>
      </tr>
  </template>
  <form>
    <div class="form-group">
      <input type="title" ref="name" class="form-control" id="name" placeholder="Enter role name" required>
    </div>
    <div class="form-group">
      <input type="title" ref="description" class="form-control" id="description" placeholder="Enter role description" required>
    </div>
    <button type="submit" @click.prevent="createRole" class="btn btn-primary block">Create</button>
  </form>
  </div>
</template>


<script>
export default {
  data() {
    console.log('data');
    this.getDataFromApi();

    return {
      loading: true,
      roles: [],
    };
  },
  methods: {
    createRole() {
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
    deleteRole(roleID) {
       axios.delete("/api/roles/" + roleID).then(() => {
         this.getDataFromApi();
       });
    },
    async getDataFromApi() {
      this.loading = true;
      const response = await axios.get('/api/roles/');
      this.loading = false;
      this.roles = response.data.data;
    }
  }
};
</script>
