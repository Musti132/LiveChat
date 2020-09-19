
<template>
<div>
    <div class="ui center aligned container">
        <div class="ui three column divided grid">
            <div class="row">
                <div class="column">
                    <div class="ui inverted cards">
                        <div class="blue card">
                            <div class="content">
                                <a class="header">Friends online</a>
                                <div class="description">
                                    0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui inverted cards">
                        <div class="green card">
                            <div class="content">
                                <a class="header">Friend requests</a>
                                <div class="description">
                                    0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="ui inverted cards">
                        <div class="yellow card">
                            <div class="content">
                                <a class="header">Unread messages</a>
                                <div class="description">
                                    0
                                </div>
                            </div>
                        </div>
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
