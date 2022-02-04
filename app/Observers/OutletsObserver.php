<?php

namespace App\Observers;

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
        //
    }

    /**
     * Handle the Outlets "updated" event.
     *
     * @param  \App\Models\Outlets  $outlets
     * @return void
     */
    public function updated(Outlets $outlets)
    {
        //
    }

    /**
     * Handle the Outlets "deleted" event.
     *
     * @param  \App\Models\Outlets  $outlets
     * @return void
     */
    public function deleted(Outlets $outlets)
    {
        //
    }

    /**
     * Handle the Outlets "restored" event.
     *
     * @param  \App\Models\Outlets  $outlets
     * @return void
     */
    public function restored(Outlets $outlets)
    {
        //
    }

    /**
     * Handle the Outlets "force deleted" event.
     *
     * @param  \App\Models\Outlets  $outlets
     * @return void
     */
    public function forceDeleted(Outlets $outlets)
    {
        //
    }
}
