<template>
<div>
    <div class="ui segment center aligned inverted">
        <p><span class="ui huge text">Login </span></p>
    </div>
    <div class="ui container">
        <form class="ui inverted form" @submit.prevent="login">
            <div class="ui one column grid centered">
                <div class="row">
                    <div class="field five wide column">
                        <label>Username</label>
                        <input type="text" name="username" v-model="fields.username" placeholder="Username">
                    </div>
                </div>
                <div class="row">
                    <div class="field five wide column">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                </div>
                    <button class="ui inverted teal button">Register</button>
                    <div class="or"></div>
                    <button type="submit" class="ui inverted button">Login</button>
            </div>
        </form>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                fields: {},
                errors: {},
            }
        },
        mounted(){

        },
        methods: {
            login(){
                axios.post(this.$apiPath + 'login', this.fields)
                .then( (response) => {
                    alert(response.data);
                })
                .catch( (error) => {
                    alert(error.response);
                });
            },
        },
    }
</script>