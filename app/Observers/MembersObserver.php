<?php

namespace App\Observers;

use App\Models\Logs;
use App\Models\Members;

class MembersObserver
{
    /**
     * Handle the Members "created" event.
     *
     * @param  \App\Models\Members  $members
     * @return void
     */
    public function created(Members $members)
    {
        Logs::create([
            'logs_activition' => 'CREATE',
            'models' => 'members'
        ]);
    }

    /**
     * Handle the Members "updated" event.
     *
     * @param  \App\Models\Members  $members
     * @return void
     */
    public function updated(Members $members)
    {
        Logs::create([
            'logs_activition' => 'UPDATE',
            'models' => 'members'
        ]);
    }

    /**
     * Handle the Members "deleted" event.
     *
     * @param  \App\Models\Members  $members
     * @return void
     */
    public function deleted(Members $members)
    {
        Logs::create([
            'logs_activition' => 'DELETE',
            'models' => 'members'
        ]);
    }

    /**
     * Handle the Members "restored" event.
     *
     * @param  \App\Models\Members  $members
     * @return void
     */
    public function restored(Members $members)
    {
        Logs::create([
            'logs_activition' => 'RESTORE',
            'models' => 'members'
        ]);
    }

    /**
     * Handle the Members "force deleted" event.
     *
     * @param  \App\Models\Members  $members
     * @return void
     */
    public function forceDeleted(Members $members)
    {
        Logs::create([
            'logs_activition' => 'FORCE DELETE',
            'models' => 'members'
        ]);
    }
}
