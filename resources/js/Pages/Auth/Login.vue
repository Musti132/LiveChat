<template>
<div>
    <div class="ui segment center aligned inverted">
        <p><span class="ui huge text">Login </span></p>
    </div>
    <div class="ui container">
        <div class="ui error message" v-if="error && !success">
            <div class="header">Error</div>
            <p>Error, unable to connect with these credentials.</p>
        </div>
        <form class="ui inverted form" @submit.prevent="login">
            <div class="ui one column grid centered">
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
                    <button type="submit" class="ui inverted button" v-bind:class="{ loading: loading}">Login</button>
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
                error: null,
                has_error: false,
                loading: false,
                redirectTo: "Home",
            }
        },
        mounted(){
        },
        methods: {
            login(){
                this.loading = true;
                this.$auth.login({
                    data: {
                        email: this.fields.email,
                        password: this.fields.password,
                    },
                    rememberMe: false,
                    fetchUser: true,
                    error(error){
                        alert("test")
                        this.loading = false;
                        this.has_error = true;
                        this.error = res.response.data.message;
                    },
                }).then((response) => {

                    this.loading = false;
                    this.success = true;
                    var message = response.data.message;

                    $('body').toast({
                        title: "Chat",
                        class: "inverted",
                        position: 'bottom right',
                        message: `Successfully logged in`,
                        showProgress: 'bottom',
                        classProgress: 'green'
                    });

                    this.$router.push({name: this.redirectTo})
                }).catch((error) => {
                    this.loading = false;
                    this.success = false;
                    this.error = "login_error";
                    console.log("Failed");
                });
                /*
                axios.post('login', this.fields)
                .then( (response) => {
                    console.log("Logged in!");
                    return;
                })
                .catch( (error) => {
                    console.log("Failed!");
                    return;
                });*/
            },
        },
    }
</script>