<?php

namespace App\Http\Livewire\Appointments;

use Livewire\Component;
use App\Models\Appointment;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;

class ListAppointment extends Component implements HasTable
{
  use InteractsWithTable;

  protected function getTableQuery(): Builder
  {
    if(auth()->user()->hasRole(\App\Models\Role::PATIENT)) {
      return Appointment::query()->where('patient_id', auth()->user()->id)->latest();
    }

    return Appointment::query()->latest();
  }

  protected function getTableColumns(): array
  {

    if(auth()->user()->hasRole(\App\Models\Role::PATIENT)) {
      return [
        TextColumn::make('created_at')->label('Date de création'),
        TextColumn::make('doctor.full_name')->label('Docteur'),
        TextColumn::make('appointment_at')->label('Date'),
        BadgeColumn::make('is_done')->label('Statut')->enum([
          false => 'En attente',
          true => 'Confirmé',
        ]),
      ];
    }

    return [
      TextColumn::make('created_at')->label('Date'),
      TextColumn::make('patient.full_name')->label('Patient'),
      TextColumn::make('patient.contact')->label('Contact patient'),
      TextColumn::make('date')->label('Date de rendez-vous'),
    ];
  }
    public function render()
    {
        return view('livewire.appointments.list-appointment');
    }
}
