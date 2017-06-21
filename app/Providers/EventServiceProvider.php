<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\PostCreated' => [
            'App\Listeners\NotifyUsersAboutNewPost',
        ],
        'App\Events\MessageWasReceived' => [
            'App\Listeners\MessageWasReceivedListener',
        ],   
        'App\Events\PruebaEvento' => [
            'App\Listeners\PruebaEventoEscuchador',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
