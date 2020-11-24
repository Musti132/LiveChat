
<template>
    <div class="ui center aligned container">
        <div class="ui segment inverted">
          <p><span class="ui huge text">{{data.username}}'s Profile</span></p>
        </div>
        <div v-if="loading" class="ui active dimmer">
            <div class="ui text loader">Loading</div>
        </div>
        <div v-if="!loading && !data" class="ui active dimmer">
            <div class="ui text inverted">User not found</div>
        </div>
        <div v-if="!loading && data">
            <div class="ui card centered inverted">
                <div class="image">
                    <img src="/images/male.png" class="visible content">
                    
                </div>
                <div class="content">
                    <div class="header">{{data.username}}</div>
                    <div class="meta">
                        <span class="date">Joined {{data.joinedAt}}</span>
                    </div>
                    <div class="description">
                        <span class="date">Friendship status: 
                            <div v-if="data.isFriend" class="ui inverted segment">
                                <p><span class="ui green text">Friends <em data-emoji=":clap:"></em></span></p>
                            </div>
                            <div v-else-if="data.friendRequest" class="ui inverted segment">
                                <p><span class="ui green text">Friend request received/sent <em data-emoji=":clap:"></em></span></p>
                            </div>
                            <div v-else class="ui inverted segment">
                                <button v-on:click="add()" class="ui friend-accept button">Send friend request</button>
                            </div>
                        </span>
                    </div>
                </div>
                <div class="extra content">
                    <i class="user icon"></i>
                    {{data.friendsCount}} Friends
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
            data: false,
            loading: true,
            friendRequests: null,
            id: null,
        };
    },
    mounted() {
        this.id = this.$route.params.userId;
        this.getProfile();
    },
    methods: {
        getProfile() {
            axios.get("profile/" + this.id).then((resp) => {
                console.log("TEST:" + this.id);
                this.data = resp.data.data;
                this.loading = false;
            }).catch(error => {
                this.loading = false;
            });
        },
        add(){
            $('body').toast({
                title: "Chat",
                class: "inverted",
                position: 'bottom right',
                message: `Sent friend request <em data-emoji=":clap:"></em>`,
                showProgress: 'bottom',
                classProgress: 'green'
            });
            axios.post('friends/add', { userId: this.id }).then( resp => {
                console.log(resp);
            });
        },
    },
};
</script>