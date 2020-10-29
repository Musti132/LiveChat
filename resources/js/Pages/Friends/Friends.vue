
<template>
<div>
    <div class="ui center aligned container">
        <div class="ui segment inverted">
            <p><span class="ui huge text">Your Friends</span></p>
        </div>
        <div v-if="loading" class="ui active dimmer">
            <div class="ui text loader">Loading</div>
        </div>
        <div v-if="!friends && !loading" class="ui inverted segment">
            <span class="ui info large text">No friends <em data-emoji=":broken_heart:"></em></span>
        </div>
        
        <div v-else class="ui centered inverted cards">
           <div v-for="(value, key) in friends" :key="key" class="flat-green card">
                <div class="content">
                    <img src="/images/male.png" class="right floated avatar ui image">
                    <a class="header">{{ value.name }}</a>
                    <div class="description">{{ value.addedAt }}</div>
                </div>
                <div class="extra content">
                      <div class="ui bottom attached buttons">
                          <router-link :to="{ name: 'ProfileShow', params: { userId: value.id }}" class="ui button">Profile</router-link>
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
                friends: null,
            }
        },
        mounted() {
            this.getFriends();
        },
        methods: {
            getFriends(){
                axios.get('friends').then( (resp) => {
                    this.friends = resp.data;
                    this.loading = false;
                    console.log(resp.data);
                })
            }
        },
    }
</script>