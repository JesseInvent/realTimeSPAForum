<template>

    <v-container>

      <v-form @submit.prevent="login">
 
        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.email"
             label="E-mail"
             type="email"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.password"
            label="password"
            type="password"
            required
          ></v-text-field>
        </v-col>

      <v-col>

       <v-btn
            color="blue"
            type="submit"
        >
            Login
        </v-btn>

        <!-- <v-btn
          color="blue"
          type="submit"
        >
          Signup
        </v-btn> -->

        <router-link to="/signup">
            <v-btn>Signup</v-btn>
        </router-link>

      </v-col>
      
    </v-form>

  </v-container>

</template>

<script>
export default {
    
    data() {
         
         return {
             form: {
                 email: null,
                 password: null
             }
         }
    },

    methods: {

        login () {
            User.login(this.form);
        }

    },

    created () {
       if (User.isLoggedIn()) {
         this.$router.push({name: 'forum'})
       }
    }
}

</script>

<style>
    
</style>