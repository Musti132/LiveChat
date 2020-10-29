
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
            <span class="ui info large text">No friend requests <em data-emoji=":broken_heart:"></em></span>
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
                          <button v-on:click="decline(value, key)" class="ui button">Decline</button>
                          <button v-on:click="accept(value, key)" class="ui friend-accept button">Accept</button>
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
            this.getFriendRequests();
        },
        methods: {
            getFriendRequests(){
                axios.get('friends/requests').then((res) => {
                    this.loading = false;
                    if(!res.data.length == 0){
                        this.friendRequests = res.data;
                    }
                }).catch((error) => {
                    console.log(error);
                    tihs.loading = false;
                })
            },

            accept(request, key){
                Vue.delete(this.friendRequests, key);
                $('body').toast({
                    title: "Chat",
                    class: "inverted",
                    position: 'bottom right',
                    message: `Accepted request from ${request.received_by} <em data-emoji=":clap:"></em>`,
                    showProgress: 'bottom',
                    classProgress: 'green'
                });
                axios.post('friends/accept', { requestId: request.request_id }).then( (resp) => {
                    console.log(resp);
                })
            },

            decline(request, key){
                Vue.delete(this.friendRequests, key);
                axios.post('friends/decline', { requestId: request.request_id }).then( (resp) => {
                    $('body').toast({
                        title: "Chat",
                        class: "inverted",
                        position: 'bottom right',
                        message: `Declined request from ${request.received_by} <em data-emoji=":broken_heart:"></em>`,
                        showProgress: 'bottom',
                        classProgress: 'red'
                    });
                })
            },
        },
    }
</script>