<template id="">

  <v-container>
      <v-layout row>
        <v-flex xs12 sm6 offset-sm3>
          <v-card >
            <v-card-text>
              <v-container>
                <form @submit.prevent="studentLogin">

                  <v-layout row>
                    <v-flex xs12>
                      <v-text-field
                        name="email"
                        label="Email"
                        id="email"
                        v-model="model.email"
                        type="email"
                        :rules="errors.email" required></v-text-field>
                    </v-flex>
                  </v-layout>
                  <v-layout row>
                    <v-flex xs12>
                      <v-text-field
                        name="password"
                        label="Password"
                        id="password"
                        v-model="model.password"
                        type="password"
                      :rules="errors.password" required></v-text-field>
                    </v-flex>
                  </v-layout>

                  <v-layout row>
                    <v-flex xs12>
                      <v-btn type="submit">LogIn</v-btn>
                    </v-flex>
                  </v-layout>
                </form>
              </v-container>
            </v-card-text>
          </v-card>
        </v-flex>
      </v-layout>
    </v-container>
</template>


<script>

import axios from 'axios'
export default{


  data(){

return{
    model:{

      login: []
    },

    errors: {}
  }

},

beforeMount(){

console.log('test')
},

  methods:{

studentLogin(){
 var vm =  this
vm.$socket.connect()
vm.$store.dispatch('studentLogin', vm.model)
},

testData(){


  axios.get('api/getAllStudents').then(function(response){

console.log(response.data)

}).catch(function(error){

console.log(error)
})

},


  },

  beforeMount(){


  }
}


</script>
