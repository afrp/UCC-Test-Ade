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
        color="primary"
        >
        <v-form
            ref="form"
            v-model="valid"
            lazy-validation
          >
            <v-text-field
              v-model="name"
              :counter="20"
              :rules="nameRules"
              label="Name"
              required
            ></v-text-field>

            <v-text-field
              v-model="engine_dis"
              :rules="nameRules"
              label="Engine Display Size"
              required
            ></v-text-field>

            <v-select
              v-model="select"
              :items="items"
              :rules="[v => !!v || 'Item is required']"
              label="Engine Display Type"
              required
            ></v-select>            
            <v-text-field
              v-model="engine_Power"
              :rules="nameRules"
              label="Engine Power Size"
              required
            ></v-text-field>

            <v-text-field
              v-model="price"
              :rules="nameRules"
              label="Price"
              required
            ></v-text-field>

            <v-text-field
              v-model="location"
              :rules="nameRules"
              label="Location"
              required
            ></v-text-field>
           
            <v-btn
              :disabled="!valid"
              color="success"
              class="mr-4"
              @click="validate"
            >
              Validate
            </v-btn>

            <v-btn
              color="error"
              class="mr-4"
              @click="reset"
            >
              Reset Form
            </v-btn>
          </v-form> 
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
export default {
  name: 'App',
  data: () => ({
    drawer: false,
    valid: true,
    name: '',
    engine_dis: '',
    engine_Power: '',
    price: '',
    location: '',
    nameRules: [
      v => !!v || 'Name is required',
      v => (v && v.length <= 20) || 'Name must be less than 10 characters',
    ],    
    select: null,
    items: [
      'Centimetres',
      'Cubic Inches',
      'Liter',      
    ],
    
  }),
  methods: {
      validate () {
        this.$refs.form.validate()
      },
      reset () {
        this.$refs.form.reset()
      },
}
}
</script>