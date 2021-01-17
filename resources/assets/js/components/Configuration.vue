
<template>
  <div class="container">

  </div>
</template>

<style>

</style>

<script>
export default {
    props: {
    },
    data() {
        axios.get('/api/posts/').then( (response) => {
            console.log('response123', response);
            this.posts = response.data.data;
        });
        return {

        };
    },
};
</script>
