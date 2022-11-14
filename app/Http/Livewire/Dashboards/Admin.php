<?php

namespace App\Http\Livewire\Dashboards;

use Livewire\Component;

class Admin extends Component
{
    public function render()
    {
        return view('livewire.dashboards.admin', [
          'appointments' => \App\Models\Appointment::count(),
          'consultations' => \App\Models\Consultation::count(),
          'patients' => \App\Models\User::patient()->count(),
        ]);
    }
}
