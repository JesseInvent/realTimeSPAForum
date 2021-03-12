<template>

    <div>

        <v-container>
            <v-form @submit.prevent="submit">
                <v-text-field
                    v-model="form.name"
                    label="Category Name"
                    type="text"
                    required
                ></v-text-field>

                <v-btn color="green" type="submit" v-if="editSlug">Update</v-btn>
                <v-btn color="blue" type="submit" v-else>Create</v-btn>
            </v-form>

            <v-card class="pt-5">

                <v-toolbar color="blue" dense>
                    <v-toolbar-title>Categories</v-toolbar-title>
                </v-toolbar>

                <v-list>

                    <v-list-item-group
                        color="primary"
                    >

                        <v-list-item
                            v-for="(category, index) in categories"
                            :key="index"
                        >

                            <v-list-item-icon>
                                <v-btn icon small @click="edit(index)">
                                    <v-icon color="blue">mdi-pencil</v-icon>
                                </v-btn>
                            </v-list-item-icon>

                            <v-list-item-content>
                                <v-list-item-title>{{category.name}}</v-list-item-title>
                            </v-list-item-content>

                            <v-list-item-icon>
                                <v-btn icon @click="destroy(category.slug, index)">
                                    <v-icon color="red">mdi-delete</v-icon>
                                </v-btn>
                            </v-list-item-icon>

                        </v-list-item>

                    </v-list-item-group>

                </v-list>   

            </v-card>
            
        </v-container>

    </div>

</template>

<script>
export default {

    data () {

        return {

            form : {
                name: ''
            },

            categories: {},

            editSlug: ''
        }

    },

    methods: {

        create () {

            axios.post('/api/category', this.form)
               .then(res => {
                   this.categories.unshift(res.data)
                   this.form.name = ''
               });

        },

        update () {
            axios.patch(`/api/category/${this.editSlug}`, this.form)
                .then(res => {
                   this.categories.unshift(res.data)
                   this.form.name = ''
                });

        },

        submit () {

            this.editSlug ? this.update() : this.create()

        },

        destroy (slug, index) {
            axios.delete(`/api/category/${slug}`)
                .then(res => this.categories.splice(index, 1))
        },

        edit (index) {
            this.form.name = this.categories[index].name
            this.editSlug = this.categories[index].slug
            this.categories.splice(index, 1);
        }

    },
     
    created () {

        if (!User.admin()) {
            this.$router.push('/forum');
        }

        axios.get('/api/category')
            .then(res => this.categories = res.data.data);
    }
}
</script>

<style>
    
</style>