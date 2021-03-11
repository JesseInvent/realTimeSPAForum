<template>
   <v-container>
       <v-card>
            <v-form @submit.prevent="update">

                <v-col>
                    <v-text-field
                        v-model="form.title"
                        label="Title"
                        type="text"
                        required
                    ></v-text-field>
                </v-col>

                <v-col>
                    <vue-simplemde v-model="form.body" />
                </v-col>

                <v-card-actions>
                
                    <v-btn type="submit" icon>
                        <v-icon
                            large
                            >
                            mdi-content-save
                        </v-icon>
                    </v-btn>

                    <v-btn icon @click="cancel">
                        <v-icon
                            large
                            color="green darken-2"
                            >
                            mdi-cancel
                        </v-icon>
                    </v-btn>

                </v-card-actions>

            </v-form>
       </v-card>
   </v-container>
</template>

<script>

export default {

    props: ['question'],
    
    data () {
        return {
            form: {}
        }
    },

    methods: {

        cancel () {
            EventBus.$emit('cancelEditting');
        },

        update () {
            axios.patch(`/api/question/${this.form.slug}`, this.form)
                .then(res => this.cancel())
        }
    }, 

    mounted () {
        this.form = this.question
    }

}

</script>

<style>
    
</style>