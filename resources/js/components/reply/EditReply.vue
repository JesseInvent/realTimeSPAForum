<template lang="">
    <div>
        <vue-simplemde v-model="reply.reply" />
        <v-card-actions class="p-5">

            <v-btn icon @click="update">
                <v-icon color="blue">mdi-content-save</v-icon>
            </v-btn>
            <v-btn icon @click="cancel">
                <v-icon color="red">mdi-delete</v-icon>
            </v-btn>

        </v-card-actions>
    </div>
</template>
<script>
export default {
    
    props: ['reply'],

    methods: {

        update () {
            axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`, { body: this.reply.reply })
                .then(res => this.cancel());
        },

        cancel () {
            EventBus.$emit('cancelEditting');
        },
    }
}
</script>
<style lang="">
    
</style>