require('./bootstrap')

Vue.component('example', require('./components/Example.vue'));
// Vue.component('notification', require('./components/Notificaciones.vue'));




const app = new Vue({
    el: '#wrapper'
});

// Echo.channel('message-channel')
//     .listen('MessageWasReceived', data => {
//         console.log(data);
//     })
