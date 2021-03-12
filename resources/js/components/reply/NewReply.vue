<template lang="">
    <div class="mt-4">
        <v-form>
            <vue-simplemde v-model="body" />
            <v-btn dark color="blue" @click="submit">
                Reply
            </v-btn>
        </v-form>
    </div>
</template>
<script>
export default {

    props:['questionSlug'],
    
    data () {

        return {
            body: ''
        }

    },

    methods: { 

        submit () {
            axios.post(`/api/question/${this.questionSlug}/reply`, { body: this.body })
                .then(res => {
                    this.body = ''
                    EventBus.$emit('newReply', res.data.reply);
                    window.scrollTo(0,0);
                });
        } 

    }
}
</script>
<style lang="">
    
</style>