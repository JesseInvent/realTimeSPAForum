<template lang="">
    
    <v-container>

      <v-form @submit.prevent="signup">
 
        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.name"
             label="Name"
             type="text"
            required
          ></v-text-field>
          <span class='red--text' v-if="errors.name"> ** {{errors.name[0]}} </span>
        </v-col>


        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.email"
             label="E-mail"
             type="email"
            required
          ></v-text-field>
            <span class='red--text' v-if="errors.email"> ** {{errors.email[0]}} </span>
        </v-col>

        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.password"
            label="Password"
            type="password"
            required
          ></v-text-field>
          <span class='red--text' v-if="errors.password"> ** {{errors.password[0]}} </span>
        </v-col>

        <v-col
          cols="12"
        >
          <v-text-field
            v-model="form.password_confirmation"
             label="Confirm password"
             type="password"
            required
          ></v-text-field>
        </v-col>


        <v-col>
            <v-btn
            color="blue"
            type="submit"
        >
            Signup
        </v-btn>

        <router-link to="/login">
            <v-btn>Login</v-btn>
        </router-link>

      </v-col>
      
    </v-form>

  </v-container>

</template>

<script>
export default {

    data () {

        return {
            form : {
                name: null,
                email: null,
                password: null,
                password_confirmation: null
            },

            errors: {}
        }

    },

    methods: {

        signup () {
            axios.post('/api/auth/signup', this.form)
            .then(res => {
                User.responseAfterLogin(res)
            })
            .catch(error => this.errors = error.response.data.errors)
        }
    },

    created () {
       if (user.isLoggedIn()) {
         this.$router.push({name: 'forum'})
       }
    }
    
}
</script>
<style lang="">
    
</style>