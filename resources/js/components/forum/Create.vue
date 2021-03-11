<template>

    <v-container>

        <v-form @submit.prevent="create">
 
            <v-col cols="12" >
                <v-text-field
                    v-model="form.title"
                    label="Title"
                    type="text"
                    required
                ></v-text-field>
            </v-col>

            <v-col cols="12" >
                <!-- <v-select
                    :items="categories"
                    v-model="form.category_id"
                    item-text="name"
                    item-value="id"
                    label="Category"
                    autocomplete
                >
                </v-select> -->

                <v-autocomplete
                    label="Category"
                    v-model="form.category_id"
                    :items="categories"
                    item-value="id"
                    item-text="name"
                ></v-autocomplete>
            </v-col>

            <v-col>
                  <vue-simplemde v-model="form.body" />
            </v-col>

            <v-col>
               <v-btn 
                    color=""
                    type="submit"
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
                .catch(error => this.errors = error.response.data.error)
        }
    }
}
</script>

<style>
      @import '~simplemde/dist/simplemde.min.css';
</style> 