
<template>
<div>
    <div class="ui center container">
        <div class="ui segment inverted">
            <p><span class="ui huge text">{{channelDetails.name}}</span></p>
        </div>
    </div> 
    <div class="ui center container chat">
        <div class="ui one column grid">
            <div class="row">
                <div class="left aligned left floated six wide column chat-box">
                    <div class="ui segment inverted">
                        <p><span class="ui medium text">User 1</span></p>
                    </div>
                    <div class="ui inverted segment green inverted">
                        <span>Send adjowid joiawd owadh uijawdhbui aw</span>
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
                                <textarea rows="2" name="message" v-model="fields.message" placeholder="Your message"></textarea>
                            </div>
                            <button class="ui button inverted" type="submit">Send</button>
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
            }
        },
        mounted() {
            this.id = this.$route.params.chatId;
            this.channel();
            Echo.channel('message.received')
            .listen('MessageChannel', function(e) {
            console.log("TEST" + e.message); 
         });
        },
        methods: {
            channel(){
                axios.get('channel/'+ this.id +'/details').then(response => {
                    this.channelDetails = response.data;
                });
            },

            sendMessage(){
                this.errors = {};
                
                axios.post('channel/'+ this.id +'/message', this.fields).then((response) => {
                    var status = response.data.status;
                    var message = response.data.message;
                    $('body').toast({
                        title: "Chat",
                        class: "inverted",
                        position: 'bottom right',
                        message: `${message}`,
                        showProgress: 'bottom',
                        classProgress: 'green'
                    });
                }).catch((error) => {
                    //console.log(error.response.status);
                    this.errors = error.response.data.errors || {};
                    $('body').toast({
                        title: "Chat",
                        class: "inverted",
                        position: 'bottom right',
                        message: `You do not have access to this feature`,
                        showProgress: 'bottom',
                        classProgress: 'red'
                    });
                });
            },
        }
    }
</script>
