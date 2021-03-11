<template>
  <v-card
    class="mx-auto"
  >
    <v-card-title primary-title style="margin: 6px">
        <div>
            <h3 class="headline mb-0">
                <router-link :to="question.path">
                    {{question.title}}
                </router-link>
            </h3>
            <h6 class="grey--text">{{ question.user }} said {{question.created_at}}</h6>
        </div>
    </v-card-title>

    <v-card-text class="text--primary">
        {{question.body}}
    </v-card-text>
 
  </v-card>
</template>

<script>

    export default {
        props: ['question']
    }

</script>

<style>
    
</style>