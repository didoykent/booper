<template id="">

<div>

<v-app>
  <v-toolbar  color="pink" >
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title>Megatalking</v-toolbar-title>
    <v-spacer></v-spacer>
    <v-toolbar-items class="hidden-sm-and-down">


      <v-btn flat :to = "'student-login'" v-if = "!isLogged" >Login|</v-btn>
      <v-btn flat :to = "'student-register'"  v-if = "!isLogged">Student</v-btn>
      <v-btn flat :to = "'tutor-register'"  v-if = "!isLogged">Tutor</v-btn>





        </v-toolbar-items>

    <v-toolbar-items class="hidden-sm-and-down">

      <v-btn flat @click="studentLogOut" v-if = "isLogged">LogOut</v-btn>
      <v-btn flat @click="testIn" v-if = "isLogged">testData</v-btn>
        </v-toolbar-items>

  </v-toolbar>




  <router-view></router-view>


</v-app>




</div>


</template>


<script>

import axios from 'axios'
import {mapGetters} from 'vuex'
export default{

  data(){

    return{

      myData : ''
    }
  },

computed:mapGetters([

  'isLogged'
]),



  methods:{

    testIn(){
var vm =  this
      axios.get('api/getStudents').then(function(response){

        console.log(response.data)

      }).catch(function(error){

        console.log(error)
      })
    },

    studentLogOut(){

      var vm  = this
      vm.$store.dispatch('studentLogOut')
      vm.$socket.disconnect()
    }
  }
}

</script>
