<template>
    <div class="ui secondary inverted pointing menu">
        <router-link :to="{ name : routes.authenticated[0].path }" :key="0" class="item" exact>{{routes.authenticated[0].name}}</router-link>
        <router-link :to="{ name : routes.authenticated[1].path }" :key="1" class="item" exact>{{routes.authenticated[1].name}}</router-link>
        <router-link :to="{ name : routes.authenticated[2].path }" :key="2" class="item" exact>{{routes.authenticated[2].name}}</router-link>
        <div class="right inverted menu" v-if="$auth.check()">
            <div class="item">
                <div class="ui icon input">
                    <input type="text" placeholder="Search for friends">
                    <i class="search link icon"></i>
                </div>
            </div>
            <router-link :to="{ name : routes.public[0].path }" :key="0" class="item">
                <div class="ui animated button inverted" tabindex="0">
                    <div class="visible content">Profile</div>
                    <div class="hidden content">
                        <i class="right user icon"></i>
                    </div>
                </div>
            </router-link>
            <a class="item" href="#" @click.prevent="$auth.logout()">
                <div class="ui animated inverted red button" tabindex="0">
                    <div class="visible content">Logout</div>
                    <div class="hidden content">
                        <i class="sign out alternate icon"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="right inverted menu" v-if="!$auth.check()">
            <router-link :to="{ name : routes.public[0].path }" :key="0" class="item">
                <div class="ui animated button inverted" tabindex="0">
                    <div class="visible content">Login</div>
                    <div class="hidden content">
                        <i class="sign in alternate icon"></i>
                    </div>
                </div>
            </router-link>
            <router-link :to="{ name : routes.public[1].path }" :key="1" class="item">
                <div class="ui animated inverted teal button" tabindex="0">
                    <div class="visible content">Register</div>
                    <div class="hidden content">
                        <i class="user plus icon"></i>
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                routes: {
                    authenticated: [
                        { name: 'Home', path: 'Home' },
                        { name: 'Chat', path: 'ChatHome' },
                        { name: 'Friends', path: 'Friends' },
                    ],
                public: [
                    { name: "Login", path: 'Login' },
                    { name: "Register", path: 'Register' },
                ],
                }
            }
        },
        mounted(){
        },
    }
</script>