<template>
  <v-card
    color="grey lighten-4"
    flat
  >
    <v-toolbar dense>
      <!-- <v-app-bar-nav-icon></v-app-bar-nav-icon> -->

      <v-toolbar-title>GCMI Guest </v-toolbar-title>

      <v-spacer></v-spacer>

      <app-notification v-if="loggedIn"></app-notification>

      <div class="hidden-sm-and-down">
          
          <router-link
          v-for="item in showTabs"
          :key="item.title"
          :to="item.to">
            <v-btn>{{item.title}}</v-btn>
          </router-link>
          
      </div>

    </v-toolbar>
  </v-card>
</template>

<script>
import AppNotification from './AppNotification'

export default {

  components: { AppNotification },

  data () {
    return {
      loggedIn: User.loggedIn(),
      items: [
        {'title' : 'Forum', to: '/forum', show: true},
        {'title' : 'Ask Question', to: '/ask', show: User.loggedIn()},
        {'title' : 'Category', to: '/category', show: User.admin()},
        {'title' : 'Login', to: '/login', show: !User.loggedIn()},
        {'title' : 'Logout', to: '/logout', show: User.loggedIn()},
      ]
    }
  },

  computed : {

    showTabs () {
      return this.items.filter(tab => tab.show == true)
    }
  },

  created () {
    EventBus.$on('logout', () => {
      User.logout()
    });
  }
    
}
</script>
<style>
    
</style>