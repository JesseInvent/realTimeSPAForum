<template>

    <v-container>

        <v-form @submit.prevent="create">
 
            <v-col cols="12" >
                <span class="red--text" v-if="errors.title">{{errors.title[0]}}</span>
                <v-text-field
                    v-model="form.title"
                    label="Title"
                    type="text"
                    required
                ></v-text-field>
            </v-col>

            <v-col cols="12" >
                <span class="red--text" v-if="errors.title">{{errors.category_id[0]}}</span>
                <v-autocomplete
                    label="Category"
                    v-model="form.category_id"
                    :items="categories"
                    item-value="id"
                    item-text="name"
                ></v-autocomplete>
            </v-col>

            <v-col>
                 <span class="red--text" v-if="errors.title">{{errors.body[0]}}</span>
                  <vue-simplemde v-model="form.body" />
            </v-col>

            <v-col>
               <v-btn 
                    color=""
                    type="submit"
                    :disabled="disabled"
                >Create
               </v-btn>
            </v-col>
        
        </v-form>

    </v-container>

</template>

<script>
export default {

    data () {
        return {
            form: {
                title: '',
                category_id: '',
                body: ''
            },
            categories: [],
            errors: {}
        }
    }, 
 
    created () {
        axios.get('/api/category')
            .then(res => this.categories = res.data.data)
    },
    
    methods: {
        create () {
            axios.post('/api/question', this.form)
                .then(res => this.$router.push(res.data.path))
                .catch(error => this.errors = error.response.data.errors)
        }
    },

    computed: {
        disabled () {
            return !(this.form.title && this.form.body && this.form.category_id)
        }
    }
}
</script>

<style>
      @import '~simplemde/dist/simplemde.min.css';
</style> 