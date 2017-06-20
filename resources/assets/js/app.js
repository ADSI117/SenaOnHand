window._ = require('lodash');
window.Vue = require('vue');
window.axios = require('axios');
window.Pusher = require('pusher-js');

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Vue.http.interceptors.push((request, next) => {
//     request.headers.set('X-CSRF-TOKEN', Laravel.csrfToken);

//     next();
// });

import Echo from "laravel-echo"
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '637fb005c217f2f1ea68',
    cluster: "mt1",
    encrypted: true
});

Vue.component('example', require('./components/Example.vue'));
Vue.component('notification', require('./components/Notificaciones.vue'));

const app = new Vue({
    el: '#app'
});
   