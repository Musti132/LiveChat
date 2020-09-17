<template>
    <div id="main">
        <Menu></Menu>
        <div id="content">
            <router-view></router-view>
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