<template>
  <v-form @submit.prevent="login">
    <v-container>
 
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
      </v-col>
      
    </v-container>
  </v-form>

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
            axios.post('/api/auth/login', this.form)
            .then(res => console.log(res.data))
            .catch(error => console.log(error.response.data))
        }

    }
}

</script>

<style>
    
</style>