<template>

    <div>
        <v-card>
            <v-toolbar color="teal" dark dense class="mt-2">
                <v-toolbar-title>Categories</v-toolbar-title>
            </v-toolbar>

            <v-list>
                <v-list-item
                    v-for="category in categories"
                    :key="category.id"
                >
                    <v-list-item-content style="padding: 10px" >
                        <v-list-item-title>{{category.name}} </v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-card>
    </div>

</template>

<script>
export default {

    data () {
        return { 
            categories: {}
        }
    },
    created () {
        axios.get('/api/category')
            .then(res => this.categories = res.data.data)
            .catch(error => console.log(error));
    }
}
</script>
<style>
    
</style>