<template>
    <button class="btn" v-bind:class="{disabled: working, 'btn-danger': watched, 'btn-primary': !watched}" v-text="buttonText" @click="watchSymbol"></button>
</template>

<script>
    export default {
        props: [
            "symbolId",
            "isWatched"
        ],
        data: function(){
            return {
                watched: this.isWatched,
                "working": false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        computed: {
            buttonText: function() {
                return this.watched ? "Unwatch" : "Watch";
            }
        },
        methods: {
            watchSymbol() {
                this.working = true;
                axios.post("/watch/" + this.symbolId)
                    .then(response => {
                        this.watched = !this.watched;
                        this.working = false;
                    });
            }
        }
    }
</script>
