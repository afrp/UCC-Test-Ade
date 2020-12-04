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
            Engine Display
          </th>
          <th class="text-left">
            Engine Power
          </th>
          <th class="text-left">
            Price
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
          <td>{{ item.ucc_engine_disp }}</td>
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
