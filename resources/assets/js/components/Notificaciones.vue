<template>
    <li class="nav-item">
        <a :class="toggleBadges" id="notificaciones" :href="enlace" :data-badge="notificaciones">
            <i class="fa fa-bell"></i>
        </a>
        <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <div v-for="notificacion in notificaciones">
                <a @click="markAsRead(notificacion)" :href="notificacion.data.link" class="dropdown-item" v-text="notificacion.data.text"></a>
            </div> 
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" @click="markAllAsRead">Marcar todo como leido</a>
        </div>-->
    </li>
</template>

<script>
    export default {
        props: ['enlace', 'userid', 'unread'],
        // data() { 
        //     return {

                // 'notificaciones': []
        //     } 
        // },
        // mounted() {
        //     axios.get('/main-panel/notificaciones').then(res => {
        //         this.notificaciones = res.data;
        //     })
        //     Echo.private("App.User." + this.userid)
        //     .notification((notification) => {
        //         console.log(notification);
        //     });
        // },
        methods: {
            // markAsRead(notificacion) {
            //     axios.patch('/main-panel/notificaciones/' + notificacion.id)
            //         .then(res => {
            //             this.notificaciones = res.data;
            //         })
            // }
            // ,
            // markAllAsRead() {
            //     this.notificaciones.forEach(notificacion => {
            //         this.markAsRead(notificacion);
            //     });
            // }

        }, 
        computed: {
            toggleBadges() {
                return ['nav-link notify', this.unread != '0' ? 'active' : '']
            }
        }

    }
</script>
