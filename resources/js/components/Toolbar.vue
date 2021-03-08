<template>
  <v-card
    color="grey lighten-4"
    flat
  >
    <v-toolbar dense>
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->

      <v-toolbar-title>GCMI Guest </v-toolbar-title>

      <v-spacer></v-spacer>

      <div class="hidden-sm-and-down">

          <router-link to="/forum ">
            <v-btn>Forum</v-btn>
          </router-link>

          <router-link to="/questions">
            <v-btn >Ask Question</v-btn>
          </router-link>

          <router-link to="/category">
            <v-btn >Category</v-btn>
          </router-link>
          
          <router-link to="/login">
            <v-btn >Login</v-btn>
          </router-link>
          
      </div>
<!---
      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-heart</v-icon>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-dots-vertical</v-icon>
      </v-btn> -->

    </v-toolbar>
  </v-card>
</template>

<script>
export default {
    
}
</script>
<style lang="">
    
</style>