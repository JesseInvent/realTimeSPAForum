<template>

    <div class="mt-3">

        <v-card class="p-2">

            <v-card-title>
                <div class="headline">{{ data.user }}</div>
                <div class="ml-2">said {{ data.created_at }}</div>
                <v-spacer></v-spacer>
                <like :content="data"></like>
            </v-card-title>

            <v-divider></v-divider>

            <edit-reply 
            v-if="editting"
            :reply = data
            ></edit-reply>

            <v-card-text v-else v-html="reply"></v-card-text>

            <v-divider></v-divider>

            <div v-if="!editting">

                <v-card-actions class="p-5" v-if="own">

                    <v-btn icon @click="edit">
                        <v-icon color="blue">mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn icon @click="destroy">  
                        <v-icon color="red">mdi-delete</v-icon>
                    </v-btn>

                </v-card-actions>
            </div>

        </v-card>

    </div>

</template>

<script>

import EditReply from './EditReply'
import Like from '../likes/like'

export default {

    components: { EditReply, Like },
    
    props: ['data', 'index'],

    data () {
        return {
            editting: false
        }
    },

    computed: {

        own () {
            return User.own(this.data.user_id);
        },

        reply () {
            return md.parse(this.data.reply)
        }

    },

    created () {
        this.listen()
    },

    methods : {
        destroy () {
            EventBus.$emit('deleleReply', this.index)
        },

        edit () {
            this.editting = true;
        },

        listen () {
            EventBus.$on('cancelEditting', () => {
                this.editting = false
            })
        }
    }

}

</script>

<style>
    
</style>