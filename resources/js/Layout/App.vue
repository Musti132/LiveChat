<template>
    <div id="main">
        <Menu></Menu>
        <div id="content">
        <keep-alive>
            <router-view></router-view>
        </keep-alive>
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