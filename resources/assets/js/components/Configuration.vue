
<template>
	<div  class="container">
        <form v-if="!loading">
            <div>
                <label for="siteurl">Site URL: </label>
                <input id="siteurl" v-model="options.siteurl.option_value"/>
            </div>
            <div>
                <label for="home">Home: </label>
                <input id="home" v-model="options.home.option_value"/>
            </div>
            <div>
                <label for="sitename">Sitename: </label>
                <input id="sitename" v-model="options.sitename.option_value"/>
            </div>
            <div>
                <label for="sitedescription">Site Descriotion: </label>
                <input id="sitedescription" v-model="options.sitedescription.option_value"/>
            </div>
            <div>
                <label for="user_can_register">User Can Register: </label>
                <input id="user_can_register" type="checkbox" v-model="options.user_can_register.option_value"/>
            </div>
            <div>
                <label for="admin_email">Admin Email: </label>
                <input id="admin_email" v-model="options.admin_email.option_value"/>
            </div>
            <button @click.prevent="save">Save</button>
        </form>
        <div v-if="loading">
            Loading...
        </div>

    </div>

</template>

<script>
export default {
    props: {

    },
    data() {
        this.getDataFromApi();
        return {
            options: {},
            loading: true,
        };
    },
    methods: {
        async getDataFromApi() {
            this.loading = true;
            let response = await axios.get('/api/options/');
            response = response.data;
            console.log('response', response);
            for (let key in response) {
                if (response.hasOwnProperty(key)) {
                    this.options[response[key].option_name] = response[key];
                }
            }
            this.options['user_can_register'].option_value = !!parseInt(this.options['user_can_register']);
            this.loading = false;
            console.log('data', this.options);
        },

        save() {
        console.log(this.options);

            const formData = new FormData();

            axios
                .put("/api/options", this.options)
                .then(response => {
                console.log('then',response);
                this.successful = true;
                this.error = false;
                this.errors = [];
                })
                .catch(error => {
                    console.log('error', error);
                if (!_.isEmpty(error.response)) {
                    if ((error.response.status = 422)) {
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
