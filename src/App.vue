<template>
  <v-app>

    <v-app-bar app color="primary" dark>
      <!-- <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon> -->
      <v-toolbar-title>UCC-Test</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon @click.stop="drawer = !drawer">
        <v-icon>mdi-plus</v-icon>
      </v-btn>
    </v-app-bar>

    <v-card >
      <v-navigation-drawer app v-model="drawer"   
        right
        width="40%"
        color="secondary"
        dark
        >
        <form-component> </form-component>
      </v-navigation-drawer>
    </v-card>

    <v-main>
      <v-container fluid>
        
        <v-slide-x-transition>
        <router-view></router-view>
        </v-slide-x-transition>
      </v-container>
    </v-main>

    <v-card>
  <v-footer absolute app>
    <v-card-text class="text-center">
      &copy; {{ new Date().getFullYear() }} — <strong>UCC-Test</strong>
    </v-card-text>
  </v-footer>
</v-card>

  </v-app>
</template>
<script>
import formComponent from './components/formComponent'

export default {
  name: 'App',
  data: () => ({
    drawer: false,
  }),
  components:{
    formComponent
  }
  
}
</script>
    