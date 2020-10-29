
<template>
    <div class="ui center aligned container">
        <div class="ui segment inverted">
          <p><span class="ui huge text">Your Profile</span></p>
        </div>
        <div v-if="loading" class="ui active dimmer">
            <div class="ui text loader">Loading</div>
        </div>
        <div v-if="!loading">
            <div class="ui card inverted">
                <div class="image">
                    <img src="images/male.png" class="visible content">
                    
                </div>
                <div class="content">
                    <div class="header">{{data.username}}</div>
                    <div class="meta">
                        <span class="date">Joined {{data.joinedAt}}</span>
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
        this.id = this.$route.params.id;
        this.getProfile();
    },
    methods: {
        getProfile() {
            axios.get("profile/"+this.id).then((resp) => {
                this.data = resp.data.data;
                this.loading = false;
                console.log(this.data);
            });
        },
    },
};
</script>