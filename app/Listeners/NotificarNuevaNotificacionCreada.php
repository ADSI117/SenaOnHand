<?php

namespace App\Listeners;

use App\Events\NotificacionCreada;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotificarNuevaNotificacionCreada
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotificacionCreada  $event
     * @return void
     */
    public function handle(NotificacionCreada $event)
    {
        //
    }
}
