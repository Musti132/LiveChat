
<template>
<div>
    <div class="ui center container">
        <div class="ui segment inverted">
            <p><span class="ui huge text">Friends</span></p>
        </div>
    </div> 

</div>

</template>

<script>

    export default {
        data() {
            return {
                fields: {},
                errors: {},
            }
        },
        mounted() {
            Echo.private('App.User.1')
                .listen('SendMessage', (e) => {
                console.log(e);
            });
        },
        methods: {
        },
    }
</script>
