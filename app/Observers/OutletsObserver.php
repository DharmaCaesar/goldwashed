<?php

namespace App\Observers;

use App\Models\Logs;
use App\Models\Outlets;

class OutletsObserver
{
    /**
     * Handle the Outlets "created" event.
     *
     * @param  \App\Models\Outlets  $outlets
     * @return void
     */
    public function created(Outlets $outlets)
    {
        Logs::create([
            'logs_activition' => 'create',
            'models' => 'outlets'
        ]);
    }

    /**
     * Handle the Outlets "updated" event.
     *
     * @param  \App\Models\Outlets  $outlets
     * @return void
     */
    public function updated(Outlets $outlets)
    {
        Logs::create([
            'logs_activition' => 'update',
            'models' => 'outlets'
        ]);
    }

    /**
     * Handle the Outlets "deleted" event.
     *
     * @param  \App\Models\Outlets  $outlets
     * @return void
     */
    public function deleted(Outlets $outlets)
    {
        Logs::create([
            'logs_activition' => 'delete',
            'models' => 'outlets'
        ]);
    }

    /**
     * Handle the Outlets "restored" event.
     *
     * @param  \App\Models\Outlets  $outlets
     * @return void
     */
    public function restored(Outlets $outlets)
    {
        Logs::create([
            'logs_activition' => 'restore',
            'models' => 'outlets'
        ]);
    }

    /**
     * Handle the Outlets "force deleted" event.
     *
     * @param  \App\Models\Outlets  $outlets
     * @return void
     */
    public function forceDeleted(Outlets $outlets)
    {
        Logs::create([
            'logs_activition' => 'force_delete',
            'models' => 'outlets'
        ]);
    }
}
