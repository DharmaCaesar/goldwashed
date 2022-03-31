<?php

namespace App\Observers;

use App\Models\absen;
use App\Models\Logs;

class AbsenObserver
{
    /**
     * Handle the absen "created" event.
     *
     * @param  \App\Models\absen  $absen
     * @return void
     */
    public function created(absen $absen)
    {
        Logs::create([
            'logs_activition' => 'CREATE',
            'models' => 'absen'
        ]);
    }

    /**
     * Handle the absen "updated" event.
     *
     * @param  \App\Models\absen  $absen
     * @return void
     */
    public function updated(absen $absen)
    {
        Logs::create([
            'logs_activition' => 'UPDATE',
            'models' => 'absen'
        ]);
    }

    /**
     * Handle the absen "deleted" event.
     *
     * @param  \App\Models\absen  $absen
     * @return void
     */
    public function deleted(absen $absen)
    {
        Logs::create([
            'logs_activition' => 'DELETE',
            'models' => 'absen'
        ]);
    }

    /**
     * Handle the absen "restored" event.
     *
     * @param  \App\Models\absen  $absen
     * @return void
     */
    public function restored(absen $absen)
    {
        Logs::create([
            'logs_activition' => 'RESTORE',
            'models' => 'absen'
        ]);
    }

    /**
     * Handle the absen "force deleted" event.
     *
     * @param  \App\Models\absen  $absen
     * @return void
     */
    public function forceDeleted(absen $absen)
    {
        Logs::create([
            'logs_activition' => 'FORCE DELETE',
            'models' => 'absen'
        ]);
    }
}
