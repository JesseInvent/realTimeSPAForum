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

        <v-container>
            <replies :question = question></replies>
            <new-reply v-if="loggedIn" :questionSlug="question.slug"></new-reply>
            <div v-else class="mt-4"> 
                <router-link to="/login">Login in to Reply</router-link>
            </div>
        </v-container>

    </div>
</template>

<script>
import ShowQuestion from './ShowQuestion'
import EditQuestion from './EditQuestion'
import Replies from '../reply/Replies.vue'
import NewReply from '../reply/NewReply.vue'

export default { 

    components : { ShowQuestion, EditQuestion, Replies, NewReply },

  
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

    computed: {
        loggedIn() {
            return User.loggedIn();
        }
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