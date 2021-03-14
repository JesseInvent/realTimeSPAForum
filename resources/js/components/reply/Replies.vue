<template>
    <div v-if="question">
        <reply 
        v-for="(reply, index) in content"
        :key="index"
        :index="index"
        :data="reply"
        >
        </reply>
    </div>
</template>

<script>

import Reply from './Reply'

export default { 

    props: ['question'],

    data () {

        return {
            content: this.question.replies
        }

    },

    components: { Reply },

    created () {
        this.listen()
    },

    methods: {

        listen () {

            EventBus.$on('newReply', (reply) => {
                 this.content.unshift(reply)
            });

            EventBus.$on('deleleReply', (index) => {
                axios.delete(`/api/question/${this.question.slug}/reply/${this.content[index].id}`)
                    .then(res => {
                        this.content.splice(index, 1)
                    })
            })

            Echo.private('App.Models.User.' + User.id())
                .notification((notification) => {
                    this.content.unshift(notification.reply)
                });
 
            Echo.channel('deleteReplyChannel')
                .listen('DeleteReplyEvent', (e) => {
                    this.content = this.content.filter(el => el.id !== e.id);
                })
        }

    }
}

</script>

<style>
    
</style>