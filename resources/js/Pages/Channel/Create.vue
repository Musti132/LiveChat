<template>
    <div>
        <div class="ui segment center aligned inverted">
            <p><span class="ui huge text">Channel creation </span></p>
        </div>
        <div class="ui container">
            <form class="ui inverted form" @submit.prevent="create">
                <div class="ui one column grid centered">
                    <div class="row">
                        <div class="field five wide column">
                            <label>Name</label>
                            <input
                                type="text"
                                v-model="fields.name"
                                placeholder="Channel Name"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="field five wide column">
                            <label>Topic</label>
                            <input
                                type="text"
                                v-model="fields.topic"
                                placeholder="Channel Topic"
                            />
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="ui inverted button"
                        v-bind:class="{ loading: loading }"
                    >
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'ChannelCreate',
    data() {
        return {
            errors: {},
            data: false,
            loading: false,
            fields: {},
        };
    },
    mounted() {},
    methods: {
        create() {
            this.loading = true;
            axios.post("channel/create", this.fields).then((resp) => {
                this.loading = false;
                $("body").toast({
                    title: "Chat",
                    class: "inverted",
                    position: "bottom right",
                    message: `Channel <strong>${resp.data.data.name}</strong> created!`,
                    showProgress: "bottom",
                    classProgress: "green",
                });
            });
        },
    },
};
</script>