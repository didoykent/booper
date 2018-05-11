import Vue from 'vue'

 import router from './router'
import Vuex from 'vuex'

import axios from 'axios'


Vue.use(Vuex);




const types = {

LOGIN: 'LOGIN',
LOGOUT: 'LOGOUT'

}


const state = {

  logged: localStorage.getItem('token')
}

const getters = {

  isLogged: state => state.logged
}


const actions = {

studentLogin({commit}, model){


var vm = this
   axios.post('api/student_signin', model).then(function(response){

     let token = response.data.token

     if(token){

       localStorage.setItem('token', token);


       commit(types.LOGIN);
        router.push('/')
     }

     console.log(response.data.token)



   }).catch(function(error){

     console.log(error)

   })

},

studentLogOut({commit}){

var vm = this
  let token = localStorage.getItem('token');

  axios.post('api/student_logout?token='+token).then(function(response){

  localStorage.removeItem('token');
  commit(types.LOGOUT);
     router.push('/')

  console.log(response.data)

  }).catch(function(error){

  console.log(error)
  })
}



}

const mutations = {

[types.LOGIN](state){

  state.logged = 1;
},


[types.LOGOUT](state){

  state.logged = 0;
}

}





export default new Vuex.Store({

state,
getters,
actions,
mutations

});
