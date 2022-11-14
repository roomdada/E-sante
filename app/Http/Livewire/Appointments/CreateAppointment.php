<?php

namespace App\Http\Livewire\Appointments;

use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class CreateAppointment extends Component implements HasForms
{
    use \Filament\Forms\Concerns\InteractsWithForms;

    public $doctor_id, $appointment_at;

    public function mount()
    {
      $this->form->fill();
    }

    protected function getFormSchema(): array
    {
      return [
        \Filament\Forms\Components\Select::make('doctor_id')
          ->label('Docteur')
          ->options(\App\Models\User::doctor()->pluck('full_name', 'id'))
          ->required()
          ->rules('required', 'exists:users,id'),
        \Filament\Forms\Components\DatePicker::make('appointment_at')
          ->label('Date de rendez-vous')
          ->required()
          ->rules('required', 'date'),
      ];
    }

    public function submit()
    {
      $this->validate();

      $appointment = \App\Models\Appointment::create([
        'doctor_id' => $this->doctor_id,
        'patient_id' => auth()->user()->id,
        'appointment_at' => $this->appointment_at,
      ]);

      Notification::make()->title('Rendez-vous créé avec succès')->success()->iconColor('success')->send();
      $this->redirect(route('rendez-vous.index'));
    }
    public function render()
    {
        return view('livewire.appointments.create-appointment');
    }
}
