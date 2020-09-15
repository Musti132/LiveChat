<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
            <form @submit.prevent="submit">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" v-model="fields.email" />
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" v-model="fields.name" />
                <input type="submit" class="ui button teal inverted"></button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['route'],
        data() {
            return {
                fields: {},
                errors: {},
            }
        },
        mounted() {
            this.getUsers();
        },
        methods: {
            getUsers(){
                    axios.get(this.route).then((response) => {
                    console.log(response.data.users);
                });
            },
            
            submit(){
                this.errors = {};

                axios.post('api/web/sendMessage', this.fields).then((response) => {
                    console.log(response.data.request);
                }).catch((error) => {
                    if(error.response.status === 422){
                        this.errors = error.response.data.errors || {};
                    }
                });
            },
        }
    }
</script>
