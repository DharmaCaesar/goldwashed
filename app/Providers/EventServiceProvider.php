<?php

namespace App\Providers;

use App\Models\Members;
use App\Models\Outlets;
use App\Models\Packages;
use App\Models\penjemputan;
use App\Models\User;
use App\Observers\MembersObserver;
use App\Observers\OutletsObserver;
use App\Observers\PackagesObserver;
use App\Observers\PenjemputanObserver;
use App\Observers\UsersObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Outlets::observe(OutletsObserver::class);
        Packages::observe(PackagesObserver::class);
        Members::observe(MembersObserver::class);
        User::observe(UsersObserver::class);
        penjemputan::observe(PenjemputanObserver::class);
    }
}
