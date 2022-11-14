<?php

namespace App\Listeners;

use App\Events\PatientCreated;
use App\Models\MedicalBooklet;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreatePatientMedicalBooklet
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
        MedicalBooklet::create(['identifier' => 'CARSANTE0000'. $event->user->id, 'user_id' => $event->user->id]);
    }
}
