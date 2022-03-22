<?php

namespace App\Observers;

use App\Models\Logs;
use App\Models\penjemputan;

class PenjemputanObserver
{
    /**
     * Handle the penjemputan "created" event.
     *
     * @param  \App\Models\penjemputan  $penjemputan
     * @return void
     */
    public function created(penjemputan $penjemputan)
    {
        Logs::create([
            'logs_activition' => 'CREATE',
            'models' => 'penjemputan'
        ]);
    }

    /**
     * Handle the penjemputan "updated" event.
     *
     * @param  \App\Models\penjemputan  $penjemputan
     * @return void
     */
    public function updated(penjemputan $penjemputan)
    {
        Logs::create([
            'logs_activition' => 'UPDATE',
            'models' => 'penjemputan'
        ]);
    }

    /**
     * Handle the penjemputan "deleted" event.
     *
     * @param  \App\Models\penjemputan  $penjemputan
     * @return void
     */
    public function deleted(penjemputan $penjemputan)
    {
        Logs::create([
            'logs_activition' => 'DELETE',
            'models' => 'penjemputan'
        ]);
    }

    /**
     * Handle the penjemputan "restored" event.
     *
     * @param  \App\Models\penjemputan  $penjemputan
     * @return void
     */
    public function restored(penjemputan $penjemputan)
    {
        Logs::create([
            'logs_activition' => 'RESTORE',
            'models' => 'penjemputan'
        ]);
    }

    /**
     * Handle the penjemputan "force deleted" event.
     *
     * @param  \App\Models\penjemputan  $penjemputan
     * @return void
     */
    public function forceDeleted(penjemputan $penjemputan)
    {
        Logs::create([
            'logs_activition' => 'FORCE DELETE',
            'models' => 'penjemputan'
        ]);
    }
}
