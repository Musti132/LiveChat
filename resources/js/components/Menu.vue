<template>
    <div class="ui secondary inverted pointing menu" v-if="!$auth.check()">
        <div class="right inverted menu">
            <div v-for="route in routes.public" :key="route.key">
                <router-link
                    :to="{ name: route.path }"
                    :key="route.key"
                    class="item"
                >
                    <div class="ui animated button inverted">
                        <div
                            v-bind:class="{ teal: route.color }"
                            class="visible content"
                        >
                            {{ route.name }}
                        </div>
                        <div class="hidden content">
                            <i class="sign in alternate icon"></i>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
    <div v-else>
        <AuthMenu></AuthMenu>
    </div>
</template>

<script>
import AuthMenu from "./AuthMenu";

export default {
    data() {
        return {
            routes: {
                public: [
                    { name: "Login", path: "Login" },
                    { name: "Register", path: "Register" },
                ],
            },
        };
    },
    components: {
        AuthMenu,
    },
};
</script>

<style scoped>
.autocomplete-input {
    background-color: red !important;
}
</style>