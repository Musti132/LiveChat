<template>
    <div class="ui container">
        <div v-if="loading" class="ui active dimmer">
            <div class="ui text loader">Loading</div>
        </div>
        <router-link :to="{ name: 'ChannelCreate' }">
            <div class="ui top attached inverted primary button">
                Create new channel
            </div>
        </router-link>
        <table class="ui inverted single line table center aligned" v-if="!loading">
            <thead>
                <tr class="center">
                    <th>Channel Name</th>
                    <th>Topic</th>
                    <th>Owner</th>
                    <th>Created</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="channel in channels" :key="channel.channel_id">
                    <td>{{ channel.channel_name }}</td>
                    <td>{{ channel.channel_topic }}</td>
                    <td>{{ channel.channel_owner }}</td>
                    <td>{{ channel.created_at }}</td>
                    <td colspan="2">
                        <router-link
                            :to="{
                                name: 'ChatHome',
                                params: { chatId: channel.channel_id },
                            }"
                            class="ui button"
                            >Join</router-link
                        >
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loading: true,
            channels: {},
        };
    },

    mounted() {
        axios.get("channel/list").then((response) => {
            this.channels = response.data.data;
            this.loading = false;
        });
    },
};
</script>

<style>
</style>