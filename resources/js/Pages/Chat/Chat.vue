
<template>
    <div>
        <div class="ui center container">
            <div class="ui segment inverted">
                <p>
                    <span class="ui huge text"
                        >{{ channelDetails.channel_name }}
                    </span>
                </p>
            </div>
        </div>
        <div id="chat_box" class="ui center container chat">
            <div
                v-for="(value, key) in channelMessages"
                :key="key"
                class="ui one column grid"
            >
                <div class="row">
                    <div
                        class="left aligned left floated six wide column chat-box"
                    >
                        <div class="ui segment inverted">
                            <p>
                                <span class="ui medium text">{{
                                    value.from_user
                                }}</span>
                            </p>
                        </div>
                        <div class="ui inverted segment green inverted">
                            <span>{{ value.message }}</span>
                            <br />
                            <span class="ui small grey text">{{
                                value.sent_at
                            }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ui center aligned container">
            <div class="ui equal width grid">
                <div class="row">
                    <div class="column">
                        <div class="ui container">
                            <form class="ui form" @submit.prevent="sendMessage">
                                <div class="field inverted transparent">
                                    <textarea
                                        rows="2"
                                        name="message"
                                        v-model="fields.message"
                                        placeholder="Your message"
                                    ></textarea>
                                </div>
                                <button
                                    class="ui button inverted"
                                    type="submit"
                                >
                                    Send
                                </button>
                            </form>
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
            fields: {},
            errors: {},
            channelDetails: {},
            channelMessages: {},
            id: null,
        };
    },
    mounted() {
        this.id = this.$route.params.chatId;
        this.channel();

        Echo.channel("message.received").listen("MessageChannel", (e) => {
            if (e.from_id != window.Vue.auth.user().id) {
                this.channelMessages.push({
                    from_user: e.from_user,
                    message: e.message,
                    sent_at: e.sent_at,
                });
            }
        });
    },
    updated() {
        let element = document.querySelector("#chat_box");
        var scrollHeight = element.scrollHeight;
        element.scrollTop = scrollHeight;
    },
    methods: {
        channel() {
            axios.get("channel/" + this.id + "/details").then((response) => {
                this.channelDetails = response.data.data;
                this.channelMessages = response.data.data.message;
            });
        },

        sendMessage() {
            this.errors = {};

            axios
                .post("channel/" + this.id + "/message", this.fields)
                .then((response) => {
                    var status = response.data.status;
                    var message = response.data.message;

                    this.channelMessages.push({
                        from_user: window.Vue.auth.user().name,
                        message: this.fields.message,
                        sent_at: new Date(),
                    });

                    $("body").toast({
                        title: "Chat",
                        class: "inverted",
                        position: "bottom right",
                        message: `${message}`,
                        showProgress: "bottom",
                        classProgress: "green",
                    });
                })
                .catch((error) => {
                    this.errors = error.response.data || {};
                    $("body").toast({
                        title: "Chat",
                        class: "inverted",
                        position: "bottom right",
                        message: `You do not have access to this feature`,
                        showProgress: "bottom",
                        classProgress: "red",
                    });
                });
        },
        test() {
            return this.channelMessages;
        },
    },
};
</script>

<style scoped>
#chat_box {
    overflow-y: scroll !important;
    height: 60% !important;
}
</style>