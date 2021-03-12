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
        }

    }
}

</script>

<style>
    
</style>