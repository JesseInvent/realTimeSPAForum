<template>
    <div v-if="question">
        <edit-question 
            v-if="editting"
            :question = question
        ></edit-question>

        <show-question
            :question = question
            v-else
        ></show-question>
    </div>
</template>

<script>
import ShowQuestion from './ShowQuestion'
import EditQuestion from './EditQuestion'

export default { 

    components : { ShowQuestion, EditQuestion },

    data () {
        return {
            question: null,
            editting: false         
        }
    },

    created () {

        this.listen()
        this.getQuestion()

    },

    methods: {

        listen () {
            EventBus.$on('startEditting', () => {
                this.editting = true
            })

            EventBus.$on('cancelEditting', () => {
                this.editting = false
            })
        },

        getQuestion () {
            axios.get(`/api/question/${this.$route.params.slug}`)
                .then(res => this.question = res.data.data)
                .catch(error => console.log(error));
        }
    }
}
</script>
<style>
    
</style>