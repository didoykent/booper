<template id="">

  <v-container>
      <v-layout row>
        <v-flex xs12 sm6 offset-sm3>
          <v-card >
            <v-card-text>
              <v-container>
                <form @submit.prevent="studentRegister">
                  <v-layout row>
                    <v-flex xs12>
                      <v-text-field
                        name="englishName"
                        label="English Name"
                        id="englishName"
                        v-model="model.englishName"

                      :rules="errors.englishName" required></v-text-field>
                    </v-flex>
                  </v-layout>
                  <v-layout row>
                    <v-flex xs12>
                      <v-text-field
                        name="koreanName"
                        label="Korean Name"
                        id="koreanName"
                        v-model="model.koreanName"
                        :rules="errors.koreanName" required></v-text-field>
                    </v-flex>
                  </v-layout>
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
                      <v-text-field
                        name="confirmPassword"
                        label="Confirm Password"
                        id="confirmPassword"
                        v-model="model.password_confirmation"
                        type="password"
                    :rules="errors.password_confirmation" required></v-text-field>
                    </v-flex>
                  </v-layout>
                  <v-layout row>
                    <v-flex xs12>
                      <v-btn type="submit">Register</v-btn>
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
          register: []
    },


    errors: {}


  }
},

beforeMount(){

this.testData()

},



methods:{


  studentRegister(){

var vm = this
      axios.post('api/tutor_signup', vm.model ).then(function(response){
        console.log(response.data)
  vm.$router.push('/')

      }).catch(function(error){

      vm.errors = error.response.data
      })
  },


  testData(){


    axios.get('api/getAllStudents').then(function(response){

  console.log(response.data)

  }).catch(function(error){

  console.log(error)
  })

  }


}

}



</script>
