<template>
    <div class="ui secondary inverted pointing menu">
        <router-link
            :to="{ name: routes.authenticated[0].path }"
            :key="0"
            class="item"
            exact
            >{{ routes.authenticated[0].name }}</router-link
        >
        <router-link
            :to="{ name: routes.authenticated[1].path }"
            :key="1"
            class="item"
            exact
            >{{ routes.authenticated[1].name }}</router-link
        >
        <router-link
            :to="{ name: routes.authenticated[2].path }"
            :key="2"
            class="item"
            exact
            >{{ routes.authenticated[2].name }}</router-link
        >
        <router-link
            :to="{ name: routes.authenticated[3].path }"
            :key="3"
            class="item"
            exact
            >{{ routes.authenticated[3].name }}</router-link
        >
        <router-link
            :to="{ name: routes.authenticated[5].path }"
            :key="5"
            class="item"
            exact
            >{{ routes.authenticated[5].name }}</router-link
        >
        <div class="right inverted menu">
            <div class="ui search">
                <div class="item">
                    <Search></Search>
                </div>
            </div>

            <router-link
                v-for="route in routes.rightMenuAuthenticated"
                :key="route.key"
                :to="{ name: route.path }"
                class="item"
            >
                <div
                    v-bind:class="{ teal: route.color }"
                    class="{route.color} ui animated inverted button"
                >
                    <div class="visible content">{{ route.name }}</div>
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
    </div>
</template>

<script>
import Search from "./Search";

export default {
    data() {
        return {
            routes: {
                authenticated: [
                    { name: "Home", path: "Home" },
                    { name: "Channels", path: "ChannelHome" },
                    { name: "Friends", path: "Friends" },
                    { name: "Requests", path: "FriendRequests" },
                    { name: "Profile", path: "Profile" },
                    { name: "Create", path: "ChannelCreate" },
                ],
                rightMenuAuthenticated: [
                    {
                        name: "Profile",
                        path: "Profile",
                        color: true,
                        class: "red",
                    },
                ],
                public: [
                    { name: "Login", path: "Login" },
                    { name: "Register", path: "Register" },
                ],
            },
        };
    },
    components: {
        Search,
    },
};
</script>

<style scoped>
.autocomplete-input {
    background-color: red !important;
}
</style>