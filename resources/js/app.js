require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import './registerServiceWorker'
import ArgonDashboard from './plugins/argon-dashboard'
import store from './store';

Vue.config.productionTip = false

Vue.use(ArgonDashboard)

require('./route-middleware')


new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
