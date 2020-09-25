<template>
    <div class="ui secondary inverted pointing menu">
        <router-link :to="{ name : routes.authenticated[0].path }" :key="0" class="item" exact>{{routes.authenticated[0].name}}</router-link>
        <router-link :to="{ name : routes.authenticated[1].path }" :key="1" class="item" exact>{{routes.authenticated[1].name}}</router-link>
        <router-link :to="{ name : routes.authenticated[2].path }" :key="2" class="item" exact>{{routes.authenticated[2].name}}</router-link>
        <div class="right inverted menu" v-if="$auth.check()">
        <div class="ui search">
            <div class="item">
                <autocomplete :search="search"></autocomplete>
            </div>
        </div>
            <router-link :to="{ name : routes.public[0].path }" :key="0" class="item">
                <div class="ui animated button inverted">
                    <div class="visible content">Profile</div>
                    <div class="hidden content">
                        <i class="right user icon"></i>
                    </div>
                </div>
            </router-link>
            <a class="item" href="#" @click.prevent="$auth.logout()">
                <div class="ui animated inverted red button">
                    <div class="visible content">Logout</div>
                    <div class="hidden content">
                        <i class="sign out alternate icon"></i>
                    </div>
                </div>
            </a>
        </div>
        <div class="right inverted menu" v-if="!$auth.check()">
            <router-link :to="{ name : routes.public[0].path }" :key="0" class="item">
                <div class="ui animated button inverted">
                    <div class="visible content">Login</div>
                    <div class="hidden content">
                        <i class="sign in alternate icon"></i>
                    </div>
                </div>
            </router-link>
            <router-link :to="{ name : routes.public[1].path }" :key="1" class="item">
                <div class="ui animated inverted teal button">
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
    import Autocomplete from '@trevoreyre/autocomplete-vue'

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
        components: {
            Autocomplete,
        },
        mounted(){
        },
        methods: {
            search(term){
                console.log(term);
            },
        },
    }
</script>