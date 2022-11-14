<?php

namespace App\Http\Livewire\Dashboards;

use Livewire\Component;

class Patient extends Component
{
    public function render()
    {
        return view('livewire.dashboards.patient', [
          'appointments' => auth()->user()->appointments()->count(),
          'suggestions' => auth()->user()->suggestions()->count(),
          'consultations' => auth()->user()->medicalBooklet->consultations()->count(),
        ]);
    }
}
