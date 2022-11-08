<?php

namespace App\Listeners;

use App\Events\PatientCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPatientNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PatientCreated  $event
     * @return void
     */
    public function handle(PatientCreated $event)
    {
        $event->user->notify(new \App\Notifications\AccountCreated($event->user));
    }
}
