<template>
  <v-layout row>
    <v-flex xs12 sm6 offset-sm3>
      <v-card>
        <v-toolbar color="teal" dark>

          <v-toolbar-title class="text-xs-center">Choose Tutor</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-btn icon>
            <v-icon>search</v-icon>
          </v-btn>
        </v-toolbar>
        <v-list subheader>
          <v-subheader>Tutor Lists</v-subheader>
          <v-list-tile avatar v-for="item in model" :key="item.en_name" @click="">
            <v-list-tile-avatar>
              <img :src="'https://scontent.ficn2-1.fna.fbcdn.net/v/t1.0-9/30221337_1997916873795966_2928942523007615672_n.jpg?_nc_cat=0&oh=7dd598716fab33600691b7f6c37bae2b&oe=5B646652'">
            </v-list-tile-avatar>
            <v-list-tile-content>
              <v-list-tile-title v-html="item.en_name"></v-list-tile-title>
            </v-list-tile-content>
            <v-list-tile-action>
             <v-btn small color="primary" @click = "addTutor(item.id)">Choose</v-btn>
            </v-list-tile-action>
          </v-list-tile>
        </v-list>

      </v-card>
    </v-flex>
  </v-layout>
</template>




<script>

import axios from 'axios'
import Vue from 'vue'
  export default {
    data () {
      return {
        items: [
          { active: true, title: 'Jason Oner', avatar: '/static/doc-images/lists/1.jpg' },
          { active: true, title: 'Ranee Carlson', avatar: '/static/doc-images/lists/2.jpg' },
          { title: 'Cindy Baker', avatar: '/static/doc-images/lists/3.jpg' },
          { title: 'Ali Connors', avatar: '/static/doc-images/lists/4.jpg' }
        ],

        model: []



      }
    },

    beforeMount(){

this.getTutors()
    },

    methods:{

      getTutors(){
var vm = this

let token = localStorage.getItem('token');


        axios.get('api/getTutors').then(function(response){

          Vue.set(vm.$data, 'model', response.data)

          console.log(vm.model)


        }).catch(function(error){

          console.log(error)
        })
      },

      addTutor(id){
var vm = this
        vm.formData = new FormData();

        vm.formData.append('id', id)

axios.post('api/addTutor', vm.formData).then(function(response){

console.log(response.data)

}).catch(function(error){

  console.log(error)
})

      }
    }
  }
</script>
