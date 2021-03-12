<template>

    <v-container fluid grid-list-md>

        <v-layout row wrap>
            
            <v-flex xs8>
                <questions
                    v-for="question in questions"
                    :key="question.bodu"
                    :question="question"
                ></questions>
            </v-flex>

            <v-flex xs4>
                <app-sidebar></app-sidebar>
            </v-flex>

        </v-layout>

    </v-container>

</template>

<script>

import questions from './Questions'
import AppSidebar from './AppSidebar'

export default {

    components: { questions, AppSidebar },

    data () {
        return {
            questions: {},
        }
    },

    created () {
        axios.get('/api/question')
        .then(res => this.questions = res.data.data)
        .catch(error => console.log(error.response.data));
    }
}

</script>
<style>
    
</style>