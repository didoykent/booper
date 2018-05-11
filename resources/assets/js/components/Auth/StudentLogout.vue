<template>


  <h2>Logged Out</h2>
</template>


<script>

import axios from 'axios'
export default{


  data(){

    return{


    }
  },

  beforeMount(){
var vm = this
let token = localStorage.getItem('token');

axios.post('api/student_logout?token='+token).then(function(response){




localStorage.removeItem('token');

console.log(response.data)

}).catch(function(error){

console.log(error)
})

  },

  methods:{


  }
}


</script>
