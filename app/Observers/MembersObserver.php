<?php

namespace App\Observers;

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
        //
    }

    /**
     * Handle the Members "updated" event.
     *
     * @param  \App\Models\Members  $members
     * @return void
     */
    public function updated(Members $members)
    {
        //
    }

    /**
     * Handle the Members "deleted" event.
     *
     * @param  \App\Models\Members  $members
     * @return void
     */
    public function deleted(Members $members)
    {
        //
    }

    /**
     * Handle the Members "restored" event.
     *
     * @param  \App\Models\Members  $members
     * @return void
     */
    public function restored(Members $members)
    {
        //
    }

    /**
     * Handle the Members "force deleted" event.
     *
     * @param  \App\Models\Members  $members
     * @return void
     */
    public function forceDeleted(Members $members)
    {
        //
    }
}
