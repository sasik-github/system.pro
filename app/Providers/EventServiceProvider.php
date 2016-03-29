<?php

namespace App\Providers;

use App\Events\ChildEventWasCreated;
use App\Events\TariffWasExpired;
use App\Listeners\ChildEventListener;
use App\Listeners\TariffExpiredListener;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ChildEventWasCreated::class => [
            ChildEventListener::class
        ],

        TariffWasExpired::class => [
            TariffExpiredListener::class
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }
}
