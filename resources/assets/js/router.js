import Vue from 'vue'

import VueRouter from 'vue-router'

import axios from 'axios'



Vue.use(VueRouter)





const router = new VueRouter({



  routes: [

    {path: '/student-register', component:require('./components/Auth/StudentRegister.vue')},
    {path: '/tutor-register', component:require('./components/Auth/TutorRegister.vue')},
    {path: '/student-login', component:require('./components/Auth/StudentLogin.vue')},
    {path: '/student-recording', component:require('./components/Recording.vue')},
    {path: '/student-edit', component:require('./components/Auth/StudentEdit.vue')},
    {path: '/choose-tutor', component:require('./components/Auth/ChooseTutor.vue')},
    {path: '/chat', component:require('./components/Chat/chat.vue')},
    {path: '/chat/:chatroute',component:require('./components/Chat/chat.vue')}


  ]
});


export default router
