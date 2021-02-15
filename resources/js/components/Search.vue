<template>
    <div class="right inverted menu" v-if="$auth.check()">
        <div class="ui search">
            <div class="item">
                <autocomplete
                    :search="search"
                    :get-result-value="getResultValue"
                    @submit="handleSubmit"
                    placeholder="Search for friends"
                ></autocomplete>
            </div>
        </div>
    </div>
</template>

<script>
import Autocomplete from "@trevoreyre/autocomplete-vue";

export default {
    components: {
        Autocomplete,
    },
    methods: {
        search(term) {
            const url = `search?term=${encodeURI(term)}`;
            return new Promise((resolve) => {
                axios.get(url).then((resp) => {
                    resolve(resp.data.data);
                });
            });
        },

        getResultValue(result) {
            return result.name;
        },

        handleSubmit(result) {
            this.$router.push({
                name: "ProfileShow",
                params: { userId: result.id },
            });
        },
    },
};
</script>
