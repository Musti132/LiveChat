
<template>
<div>
    <div class="ui center container">
        <div class="ui segment inverted">
            <p><span class="ui centered huge text">Chat</span></p>
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
            <div class="row">
                <div class="right floated right aligned six wide column chat-box">
                    <div class="ui segment inverted">
                        <p><span class="ui medium text">User 2</span></p>
                    </div>
                    <div class="ui inverted segment blue">
                        <span>Hello</span>
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
                        <form class="ui form" @submit.prevent="submit">
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
            }
        },
        mounted() {
        },
        methods: {
            submit(){
            },
        }
    }
</script>
