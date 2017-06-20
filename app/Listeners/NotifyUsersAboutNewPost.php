<?php

namespace App\Listeners;

use App\User;
use App\Notifications\PostPublished;
use App\Events\PostCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class NotifyUsersAboutNewPost
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
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
      // TODO: solo filtrar a los suscriptores de ese usuario
        $users = User::all();
        // var_dump($event->publicacion->toArray());
        Notification::send($users, new PostPublished($event->publicacion));
    }
}
