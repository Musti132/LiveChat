<template>
    <div id="main">
        <Menu></Menu>
        <div id="content">
        <keep-alive>
            <router-view v-if="$route.meta.keepAlive"></router-view>
        </keep-alive>
        <router-view v-if="!$route.meta.keepAlive"></router-view>
        </div>
    </div>
</template>

<script>
    import Menu from '../Components/Menu.vue'
    export default {
        data(){
            return{

            }
        },
        
        mounted(){
        },

        components: {
            Menu
        }
    }
</script>