<template>
    <div class="ui secondary inverted menu">
        <router-link :to="{ name : routes.authenticated[0].path }" :key="0" class="item">{{routes.authenticated[0].name}}</router-link>
        <router-link :to="{ name : routes.authenticated[1].path }" :key="1" class="item">{{routes.authenticated[1].name}}</router-link>
        <a class="item" href="">
            Friends
        </a>
        <div class="right menu">
            <router-link :to="{ name : routes.public[0].path }" :key="0" class="ui item inverted">
                <div class="ui animated button inverted" tabindex="0">
                    <div class="visible content">Profile</div>
                    <div class="hidden content">
                        <i class="right user icon"></i>
                    </div>
                </div>
            </router-link>
            
            <a class="ui item" href="#" @click.prevent="$auth.logout()">
                <div class="ui animated inverted red button" tabindex="0">
                    <div class="visible content">Logout</div>
                    <div class="hidden content">
                        <i class="sign out alternate icon"></i>
                    </div>
                </div>
            </a>
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
                    ],
                public: [
                    { name: "Login", path: 'Login' },
                ],
                }
            }
        },
        mounted(){
        },
    }
</script>