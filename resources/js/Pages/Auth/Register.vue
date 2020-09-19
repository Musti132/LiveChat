<template>
<div>
    <div class="ui segment center aligned inverted">
        <p><span class="ui huge text">Register </span></p>
    </div>
    <div class="ui container">
        <div class="alert alert-danger" v-if="has_error && !success">
            <p v-if="error == 'login_error'">Validation Errors.</p>
            <p v-else>Unknown error occurred.</p>
        </div>
        <form class="ui inverted form" v-bind:class="{ loading: loading}" @submit.prevent="register">
            <div class="ui one column grid centered">
                <div class="row">
                    <div class="field five wide column">
                        <label>Name</label>
                        <input type="text" name="name" v-model="fields.name" placeholder="Name">
                    </div>
                </div>
                <div class="row">
                    <div class="field five wide column">
                        <label>Email</label>
                        <input type="email" name="email" v-model="fields.email" placeholder="Email">
                    </div>
                </div>
                <div class="row">
                    <div class="field five wide column">
                        <label>Password</label>
                        <input type="password" name="password" v-model="fields.password" placeholder="Password">
                    </div>
                </div>
                <div class="row">
                    <div class="field five wide column">
                        <label>Confirm password</label>
                        <input type="password" name="password_confirmation" v-model="fields.password_confirmation" placeholder="Confirm Password">
                    </div>
                </div>
                <button type="submit" class="ui inverted teal button" v-bind:class="{ loading: loading}">Register</button>
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
                errors: null,
                has_error: false,
                loading: false,
                redirectTo: "Home",
            }
        },
        mounted(){
        },
        methods: {
            register(){
                this.loading = true;

                this.$auth.register({
                        data: this.fields,
                        success: function(){
                            console.log("success");
                        },
                    }).then( (response) => {
                        $('body').toast({
                            title: "Chat",
                            class: "inverted",
                            position: 'bottom right',
                            message: `Successfully registered`,
                            showProgress: 'bottom',
                            classProgress: 'green'
                        });
                        this.$router.push({name: 'login', params: {successRegistrationRedirect: true}});
                    }).catch((error) => {
                        console.log(error);
                        this.loading = false;
                        this.has_error = true;
                        this.error = error.response.data.message;
                    })
                }
        },
    }
</script>