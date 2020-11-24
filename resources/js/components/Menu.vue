<template>
    <div class="ui secondary inverted pointing menu">
        <router-link :to="{ name : routes.authenticated[0].path }" :key="0" class="item" exact>{{routes.authenticated[0].name}}</router-link>
        <router-link :to="{ name: 'ChatHome', params: { chatId: 1 }}" class="item">Channel</router-link>
        <router-link :to="{ name : routes.authenticated[2].path }" :key="2" class="item" exact>{{routes.authenticated[2].name}}</router-link>
        <router-link :to="{ name : routes.authenticated[3].path }" :key="3" class="item" exact>{{routes.authenticated[3].name}}</router-link>
        
        <div class="right inverted menu" v-if="$auth.check()">
            <div class="ui search">
                <div class="item">
                    <autocomplete 
                        :search="search"
                        :get-result-value="getResultValue"
                        @submit="handleSubmit"
                        placeholder="Search for friends"
                        ></autocomplete>
                </div>
            </div>
                
            <router-link v-for="route in routes.rightMenuAuthenticated" :key="route.key" :to="{ name : route.path }" class="item">
                <div v-bind:class=" { teal: route.color }" class="{route.color} ui animated inverted button ">
                    <div class="visible content">{{route.name}}</div>
                    <div class="hidden content">
                        <i class="user icon"></i>
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
            <div v-for="route in routes.public" :key="route.key">
                <router-link :to="{ name : route.path }" :key="route.key" class="item">
                    <div class="ui animated button inverted">
                        <div v-bind:class=" {teal: route.color }" class="visible content">{{route.name}}</div>
                        <div class="hidden content">
                            <i class="sign in alternate icon"></i>
                        </div>
                    </div>
                </router-link>
            </div>
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
                        { name: 'Requests', path: 'FriendRequests' },
                        { name: 'Profile', path: 'Profile' },
                    ],
                    rightMenuAuthenticated: [
                        { name: 'Profile', path: 'Profile', color: true, class: "red" },
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
            console.log(this.routes.authenticated);
        },
        methods: {
            search(term){
                const url = `search?term=${encodeURI(term)}`
                return new Promise(resolve => {
                    /*
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                          resolve(data.data)
                        })*/
                    axios.get(url)
                    .then((resp) => {
                        
                        resolve(resp.data.data);
                    })
                })
            },

            getResultValue(result) {
                return result.name
            },

            handleSubmit(result) {
                window.open(`/profile/${
                encodeURI(result.id)
                }`)
            },
        },
    }
</script>

<style scoped>
.autocomplete-input{
    background-color: red !important;
}
</style>