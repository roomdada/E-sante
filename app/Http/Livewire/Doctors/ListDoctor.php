<?php

namespace App\Http\Livewire\Doctors;

use App\Models\User;
use Livewire\Component;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;

class ListDoctor extends Component implements HasTable
{
  use \Filament\Tables\Concerns\InteractsWithTable;


  protected function getTableQuery(): Builder 
    {
        return User::query()->doctor()->latest();
    } 

    protected function getTableColumns(): array 
    {
        return [
          TextColumn::make('identifier')->label('Matricule'),
          ImageColumn::make('image')->label('Photo')->width(80)->height(80),
          TextColumn::make('full_name')->label('Nom complet'),
          TextColumn::make('email')->label('Email'),
        ];
    }

    public function render()
    {
        return view('livewire.doctors.list-doctor');
    }
}
