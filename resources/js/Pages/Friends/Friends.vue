
<template>
<div>
    <div class="ui center aligned container">
        <div class="ui segment inverted">
            <p><span class="ui huge text">Friend requests</span></p>
        </div>
        <div v-if="loading" class="ui active dimmer">
            <div class="ui text loader">Loading</div>
        </div>
        <div v-if="!friendRequests" class="ui inverted segment">
            <span class="ui info large text">No friend requsts <em data-emoji=":broken_heart:"></em></span>
        </div>
        
        <div v-else class="ui centered inverted cards">
           <div v-for="(value, key) in friendRequests" :key="key" class="flat-green card">
                <div class="content">
                    <img src="/images/male.png" class="right floated avatar ui image">
                    <a class="header">{{ value.received_by }}</a>
                    <div class="description">{{ value.received_at }}</div>
                </div>
                <div class="extra content">
                      <div class="ui two bottom attached buttons">
                          <button v-on:click="decline(value, key)" class="ui red button">Decline</button>
                      </div>
                </div>
           </div>
        </div>
    </div>
</div>

</template>

<script>
    export default {
        data() {
            return {
                errors: {},
                empty: false,
                loading: true,
                friendRequests: null,
            }
        },
        mounted() {
            this.getFriends();
        },
        methods: {
            getFriends(){
                axios.get('friends').then( (resp) => {
                    console.log(resp);
                })
            }
        },
    }
</script>