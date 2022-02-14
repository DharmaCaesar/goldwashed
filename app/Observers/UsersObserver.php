<?php

namespace App\Observers;

use App\Models\Logs;
use App\Models\User;

class UsersObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        Logs::create([
            'logs_activition' => 'CREATE',
            'models' => 'user'
        ]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        Logs::create([
            'logs_activition' => 'UPDATE',
            'models' => 'user'
        ]);
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        Logs::create([
            'logs_activition' => 'DELETE',
            'models' => 'user'
        ]);
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        Logs::create([
            'logs_activition' => 'RESTORE',
            'models' => 'user'
        ]);
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        Logs::create([
            'logs_activition' => 'FORCE DELETE',
            'models' => 'user'
        ]);
    }
}
