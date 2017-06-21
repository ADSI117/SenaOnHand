<?php

namespace App\Providers;
use Auth;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Broadcast;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        /*
         * Authenticate the user's personal channel...
         */
        Broadcast::channel('App.User.{id}', function ($user, $id) {
            return (int) $user->id === (int) $id;
        });

<<<<<<< HEAD
        Broadcast::channel('User_{id}', function ($user, $id) {
            return true;
        });
        
        // require base_path('routes/channels.php');
=======
        Broadcast::channel('test-channel', function () {
            return true;
        });
>>>>>>> 5328c2660c52d9acce5f0b1afdbc86b87ed234c6
    }
}
