<template>
  <v-simple-table>
    <template v-slot:default>
      <thead>
        <tr>
          <th class="text-left">
            Unique ID
          </th>
          <th class="text-left">
            Name
          </th>
          <th class="text-left">
            ED (cm cubic)
          </th>
          <th class="text-left">
            ED (inc cubic)
          </th>
          <th class="text-left">
            ED (liter)
          </th>
          <th class="text-left">
            Engine Power (HP)
          </th>
          <th class="text-left">
            Price (USD)
          </th>
          <th class="text-left">
            Location
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="item in vehicles"
          :key="item.ucc_id"
        >
          <td>{{ item.ucc_id }}</td>
          <td>{{ item.ucc_name }}</td>
          <td>{{ item.ucc_engine_cm }}</td>
          <td>{{ item.ucc_engine_inc }}</td>
          <td>{{ item.ucc_engine_lit }}</td>
          <td>{{ item.ucc_engine_pow }}</td>
          <td>{{ item.ucc_price }}</td>
          <td>{{ item.ucc_loc }}</td>
        </tr>
      </tbody>
    </template>
  </v-simple-table>
</template>


<script>
// @ is an alias to /src
export default {
  data: () => ({
    vehicles: [ ],    
  }),
  created(){
  console.log('get data vehicle')
  this.axios.get('/show.php')
    .then(res => {               
        this.vehicles= res.data.data;
    })
    .catch(err => {
        console.log(err);
        
    })
}
};
</script>
