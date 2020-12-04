<template>

    <div >
        <div class="text-h5 mb-3 mt-3 text-center white--text">
            Add Your Vehicle
        </div>
         <v-form
            ref="form"            
            v-model="valid"
            lazy-validation
            class="mx-2"
          >
            <v-text-field
              v-model="formdata.ucc_name"
              :counter="15"
              :rules="nameRules"
              label="Name"
              required
            ></v-text-field>

            <v-text-field
              v-model="formdata.ucc_engine_disp"
              :rules="nameRules"
              label="Engine Display Size"
              required
            ></v-text-field>

            <v-select
              v-model="formdata.ucc_engine_disp_type"
              :items="items"
              :rules="[v => !!v || 'Item is required']"
              label="Engine Display Type"
              required
            ></v-select>            
            <v-text-field
              v-model="formdata.ucc_engine_pow"
              :rules="nameRules"
              label="Engine Power Size (HP)"
              required
            ></v-text-field>

            <v-text-field
              v-model="formdata.ucc_price"
              :rules="nameRules"
              label="Price (USD)"
              required
            ></v-text-field>

            <v-text-field
              v-model="formdata.ucc_loc"
              :rules="nameRules"
              label="Location"
              required
            ></v-text-field>
           
            <v-btn
              :disabled="!valid"
              
              color="success"
              class="mx-4"
              @click="submit"
            >
              Submit
            </v-btn>

            <v-btn
              color="error"
              class="mx-4"
              @click="reset"
            >
              Reset Form
            </v-btn>
          </v-form> 
    </div>
</template>
<script>
export default {
    name:"formComponent",
    data: () => ({
    
    valid: true,
    formdata:{
      ucc_name:'',
      ucc_engine_disp:'',
      ucc_engine_disp_type:null,
      ucc_engine_pow:'',
      ucc_price:'',
      ucc_loc:''
    },    
    nameRules: [
      v => !!v || 'Name is required',
      v => (v && v.length <= 20) || 'Name must be less than 10 characters',
    ],        
    items: [
      'Centimetres Cubic',
      'Cubic Inches',
      'Liter',      
    ],
    
  }),
  methods: {
      submit () {         
       if (this.$refs.form.validate()){
         this.axios.post('/create.php', {
          action: 'insert',
          ucc_name:this.formdata.ucc_name,
          ucc_engine_disp:this.formdata.ucc_engine_disp,
          ucc_engine_disp_type:this.formdata.ucc_engine_disp_type,
          ucc_engine_pow:this.formdata.ucc_engine_pow,
          ucc_price:this.formdata.ucc_price,
          ucc_loc:this.formdata.ucc_loc
         })
         .then(res => {
           console.log(res)
           alert("Data Has been Inserted")
           this.reset()          
         })
         .catch(err => {
        console.log(err);        
        })
       }
      },
      reset () {
        this.$refs.form.reset()
      },
}
}
</script>