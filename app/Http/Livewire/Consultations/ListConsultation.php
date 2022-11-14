<?php

namespace App\Http\Livewire\Consultations;

use Livewire\Component;
use App\Models\Consultation;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;

class ListConsultation extends Component implements HasTable
{
    use InteractsWithTable;

    protected function getTableQuery(): Builder 
    {
        return Consultation::query()->latest();
    }

    protected function getTableColumns(): array 
    {
        return [
            TextColumn::make('patient.full_name')->label('Patient'),
            TextColumn::make('consultationType.name')->label('Type de consultation'),
            TextColumn::make('date')->label('Date'),
            TextColumn::make('price')->label('Prix'),
        ];
    }
    
    public function render()
    {
        return view('livewire.consultations.list-consutlation');
    }
}
