<?php

namespace App\Observers;

use App\Models\Logs;
use App\Models\Packages;

class PackagesObserver
{
    /**
     * Handle the Packages "created" event.
     *
     * @param  \App\Models\Packages  $packages
     * @return void
     */
    public function created(Packages $packages)
    {
        Logs::create([
            'logs_activition' => 'CREATE',
            'models' => 'packages'
        ]);
    }

    /**
     * Handle the Packages "updated" event.
     *
     * @param  \App\Models\Packages  $packages
     * @return void
     */
    public function updated(Packages $packages)
    {
        Logs::create([
            'logs_activition' => 'UPDATE',
            'models' => 'packages'
        ]);
    }

    /**
     * Handle the Packages "deleted" event.
     *
     * @param  \App\Models\Packages  $packages
     * @return void
     */
    public function deleted(Packages $packages)
    {
        Logs::create([
            'logs_activition' => 'DELETE',
            'models' => 'packages'
        ]);
    }

    /**
     * Handle the Packages "restored" event.
     *
     * @param  \App\Models\Packages  $packages
     * @return void
     */
    public function restored(Packages $packages)
    {
        Logs::create([
            'logs_activition' => 'RESTORE',
            'models' => 'packages'
        ]);
    }

    /**
     * Handle the Packages "force deleted" event.
     *
     * @param  \App\Models\Packages  $packages
     * @return void
     */
    public function forceDeleted(Packages $packages)
    {
        Logs::create([
            'logs_activition' => 'FORCE DELETE',
            'models' => 'packages'
        ]);
    }
}
